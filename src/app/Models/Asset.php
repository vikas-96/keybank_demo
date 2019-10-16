<?php

namespace App\Models;

use Moloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Asset extends Moloquent
{
    use SoftDeletes;

    protected $guarded = [];

    /**
     * [Valuer1 description]
     */
    public function valuer1()
    {
        return $this->hasOne('App\Models\Valuer', '_id', 'third_party_info.latest_valuer_name_1')->select('name', 'contact', 'email')->where('is_active', true);
    }
    /**
     * [Valuer2 description]
     */
    public function valuer2()
    {
        return $this->hasOne('App\Models\Valuer', '_id', 'third_party_info.latest_valuer_name_2')->select('name', 'contact', 'email')->where('is_active', true);
    }
    /**
     * [resolution_agent description]
     * @return [type] [description]
     */
    public function resolution_agent()
    {
        return $this->hasOne('App\Models\Resolutionagent', '_id', 'third_party_info.resolution_agent_name')->select('name', 'contact', 'email')->where('is_active', true);
    }
    /**
     * [advocate description]
     * @return [type] [description]
     */
    public function advocate()
    {
        return $this->hasOne('App\Models\Advocate', '_id', 'third_party_info.advocate_name')->select('name', 'contact', 'email')->where('is_active', true);
    }
    /**
     * [caseleadofficer description]
     * @return [type] [description]
     */
    public function caseleadofficer()
    {
        return $this->hasOne('App\Models\Caseleadofficer', '_id', 'customer.clo_name')->select('name', 'contact', 'email')->where('is_active', true);
    }
    /**
     * [caseofficer description]
     * @return [type] [description]
     */
    public function caseofficer()
    {
        return $this->hasOne('App\Models\Caseofficer', '_id', 'customer.co_name')->select('name', 'contact', 'email')->where('is_active', true);
    }
    /**
     * [banklist description]
     * @return [type] [description]
     */
    public function banklist()
    {
        return $this->hasOne('App\Models\Banklist', '_id', 'customer.lender_name')->select('bank_name');
    }
    /**
     * [recoverybranch description]
     * @return [type] [description]
     */
    public function recoverybranch()
    {
        return $this->hasOne('App\Models\Recoverybranch', '_id', 'customer.recovery_branch')->select('branch_name');
    }
    /**
     * [migratingbranch description]
     * @return [type] [description]
     */
    public function migratingbranch()
    {
        return $this->hasOne('App\Models\MigratingBranch', '_id', 'customer.migrating_branch')->select('name');
    }
    /**
     * [micromarket description]
     * @return [type] [description]
     */
    public function micromarket()
    {
        return $this->hasOne('App\Models\MicroMarket', '_id', 'address.micromarket')->select('name');
    }
    /**
     * [state description]
     * @return [type] [description]
     */
    public function state()
    {
        return $this->hasOne('App\Models\LocationMaster', '_id', 'address.state')->select('state');
    }
    /**
     * [city description]
     * @return [type] [description]
     */
    public function city()
    {
        return $this->hasOne('App\Models\LocationMaster', '_id', 'address.city')->where('type', 'city');
    }
    /**
     * [user description]
     * @return [type] [description]
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', '_id', 'recorded_by.user_id');
    }
    /**
     * [document description]
     * @return [type] [description]
     */
    public function document()
    {
        return $this->hasMany('App\Models\DocumentMaster', 'asset_id', '_id');
    }
    /**
     * [feature_image description]
     * @return [type] [description]
     */
    public function feature_image()
    {
        return $this->hasOne('App\Models\DocumentMaster', 'asset_id', '_id')->where('type', 'feature_image')->select('document', 'url', 'asset_id');
    }
    /**
     * [convertToTimestamp description]
     * @param  [type] $date [description]
     * @return [type]       [description]
     */
    public function convertToTimestamp($date)
    {
        return \DateTime::createFromFormat('d/m/Y', $date)->getTimestamp();
    }
    /**
     * [convertToDateHoursTimestamp description]
     * @param  [type] $date [description]
     * @return [type]       [description]
     */
    public function convertToDateHoursTimestamp($date)
    {
        return \DateTime::createFromFormat('d/m/Y H:i', $date)->getTimestamp();
    }
    /**
     * [setCustomerAttribute description]
     * @param [type] $value [description]
     */
    public function setCustomerAttribute($value)
    {
        $customer = $value;
        $customer['recall_date'] = new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($value['recall_date']) * 1000);
        if (isset($value['referral_date']))
            $customer['referral_date'] = new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($value['recall_date']) * 1000);
        $this->attributes['customer'] = $customer;
    }
    /**
     * [getCustomerAttribute description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function getCustomerAttribute($value)
    {
        if (isset($value['recall_date']))
            $value['recall_date'] = $value['recall_date']->toDateTime()->format('d/m/Y');
        if (isset($value['referral_date']))
            $value['referral_date']  = $value['referral_date']->toDateTime()->format('d/m/Y');
        return $value;
    }
    /**
     * [setAddressAttribute description]
     * @param [type] $value [description]
     */
    public function setAddressAttribute($value)
    {
        $address = $value;
        if (isset($value['pincode'])) {
            $address['pincode'] = (int) $value['pincode'];
        }
        $this->attributes['address'] = $address;
    }
    /**
     * [setSizeAttribute description]
     * @param [type] $value [description]
     */
    public function setSizeAttribute($value)
    {
        $size = $value;
        if (isset($value['area']))
            $size['area'] = (float) $value['area'];
        if (isset($value['loft_area']))
            $size['loft_area'] = (float) $value['loft_area'];
        if (isset($value['terrace_area']))
            $size['terrace_area'] = (float) $value['terrace_area'];
        if (isset($value['basement_construction_area']))
            $size['basement_construction_area'] = (float) $value['basement_construction_area'];
        if (isset($value['avgarea']))
            $size['avgarea'] = (float) $value['avgarea'];
        $this->attributes['size'] = $size;
    }
    /**
     * [setConfigurationAttribute description]
     * @param [type] $value [description]
     */
    public function setConfigurationAttribute($value)
    {
        $configuration = $value;
        if (isset($value['no_of_servant_rooms']))
            $configuration['no_of_servant_rooms'] = (int) $value['no_of_servant_rooms'];
        if (isset($value['no_of_servant_toilets']))
            $configuration['no_of_servant_toilets'] = (int) $value['no_of_servant_toilets'];
        if (isset($value['no_of_toilets']))
            $configuration['no_of_toilets'] = (int) $value['no_of_toilets'];
        if (isset($value['no_of_terraces']))
            $configuration['no_of_terraces'] = (int) $value['no_of_terraces'];
        if (isset($value['no_of_floor_in_unit']))
            $configuration['no_of_floor_in_unit'] = (int) $value['no_of_floor_in_unit'];

        $this->attributes['configuration'] = $value;
    }
    /**
     * [setBuildingAttribute description]
     * @param [type] $value [description]
     */
    public function setBuildingAttribute($value)
    {
        $building = $value;
        if (isset($value['no_of_floors_in_building']))
            $building['no_of_floors_in_building'] = $value['no_of_floors_in_building'];
        if (isset($value['building_completion_year']))
            $building['building_completion_year'] = (int) $value['building_completion_year'];
        if (isset($value['residual_life_of_building']))
            $building['residual_life_of_building'] = (int) $value['residual_life_of_building'];

        $this->attributes['building'] = $building;
    }
    /**
     * [setAmenitiesAttribute description]
     * @param [type] $value [description]
     */
    public function setAmenitiesAttribute($value)
    {
        $amenities = $value;
        if (isset($value['no_of_covered_parkings']))
            $amenities['no_of_covered_parkings'] = (int) $value['no_of_covered_parkings'];
        if (isset($value['no_of_open_parkings']))
            $amenities['no_of_open_parkings'] = (int) $value['no_of_open_parkings'];
        if (isset($value['total_no_of_parkings']))
            $amenities['total_no_of_parkings'] = (int) $value['total_no_of_parkings'];

        $this->attributes['amenities'] = $amenities;
    }
    /**
     * [setOccupancyAttribute description]
     * @param [type] $value [description]
     */
    public function setOccupancyAttribute($value)
    {
        $occupancy = $value;
        if (isset($value['no_of_unit_sold']))
            $occupancy['no_of_unit_sold'] = (int) $value['no_of_unit_sold'];
        if (isset($value['no_of_tenants']))
            $occupancy['no_of_tenants'] = (int) $value['no_of_tenants'];

        $this->attributes['occupancy'] = $occupancy;
    }
    /**
     * [setPricingAttribute description]
     * @param [type] $value [description]
     */
    public function setPricingAttribute($value)
    {
        $pricing = $value;
        if (isset($value['rental_amount']))
            $pricing['rental_amount'] = (float) $value['rental_amount'];
        if (isset($value['based_on_reckoner_rate']))
            $pricing['based_on_reckoner_rate'] = (float) $value['based_on_reckoner_rate'];

        $this->attributes['pricing'] = $pricing;
    }
    /**
     * [setNeighbourhoodAttribute description]
     * @param [type] $value [description]
     */
    public function setNeighbourhoodAttribute($value)
    {
        $neighbourhood = $value;
        // if(isset($value['no_of_hospitals']))
        //     $neighbourhood['no_of_hospitals'] = (int)$value['no_of_hospitals'];
        // if(isset($value['no_of_atms']))
        //     $neighbourhood['no_of_atms'] = (int)$value['no_of_atms'];
        // if(isset($value['no_of_restaurants']))
        //     $neighbourhood['no_of_restaurants'] = (int)$value['no_of_restaurants'];
        // if(isset($value['distance_from_closest_airport']))
        //     $neighbourhood['distance_from_closest_airport'] = (int)$value['distance_from_closest_airport'];
        // if(isset($value['no_of_petrol_pumps']))
        //     $neighbourhood['no_of_petrol_pumps'] = (int)$value['no_of_petrol_pumps'];
        if (isset($value['facing_road_width']))
            $neighbourhood['facing_road_width'] = (int) $value['facing_road_width'];
        if (isset($value['side_road_width']))
            $neighbourhood['side_road_width'] = (int) $value['side_road_width'];
        // if(isset($value['adjoining_properties_north']))
        //     $neighbourhood['adjoining_properties_north'] = (int)$value['adjoining_properties_north'];
        // if(isset($value['adjoining_properties_south']))
        //     $neighbourhood['adjoining_properties_south'] = (int)$value['adjoining_properties_south'];
        // if(isset($value['adjoining_properties_east']))
        //     $neighbourhood['adjoining_properties_east'] = (int)$value['adjoining_properties_east'];
        // if(isset($value['adjoining_properties_west']))
        //     $neighbourhood['adjoining_properties_west'] = (int)$value['adjoining_properties_west'];

        $this->attributes['neighbourhood'] = $neighbourhood;
    }
    /**
     * [setOcAttribute description]
     * @param [type] $value [description]
     */
    public function setOcAttribute($value)
    {
        $oc = $value;
        if (isset($value['oc_date']))
            $oc['oc_date'] = new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($value['oc_date']) * 1000);
        if (isset($value['tenant'])) {
            foreach ($value['tenant'] as $key => $val) {
                if (isset($val['tenant_since']))
                    $oc['tenant'][$key]['tenant_since'] = (int) $val['tenant_since'];
                if (isset($val['tenant_rent_per_month']))
                    $oc['tenant'][$key]['tenant_rent_per_month'] = (int) $val['tenant_rent_per_month'];
            }
        }
        $this->attributes['oc'] = $oc;
    }
    /**
     * [getOcAttribute description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function getOcAttribute($value)
    {
        if (isset($value['oc_date']))
            $value['oc_date'] = $value['oc_date']->toDateTime()->format('d/m/Y');
        return $value;
    }
    /**
     * [setValuationAttribute description]
     * @param [type] $value [description]
     */
    public function setValuationAttribute($value)
    {
        $valuation = $value;
        if (isset($value['latest_valuation_report_date_1']))
            $valuation['latest_valuation_report_date_1'] = new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($value['latest_valuation_report_date_1']) * 1000);
        if (isset($value['latest_valuation_report_date_2']))
            $valuation['latest_valuation_report_date_2'] = new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($value['latest_valuation_report_date_2']) * 1000);
        if (isset($value['fair_market_value_1']))
            $valuation['fair_market_value_1'] = (float) $value['fair_market_value_1'];
        if (isset($value['fair_market_value_2']))
            $valuation['fair_market_value_2'] = (float) $value['fair_market_value_2'];
        if (isset($value['realizable_value_sanction_date']))
            $valuation['realizable_value_sanction_date'] = (float) $value['realizable_value_sanction_date'];
        if (isset($value['realizable_value_recall_date']))
            $valuation['realizable_value_recall_date'] = (float) $value['realizable_value_recall_date'];
        if (isset($value['realizable_value_1']))
            $valuation['realizable_value_1'] = (float) $value['realizable_value_1'];
        if (isset($value['realizable_value_1']))
            $valuation['realizable_value_1'] = (float) $value['realizable_value_1'];
        if (isset($value['forced_sale_value_1']))
            $valuation['forced_sale_value_1'] = (float) $value['forced_sale_value_1'];
        if (isset($value['forced_sale_value_2']))
            $valuation['forced_sale_value_2'] = (float) $value['forced_sale_value_2'];
        if (isset($value['rental_rate_area']))
            $valuation['rental_rate_area'] = (float) $value['rental_rate_area'];
        if (isset($value['insurance_value']))
            $valuation['insurance_value'] = (float) $value['insurance_value'];

        $this->attributes['valuation'] = $valuation;
    }
    /**
     * [getValuationAttribute description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function getValuationAttribute($value)
    {
        if (isset($value['latest_valuation_report_date_1']))
            $value['latest_valuation_report_date_1'] = $value['latest_valuation_report_date_1']->toDateTime()->format('d/m/Y');
        if (isset($value['latest_valuation_report_date_2']))
            $value['latest_valuation_report_date_2'] = $value['latest_valuation_report_date_2']->toDateTime()->format('d/m/Y');
        return $value;
    }
    /**
     * [setUpcomingAuctionAttribute description]
     * @param [type] $value [description]
     */
    public function setUpcomingAuctionAttribute($value)
    {
        $upcoming_auction = $value;
        if (isset($value['sale_notice_date']))
            $upcoming_auction['sale_notice_date'] = new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($value['sale_notice_date']) * 1000);
        if (isset($value['publication_date']))
            $upcoming_auction['publication_date'] = new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($value['publication_date']) * 1000);
        if (isset($value['e_auction_date']))
            $upcoming_auction['e_auction_date'] = new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($value['e_auction_date']) * 1000);
        if (isset($value['inspection_datetime']))
            $upcoming_auction['inspection_datetime'] = new \MongoDB\BSON\UTCDateTime($this->convertToDateHoursTimestamp($value['inspection_datetime']) * 1000);
        if (isset($value['publication_notice_date']))
            $upcoming_auction['publication_notice_date'] = new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($value['publication_notice_date']) * 1000);
        if (isset($value['application_submission_deadline']))
            $upcoming_auction['application_submission_deadline'] = new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($value['application_submission_deadline']) * 1000);
        if (isset($value['auction_start_datetime']))
            $upcoming_auction['auction_start_datetime'] = new \MongoDB\BSON\UTCDateTime($this->convertToDateHoursTimestamp($value['auction_start_datetime']) * 1000);
        if (isset($value['auction_end_datetime']))
            $upcoming_auction['auction_end_datetime'] = new \MongoDB\BSON\UTCDateTime($this->convertToDateHoursTimestamp($value['auction_end_datetime']) * 1000);
        if (isset($value['reserve_price']))
            $upcoming_auction['reserve_price'] = (float) $value['reserve_price'];
        if (isset($value['time_extention']))
            $upcoming_auction['time_extention'] = (int) $value['time_extention'];
        if (isset($value['emd_amount']))
            $upcoming_auction['emd_amount'] = (float) $value['emd_amount'];
        if (isset($value['emd_account_details']))
            $upcoming_auction['emd_account_details'] = (int) $value['emd_account_details'];
        if (isset($value['tender_fee']))
            $upcoming_auction['tender_fee'] = (float) $value['tender_fee'];

        $this->attributes['upcoming_auction'] = $upcoming_auction;
    }
    /**
     * [getUpcomingAuctionAttribute description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function getUpcomingAuctionAttribute($value)
    {
        if (isset($value['sale_notice_date']))
            $value['sale_notice_date'] = $value['sale_notice_date']->toDateTime()->format('d/m/Y');
        if (isset($value['publication_date']))
            $value['publication_date'] = $value['publication_date']->toDateTime()->format('d/m/Y');
        if (isset($value['e_auction_date']))
            $value['e_auction_date'] = $value['e_auction_date']->toDateTime()->format('d/m/Y');
        if (isset($value['inspection_datetime']))
            $value['inspection_datetime'] = $value['inspection_datetime']->toDateTime()->format('d/m/Y H:i');
        if (isset($value['publication_notice_date']))
            $value['publication_notice_date'] = $value['publication_notice_date']->toDateTime()->format('d/m/Y');
        if (isset($value['application_submission_deadline']))
            $value['application_submission_deadline'] = $value['application_submission_deadline']->toDateTime()->format('d/m/Y');
        if (isset($value['auction_start_datetime']))
            $value['auction_start_datetime'] = $value['auction_start_datetime']->toDateTime()->format('d/m/Y H:i');
        if (isset($value['auction_end_datetime']))
            $value['auction_end_datetime'] = $value['auction_end_datetime']->toDateTime()->format('d/m/Y H:i');

        return $value;
    }
    /**
     * [setPastAuctionAttribute description]
     * @param [type] $value [description]
     */
    public function setPastAuctionAttribute($value)
    {
        $past_auction = $value;
        if (isset($value['no_of_bidders_in_last_auction']))
            $past_auction['no_of_bidders_in_last_auction'] = (int) $value['no_of_bidders_in_last_auction'];
        if (isset($value['successful_bid_amount']))
            $past_auction['successful_bid_amount'] = (float) $value['successful_bid_amount'];
        if (isset($value['final_recovery_amount']))
            $past_auction['final_recovery_amount'] = (float) $value['final_recovery_amount'];
        if (isset($value['auction_gst']))
            $past_auction['auction_gst'] = (float) $value['auction_gst'];
        if (isset($value['auction_tds']))
            $past_auction['auction_tds'] = (float) $value['auction_tds'];
        if (isset($value['no_of_auction_held']))
            $past_auction['no_of_auction_held'] = (int) $value['no_of_auction_held'];
        if (isset($value['auction'])) {
            foreach ($value['auction'] as $key => $val) {

                if (isset($val['past_auction_date'])) {
                    $past_auction['auction'][$key]['past_auction_date'] = new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($val['past_auction_date']) * 1000);
                }
                if (isset($val['reserve_price']))
                    $past_auction['auction'][$key]['reserve_price'] = (float) $val['reserve_price'];
                if (isset($val['no_of_emd_received']))
                    $past_auction['auction'][$key]['no_of_emd_received'] = (int) $val['no_of_emd_received'];
            }
        }
        $this->attributes['past_auction'] = $past_auction;
    }
    /**
     * [getPastAuctionAttribute description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function getPastAuctionAttribute($value)
    {
        if (isset($value['auction'])) {
            foreach ($value['auction'] as $key => &$val) {
                if (isset($val['past_auction_date'])) {
                    $val['past_auction_date'] = $val['past_auction_date']->toDateTime()->format('d/m/Y');
                }
            }
        }
        return $value;
    }
    /**
     * [setEncumbrancesAttribute description]
     * @param [type] $value [description]
     */
    public function setEncumbrancesAttribute($value)
    {
        $encumbrances = $value;
        if (!empty($value)) {
            foreach ($value as $key => $val) {

                if (isset($val['notice_date'])) {
                    $encumbrances[$key]['notice_date'] = new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($val['notice_date']) * 1000);
                }
                if (isset($val['amount']))
                    $encumbrances[$key]['amount'] = (float) $val['amount'];
            }
        }
        $this->attributes['encumbrances'] = $encumbrances;
    }
    /**
     * [getEncumbrancesAttribute description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function getEncumbrancesAttribute($value)
    {
        if (!empty($value)) {
            foreach ($value as $key => &$val) {
                if (isset($val['notice_date'])) {
                    $val['notice_date'] = $val['notice_date']->toDateTime()->format('d/m/Y');
                }
            }
        }
        return $value;
    }
    /**
     * [setOtherDuesAttribute description]
     * @param [type] $value [description]
     */
    public function setOtherDuesAttribute($value)
    {
        $other_dues = $value;
        if (isset($value['society_dues']))
            $other_dues['society_dues'] = (float) $value['society_dues'];
        if (isset($value['electricity_dues']))
            $other_dues['electricity_dues'] = (float) $value['electricity_dues'];
        if (isset($value['water_dues']))
            $other_dues['water_dues'] = (float) $value['water_dues'];
        if (isset($value['property_tax_dues']))
            $other_dues['property_tax_dues'] = (float) $value['property_tax_dues'];
        if (isset($value['other_dues_amount']))
            $other_dues['other_dues_amount'] = (float) $value['other_dues_amount'];
        $this->attributes['other_dues'] = $other_dues;
    }
    /**
     * [setLegalIssueByBorrower description]
     * @param [type] $value [description]
     */
    public function setLegalIssueByBorrowerAttribute($value)
    {
        $legal_issue_by_borrower = $value;
        if (!empty($value)) {
            foreach ($value as $key => $val) {
                if (isset($val['suit_filed_date'])) {
                    $legal_issue_by_borrower[$key]['suit_filed_date'] = new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($val['suit_filed_date']) * 1000);
                }
                if (isset($val['hearing_next_date'])) {
                    $legal_issue_by_borrower[$key]['hearing_next_date'] = new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($val['hearing_next_date']) * 1000);
                }
            }
        }
        $this->attributes['legal_issue_by_borrower'] = $legal_issue_by_borrower;
    }
    /**
     * [getLegalIssueByBorrower description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function getLegalIssueByBorrowerAttribute($value)
    {
        if (!empty($value)) {
            foreach ($value as $key => &$val) {
                if (isset($val['suit_filed_date'])) {
                    $val['suit_filed_date'] = $val['suit_filed_date']->toDateTime()->format('d/m/Y');
                }
                if (isset($val['hearing_next_date'])) {
                    $val['hearing_next_date'] = $val['hearing_next_date']->toDateTime()->format('d/m/Y');
                }
            }
        }
        return $value;
    }
    /**
     * [setSarfaesiRelatedAttribute description]
     * @param [type] $value [description]
     */
    public function setSarfaesiRelatedAttribute($value)
    {
        $sarfaesi_related = $value;
        if (isset($value['possession_date']))
            $sarfaesi_related['possession_date'] = new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($value['possession_date']) * 1000);
        if (isset($value['issuance_date_13_2']))
            $sarfaesi_related['issuance_date_13_2'] = new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($value['issuance_date_13_2']) * 1000);
        if (isset($value['issuance_date_13_4']))
            $sarfaesi_related['issuance_date_13_4'] = new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($value['issuance_date_13_4']) * 1000);
        if (isset($value['dm_application_date']))
            $sarfaesi_related['dm_application_date'] = new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($value['dm_application_date']) * 1000);
        if (isset($value['dm_inspection_date']))
            $sarfaesi_related['dm_inspection_date'] = new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($value['dm_inspection_date']) * 1000);
        if (isset($value['dm_order_date']))
            $sarfaesi_related['dm_order_date'] = new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($value['dm_order_date']) * 1000);
        if (isset($value['fixation_possession_date']))
            $sarfaesi_related['fixation_possession_date'] = new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($value['fixation_possession_date']) * 1000);
        if (isset($value['panchnama_assuance_date']))
            $sarfaesi_related['panchnama_assuance_date'] = new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($value['panchnama_assuance_date']) * 1000);
        if (isset($value['possession_receipt_date']))
            $sarfaesi_related['possession_receipt_date'] = new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($value['possession_receipt_date']) * 1000);
        if (isset($value['dues_amount_13_2']))
            $sarfaesi_related['dues_amount_13_2'] = (float) $value['dues_amount_13_2'];

        $this->attributes['sarfaesi_related'] = $sarfaesi_related;
    }
    /**
     * [getSarfaesiRelatedAttribute description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function getSarfaesiRelatedAttribute($value)
    {
        if (isset($value['possession_date']))
            $value['possession_date'] = $value['possession_date']->toDateTime()->format('d/m/Y');
        if (isset($value['issuance_date_13_2']))
            $value['issuance_date_13_2'] = $value['issuance_date_13_2']->toDateTime()->format('d/m/Y');
        if (isset($value['issuance_date_13_4']))
            $value['issuance_date_13_4'] = $value['issuance_date_13_4']->toDateTime()->format('d/m/Y');
        if (isset($value['dm_application_date']))
            $value['dm_application_date'] = $value['dm_application_date']->toDateTime()->format('d/m/Y');
        if (isset($value['dm_inspection_date']))
            $value['dm_inspection_date'] = $value['dm_inspection_date']->toDateTime()->format('d/m/Y');
        if (isset($value['dm_order_date']))
            $value['dm_order_date'] = $value['dm_order_date']->toDateTime()->format('d/m/Y');
        if (isset($value['fixation_possession_date']))
            $value['fixation_possession_date'] = $value['fixation_possession_date']->toDateTime()->format('d/m/Y');
        if (isset($value['panchnama_assuance_date']))
            $value['panchnama_assuance_date'] = $value['panchnama_assuance_date']->toDateTime()->format('d/m/Y');
        if (isset($value['possession_receipt_date']))
            $value['possession_receipt_date'] = $value['possession_receipt_date']->toDateTime()->format('d/m/Y');

        return $value;
    }
    /**
     * [setInspectionDataLogsAttribute description]
     * @param [type] $value [description]
     */
    public function setInspectionDataLogsAttribute($value)
    {
        $inspection_data_logs = $value;
        if (isset($value['inspection_date']))
            $inspection_data_logs['inspection_date'] = new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($value['inspection_date']) * 1000);
        $this->attributes['inspection_data_logs'] = $inspection_data_logs;
    }
    /**
     * [getInspectionDataLogsAttribute description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function getInspectionDataLogsAttribute($value)
    {
        if (isset($value['inspection_date']))
            $value['inspection_date'] = $value['inspection_date']->toDateTime()->format('d/m/Y');
        return $value;
    }
    /**
     * [setInsuranceDataPolicyAttribute description]
     * @param [type] $value [description]
     */
    public function setInsuranceDataPolicyAttribute($value)
    {
        $insurance_data_policy = $value;
        if (isset($value['insurance_start_date']))
            $insurance_data_policy['insurance_start_date'] = new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($value['insurance_start_date']) * 1000);
        if (isset($value['insurance_end_date']))
            $insurance_data_policy['insurance_end_date'] = new \MongoDB\BSON\UTCDateTime($this->convertToTimestamp($value['insurance_end_date']) * 1000);
        if (isset($value['sum_assured']))
            $insurance_data_policy['sum_assured'] = (float) $value['sum_assured'];
        if (isset($value['premium_amount']))
            $insurance_data_policy['premium_amount'] = (float) $value['premium_amount'];

        $this->attributes['insurance_data_policy'] = $insurance_data_policy;
    }
    /**
     * [getInsuranceDataPolicyAttribute description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function getInsuranceDataPolicyAttribute($value)
    {
        if (isset($value['insurance_start_date']))
            $value['insurance_start_date'] = $value['insurance_start_date']->toDateTime()->format('d/m/Y');
        if (isset($value['insurance_end_date']))
            $value['insurance_end_date'] = $value['insurance_end_date']->toDateTime()->format('d/m/Y');
        return $value;
    }
    /**
     * [setKapdataAttribute description]
     * @param [type] $value [description]
     */
    public function setKapdataAttribute($value)
    {
        $kapdata = $value;
        if (isset($value['kap_price']))
            $kapdata['kap_price'] = (float) $value['kap_price'];

        $this->attributes['kapdata'] = $kapdata;
    }
    /**
     * [setVehicleAttribute description]
     * @param [type] $value [description]
     */
    public function setVehicleAttribute($value)
    {
        $vehicle = $value;
        if (isset($value['purchase_cost']))
            $vehicle['purchase_cost'] = (float) $value['purchase_cost'];
        if (isset($value['seating_capacity']))
            $vehicle['seating_capacity'] = (int) $value['seating_capacity'];
        if (isset($value['spare_tyres']))
            $vehicle['spare_tyres'] = (int) $value['spare_tyres'];
        if (isset($value['displacement']))
            $vehicle['displacement'] = (float) $value['displacement'];
        if (isset($value['horsepower']))
            $vehicle['horsepower'] = (float) $value['horsepower'];
        if (isset($value['lifting_capacity']))
            $vehicle['lifting_capacity'] = (int) $value['lifting_capacity'];
        if (isset($value['odo_meter_reading']))
            $vehicle['odo_meter_reading'] = (int) $value['odo_meter_reading'];

        $this->attributes['vehicle'] = $vehicle;
    }
}
