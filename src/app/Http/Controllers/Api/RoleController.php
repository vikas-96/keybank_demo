<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\RoleService;
use App\Http\Requests\RoleRequest;
use App\Http\Resources\RoleResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
        // $this->middleware('permission:create-role')->only('store');
        // $this->middleware('permission:view-role')->only('index', 'show');
        // $this->middleware('permission:edit-role')->only('update');
        // $this->middleware('permission:delete-role')->only('destroy');
    }

    public function index(Request $request)
    {
        $role = $this->roleService->index($request);

        return RoleResource::collection($role);
    }

    public function store(RoleRequest $request)
    {
        $validatedRole = $request->validated();

        try {
            $role = $this->roleService->store($validatedRole);

            return response()->json(new RoleResource($role), 201);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $role = $this->roleService->show($id);

            return response()->json(new RoleResource($role), 200);
        } catch(ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Role!'], 404);
        }
    }

    public function update(RoleRequest $request, $id)
    {
        $validatedRole = $request->validated();

        try {
            $role = $this->roleService->update($validatedRole, $id);

            return response()->json(new RoleResource($role), 200);
        } catch(ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Role!'], 404);
        }
        catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $deleteRole = $this->roleService->destroy($id);

            return response()->json(['message' => 'Role has been deleted successfully!'], 200);
        } catch(ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Role!'], 404);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }
}
