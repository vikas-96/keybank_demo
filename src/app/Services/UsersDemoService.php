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
        // dd($userdata->toArray());
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
        $User = UsersDemo::findOrFail($id);

        if ($User->delete()) {
            return $User;
        }
    }
}
