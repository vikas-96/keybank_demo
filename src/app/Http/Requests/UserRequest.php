<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

        if ($this->method() == 'POST') {
            return [
                'firstname'         => 'required',
                'lastname'          => 'required',
                'contact_number'    => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
                'email'             => 'required|email|unique:users,email',
                'password'          => 'required|string',
                'role'              => 'required',
                'is_active'         => 'required|boolean'
            ];
        }

        if ($this->method() == 'PUT' || $this->method() == 'PATCH') {
            $id = $this->route()->parameter('user');
            $is_active_rule = (\Auth::user()->id == $id) ? 'sometimes' : 'sometimes|required|boolean';

            return [
                'firstname'         => 'required',
                'lastname'          => 'required',
                'contact_number'    => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
                'email'             => 'required|email|unique:users,email,' . $id . ',_id',
                'role'              => 'required',
                'is_active'         => $is_active_rule
            ];
        }
    }
}
