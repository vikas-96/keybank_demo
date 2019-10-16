<?php

namespace App\Services;

use Exception;
use App\Models\Permission;

class PermissionService
{
    public function index()
    {
        return Permission::get();
    }

    public function store($permissionData)
    {
        try {
            $permissionData['name'] = str_slug($permissionData['display_name']);

            $permission = Permission::create($permissionData);

            return $permission;
        } catch(Exception $exception) {
            throw $exception;
        }
    }

    public function show($permissionId)
    {
        return Permission::findOrFail($permissionId);
    }

    public function update($permissionData, $permissionId)
    {
        try {
            $permissionData['name'] = str_slug($permissionData['display_name']);

            $permission = Permission::findOrFail($permissionId);
            $permission->update($permissionData);

            return $permission;
        } catch(Exception $exception) {
            throw $exception;
        }
    }

    public function destroy($permissionId)
    {
        $permission = Permission::findOrFail($permissionId);

        if ($permission->delete()) {
            return $permission;
        }

        throw new Exception('Unable to delete Permission');
    }
}
