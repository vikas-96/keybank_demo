<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        if ($request->has('step')) {
            $step = $request->get('step');

            if ($step == "1") {
                $step1_array = [
                    'customer' => isset($this->customer) ? $this->customer : null,
                    'address' => isset($this->address) ? $this->address : null,
                    'loan' => isset($this->loan) ? $this->loan : null,
                    'template_id' => isset($this->template_id) ? $this->template_id : null,
                    'next_step' => isset($this->next_step) ? $this->next_step : null,
                    'property_id' => isset($this->property_id) ? $this->property_id : null,
                ];
                if (in_array($this->template_id, config('template.sections.stock_other'))) {

                    $step1_array['recorded_by']['user_id'] = $this->user;
                    $step1_array['entry_status'] = isset($this->entry_status) ? $this->entry_status : null;
                    $step1_array['stock_other'] = isset($this->stock_other) ? $this->stock_other : null;
                }

                if (isset($this->caseleadofficer)) {
                    $step1_array['customer']['clo_name'] = $this->caseleadofficer;
                }
                if (isset($this->caseofficer)) {
                    $step1_array['customer']['co_name'] = $this->caseofficer;
                }
                if (isset($this->banklist)) {
                    $step1_array['customer']['lender_name'] = $this->banklist;
                }
                if (isset($this->recoverybranch)) {
                    $step1_array['customer']['recovery_branch'] = $this->recoverybranch;
                }
                if (isset($this->migratingbranch)) {
                    $step1_array['customer']['migrating_branch'] = $this->migratingbranch;
                }
                if (isset($this->micromarket)) {
                    $step1_array['address']['micromarket'] = $this->micromarket;
                }
                if (isset($this->state)) {
                    $step1_array['address']['state'] = $this->state;
                }
                if (isset($this->city)) {
                    $step1_array['address']['city'] = $this->city;
                }

                return $step1_array;
            } else if ($step == "2") {
                $step2_array = [
                    'amenities' => isset($this->amenities) ? $this->amenities : null,
                    'building' => isset($this->building) ? $this->building : null,
                    'charges' => isset($this->charges) ? $this->charges : null,
                    'size' => isset($this->size) ? $this->size : null,
                    'configuration' => isset($this->configuration) ? $this->configuration : null,
                    'unit' => isset($this->unit) ? $this->unit : null,
                    'office_summary' => isset($this->office_summary) ? $this->office_summary : null,
                    'office_detail' => isset($this->office_detail) ? $this->office_detail : null,
                    'plot' => isset($this->plot) ? $this->plot : null,
                    'mall_info' => isset($this->mall_info) ? $this->mall_info : null,
                    'occupancy' => isset($this->occupancy) ? $this->occupancy : null,
                    'pricing' => isset($this->pricing) ? $this->pricing : null,
                    'neighbourhood' => isset($this->neighbourhood) ? $this->neighbourhood : null,
                    'oc' => isset($this->oc) ? $this->oc : null,
                    'other' => isset($this->other) ? $this->other : null,
                    'template_id' => isset($this->template_id) ? $this->template_id : null,
                    'status' => isset($this->status) ? $this->status : null,
                    'next_step' => isset($this->next_step) ? $this->next_step : null,
                    'property_id' => isset($this->property_id) ? $this->property_id : null,
                ];
                if ($this->template_id == 'T13') {
                    $step2_array['vehicle'] = isset($this->vehicle) ? $this->vehicle : null;
                }

                return $step2_array;
            } else if ($step == "3") {
                $step3_array = [
                    'valuation' => isset($this->valuation) ? $this->valuation : null,
                    'template_id' => isset($this->template_id) ? $this->template_id : null,
                    'status' => isset($this->status) ? $this->status : null,
                    'next_step' => isset($this->next_step) ? $this->next_step : null,
                    'property_id' => isset($this->property_id) ? $this->property_id : null,
                ];
                return  $step3_array;
            } else if ($step == "4") {

                $step4_array = array(
                    'template_id' => isset($this->template_id) ? $this->template_id : null,
                    'status' => isset($this->status) ? $this->status : null,
                    'next_step' => isset($this->next_step) ? $this->next_step : null,
                    'property_id' => isset($this->property_id) ? $this->property_id : null,
                );
                if (isset($this->valuer1)) {
                    $step4_array['third_party_info']['valuer1'] = $this->valuer1;
                }
                if (isset($this->valuer2)) {
                    $step4_array['third_party_info']['valuer2'] = $this->valuer2;
                }
                if (isset($this->resolution_agent)) {
                    $step4_array['third_party_info']['resolution_agent'] = $this->resolution_agent;
                }
                if (isset($this->advocate)) {
                    $step4_array['third_party_info']['advocate'] = $this->advocate;
                }
                return $step4_array;
            } else if ($step == "5") {
                $step5_array = [
                    'upcoming_auction' => isset($this->upcoming_auction) ? $this->upcoming_auction : null,
                    'past_auction' => isset($this->past_auction) ? $this->past_auction : null,
                    'template_id' => isset($this->template_id) ? $this->template_id : null,
                    'status' => isset($this->status) ? $this->status : null,
                    'next_step' => isset($this->next_step) ? $this->next_step : null,
                    'property_id' => isset($this->property_id) ? $this->property_id : null,
                ];

                return $step5_array;
            } else if ($step == "7") {
                $step7_array = [
                    'kapdata' => isset($this->kapdata) ? $this->kapdata : null,
                    'template_id' => isset($this->template_id) ? $this->template_id : null,
                    'status' => isset($this->status) ? $this->status : null,
                    'next_step' => isset($this->next_step) ? $this->next_step : null,
                    'property_id' => isset($this->property_id) ? $this->property_id : null,
                ];

                return $step7_array;
            } else if ($step == "6") {
                $step6_array = [
                    'encumbrances' => isset($this->encumbrances) ? $this->encumbrances : null,
                    'other_dues' => $this->other_dues,
                    'legal_issue_by_borrower' => isset($this->legal_issue_by_borrower) ? $this->legal_issue_by_borrower : null,
                    'sarfaesi_related' => $this->sarfaesi_related,
                    'insurance_data_policy' => $this->insurance_data_policy,
                    'inspection_data_logs' => $this->inspection_data_logs,
                    'other_information' => $this->other_information,
                    'recorded_by' => $this->recorded_by,
                    'entry_status' => $this->entry_status,
                    'template_id' => isset($this->template_id) ? $this->template_id : null,
                    'status' => isset($this->status) ? $this->status : null,
                    'next_step' => isset($this->next_step) ? $this->next_step : null,
                    'property_id' => isset($this->property_id) ? $this->property_id : null,
                ];
                if (isset($this->user)) {
                    $step6_array['recorded_by']['user_id'] = $this->user;
                }
                return $step6_array;
            }
        }
        return parent::toArray($request);
    }
}
