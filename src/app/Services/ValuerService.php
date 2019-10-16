<?php

namespace App\Services;

use App\Models\Valuer;

class ValuerService
{
    
    public function __construct(Valuer $valuer)
    {
        $this->valuer = $valuer ;
    }

    public function index($request)
    {
        $data = $this->valuer;
        
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

    public function store($valuersData)
    {
        try {
            /*Create a record in the users table*/
            $ValuersService = Valuer::create($valuersData);
            
            return $ValuersService;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function show($id)
    {
        $valuersData = Valuer::find($id);
        if(!empty($valuersData)){
            return $valuersData;
        }
        throw new \Exception("Record not found");
    }

    public function update($valuersData, $valuersId)
    {
        $valuersadvocate = Valuer::findOrFail($valuersId);
        $valuersadvocate->update($valuersData);

        return $valuersadvocate;
    }

    public function destroy($id)
    {
        // $borrower = Advocate::findOrFail($id);

        // if ($borrower->delete()) {
        //     return $borrower;
        // }
    }
}
