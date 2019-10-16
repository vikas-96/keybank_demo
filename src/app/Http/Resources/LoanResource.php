<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if($request->has('q')){
            return [
                'id' => $this->id,
                'account_no' => $this->account_no,
                'first_sanction_date' => $this->first_sanction_date->toDateTime()->format('d/m/Y'),
                'banking_arrangement' => $this->banking_arrangement,
                'lead_bank' => $this->bankDetail->bank_name,
                'sbi_share' => $this->sbi_share,
                'npa_date' => $this->npa_date->toDateTime()->format('d/m/Y'),
                'borrower_name' => $this->borrowerDetail->name ?? null,
                'cif' => $this->borrowerDetail->cif ?? null
            ];
        }

        return [
            'id' => $this->id,
            'account_no' => $this->account_no,
            'first_sanction_date' => $this->first_sanction_date->toDateTime()->format('d/m/Y'),
            'banking_arrangement' => $this->banking_arrangement,
            'lead_bank' => $this->lead_bank,
            'sbi_share' => $this->sbi_share,
            'npa_date' => $this->npa_date->toDateTime()->format('d/m/Y'),
            'is_active' => $this->is_active,
            'bank_name' => $this->bankDetail->bank_name,
            'borrower_id' => $this->borrower_id,
            'borrower_name' => $this->borrowerDetail->name ?? null,
            'cif' => $this->borrowerDetail->cif ?? null
        ];
    }
}
