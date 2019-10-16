<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route()->parameter('role');

        if ($this->method() == 'POST') {
            return [
                'display_name'  => 'required|unique:roles,display_name',
                'permissions'   => 'required|array',
                // 'permissions.*' => 'integer',
                // 'permissions.*' => 'exists:permissions,id'
            ];
        }

        if ($this->method() == 'PUT' || $this->method() == 'PATCH') {
            return [
                'display_name'  => 'required|unique:roles,display_name,' . $id,
                'permissions'   => 'required|array',
                'permissions.*' => 'integer',
                'permissions.*' => 'exists:permissions,id'
            ];
        }
    }
}
