<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
        return [
            'state' => 'required_without_all:city,pincode,recovery_branch',
            'city' => 'required_without_all:state,pincode,recovery_branch',
            'pincode' => 'required_without_all:state,city,recovery_branch',
            'recovery_branch' => 'required_without_all:state,city,pincode',
        ];
    }
}
