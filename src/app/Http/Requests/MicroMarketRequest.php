<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MicroMarketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
                'name'              => 'required'
            ];
        }

        if ($this->method() == 'PUT' || $this->method() == 'PATCH') {
            $id = $this->route()->parameter('micromarket');
            return [
                'name'              => 'required'
            ];
        }
    }
}
