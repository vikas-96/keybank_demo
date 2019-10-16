@extends('frontend.layouts.auth')
@push('css')
<link rel="stylesheet" href="{{URL::asset('frontend/css/jslider.css')}}" type="text/css">
<style type="text/css">
	#assets tr>td,tr>th {
		text-transform: capitalize;
	}
	table th {
   
	    position: sticky;
	 
	}
</style>
@endpush
@section('content')
<div class="table-outer">
	<div class="table-inner">
		<table id="assets">
			<thead>
				<tr>

					{{-- Customer Blog Start --}}
					@if(!empty(config("list.customer.property_id")) &&
					in_array($template_id,config("list.customer.property_id")))
					<th class="hard_left">Property ID</th>
					@endif
					@if(!empty(config("list.customer.property_sub_type")) &&
					in_array($template_id,config("list.customer.property_sub_type")))
					<th class="next_center">Property Subtype</th>
					@endif
					@if(!empty(config("list.customer.borrower_name")) &&
					in_array($template_id,config("list.customer.borrower_name")))
					<th class="next_left">Name of borrower</th>
					@endif
					@if(!empty(config("list.customer.property_category")) &&
					in_array($template_id,config("list.customer.property_category")))
					<th>Property Category</th>
					@endif
					@if(!empty(config("list.customer.property_type")) &&
					in_array($template_id,config("list.customer.property_type")))
					<th>Property Type</th>
					@endif
					@if(!empty(config("list.customer.description")) &&
					in_array($template_id,config("list.customer.description")))
					<th>Description</th>
					@endif
					@if(!empty(config("list.customer.migrating_branch")) &&
					in_array($template_id,config("list.customer.migrating_branch")))
					<th>Migrating Branch</th>
					@endif
					@if(!empty(config("list.customer.recall_date")) &&
					in_array($template_id,config("list.customer.recall_date")))
					<th>Recall Date</th>
					@endif
					@if(!empty(config("list.customer.clo_name")) &&
					in_array($template_id,config("list.customer.clo_name")))
					<th>Case Lead Officer Name</th>
					@endif
					@if(!empty(config("list.customer.co_name")) &&
					in_array($template_id,config("list.customer.co_name")))
					<th>Case Officer Name</th>
					@endif
					@if(!empty(config("list.customer.is_nclt")) &&
					in_array($template_id,config("list.customer.is_nclt")))
					<th>Has Account Been Referred to NCLT</th>
					@endif
					@if(!empty(config("list.customer.recovery_branch")) &&
					in_array($template_id,config("list.customer.recovery_branch")))
					<th>Recovery Branch</th>
					@endif

					{{-- Customer Blog End --}}

					{{-- Loan Blog Start --}}
					@if(!empty(config("list.loan.npa_date")) && in_array($template_id,config("list.loan.npa_date")))
					<th>NPA Date</th>
					@endif
					{{-- Loan Blog End --}}

					{{-- Address Blog Start --}}
					@if(!empty(config("list.address.property_address")) &&
					in_array($template_id,config("list.address.property_address")))
					<th>Address</th>
					@endif
					{{-- Address Blog End --}}

					{{-- Configuration Blog Start --}}
					@if(!empty(config("list.configuration.configuration")) &&
					in_array($template_id,config("list.configuration.configuration")))
					<th>Configuration</th>
					@endif
					@if(!empty(config("list.configuration.no_of_cabins")) &&
					in_array($template_id,config("list.configuration.no_of_cabins")))
					<th>Number of cabins</th>
					@endif
					@if(!empty(config("list.configuration.no_of_conference_rooms")) &&
					in_array($template_id,config("list.configuration.no_of_conference_rooms")))
					<th>Number of conference rooms</th>
					@endif
					@if(!empty(config("list.configuration.no_of_seats")) &&
					in_array($template_id,config("list.configuration.no_of_seats")))
					<th>Number of seats</th>
					@endif
					@if(!empty(config("list.configuration.pantry")) &&
					in_array($template_id,config("list.configuration.pantry")))
					<th>Pantry</th>
					@endif
					@if(!empty(config("list.configuration.no_of_toilets")) &&
					in_array($template_id,config("list.configuration.no_of_toilets")))
					<th>Number of Baths / Toilets</th>
					@endif
					{{-- Configuration Blog End --}}

					{{-- Size Blog Start --}}
					@if(!empty(config("list.size.area_type")) && in_array($template_id,config("list.size.area_type")))
					<th>Type of Area</th>
					@endif
					@if(!empty(config("list.size.area")) && in_array($template_id,config("list.size.area")))
					<th>Area</th>
					@endif
					@if(!empty(config("list.size.unit")) && in_array($template_id,config("list.size.unit")))
					<th>Unit</th>
					@endif
					{{-- Size Blog End --}}

					{{-- Unit Blog Start --}}
					@if(!empty(config("list.unit.furnishing_status")) &&
					in_array($template_id,config("list.unit.furnishing_status")))
					<th>Furnishing Status</th>
					@endif
					@if(!empty(config("list.unit.flat_usp")) && in_array($template_id,config("list.unit.flat_usp")))
					<th>Flat USP</th>
					@endif
					@if(!empty(config("list.unit.office_usp")) && in_array($template_id,config("list.unit.office_usp")))
					<th>ffice USP</th>
					@endif
					@if(!empty(config("list.unit.unit_usp")) && in_array($template_id,config("list.unit.unit_usp")))
					<th>Unit USP</th>
					@endif
					@if(!empty(config("list.unit.business_nature")) &&
					in_array($template_id,config("list.unit.business_nature")))
					<th>Nature of Business</th>
					@endif
					@if(!empty(config("list.unit.p&m_description")) &&
					in_array($template_id,config("list.unit.p&m_description")))
					<th>p&m_description</th>
					@endif
					{{-- Unit Blog End --}}

					{{-- Building Blog Start --}}
					@if(!empty(config("list.building.building_amenities")) &&
					in_array($template_id,config("list.building.building_amenities")))
					<th>Building Amenities</th>
					@endif
					@if(!empty(config("list.building.business_nature")) &&
					in_array($template_id,config("list.building.business_nature")))
					<th>Nature of Business</th>
					@endif
					@if(!empty(config("list.building.lift_in_building")) &&
					in_array($template_id,config("list.building.lift_in_building")))
					<th>Lift in the building</th>
					@endif
					@if(!empty(config("list.building.building_completion_year")) &&
					in_array($template_id,config("list.building.building_completion_year")))
					<th>Year of completion of the building</th>
					@endif
					@if(!empty(config("list.building.no_of_floors_in_building")) &&
					in_array($template_id,config("list.building.no_of_floors_in_building")))
					<th>No. of floors in the building</th>
					@endif
					{{-- Building Blog End --}}

					{{-- Neighbourhood Blog Start --}}
					@if(!empty(config("list.neighbourhood.no_of_hospitals")) &&
					in_array($template_id,config("list.neighbourhood.no_of_hospitals")))
					<th>Number of hospitals within 3kms</th>
					@endif
					@if(!empty(config("list.neighbourhood.no_of_schools")) &&
					in_array($template_id,config("list.neighbourhood.no_of_schools")))
					<th>No of Schools</th>
					@endif
					@if(!empty(config("list.neighbourhood.no_of_atms")) &&
					in_array($template_id,config("list.neighbourhood.no_of_atms")))
					<th>Number of hospitals within 3kms</th>
					@endif
					@if(!empty(config("list.neighbourhood.no_of_restaurants")) &&
					in_array($template_id,config("list.neighbourhood.no_of_restaurants")))
					<th>Number of restaurants within 1 kms</th>
					@endif
					@if(!empty(config("list.neighbourhood.metro_station_nearby")) &&
					in_array($template_id,config("list.neighbourhood.metro_station_nearby")))
					<th>Metro station within 500 meters</th>
					@endif
					@if(!empty(config("list.neighbourhood.distance_from_closest_airport")) &&
					in_array($template_id,config("list.neighbourhood.distance_from_closest_airport")))
					<th>Distance from closest airport (km)</th>
					@endif
					{{-- Neighbourhood Blog End --}}

					{{-- Valuation Blog Start --}}
					@if(!empty(config("list.valuation.fair_market_value_avg")) &&
					in_array($template_id,config("list.valuation.fair_market_value_avg")))
					<th>Market Value </th>
					@endif
					@if(!empty(config("list.valuation.realizable_value_avg")) &&
					in_array($template_id,config("list.valuation.realizable_value_avg")))
					<th>Realizable Value</th>
					@endif
					@if(!empty(config("list.valuation.distress_value_avg")) &&
					in_array($template_id,config("list.valuation.distress_value_avg")))
					<th>Distress Value</th>
					@endif
					@if(!empty(config("list.valuation.fair_market_value_1")) &&
					in_array($template_id,config("list.valuation.fair_market_value_1")))
					<th>Fair Market Value - Latest - 1 </th>
					@endif
					@if(!empty(config("list.valuation.fair_market_value_2")) &&
					in_array($template_id,config("list.valuation.fair_market_value_2")))
					<th>Fair Market Value - Latest - 2</th>
					@endif
					@if(!empty(config("list.valuation.realizable_value_1")) &&
					in_array($template_id,config("list.valuation.realizable_value_1")))
					<th>Realizable Value - Latest - 1</th>
					@endif
					@if(!empty(config("list.valuation.realizable_value_2")) &&
					in_array($template_id,config("list.valuation.realizable_value_2")))
					<th>Realizable Value - Latest - 2</th>
					@endif
					@if(!empty(config("list.valuation.forced_sale_value_1")) &&
					in_array($template_id,config("list.valuation.forced_sale_value_1")))
					<th>Forced Sale Value - Latest - 1</th>
					@endif
					@if(!empty(config("list.valuation.forced_sale_value_2")) &&
					in_array($template_id,config("list.valuation.forced_sale_value_2")))
					<th>Forced Sale Value - Latest - 2</th>
					@endif
					{{-- Valuation Blog End --}}

					{{-- Upcoming Auction Blog Start --}}
					@if(!empty(config("list.upcoming_auction.e_auction_date")) &&
					in_array($template_id,config("list.upcoming_auction.e_auction_date")))
					<th>E-auction date</th>
					@endif
					@if(!empty(config("list.upcoming_auction.auction_start_datetime")) &&
					in_array($template_id,config("list.upcoming_auction.auction_start_datetime")))
					<th>Auction Start Date and Time</th>
					@endif
					@if(!empty(config("list.upcoming_auction.reserve_price")) &&
					in_array($template_id,config("list.upcoming_auction.reserve_price")))
					<th>Reserve Price</th>
					@endif
					{{-- Upcoming Auction Blog End --}}

					{{-- Past Auction Blog Start --}}
					@if(!empty(config("list.past_auction.no_of_auction_held")) &&
					in_array($template_id,config("list.past_auction.no_of_auction_held")))
					<th>Number of Auctions held</th>
					@endif
					{{-- Past Auction Blog End --}}

					{{-- Sarfaesi Blog Start --}}
					@if(!empty(config("list.sarfaesi.possession_type")) &&
					in_array($template_id,config("list.sarfaesi.possession_type")))
					<th>Possession Type</th>
					@endif
					@if(!empty(config("list.sarfaesi.possession_date")) &&
					in_array($template_id,config("list.sarfaesi.possession_date")))
					<th>Date of Possession</th>
					@endif
					@if(!empty(config("list.sarfaesi.issuance_status_13_2")) &&
					in_array($template_id,config("list.sarfaesi.issuance_status_13_2")))
					<th>13(2) issuance Status</th>
					@endif
					@if(!empty(config("list.sarfaesi.issuance_date_13_2")) &&
					in_array($template_id,config("list.sarfaesi.issuance_date_13_2")))
					<th>13(2) issuance Date</th>
					@endif
					@if(!empty(config("list.sarfaesi.dues_amount_13_2")) &&
					in_array($template_id,config("list.sarfaesi.dues_amount_13_2")))
					<th>13(2) Amount of Dues</th>
					@endif
					@if(!empty(config("list.sarfaesi.issuance_status_13_4")) &&
					in_array($template_id,config("list.sarfaesi.issuance_status_13_4")))
					<th>13(4) Issuance Status</th>
					@endif
					@if(!empty(config("list.sarfaesi.issuance_date_13_4")) &&
					in_array($template_id,config("list.sarfaesi.issuance_date_13_4")))
					<th>13(4) Issuance Date</th>
					@endif
					@if(!empty(config("list.sarfaesi.dm_application_date")) &&
					in_array($template_id,config("list.sarfaesi.dm_application_date")))
					<th>DM / CMM Application Date</th>
					@endif
					@if(!empty(config("list.sarfaesi.dm_inspection_date")) &&
					in_array($template_id,config("list.sarfaesi.dm_inspection_date")))
					<th>DM / CMM Inspection Date</th>
					@endif
					@if(!empty(config("list.sarfaesi.dm_order_date")) &&
					in_array($template_id,config("list.sarfaesi.dm_order_date")))
					<th>DM / CMM Order Date</th>
					@endif
					@if(!empty(config("list.sarfaesi.fixation_possession_date")) &&
					in_array($template_id,config("list.sarfaesi.fixation_possession_date")))
					<th>Fixation of Physical Possession Date</th>
					@endif
					@if(!empty(config("list.sarfaesi.panchnama_assuance_date")) &&
					in_array($template_id,config("list.sarfaesi.panchnama_assuance_date")))
					<th>Panchnama Issuance Date</th>
					@endif
					@if(!empty(config("list.sarfaesi.possession_receipt_date")) &&
					in_array($template_id,config("list.sarfaesi.possession_receipt_date")))
					<th>Possession Receipt Date</th>
					@endif
					{{-- Sarfaesi Blog End --}}


					{{-- Kap Data Blog Start --}}
					@if(!empty(config("list.kap_data.marketability")) &&
					in_array($template_id,config("list.kap_data.marketability")))
					<th>Marketability</th>
					@endif
					@if(!empty(config("list.kap_data.kap_price")) &&
					in_array($template_id,config("list.kap_data.kap_price")))
					<th>KAP Price</th>
					@endif
					@if(!empty(config("list.kap_data.packaging_suggestions")) &&
					in_array($template_id,config("list.kap_data.packaging_suggestions")))
					<th>Packaging Suggestions</th>
					@endif
					@if(!empty(config("list.kap_data.other_insights")) &&
					in_array($template_id,config("list.kap_data.other_insights")))
					<th>KAP Insights</th>
					@endif
					{{-- Kap Data Blog End --}}

					{{-- Plot Blog Start --}}
					@if(!empty(config("list.plot.approved_land_use")) &&
					in_array($template_id,config("list.plot.approved_land_use")))
					<th>Approved Land Use</th>
					@endif
					@if(!empty(config("list.plot.plot_amenities")) &&
					in_array($template_id,config("list.plot.plot_amenities")))
					<th>Plot Amenities</th>
					@endif
					{{-- Plot Blog End --}}

					{{-- Office Summary Blog Start --}}
					@if(!empty(config("list.office_summary.unit_total_no")) &&
					in_array($template_id,config("list.office_summary.unit_total_no")))
					<th>otal Number of units</th>
					@endif
					@if(!empty(config("list.office_summary.area_type")) &&
					in_array($template_id,config("list.office_summary.area_type")))
					<th>Type of Area</th>
					@endif
					@if(!empty(config("list.office_summary.total_area")) &&
					in_array($template_id,config("list.office_summary.total_area")))
					<th>Total Area</th>
					@endif
					@if(!empty(config("list.office_summary.unit")) &&
					in_array($template_id,config("list.office_summary.unit")))
					<th>Unit</th>
					@endif
					{{-- Office Summary Blog End --}}

					{{-- Oc Blog Start --}}
					@if(!empty(config("list.oc.oc_status")) && in_array($template_id,config("list.oc.oc_status")))
					<th>OC Status</th>
					@endif
					{{-- Oc Blog End --}}

					{{-- Stock Other Blog Start --}}
					@if(!empty(config("list.stock_other.stock_description")) &&
					in_array($template_id,config("list.stock_other.stock_description")))
					<th>Description of stock</th>
					@endif
					@if(!empty(config("list.stock_other.latest_value")) &&
					in_array($template_id,config("list.stock_other.latest_value")))
					<th>Latest Value</th>
					@endif
					{{-- Stock Other Blog End --}}

					{{-- Vehicle Blog Start --}}
					@if(!empty(config("list.vehicle.vehicle_location")) &&
					in_array($template_id,config("list.vehicle.vehicle_location")))
					<th>Location of Vehicle</th>
					@endif
					@if(!empty(config("list.vehicle.rto_regn_no")) &&
					in_array($template_id,config("list.vehicle.rto_regn_no")))
					<th>RTO Regn No.</th>
					@endif
					@if(!empty(config("list.vehicle.rto_region")) &&
					in_array($template_id,config("list.vehicle.rto_region")))
					<th>RTO Region</th>
					@endif
					@if(!empty(config("list.vehicle.vehicle_type")) &&
					in_array($template_id,config("list.vehicle.vehicle_type")))
					<th>Type of Vehicle</th>
					@endif
					@if(!empty(config("list.vehicle.vehicle_purpose")) &&
					in_array($template_id,config("list.vehicle.vehicle_purpose")))
					<th>Commercial / Personal</th>
					@endif
					@if(!empty(config("list.vehicle.manufacturer")) &&
					in_array($template_id,config("list.vehicle.manufacturer")))
					<th>Manufacturer</th>
					@endif
					@if(!empty(config("list.vehicle.model")) && in_array($template_id,config("list.vehicle.model")))
					<th>Model</th>
					@endif
					@if(!empty(config("list.vehicle.colour")) && in_array($template_id,config("list.vehicle.colour")))
					<th>Colour</th>
					@endif
					@if(!empty(config("list.vehicle.month_year_mfg")) &&
					in_array($template_id,config("list.vehicle.month_year_mfg")))
					<th>Month & Year of Mfg</th>
					@endif
					@if(!empty(config("list.vehicle.fuel_type")) &&
					in_array($template_id,config("list.vehicle.fuel_type")))
					<th>Fuel Type</th>
					@endif
					@if(!empty(config("list.vehicle.seating_capacity")) &&
					in_array($template_id,config("list.vehicle.seating_capacity")))
					<th>Seating Capacity</th>
					@endif
					@if(!empty(config("list.vehicle.asset_condition")) &&
					in_array($template_id,config("list.vehicle.asset_condition")))
					<th>Asset Condition</th>
					@endif
					@if(!empty(config("list.vehicle.odo_meter_reading")) &&
					in_array($template_id,config("list.vehicle.odo_meter_reading")))
					<th>Odometer Reading (kms)</th>
					@endif
					{{-- Vehicle Blog End --}}


				</tr>
			</thead>
			<tbody>
				@php
				$list = config('list');
				$assets = $data->items();

				@endphp
				@if(isset($assets) && count($assets) > 0)
				@foreach($assets as $key=>$value)
				<tr>
					{{-- Customer Blog Start --}}

					@if(!empty($list["customer"]["property_id"]) &&
					in_array($template_id,$list["customer"]["property_id"]))
					<td class="hard_left"><a
							href="{{ route('asset-detail',[$value['customer']['_id']]) }}">{{$value["customer"]["property_id"] }}</a>
					</td>
					@endif
					@if(!empty($list["customer"]["property_sub_type"]) &&
					in_array($template_id,$list["customer"]["property_sub_type"]))
					<td class="next_center">{{$value["customer"]["property_sub_type"] ?? '--' }}</td>
					@endif
					@if(!empty($list["customer"]["borrower_name"]) &&
					in_array($template_id,$list["customer"]["borrower_name"]))
					<td class="next_left">
						{{ isset($value["loan"]["borrower_name"]) ? $value["loan"]["borrower_name"] : '' }}</td>
					@endif
					@if(!empty($list["customer"]["property_category"]) &&
					in_array($template_id,$list["customer"]["property_category"]))
					<td>{{$value["customer"]["property_category"] }}</td>
					@endif
					@if(!empty($list["customer"]["property_type"]) &&
					in_array($template_id,$list["customer"]["property_type"]))
					<td>{{$value["customer"]["property_type"] }}</td>
					@endif
					@if(!empty($list["customer"]["description"]) &&
					in_array($template_id,$list["customer"]["description"]))
					<td>{{$value["customer"]["description"] }}</td>
					@endif
					@if(!empty($list["customer"]["migrating_branch"]) &&
					in_array($template_id,$list["customer"]["migrating_branch"]))
					<td>{{$value["customer"]["migrating_branch"] }}</td>
					@endif
					@if(!empty($list["customer"]["recall_date"]) &&
					in_array($template_id,$list["customer"]["recall_date"]))
					<td>{{$value["customer"]["recall_date"] }}</td>
					@endif
					@if(!empty($list["customer"]["clo_name"]) && in_array($template_id,$list["customer"]["clo_name"]))
					<td>{{$value["customer"]["clo_name"] }}</td>
					@endif
					@if(!empty($list["customer"]["co_name"]) && in_array($template_id,$list["customer"]["co_name"]))
					<td>{{$value["customer"]["co_name"] }}</td>
					@endif
					@if(!empty($list["customer"]["is_nclt"]) && in_array($template_id,$list["customer"]["is_nclt"]))
					<td>
						@if($value["customer"]["is_nclt"])
						{{config('assets.yes_no.'.$value["customer"]["is_nclt"])}}
						@endif
					</td>
					@endif
					@if(!empty($list["customer"]["recovery_branch"]) &&
					in_array($template_id,$list["customer"]["recovery_branch"]))
					<td>{{$value["customer"]["recovery_branch"] }}</td>
					@endif

					{{-- Customer Blog End --}}

					{{-- Loan Blog Start --}}
					@if(!empty($list["loan"]["npa_date"]) && in_array($template_id,$list["loan"]["npa_date"]))
					<td>{{isset($value["loan"]["npa_date"])?$value["loan"]["npa_date"]:'' }}</td>
					@endif
					{{-- Loan Blog End --}}

					{{-- Address Blog Start --}}
					@if(!empty($list["address"]["property_address"]) &&
					in_array($template_id,$list["address"]["property_address"]))
					<td>{{$value["address"]["property_address"] }}</td>
					@endif
					{{-- Address Blog End --}}

					{{-- Configuration Blog Start --}}
					@if(!empty($list["configuration"]["configuration"]) &&
					in_array($template_id,$list["configuration"]["configuration"]))
					<td>{{$value["configuration"]["configuration"] }}</td>
					@endif
					@if(!empty($list["configuration"]["no_of_cabins"]) &&
					in_array($template_id,$list["configuration"]["no_of_cabins"]))
					<td>{{$value["configuration"]["no_of_cabins"] }}</td>
					@endif
					@if(!empty($list["configuration"]["no_of_conference_rooms"]) &&
					in_array($template_id,$list["configuration"]["no_of_conference_rooms"]))
					<td>{{$value["configuration"]["no_of_conference_rooms"] }}</td>
					@endif
					@if(!empty($list["configuration"]["no_of_seats"]) &&
					in_array($template_id,$list["configuration"]["no_of_seats"]))
					<td>{{$value["configuration"]["no_of_seats"] }}</td>
					@endif
					@if(!empty($list["configuration"]["pantry"]) &&
					in_array($template_id,$list["configuration"]["pantry"]))
					<td>{{$value["configuration"]["pantry"] }}</td>
					@endif
					@if(!empty($list["configuration"]["no_of_toilets"]) &&
					in_array($template_id,$list["configuration"]["no_of_toilets"]))
					<td>{{$value["configuration"]["no_of_toilets"] }}</td>
					@endif
					{{-- Configuration Blog End --}}

					{{-- Size Blog Start --}}
					@if(!empty($list["size"]["area_type"]) && in_array($template_id,$list["size"]["area_type"]))
					<td>
						@if($value["size"]["area_type"])
						{{config('assets.area_type.'.$value["size"]["area_type"])}}
						@endif
					</td>
					@endif
					@if(!empty($list["size"]["area"]) && in_array($template_id,$list["size"]["area"]))
					<td>{{$value["size"]["area"] }}</td>
					@endif
					@if(!empty($list["size"]["unit"]) && in_array($template_id,$list["size"]["unit"]))
					<td>
						@if($value["size"]["unit"])
						{{config('assets.unit.'.$value["size"]["unit"])}}
						@endif
					</td>
					@endif
					{{-- Size Blog End --}}

					{{-- Unit Blog Start --}}
					@if(!empty($list["unit"]["furnishing_status"]) &&
					in_array($template_id,$list["unit"]["furnishing_status"]))
					<td>
						@if($value["size"]["unit"])
							{{config('<assets class="furnishing_status"></assets>.'.$value["unit"]["furnishing_status"]) }}
						@endif
					</td>
					@endif
					@if(!empty($list["unit"]["flat_usp"]) && in_array($template_id,$list["unit"]["flat_usp"]))
					<td>{{$value["unit"]["flat_usp"] }}</td>
					@endif
					@if(!empty($list["unit"]["office_usp"]) && in_array($template_id,$list["unit"]["office_usp"]))
					<td>{{$value["unit"]["office_usp"] }}</td>
					@endif
					@if(!empty($list["unit"]["unit_usp"]) && in_array($template_id,$list["unit"]["unit_usp"]))
					<td>{{$value["unit"]["unit_usp"] }}</td>
					@endif
					@if(!empty($list["unit"]["business_nature"]) &&
					in_array($template_id,$list["unit"]["business_nature"]))
					<td>{{$value["unit"]["business_nature"] }}</td>
					@endif
					@if(!empty($list["unit"]["p&m_description"]) &&
					in_array($template_id,$list["unit"]["p&m_description"]))
					<td>{{$value["unit"]["p&m_description"]}}</td>
					@endif
					{{-- Unit Blog End --}}

					{{-- Building Blog Start --}}
					@if(!empty($list["building"]["building_amenities"]) &&
					in_array($template_id,$list["building"]["building_amenities"]))
					<td>
						@if(!empty($value["building"]["building_amenities"]))
						@foreach($value["building"]["building_amenities"] as $key=>$val)
						{{config('assets.building_amenities.'.$val)}}
						{{$loop->last ? '' : ', '}}

						@endforeach
						@endif
						{{-- implode(', ',array_map('ucfirst',(array)$value["building"]["building_amenities"])) --}}
					</td>
					@endif
					@if(!empty($list["building"]["business_nature"]) &&
					in_array($template_id,$list["building"]["business_nature"]))
					<td>{{$value["building"]["business_nature"] }}</td>
					@endif
					@if(!empty($list["building"]["lift_in_building"]) &&
					in_array($template_id,$list["building"]["lift_in_building"]))
					<td>{{$value["building"]["lift_in_building"] }}</td>
					@endif
					@if(!empty($list["building"]["building_completion_year"]) &&
					in_array($template_id,$list["building"]["building_completion_year"]))
					<td>{{$value["building"]["building_completion_year"] }}</td>
					@endif
					@if(!empty($list["building"]["no_of_floors_in_building"]) &&
					in_array($template_id,$list["building"]["no_of_floors_in_building"]))
					<td>{{$value["building"]["no_of_floors_in_building"] }}</td>
					@endif
					{{-- Building Blog End --}}

					{{-- Neighbourhood Blog Start --}}
					@if(!empty($list["neighbourhood"]["no_of_hospitals"]) &&
					in_array($template_id,$list["neighbourhood"]["no_of_hospitals"]))
					<td>{{$value["neighbourhood"]["no_of_hospitals"] }}</td>
					@endif
					@if(!empty($list["neighbourhood"]["no_of_schools"]) &&
					in_array($template_id,$list["neighbourhood"]["no_of_schools"]))
					<td>{{$value["neighbourhood"]["no_of_schools"] }}</td>
					@endif
					@if(!empty($list["neighbourhood"]["no_of_atms"]) &&
					in_array($template_id,$list["neighbourhood"]["no_of_atms"]))
					<td>{{$value["neighbourhood"]["no_of_atms"] }}</td>
					@endif
					@if(!empty($list["neighbourhood"]["no_of_restaurants"]) &&
					in_array($template_id,$list["neighbourhood"]["no_of_restaurants"]))
					<td>{{$value["neighbourhood"]["no_of_restaurants"] }}</td>
					@endif
					@if(!empty($list["neighbourhood"]["metro_station_nearby"]) &&
					in_array($template_id,$list["neighbourhood"]["metro_station_nearby"]))
					<td>{{$value["neighbourhood"]["metro_station_nearby"] }}</td>
					@endif
					@if(!empty($list["neighbourhood"]["distance_from_closest_airport"]) &&
					in_array($template_id,$list["neighbourhood"]["distance_from_closest_airport"]))
					<td>{{$value["neighbourhood"]["distance_from_closest_airport"] }}</td>
					@endif
					{{-- Neighbourhood Blog End --}}

					{{-- Valuation Blog Start --}}
					@if(!empty($list["valuation"]["fair_market_value_avg"]) &&
					in_array($template_id,$list["valuation"]["fair_market_value_avg"]))
					<td>{{$value["valuation"]["fair_market_value_avg"] }}</td>
					@endif
					@if(!empty($list["valuation"]["realizable_value_avg"]) &&
					in_array($template_id,$list["valuation"]["realizable_value_avg"]))
					<td>{{$value["valuation"]["realizable_value_avg"] }}</td>
					@endif
					@if(!empty($list["valuation"]["distress_value_avg"]) &&
					in_array($template_id,$list["valuation"]["distress_value_avg"]))
					<td>{{$value["valuation"]["distress_value_avg"] }}</td>
					@endif
					@if(!empty($list["valuation"]["fair_market_value_1"]) &&
					in_array($template_id,$list["valuation"]["fair_market_value_1"]))
					<td>{{$value["valuation"]["fair_market_value_1"] }}</td>
					@endif
					@if(!empty($list["valuation"]["fair_market_value_2"]) &&
					in_array($template_id,$list["valuation"]["fair_market_value_2"]))
					<td>{{$value["valuation"]["fair_market_value_2"] }}</td>
					@endif
					@if(!empty($list["valuation"]["realizable_value_1"]) &&
					in_array($template_id,$list["valuation"]["realizable_value_1"]))
					<td>{{$value["valuation"]["realizable_value_1"] }}</td>
					@endif
					@if(!empty($list["valuation"]["realizable_value_2"]) &&
					in_array($template_id,$list["valuation"]["realizable_value_2"]))
					<td>{{$value["valuation"]["realizable_value_2"] }}</td>
					@endif
					@if(!empty($list["valuation"]["forced_sale_value_1"]) &&
					in_array($template_id,$list["valuation"]["forced_sale_value_1"]))
					<td>{{$value["valuation"]["forced_sale_value_1"] }}</td>
					@endif
					@if(!empty($list["valuation"]["forced_sale_value_2"]) &&
					in_array($template_id,$list["valuation"]["forced_sale_value_2"]))
					<td>{{$value["valuation"]["forced_sale_value_2"] }}</td>
					@endif
					{{-- Valuation Blog End --}}

					{{-- Upcoming Auction Blog Start --}}
					@if(!empty($list["upcoming_auction"]["e_auction_date"]) &&
					in_array($template_id,$list["upcoming_auction"]["e_auction_date"]))
					<td>{{$value["upcoming_auction"]["e_auction_date"] ?? '--' }}</td>
					@endif
					@if(!empty($list["upcoming_auction"]["auction_start_datetime"]) &&
					in_array($template_id,$list["upcoming_auction"]["auction_start_datetime"]))
					<td>{{$value["upcoming_auction"]["auction_start_datetime"] }}</td>
					@endif
					@if(!empty($list["upcoming_auction"]["reserve_price"]) &&
					in_array($template_id,$list["upcoming_auction"]["reserve_price"]))
					<td>{{$value["upcoming_auction"]["reserve_price"] ?? '--' }}</td>
					@endif
					{{-- Upcoming Auction Blog End --}}

					{{-- Past Auction Blog Start --}}
					@if(!empty($list["past_auction"]["no_of_auction_held"]) &&
					in_array($template_id,$list["past_auction"]["no_of_auction_held"]))
					<td>{{$value["past_auction"]["no_of_auction_held"] }}</td>
					@endif
					{{-- Past Auction Blog End --}}

					{{-- Sarfaesi Blog Start --}}
					@if(!empty($list["sarfaesi"]["possession_type"]) &&
					in_array($template_id,$list["sarfaesi"]["possession_type"]))
					<td>{{$value["sarfaesi"]["possession_type"] }}</td>
					@endif
					@if(!empty($list["sarfaesi"]["possession_date"]) &&
					in_array($template_id,$list["sarfaesi"]["possession_date"]))
					<td>{{$value["sarfaesi"]["possession_date"] }}</td>
					@endif
					@if(!empty($list["sarfaesi"]["issuance_status_13_2"]) &&
					in_array($template_id,$list["sarfaesi"]["issuance_status_13_2"]))
					<td>{{$value["sarfaesi"]["issuance_status_13_2"] }}</td>
					@endif
					@if(!empty($list["sarfaesi"]["issuance_date_13_2"]) &&
					in_array($template_id,$list["sarfaesi"]["issuance_date_13_2"]))
					<td>{{$value["sarfaesi"]["issuance_date_13_2"] }}</td>
					@endif
					@if(!empty($list["sarfaesi"]["dues_amount_13_2"]) &&
					in_array($template_id,$list["sarfaesi"]["dues_amount_13_2"]))
					<td>{{$value["sarfaesi"]["dues_amount_13_2"] }}</td>
					@endif
					@if(!empty($list["sarfaesi"]["issuance_status_13_4"]) &&
					in_array($template_id,$list["sarfaesi"]["issuance_status_13_4"]))
					<td>{{$value["sarfaesi"]["issuance_status_13_4"] }}</td>
					@endif
					@if(!empty($list["sarfaesi"]["issuance_date_13_4"]) &&
					in_array($template_id,$list["sarfaesi"]["issuance_date_13_4"]))
					<td>{{$value["sarfaesi"]["issuance_date_13_4"] }}</td>
					@endif
					@if(!empty($list["sarfaesi"]["dm_application_date"]) &&
					in_array($template_id,$list["sarfaesi"]["dm_application_date"]))
					<td>{{$value["sarfaesi"]["dm_application_date"] }}</td>
					@endif
					@if(!empty($list["sarfaesi"]["dm_inspection_date"]) &&
					in_array($template_id,$list["sarfaesi"]["dm_inspection_date"]))
					<td>{{$value["sarfaesi"]["dm_inspection_date"] }}</td>
					@endif
					@if(!empty($list["sarfaesi"]["dm_order_date"]) &&
					in_array($template_id,$list["sarfaesi"]["dm_order_date"]))
					<td>{{$value["sarfaesi"]["dm_order_date"] }}</td>
					@endif
					@if(!empty($list["sarfaesi"]["fixation_possession_date"]) &&
					in_array($template_id,$list["sarfaesi"]["fixation_possession_date"]))
					<td>{{$value["sarfaesi"]["fixation_possession_date"] }}</td>
					@endif
					@if(!empty($list["sarfaesi"]["panchnama_assuance_date"]) &&
					in_array($template_id,$list["sarfaesi"]["panchnama_assuance_date"]))
					<td>{{$value["sarfaesi"]["panchnama_assuance_date"] }}</td>
					@endif
					@if(!empty($list["sarfaesi"]["possession_receipt_date"]) &&
					in_array($template_id,$list["sarfaesi"]["possession_receipt_date"]))
					<td>{{$value["sarfaesi"]["possession_receipt_date"] }}</td>
					@endif
					{{-- Sarfaesi Blog End --}}

					{{-- Kap Data Blog Start --}}
					@if(!empty($list["kap_data"]["marketability"]) &&
					in_array($template_id,$list["kap_data"]["marketability"]))
					<td>
						
						@if($value["kap_data"]["marketability"])
							{{-- config('assets.marketability.'.$value["kap_data"]["marketability"]) --}}
							<i class="{{ $value["kap_data"]["marketability"] }}"></i>
						@endif
					</td>
					@endif
					@if(!empty($list["kap_data"]["kap_price"]) && in_array($template_id,$list["kap_data"]["kap_price"]))
					<td>
						
						
                        @if(isset($value['kap_data']['kap_price']))
                        	&#x20b9;
                        	{{ price_format($value['kap_data']['kap_price']) ??'--' }}
                        @endif
                        @if(isset($value['kap_data']['kap_price']) &&
                        isset($value['kap_data']['kap_price_upper']))
                        	-
                        @endif
                        @if(isset($value['kap_data']['kap_price_upper']))
                        	&#x20b9;
                        	{{ price_format($value['kap_data']['kap_price_upper']) ??'--' }}
                        @endif
					</td>
					@endif
					@if(!empty($list["kap_data"]["packaging_suggestions"]) &&
					in_array($template_id,$list["kap_data"]["packaging_suggestions"]))
					<td>{{$value["kap_data"]["packaging_suggestions"] }}</td>
					@endif
					@if(!empty($list["kap_data"]["other_insights"]) &&
					in_array($template_id,$list["kap_data"]["other_insights"]))
					<td>{{$value["kap_data"]["other_insights"] }}</td>
					@endif
					{{-- Kap Data Blog End --}}

					{{-- Plot Blog Start --}}
					@if(!empty($list["plot"]["approved_land_use"]) &&
					in_array($template_id,$list["plot"]["approved_land_use"]))
					<td>{{$value["plot"]["approved_land_use"] }}</td>
					@endif
					@if(!empty($list["plot"]["plot_amenities"]) &&
					in_array($template_id,$list["plot"]["plot_amenities"]))
					<td>
						@if(!empty($value["plot"]["plot_amenities"]))
						@foreach($value["plot"]["plot_amenities"] as $key=>$val)
						{{config('assets.plot_amenities.'.$val)}}
						{{$loop->last ? '' : ', '}}

						@endforeach
						@endif
						{{-- implode(', ',array_map('ucfirst',(array)$value["plot"]["plot_amenities"])) --}}</td>
					@endif
					{{-- Plot Blog End --}}

					{{-- Office Summary Blog Start --}}
					@if(!empty($list["office_summary"]["unit_total_no"]) &&
					in_array($template_id,$list["office_summary"]["unit_total_no"]))
					<td>{{$value["office_summary"]["unit_total_no"] }}</td>
					@endif
					@if(!empty($list["office_summary"]["area_type"]) &&
					in_array($template_id,$list["office_summary"]["area_type"]))
					<td>{{$value["office_summary"]["area_type"] }}</td>
					@endif
					@if(!empty($list["office_summary"]["total_area"]) &&
					in_array($template_id,$list["office_summary"]["total_area"]))
					<td>{{$value["office_summary"]["total_area"] }}</td>
					@endif
					@if(!empty($list["office_summary"]["unit"]) &&
					in_array($template_id,$list["office_summary"]["unit"]))
					<td>{{$value["office_summary"]["unit"] }}</td>
					@endif
					{{-- Office Summary Blog End --}}

					{{-- Oc Blog Start --}}
					@if(!empty($list["oc"]["oc_status"]) && in_array($template_id,$list["oc"]["oc_status"]))
					<td>{{$value["oc"]["oc_status"] }}</td>
					@endif
					{{-- Oc Blog End --}}

					{{-- Stock Other Blog Start --}}
					@if(!empty($list["stock_other"]["stock_description"]) &&
					in_array($template_id,$list["stock_other"]["stock_description"]))
					<td>{{$value["stock_other"]["stock_description"] }}</td>
					@endif
					@if(!empty($list["stock_other"]["latest_value"]) &&
					in_array($template_id,$list["stock_other"]["latest_value"]))
					<td>{{$value["stock_other"]["latest_value"] }}</td>
					@endif
					{{-- Stock Other Blog End --}}

					{{-- Vehicle Blog Start --}}
					@if(!empty($list["vehicle"]["vehicle_location"]) &&
					in_array($template_id,$list["vehicle"]["vehicle_location"]))
					<td>{{$value["vehicle"]["vehicle_location"] }}</td>
					@endif
					@if(!empty($list["vehicle"]["rto_regn_no"]) &&
					in_array($template_id,$list["vehicle"]["rto_regn_no"]))
					<td>{{$value["vehicle"]["rto_regn_no"] }}</td>
					@endif
					@if(!empty($list["vehicle"]["rto_region"]) && in_array($template_id,$list["vehicle"]["rto_region"]))
					<td>{{$value["vehicle"]["rto_region"] }}</td>
					@endif
					@if(!empty($list["vehicle"]["vehicle_type"]) &&
					in_array($template_id,$list["vehicle"]["vehicle_type"]))
					<td>
						@if(isset($value["vehicle"]["vehicle_type"]))
							{{ config('assets.vehicle_type.'.$value["vehicle"]["vehicle_type"]) }}
						@endif
					</td>
					@endif
					@if(!empty($list["vehicle"]["vehicle_purpose"]) &&
					in_array($template_id,$list["vehicle"]["vehicle_purpose"]))
					<td>{{$value["vehicle"]["vehicle_purpose"] }}</td>
					@endif
					@if(!empty($list["vehicle"]["manufacturer"]) &&
					in_array($template_id,$list["vehicle"]["manufacturer"]))
					<td>{{$value["vehicle"]["manufacturer"] }}</td>
					@endif
					@if(!empty($list["vehicle"]["model"]) && in_array($template_id,$list["vehicle"]["model"]))
					<td>{{$value["vehicle"]["model"] }}</td>
					@endif
					@if(!empty($list["vehicle"]["colour"]) && in_array($template_id,$list["vehicle"]["colour"]))
					<td>{{$value["vehicle"]["colour"] }}</td>
					@endif
					@if(!empty($list["vehicle"]["month_year_mfg"]) &&
					in_array($template_id,$list["vehicle"]["month_year_mfg"]))
					<td>
						@if(isset($value["vehicle"]["month_year_mfg"]))
							{{$value["vehicle"]["month_year_mfg"] }}
						@else
							--
						@endif
						/
		                @if(isset($value["vehicle"]["year_mfg"]))
		                    {{ $value["vehicle"]["year_mfg"] }}
		                @else
		                    --
		                @endif
		                &nbsp;&nbsp;&nbsp;&nbsp;(MM/YYYY)
					</td>
					@endif
					@if(!empty($list["vehicle"]["fuel_type"]) && in_array($template_id,$list["vehicle"]["fuel_type"]))
					<td>{{$value["vehicle"]["fuel_type"] }}</td>
					@endif
					@if(!empty($list["vehicle"]["seating_capacity"]) &&
					in_array($template_id,$list["vehicle"]["seating_capacity"]))
					<td>{{$value["vehicle"]["seating_capacity"] }}</td>
					@endif
					@if(!empty($list["vehicle"]["asset_condition"]) &&
					in_array($template_id,$list["vehicle"]["asset_condition"]))
					<td>{{$value["vehicle"]["asset_condition"] }}</td>
					@endif
					@if(!empty($list["vehicle"]["odo_meter_reading"]) &&
					in_array($template_id,$list["vehicle"]["odo_meter_reading"]))
					<td>{{$value["vehicle"]["odo_meter_reading"] }}</td>
					@endif
					{{-- Vehicle Blog End --}}
				</tr>
				@endforeach
				@else
				<tr>No Data Found!!!</tr>
				@endif
			</tbody>
		</table>

	</div>
</div>
{{ $data->links('frontend.layouts.paginator', ['paginator' => $assets,'link_limit' => 3]) }}


@endsection

@push('advance-filter')
@if(isset($template_id))
@include('frontend.layouts.partials.advance-filter')
@endif
@endpush

@push('js')
<!--<script src="{{URL::asset('frontend/js/bootstrap-slider.js')}}"></script>
-->
<!--<script type="text/javascript" src="{{URL::asset('frontend/js/slider/jquery-1.7.1.js')}}"></script>-->
<!--<script type="text/javascript" src="{{URL::asset('frontend/js/slider/jshashtable-2.1_src.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('frontend/js/slider/jquery.numberformatter-1.2.3.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('frontend/js/slider/tmpl.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('frontend/js/slider/jquery.dependClass-0.1.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('frontend/js/slider/draggable-0.1.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('frontend/js/slider/jquery.slider.js')}}"></script>


<script type="text/javascript" charset="utf-8">
	$("#Slider5").slider({
	    from: 0,
	    to: 80000,
	    scale: [0, 150000, 250000, 350000, 500000, 80000],
	    step: 1000,
		slide:function(event,ui)
		{
			console.log(ui.value);
		}

	  });
</script>-->
@endpush