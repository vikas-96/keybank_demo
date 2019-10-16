<?php

namespace App\Services;

use App\Models\Caseofficer;

class CaseofficerService
{
    public function __construct(Caseofficer $caseofficer)
    {
        $this->caseofficer = $caseofficer ;
    }

    public function index($request)
    {
        $data = $this->caseofficer;
        
        $searchFilters = $request->only(['name', 'email', 'contact','is_active']);
       
        if($request->has('q')){
            $name = $request->q;
            $data = $data->where(function ($query) use ($name) {
                return $query->where('name', 'like', '%' . $name . '%')
                ->orWhere('email', 'like', '%' . $name . '%');
            })->where('is_active',true);
            return $data->get();
        }
        if($request->has('search')){
            $name = $request->search;
            $data = $data->where(function ($query) use ($name) {
                return $query->where('name', 'like', '%' . $name . '%')
                ->orWhere('email', 'like', '%' . $name . '%');
            })->where('is_active',true);
            // return $data->get();
        }

        if (! empty($searchFilters)) {
            $data =  $data->where(function ($query) use ($request, $searchFilters) {
                foreach ($searchFilters as $key => $value) {
                    if ($request->has($key)) {
                        if ($request->has('is_active') && $key == 'is_active') {
                            $query->Where($key, filter_var($value, FILTER_VALIDATE_BOOLEAN));
                        } else {
                            $query->Where($key, 'LIKE', "%" . $value . "%");
                        }
                    }
                }
            });
        }

        $per_page = (int) $request->input('per_page', 10);
        $sort = $request->input('sort', 'created_at');
        $order = $request->input('order', 'asc');
        $data = $data->orderBy($sort, $order)->paginate($per_page);
        return $data;
    }

    public function store($caseofficerData)
    {
        try {
            /*Create a record in the users table*/
            $caseOfficer = Caseofficer::create($caseofficerData);

            return $caseOfficer;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function show($id)
    {
        $caseofficerData = Caseofficer::find($id);
        if (!empty($caseofficerData)) {
            return $caseofficerData;
        }
        throw new \Exception("Record not found");
    }

    public function update($caseofficerData, $caseOfficerId)
    {
        $currentCaseOfficer = Caseofficer::findOrFail($caseOfficerId);
        $currentCaseOfficer->update($caseofficerData);

        return $currentCaseOfficer;
    }

    public function destroy($id)
    {
        // $borrower = Borrower::findOrFail($id);

        // if ($borrower->delete()) {
        //     return $borrower;
        // }
    }
    /**
     * [getMultiData description]
     * @param  [type] $request [description]
     * @return [type]          [description]
     */
    public function getMultiData($request)
    {
        
        $ids = $request['id'];
        $caseOfficerArray=[];
        $caseOfficerData = Caseofficer::whereIn('_id',$ids)->get();
        if (!empty($caseOfficerData)) {
            foreach($caseOfficerData as $key=>$value)
            {
                $caseOfficerName = $value['name'];
                if(!empty($value['email']))
                    $caseOfficerName.=" (".$value['email'].")";
                $caseOfficerArray[$value['_id']] = $caseOfficerName;
            }
            return $caseOfficerArray;
        }
        throw new \Exception("Record not found");
    }
}
