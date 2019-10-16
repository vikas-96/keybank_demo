<?php

namespace App\Services;

use App\Models\Caseleadofficer;

class CaseleadofficerService
{
    public function __construct(Caseleadofficer $caseleadofficer)
    {
        $this->caseleadofficer = $caseleadofficer ;
    }

    public function index($request)
    {
        $data = $this->caseleadofficer;
        
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

    public function store($caseLeadOfficerData)
    {
        try {
            /*Create a record in the users table*/
            $caseLeadOfficer = Caseleadofficer::create($caseLeadOfficerData);

            return $caseLeadOfficer;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function show($id)
    {
        $caseLeadOfficerData = Caseleadofficer::find($id);
        if (!empty($caseLeadOfficerData)) {
            return $caseLeadOfficerData;
        }
        throw new \Exception("Record not found");
    }

    public function update($caseLeadOfficerData, $caseLeadOfficerId)
    {
        $currentCaseLeadOfficer = Caseleadofficer::findOrFail($caseLeadOfficerId);
        $currentCaseLeadOfficer->update($caseLeadOfficerData);

        return $currentCaseLeadOfficer;
    }

    public function destroy($id)
    {
        // $borrower = Borrower::findOrFail($id);

        // if ($borrower->delete()) {
        //     return $borrower;
        // }
    }
    public function getMultiData($request)
    {
        
        $ids = $request['id'];
        $caseleadArray=[];
        $caseLeadOfficerData = Caseleadofficer::whereIn('_id',$ids)->get();
        if (!empty($caseLeadOfficerData)) {
            foreach($caseLeadOfficerData as $key=>$value)
            {
                $caseLeadOfficerName = $value['name'];
                if(!empty($value['email']))
                    $caseLeadOfficerName.=" (".$value['email'].")";
                $caseleadArray[$value['_id']] = $caseLeadOfficerName;
            }
            return $caseleadArray;
        }
        throw new \Exception("Record not found");
    }
}
