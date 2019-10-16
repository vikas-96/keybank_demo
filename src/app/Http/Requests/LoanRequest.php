<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
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
        if($this->method() == 'POST')
        {
            return [
                'borrower_id'           => 'required',
                'account_no'            => 'required|numeric|unique:loans,account_no',
                'first_sanction_date'   => 'required|date_format:d/m/Y',
                'banking_arrangement'   => 'required|in:consortium,multiple,sole',
                'lead_bank'             => 'required',
                'sbi_share'             => 'required',
                'npa_date'              => 'required|date_format:d/m/Y',
                'is_active'             => 'required|boolean'
            ];
        }

        if($this->method() == 'PUT' || $this->method() == 'PATCH')
        {
            $id = $this->route()->parameter('loan');
            return [
                'borrower_id'           => 'required',
                'account_no'            => 'required|numeric|unique:loans,account_no,'.$id.',_id',
                'first_sanction_date'   => 'required|date_format:d/m/Y',
                'banking_arrangement'   => 'required|in:consortium,multiple,sole',
                'lead_bank'             => 'required',
                'sbi_share'             => 'required',
                'npa_date'              => 'required|date_format:d/m/Y',
                'is_active'             => 'required|boolean'
            ];
        }
    }
}
