<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssetStepFourRequest extends FormRequest
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
            'third_party_info.latest_valuer_name_1'          => 'required',
            'third_party_info.latest_valuer_email_1'         => 'nullable|email',
            'third_party_info.valuer_contact_number_1'       => 'nullable',
            'third_party_info.latest_valuer_email_2'         => 'nullable|email',
            'third_party_info.valuer_contact_number_2'       => 'nullable',
            'third_party_info.resolution_agent_name'         => 'required',
            'third_party_info.resolution_agent_email'        => 'nullable|email',
            'third_party_info.resolution_agent_contact_number'   => 'nullable',
            'third_party_info.advocate_email'                => 'nullable|email',
            'third_party_info.advocate_contact_number'       => 'nullable'
        ];
    }
}
