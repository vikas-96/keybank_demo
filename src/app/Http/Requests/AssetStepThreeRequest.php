<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssetStepThreeRequest extends FormRequest
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
        $rules = [];
        // Valuation Details
        // if(in_array($this->templateid,[1,2,3,4])){
            $rules['valuation.latest_valuation_report_date_1'] = 'required|date_format: "d/m/Y"';
            $rules['valuation.latest_valuation_report_date_2'] = 'nullable|date_format: "d/m/Y"';
            $rules['valuation.fair_market_value_1'] = 'required|numeric';
            $rules['valuation.realizable_value_1'] = 'nullable|numeric';
            $rules['valuation.forced_sale_value_1'] = 'nullable|numeric';
            $rules['valuation.fair_market_value_2'] = 'sometimes|numeric|nullable';
            $rules['valuation.realizable_value_2'] = 'sometimes|numeric|nullable';
            $rules['valuation.forced_sale_value_2'] = 'sometimes|numeric|nullable';
        // }
        
        return $rules;
    }

    public function messages()
    {
        return [
        'valuation.latest_valuation_report_date_1.date_format' => 'Date format of valuation report 1 is incorrect',
        'valuation.latest_valuation_report_date_2.date_format' => 'Date format of valuation report 2 is incorrect',
        'valuation.fair_market_value_2.numeric' => 'Fair market value 2 must be a number',
        'valuation.realizable_value_2.numeric' => 'Realizable value 2 must be a number',
        'valuation.forced_sale_value_2.numeric' => 'Forced sale value 2 must be a number',
        'valuation.fair_market_value_1.numeric' => 'Fair market value 1 must be a number',
        'valuation.realizable_value_1.numeric' => 'Realizable value 1 must be a number',
        'valuation.forced_sale_value_1.numeric' => 'Forced sale value 1 must be a number',
    ];
    }
}
