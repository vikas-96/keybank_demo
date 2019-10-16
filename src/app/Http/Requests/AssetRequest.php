<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssetRequest extends FormRequest
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
            return $this->stepOneValidation();
        }

        if ($this->method() == 'PUT' || $this->method() == 'PATCH') {
            $id = $this->route()->parameter('asset');
            return $this->stepOneValidation();
        }
    }

    public function stepOneValidation()
    {
        $rules = [];

        $rules['customer.property_category']         = 'required|in:movable,immovable';
        $rules['customer.property_type']             = 'required';
        //$rules['vehicle_description']       = 'required_if:customer.property_type,vehicle';
        //$rules['other_description']         = 'required_if:customer.property_type,others';
        //$rules['customer.description'] => 'required_if:property_type,vehicles,stock,others'
        $rules['customer.property_sub_type']         = 'required_unless:customer.property_type,vehicles,stock,others';

        // $rules['customer.cersai_number']               = 'required';

        $rules['customer.lender_name']               = 'required';
        $rules['customer.is_nclt']                   = 'required|in:yes,no,unknown';
        $rules['customer.migrating_branch']          = 'required';
        $rules['customer.recovery_branch']           = 'required';
        $rules['customer.recall_date']               = 'required|date_format:d/m/Y';
        $rules['customer.clo_name']                  = 'required';
        $rules['customer.co_name']                   = 'required';

        //$rules['account_no']                = 'required';
        //$rules['loan']                = 'required';

        if (in_array($this->template_id, config('template.sections.address'))) {
            $rules['address.district']              = 'required';
            $rules['address.state']                 = 'required';
            $rules['address.pincode']               = 'required | max:6';
            $rules['address.property_address']      = 'required';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'customer.migrating_branch.required' => 'Migrating Branch field is required',
            'customer.lender_name.required' => 'Lender Name is required',
            'customer.is_nclt.required' => 'Please select an option for NCLT field',
            'customer.recovery_branch.required' => 'Recovery Branch is required',
            'customer.recall_date.required' => 'Recall Date is required',
            'customer.clo_name.required' => 'Case lead officer field is required',
            'customer.co_name.required' => 'Case office field is required',
            'address.district.required' => 'District is required',
            'address.state.required' => 'State is required',
            'address.pincode.required' => 'Pincode is required',
            'address.pincode.max' => 'Pincode should not be greater than 6',
            'address.property_address.required' => 'Property Address is required',
            'customer.recall_date.date_format' => 'Recall Date format is not proper',
            'required_if' => 'The :attribute field is required',
            'required_unless' => 'The :attribute field is required',
        ];
    }
}
