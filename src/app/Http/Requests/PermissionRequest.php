<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
        $id = $this->route()->parameter('permission');

        if ($this->method() == 'POST') {
            return [
                'display_name' => 'required|unique:permissions,display_name',
            ];
        }

        if ($this->method() == 'PUT' || $this->method() == 'PATCH') {
            return [
                'display_name' => 'required|unique:permissions,display_name,' . $id,
            ];
        }
    }
}
