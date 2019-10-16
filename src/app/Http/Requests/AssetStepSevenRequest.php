<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssetStepSevenRequest extends FormRequest
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
            'kapdata.marketability'  => 'nullable|in:red,orange,green,unknown',
            'kapdata.kap_price' => 'nullable|numeric',
            'kapdata.kap_price_upper' => 'nullable|numeric',
            'kapdata.packaging_suggestions' => 'nullable',
            'kapdata.other_insights' => 'nullable'
        ];
    }

    public function messages()
    {
        return[
            'kapdata.kap_price.numeric' => 'Kap price should be in numbers',
            'kapdata.kap_price_upper' => 'Kap price upper should be in numbers',



        ];
    }
}
