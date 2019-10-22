<?php
namespace App\Services;

use App\Models\UsersDemo;

class UsersDemoService
{
    public function __construct(UsersDemo $usersdemo)
    {
        $this->usersdemo = $usersdemo ;
    }

    public function index($request)
    {
        $userdata = UsersDemo::with('state','city')->get();
        return $userdata;
    }

    public function store($userData)
    {
        try {
            
            /*Create a record in the users table*/
            $user = UsersDemo::create($userData);
            
            return $user;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function show($id)
    {
        $borrowerdata = UsersDemo::find($id);
        if(!empty($borrowerdata)){
            return $borrowerdata;
        }
        throw new \Exception("Record not found");
    }

    public function update($UserData, $UserId)
    {
        $currentUser = UsersDemo::findOrFail($UserId);
        $currentUser->update($UserData);

        return $currentUser;
    }

    public function destroy($id)
    {
        $User = UsersDemo::findOrFail($id);

        if ($User->delete()) {
            return $User;
        }
    }
}
