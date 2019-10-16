<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssetListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $customer = [
            '_id' => isset($this->_id) ? $this->_id : null,
            'property_id' => isset($this->property_id) ? $this->property_id : null,
            'description' => isset($this->customer['description']) ? $this->customer['description'] : null,
            'property_category' => isset($this->customer['property_category']) ? $this->customer['property_category'] : null,
            "property_type" => isset($this->customer['property_type']) ? $this->customer['property_type'] : null,
            "property_sub_type" => isset($this->customer['property_sub_type']) ? $this->customer['property_sub_type'] : null,
            "borrower_name" => isset($this->customer['borrower_name']) ? $this->customer['borrower_name'] : null,
            "is_nclt" => isset($this->customer['is_nclt']) ? $this->customer['is_nclt'] : null,
            "recovery_branch" => isset($this->recoverybranch['branch_name']) ? $this->recoverybranch['branch_name'] : null,
            "migrating_branch" => isset($this->customer['migrating_branch']) ? $this->customer['migrating_branch'] : null,
            "recall_date" => isset($this->customer['recall_date']) ? $this->customer['recall_date'] : null,
            "clo_name" => isset($this->caseleadofficer['name']) ? $this->caseleadofficer['name'] : null,
            "co_name" => isset($this->caseofficer['name']) ? $this->caseofficer['name'] : null,
            "cersai_number" => isset($this->customer['cersai_number']) ? $this->customer['cersai_number'] : null,
            "migrating_branch" => isset($this->migratingbranch['name']) ? $this->migratingbranch['name'] : null,
        ];

        $loan = $this->loan;

        $address = [
            'property_address' => isset($this->address['property_address']) ? $this->address['property_address'] : null,
        ];

        $configuration = [
            'configuration' => isset($this->configuration['configuration']) ? $this->configuration['configuration'] : null,
            'no_of_cabins' => isset($this->configuration['no_of_cabins']) ? $this->configuration['no_of_cabins'] : null,
            "no_of_conference_rooms" => isset($this->configuration['no_of_conference_rooms']) ? $this->configuration['no_of_conference_rooms'] : null,
            "no_of_seats" => isset($this->configuration['no_of_seats']) ? $this->configuration['no_of_seats'] : null,
            "pantry" => isset($this->configuration['pantry']) ? $this->configuration['pantry'] : null,
            "no_of_toilets" => isset($this->configuration['no_of_toilets']) ? $this->configuration['no_of_toilets'] : null,
        ];

        $size = [
            'area_type' => isset($this->size['area_type']) ? $this->size['area_type'] : null,
            'area' => isset($this->size['area']) ? $this->size['area'] : null,
            'unit' => isset($this->size['unit']) ? $this->size['unit'] : null,
        ];

        $unit = [
            'furnishing_status' => isset($this->unit['furnishing_status']) ? $this->unit['furnishing_status'] : null,
            "flat_usp" => isset($this->unit['flat_usp']) ? $this->unit['flat_usp'] : null,
            "office_usp" => isset($this->unit['office_usp']) ? $this->unit['office_usp'] : null,
            "unit_usp" => isset($this->unit['unit_usp']) ? $this->unit['unit_usp'] : null,
            "business_nature" => isset($this->unit['business_nature']) ? $this->unit['business_nature'] : null,
            "p&m_description" => isset($this->unit['p&m_description']) ? $this->unit['p&m_description'] : null,
        ];

        $building = [
            "building_amenities" => isset($this->building['building_amenities']) ? $this->building['building_amenities'] : null,
            'business_nature' => isset($this->building['business_nature']) ? $this->building['business_nature'] : null,
            'lift_in_building' => isset($this->building['lift_in_building']) ? $this->building['lift_in_building'] : null,
            'building_completion_year' => isset($this->building['building_completion_year']) ? $this->building['building_completion_year'] : null,
            'no_of_floors_in_building' => isset($this->building['no_of_floors_in_building']) ? $this->building['no_of_floors_in_building'] : null,
        ];

        $neighbourhood = [
            "no_of_hospitals" => isset($this->neighbourhood['no_of_hospitals']) ? $this->neighbourhood['no_of_hospitals'] : null,
            "no_of_schools" => isset($this->neighbourhood['no_of_schools']) ? $this->neighbourhood['no_of_schools'] : null,
            "no_of_atms" => isset($this->neighbourhood['no_of_atms']) ? $this->neighbourhood['no_of_atms'] : null,
            "no_of_restaurants" => isset($this->neighbourhood['no_of_restaurants']) ? $this->neighbourhood['no_of_restaurants'] : null,
            "metro_station_nearby" => isset($this->neighbourhood['metro_station_nearby']) ? $this->neighbourhood['metro_station_nearby'] : null,
            "distance_from_closest_airport" => isset($this->neighbourhood['distance_from_closest_airport']) ? $this->neighbourhood['distance_from_closest_airport'] : null,
        ];

        $valuation = [
            "fair_market_value_1" => isset($this->valuation['fair_market_value_1']) ? $this->valuation['fair_market_value_1'] : null,
            "fair_market_value_2" => isset($this->valuation['fair_market_value_2']) ? $this->valuation['fair_market_value_2'] : null,
            "realizable_value_1" => isset($this->valuation['realizable_value_1']) ? $this->valuation['realizable_value_1'] : null,
            "realizable_value_2" => isset($this->valuation['realizable_value_2']) ? $this->valuation['realizable_value_2'] : null,
            "forced_sale_value_1" => isset($this->valuation['forced_sale_value_1']) ? $this->valuation['forced_sale_value_1'] : null,
            "forced_sale_value_2" => isset($this->valuation['forced_sale_value_2']) ? $this->valuation['forced_sale_value_2'] : null,
            "fair_market_value_avg" => isset($this->valuation['fair_market_value_1']) ? money_format("%.0n", $this->valuation['fair_market_value_1']) : null,
            "realizable_value_avg" => isset($this->valuation['realizable_value_1']) ? money_format("%.0n", $this->valuation['realizable_value_1']) : null,
            "distress_value_avg" => isset($this->valuation['forced_sale_value_1']) ? money_format("%.0n", $this->valuation['forced_sale_value_1']) : null,
        ];

        if (isset($valuation['fair_market_value_1']) && isset($valuation['fair_market_value_2'])) {
            $valuation['fair_market_value_avg'] = money_format("%.0n", ($valuation['fair_market_value_1'] + $valuation['fair_market_value_2']) / 2);
        }
        if (isset($valuation['realizable_value_1']) && isset($valuation['realizable_value_2'])) {
            $valuation['realizable_value_avg'] = money_format("%.0n", ($valuation['realizable_value_1'] + $valuation['realizable_value_2']) / 2);
        }
        if (isset($valuation['forced_sale_value_1']) && isset($valuation['forced_sale_value_2'])) {
            $valuation['distress_value_avg'] = money_format("%.0n", ($valuation['forced_sale_value_1'] + $valuation['forced_sale_value_2']) / 2);
        }

        $upcoming_auction = [
            'e_auction_date' => isset($this->upcoming_auction['e_auction_date']) ? $this->upcoming_auction['e_auction_date'] : null,
            'auction_start_datetime' => isset($this->upcoming_auction['auction_start_datetime']) ? $this->upcoming_auction['auction_start_datetime'] : null,
            'reserve_price' => isset($this->upcoming_auction['reserve_price']) ? $this->upcoming_auction['reserve_price'] : null,
        ];

        $past_auction = [
            'no_of_auction_held' => isset($this->past_auction['no_of_auction_held']) ? $this->past_auction['no_of_auction_held'] : null,
        ];

        $sarfaesi = [
            "possession_type" => isset($this->sarfaesi['possession_type']) ? $this->sarfaesi['possession_type'] : null,
            "possession_date" => isset($this->sarfaesi['possession_date']) ? $this->sarfaesi['possession_date'] : null,
            "issuance_status_13_2" => isset($this->sarfaesi['issuance_status_13_2']) ? $this->sarfaesi['issuance_status_13_2'] : null,
            "issuance_date_13_2" => isset($this->sarfaesi['issuance_date_13_2']) ? $this->sarfaesi['issuance_date_13_2'] : null,
            "dues_amount_13_2" => isset($this->sarfaesi['dues_amount_13_2']) ? $this->sarfaesi['dues_amount_13_2'] : null,
            "issuance_status_13_4" => isset($this->sarfaesi['issuance_status_13_4']) ? $this->sarfaesi['issuance_status_13_4'] : null,
            "issuance_date_13_4" => isset($this->sarfaesi['issuance_date_13_4']) ? $this->sarfaesi['issuance_date_13_4'] : null,
            "dm_application_date" => isset($this->sarfaesi['dm_application_date']) ? $this->sarfaesi['dm_application_date'] : null,
            "dm_inspection_date" => isset($this->sarfaesi['dm_inspection_date']) ? $this->sarfaesi['dm_inspection_date'] : null,
            "dm_order_date" => isset($this->sarfaesi['dm_order_date']) ? $this->sarfaesi['dm_order_date'] : null,
            "fixation_possession_date" => isset($this->sarfaesi['fixation_possession_date']) ? $this->sarfaesi['fixation_possession_date'] : null,
            "panchnama_assuance_date" => isset($this->sarfaesi['panchnama_assuance_date']) ? $this->sarfaesi['panchnama_assuance_date'] : null,
            "possession_receipt_date" => isset($this->sarfaesi['possession_receipt_date']) ? $this->sarfaesi['possession_receipt_date'] : null,
        ];

        $kap_data = [
            "marketability" => isset($this->kapdata['marketability']) ? $this->kapdata['marketability'] : null,
            "kap_price" => isset($this->kapdata['kap_price']) ? $this->kapdata['kap_price'] : null,
            "kap_price_upper" => isset($this->kapdata['kap_price_upper']) ? $this->kapdata['kap_price_upper'] : null,
            "packaging_suggestions" => isset($this->kapdata['packaging_suggestions']) ? $this->kapdata['packaging_suggestions'] : null,
            "other_insights" => isset($this->kapdata['other_insights']) ? $this->kapdata['other_insights'] : null,
            "google_rating" => isset($this->kapdata['google_rating']) ? $this->kapdata['google_rating'] : null,
            "no_of_reviews" => isset($this->kapdata['no_of_reviews']) ? $this->kapdata['no_of_reviews'] : null,
        ];

        $plot = [
            'approved_land_use' => isset($this->plot['approved_land_use']) ? $this->plot['approved_land_use'] : null,
            "plot_amenities" => isset($this->plot['plot_amenities']) ? $this->plot['plot_amenities'] : null,
        ];

        $office_summary = [
            'unit_total_no' => isset($this->office_summary['unit_total_no']) ? $this->office_summary['unit_total_no'] : null,
            'area_type' => isset($this->office_summary['area_type']) ? $this->office_summary['area_type'] : null,
            'total_area' => isset($this->office_summary['total_area']) ? $this->office_summary['total_area'] : null,
            'unit' => isset($this->office_summary['unit']) ? $this->office_summary['unit'] : null,
        ];

        $oc = [
            'oc_status' => isset($this->oc['oc_status']) ? $this->oc['oc_status'] : null,
        ];
        $stock_other = [
            'stock_description' => isset($this->stock_other['stock_description']) ? $this->stock_other['stock_description'] : null,
            'latest_value' => isset($this->stock_other['latest_value']) ? $this->stock_other['latest_value'] : null,
        ];

        $vehicle = [
            "vehicle_location" => isset($this->vehicle['vehicle_location']) ? $this->vehicle['vehicle_location'] : null,
            "rto_regn_no" => isset($this->vehicle['rto_regn_no']) ? $this->vehicle['rto_regn_no'] : null,
            "rto_region" => isset($this->vehicle['rto_region']) ? $this->vehicle['rto_region'] : null,
            "vehicle_type" => isset($this->vehicle['vehicle_type']) ? $this->vehicle['vehicle_type'] : null,
            "vehicle_purpose" => isset($this->vehicle['vehicle_purpose']) ? $this->vehicle['vehicle_purpose'] : null,
            "manufacturer" => isset($this->vehicle['manufacturer']) ? $this->vehicle['manufacturer'] : null,
            "model" => isset($this->vehicle['model']) ? $this->vehicle['model'] : null,
            "colour" => isset($this->vehicle['colour']) ? $this->vehicle['colour'] : null,
            "month_year_mfg" => isset($this->vehicle['month_year_mfg']) ? $this->vehicle['month_year_mfg'] : null,
            "fuel_type" => isset($this->vehicle['fuel_type']) ? $this->vehicle['fuel_type'] : null,
            "seating_capacity" => isset($this->vehicle['seating_capacity']) ? $this->vehicle['seating_capacity'] : null,
            "asset_condition" => isset($this->vehicle['asset_condition']) ? $this->vehicle['asset_condition'] : null,
            "odo_meter_reading" => isset($this->vehicle['odo_meter_reading']) ? $this->vehicle['odo_meter_reading'] : null,
        ];

        $feature_image = [
            "feature_image" => isset($this->feature_image['url']) ? $this->feature_image['url'] : null,
        ];

        return [
            'customer' => $customer,
            'loan' => $loan,
            'address' => $address,
            'configuration' => $configuration,
            'size' => $size,
            'unit' => $unit,
            'building' => $building,
            'neighbourhood' => $neighbourhood,
            'valuation' => $valuation,
            'upcoming_auction' => $upcoming_auction,
            'past_auction' => $past_auction,
            'sarfaesi' => $sarfaesi,
            'kap_data' => $kap_data,
            'plot' => $plot,
            'office_summary' => $office_summary,
            'oc' => $oc,
            'stock_other' => $stock_other,
            'vehicle' => $vehicle,
            'feature_image' => $feature_image,
        ];
    }
}
