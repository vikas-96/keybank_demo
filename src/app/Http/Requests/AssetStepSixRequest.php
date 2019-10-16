<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssetStepSixRequest extends FormRequest
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
            // 'encumbrances.*.notice_date'    => 'nullable|date_format:Y-m-d',
            // 'encumbrances.*.amount'         => 'nullable|numeric',

            // 'suit_filed_date'               => 'nullable|date_format:Y-m-d',
            // 'hearing_next_date'             => 'nullable|date_format:Y-m-d',

            // 'possession_type'               => 'required|in:symbolic,physical',
            // 'possession_date'               => 'nullable|date_format:Y-m-d',
            // 'dm_application_date'           => 'nullable|date_format:Y-m-d',
            // 'dm_inspection_date'            => 'nullable|date_format:Y-m-d',
            // 'dm_order_date'                 => 'nullable|date_format:Y-m-d',
            // 'panchnama_assuance_date'       => 'nullable|date_format:Y-m-d',
            // 'possession_receipt_date'       => 'nullable|date_format:Y-m-d',

            // 'sum_assured'                   => 'nullable|numeric',
            // 'premium_amount'                => 'nullable|numeric',
            // 'insurance_start_date'          => 'nullable|date_format:Y-m-d',
            // 'insurance_end_date'            => 'nullable|date_format:Y-m-d',

            // 'cooperation_of_borrower'       => 'nullable|in:yes,no,dormant,no_information',
            // 'sarfaesi_complaint'            => 'nullable|in:yes,no',
        ];
    }
}
