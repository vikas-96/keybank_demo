<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\PermissionService;
use App\Http\Requests\PermissionRequest;
use App\Http\Resources\PermissionResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
        // $this->middleware('permission:create-permission')->only('store');
        // $this->middleware('permission:view-permission')->only('index', 'show');
        // $this->middleware('permission:edit-permission')->only('update');
        // $this->middleware('permission:delete-permission')->only('destroy');
    }

    public function index()
    {
        $permissiondata = $this->permissionService->index();
        return $permissiondata;
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
    public function store(PermissionRequest $request)
    {
        $validatedPermission = $request->validated();

        try {
            $permission = $this->permissionService->store($validatedPermission);

            return response()->json(new PermissionResource($permission), 201);
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
        try {
            $permission = $this->permissionService->show($id);

            return response()->json(new PermissionResource($permission), 200);
        } catch(ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Permission!'], 404);
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
    public function update(PermissionRequest $request, $id)
    {
        $validatedPermission = $request->validated();

        try {
            $permission = $this->permissionService->update($validatedPermission, $id);

            return response()->json(new PermissionResource($permission), 200);
        } catch(ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Permission!'], 404);
        }
        catch (\Exception $ex) {
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
            $deletePermission = $this->permissionService->destroy($id);

            return response()->json(['message' => 'Permission has been deleted successfully!'], 200);
        } catch(ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Permission!'], 404);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }
}
