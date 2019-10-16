<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssetStepFiveRequest extends FormRequest
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
            'upcoming_auction.sale_notice_date'                  => 'date_format:d/m/Y|nullable',
            'upcoming_auction.publication_date'                  => 'nullable|date_format:d/m/Y',
            'upcoming_auction.e_auction_date'                    => 'nullable|date_format:d/m/Y',
            'upcoming_auction.bank_officer_contact_number'       => 'nullable|numeric|digits:10',
            'upcoming_auction.auction_type'                      => 'nullable|in:sarfaesi,drt,unknown',
            'upcoming_auction.inspection_datetime'               => 'nullable|date_format: "d/m/Y H:i"',
            'upcoming_auction.publication_notice_date'           => 'nullable|date_format:d/m/Y',
            'upcoming_auction.application_submission_deadline'   => 'nullable|date_format:d/m/Y',
            'upcoming_auction.auction_start_datetime'   => 'nullable|date_format: "d/m/Y H:i"',
            'upcoming_auction.auction_end_datetime'   => 'nullable|date_format: "d/m/Y H:i"',
            'upcoming_auction.reserve_price'         => 'nullable|numeric',
            'upcoming_auction.time_extention'         => 'nullable|numeric',
            'upcoming_auction.emd_amount'         => 'nullable|numeric',
            'upcoming_auction.tender_fee'        =>  'nullable|numeric',
            'past_auction.last_auction_successfull'          => 'in:yes,no|nullable',
            'past_auction.no_of_bidders_in_last_auction'     => 'numeric|nullable',
            'past_auction.no_of_auction_held'                => 'numeric|nullable',
        ];
    }

    public function messages()
    {
        return [
            'upcoming_auction.sale_notice_date.date_format' => 'Date format for sale notice is not correct',
            'upcoming_auction.publication_date.date_format' => 'Date format for sale notice is not correct',
            'upcoming_auction.e_auction_date.date_format' => 'Date format for E Auction Date is not correct',
            'upcoming_auction.bank_officer_contact_number.numeric' => 'Contact Number of bank officer should in numbers',
            'upcoming_auction.bank_officer_contact_number.digits' => 'Contact Number must be of 10 digits',
            'upcoming_auction.inspection_datetime.date_format' => 'Date format for inspection date is not correct',
            'upcoming_auction.publication_notice_date.date_format' => 'Date format for publication notice date is not correct',
            'upcoming_auction.application_submission_deadline.date_format' => 'Date format for application submission is not correct',
            'upcoming_auction.auction_start_datetime.date_format' => 'Date format for start auction date is not correct',
            'upcoming_auction.auction_end_datetime.date_format' => 'Date format for end auction date is not correct',
            'upcoming_auction.reserve_price.numeric' => 'Reserve price should be in numbers',
            'upcoming_auction.time_extention.numeric' => 'Time extension must be in numbers',
            'upcoming_auction.emd_amount.numeric' => 'Emd amount must be in numbers',
            'upcoming_auction.tender_fee.numeric' => 'Tender fee must be in numbers',
            'past_auction.no_of_bidders_in_last_auction.numeric' => 'No. of bidders must be in numbers',
            'past_auction.no_of_auction_held.numeric' => 'No. of auction held must be in numbers',

        ];
    }
}
