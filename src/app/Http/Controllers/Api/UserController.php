<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{

    protected $UserService;
    

    public function __construct(UserService $UserService)
    {
        $this->UserService = $UserService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = $this->UserService->index($request);
        return UserResource::collection($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $validatedUser = $request->validated();
        $validatedUser['is_active'] = filter_var($validatedUser['is_active'], FILTER_VALIDATE_BOOLEAN);
        try {
            $user = $this->UserService->store($validatedUser);

            // return response()->json(new userResource($user), 201);
            return response()->json(['message' => 'User Created'], 201);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $userdata = $this->UserService->show($id);
            return response()->json(new userResource($userdata), 200);
        }catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $validatedUser = $request->validated();

        try {
            $user = $this->UserService->update($validatedUser, $id);

            return response()->json(['message' => 'User Updated'], 200);
            // return response()->json(new userResource($user), 200);
        } catch(ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested User!'], 404);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            if(\Auth::user()->id == $id){
                return response()->json(['message' => 'Sorry you cannot delete yourself.'], 400);
            }
            $deleteUser = $this->UserService->destroy($id);

            return response()->json(['message' => 'User has been deleted successfully!'], 200);
        } catch(ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested User!'], 404);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }
}
