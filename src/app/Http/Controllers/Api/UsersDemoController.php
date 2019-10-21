<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\UsersDemoService;
use App\Http\Requests\UsersDemoRequest;
use App\Http\Resources\UsersDemoResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UsersDemoController extends Controller
{

    protected $UsersDemoService;

    public function __construct(UsersDemoService $UsersDemoService)
    {
        $this->UsersDemoService = $UsersDemoService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = $this->UsersDemoService->index($request);
        // dd(UsersDemoResource::collection($users));
        
        return UsersDemoResource::collection($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersDemoRequest $request)
    {
        $validatedData = $request->validated();
        try {
            $user = $this->UsersDemoService->store($validatedData);

            return response()->json(['message' => 'User Created'], 201);
            // return response()->json(new BorrowerResource($borrower), 201);
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
            $userdata = $this->UsersDemoService->show($id);
            return response()->json(new UsersDemoResource($userdata), 200);
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
    public function update(Request $request, $id)
    {
        //
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
            $deleteUser = $this->UsersDemoService->destroy($id);

            return response()->json(['message' => 'User has been deleted successfully!'], 200);
        } catch(ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested User!'], 404);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }
}
