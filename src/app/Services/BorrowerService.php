<?php

namespace App\Services;

use App\Models\Borrower;

class BorrowerService
{
    public function __construct(Borrower $borrower)
    {
        $this->borrower = $borrower ;
    }

    public function index($request)
    {
        $data = $this->borrower;
        
        $searchFilters = $request->only(['name', 'cif','is_active']);

        if($request->has('q')){
            $name = $request->q;
            $data = $data->where(function ($query) use ($name) {
                return $query->where('cif', 'like', '%' . $name . '%')
                ->orWhere('name', 'like', '%' . $name . '%');
            })->where('is_active',true);
            return $data->get();
        }
        if($request->has('search')){
            $name = $request->search;
            $data = $data->where(function ($query) use ($name) {
                return $query->where('cif', 'like', '%' . $name . '%')
                ->orWhere('name', 'like', '%' . $name . '%');
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

    public function store($borrowerData)
    {
        try {
            /*Create a record in the users table*/
            $borrower = Borrower::create($borrowerData);
            
            return $borrower;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function show($id)
    {
        $borrowerdata = Borrower::find($id);
        if(!empty($borrowerdata)){
            return $borrowerdata;
        }
        throw new \Exception("Record not found");
    }

    public function update($borrowerData, $borrowerId)
    {
        $currentBorrower = Borrower::findOrFail($borrowerId);
        $currentBorrower->update($borrowerData);

        return $currentBorrower;
    }

    public function destroy($id)
    {
        // $borrower = Borrower::findOrFail($id);

        // if ($borrower->delete()) {
        //     return $borrower;
        // }
    }
}
