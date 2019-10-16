<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function __construct(User $user)
    {
        $this->user = $user ;
    }

    public function index($request)
    {
        $data = $this->user;
        
        $searchFilters = $request->only(['email', 'contact_number','is_active']);
        
        if ($request->has('q')) {
            $name = $request->q;
            $data = $data->where(function ($query) use ($name) {
                return $query->where('firstname', 'like', '%' . $name . '%')
                ->orWhere('lastname', 'like', '%' . $name . '%');
            })->where('is_active',true);
            return $data->get();
        }
        if ($request->has('search')) {
            $name = $request->search;
            $data = $data->where('firstname', 'like', '%' . $name . '%')->orWhere('lastname', 'like', '%' . $name . '%')->orWhere('contact_number', 'like', '%' . $name . '%')->orWhere('email', 'like', '%' . $name . '%');
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

    public function store($userData)
    {
        try {
            /*Create a record in the users table*/
            $user = User::create($userData);
            $user->assignRole($userData['role']);
            return $user;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function show($id)
    {
        $userdata = User::find($id);
        if(!empty($userdata)){
            return $userdata;
        }
        throw new \Exception("Record not found");
    }

    public function update($UserData, $UserId)
    {
        // $currentUser = User::where('id',$UserId)->first();
        $role = $UserData['role'];
        unset($UserData['role']);
        $currentUser = User::findOrFail($UserId);
        $currentUser->update($UserData);

        
        // DB::table('model_has_roles')->where('model_id',$UserId)->delete();
        $currentUser->syncRoles($role);

        return $currentUser;
    }

    public function destroy($id)
    {
        $User = User::findOrFail($id);

        if ($User->delete()) {
            return $User;
        }
    }
}
