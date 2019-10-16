<?php

namespace App\Services;

use Exception;
use App\Models\Role;

class RoleService
{
    public function index()
    {
        return Role::get();
    }

    public function store($validated)
    {
        try {
            $validated['name'] = str_slug($validated['display_name']);

            $role = Role::create($validated);
            $role->syncPermissions($validated['permissions']);

            return $role;
        } catch(Exception $exception) {
            throw $exception;
        }
    }

    public function show($roleId)
    {
        return Role::findOrFail($roleId);
    }

    public function update($validated, $id)
    {
        try {
            if (!empty($validated['display_name'])) {
                $validated['name'] = str_slug($validated['display_name']);
            }

            $role = Role::find($id);

            $role->update($validated);

            if (!empty($validated['permissions'])) {
                $role->syncPermissions($validated['permissions']);
            }

            return $role;
        } catch(Exception $exception) {
            throw $exception;
        }
    }

    public function destroy($roleId)
    {
        $role = Role::findOrFail($roleId);

        if ($role->delete()) {
            return $role;
        }

        throw new Exception('Unable to delete Role');
    }
}
