<?php

namespace App\Services;

use App\Models\Advocate;

class AdvocateService
{
    public function __construct(Advocate $advocate)
    {
        $this->advocate = $advocate ;
    }

    public function index($request)
    {
        $data = $this->advocate;
        
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

    public function store($advocateData)
    {
        try {
            /*Create a record in the users table*/
            $advocate = Advocate::create($advocateData);
            
            return $advocate;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function show($id)
    {
        $advocateData = Advocate::find($id);
        if(!empty($advocateData)){
            return $advocateData;
        }
        throw new \Exception("Record not found");
    }

    public function update($advocateData, $advocateId)
    {
        $currentadvocate = Advocate::findOrFail($advocateId);
        $currentadvocate->update($advocateData);

        return $currentadvocate;
    }

    public function destroy($id)
    {
        // $borrower = Advocate::findOrFail($id);

        // if ($borrower->delete()) {
        //     return $borrower;
        // }
    }

}
