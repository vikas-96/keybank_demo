<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResolutionagentRequest extends FormRequest
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
                'name'          => 'required',
                'contact'       => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
                'email'         => 'required|email|unique:resolutionagents,email',
                'is_active'     => 'required|boolean'
            ];
        }

        if ($this->method() == 'PUT' || $this->method() == 'PATCH') {
            $id = $this->route()->parameter('resolutionagent');
            return [
                'name'          => 'required',
                'contact'       => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
                'email'         => 'required|email|unique:resolutionagents,email,' . $id . ',_id',
                'is_active'     => 'required|boolean'
            ];
        }
    }
}
