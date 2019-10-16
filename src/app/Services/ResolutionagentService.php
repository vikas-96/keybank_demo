<?php

namespace App\Services;

use App\Models\Resolutionagent;

class ResolutionagentService
{
    public function __construct(Resolutionagent $resolutionagent)
    {
        $this->resolutionagent = $resolutionagent ;
    }

    public function index($request)
    {
        $data = $this->resolutionagent;
        
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

    public function store($resolutionagentData)
    {
        try {
            /*Create a record in the users table*/
            $resolutionagent = Resolutionagent::create($resolutionagentData);
            
            return $resolutionagent;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function show($id)
    {
        $resolutionagentData = Resolutionagent::find($id);
        if(!empty($resolutionagentData)){
            return $resolutionagentData;
        }
        throw new \Exception("Record not found");
    }

    public function update($resolutionagentData, $resolutionagentId)
    {
        $currentresolutionagent = Resolutionagent::findOrFail($resolutionagentId);
        $currentresolutionagent->update($resolutionagentData);

        return $currentresolutionagent;
    }

    public function destroy($id)
    {
        // $resolutionagent = Resolutionagent::findOrFail($id);

        // if ($resolutionagent->delete()) {
        //     return $resolutionagent;
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
        $resolutionAgentArray=[];
        $resolutionAgentData = Resolutionagent::whereIn('_id',$ids)->get();
        if (!empty($resolutionAgentData)) {
            foreach($resolutionAgentData as $key=>$value)
            {
                $resolutionAgentName = $value['name'];
                if(!empty($value['email']))
                    $resolutionAgentName.=" (".$value['email'].")";
                $resolutionAgentArray[$value['_id']] = $resolutionAgentName;
            }
            return $resolutionAgentArray;
        }
        throw new \Exception("Record not found");
    }
}
