<div id="advancefilter" class="modal fade advance-filter">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Filter</h4>
            </div>
            <form name="filter-form" id="filterForm" method="GET" action="{{ route('asset.list',['view'=>($view) ?? '']) }}">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label for="property_id">Property ID</label>
                                    <input type="text" name="property_id" id="property_id"
                                        value="{{(Request::get('property_id')) ?? null}}"
                                        class="form-control" placeholder="Property ID">
                                </div>
                            </div>
                            @if(in_array($template_id,config('template.sections.customer')))
                            @if(in_array($template_id,config('filter.customer.migrating_branch')))
                            <div class="col-md-6 ">
                                <div class="form-group">

                                    <label for="migrating_branch">Migrating Branch</label>
                                    <select class="cs-select-multi" name="customer[migrating_branch][]" id="migrating_branch" multiple="true">
                                        <option value=""></option>
                                        @foreach($migrating_branchs['data'] as $k => $branch)
                                        <option value="{{$branch['_id']}}"
                                            {{(in_array($branch['_id'],(Request::get('customer')['migrating_branch'] ?? [])))?'selected':''}} >
                                            {{$branch['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif

                            @if(in_array($template_id,config('filter.customer.recovery_branch')))
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label for="recovery_branch">Recovery Branch</label>
                                    <select class="cs-select-multi" name="customer[recovery_branch][]" id="recovery_branch" multiple="true">
                                        <option value=""></option>
                                        @foreach($banklist_and_state['branch'] as $k => $v)
                                        <option value="{{$k}}" {{(in_array($k,(Request::get('customer')['recovery_branch'] ?? [])))?'selected':''}}>
                                            {{$v}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif

                            @if(in_array($template_id,config('filter.customer.recall_date')))
                            <div class="input-group col-md-6">
                                <div class="form-group">
                                    <label for="recall_date">Recall Date</label>
                                    <div class="date-picker">
                                        <input type="text" class="form-control daterange" name="customer[recall_date]"
                                            id="recall_date"
                                            value="{{(Request::get('customer')['recall_date']) ?? null}}"
                                            autocomplete="off" placeholder="Recall Date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            @if(in_array($template_id,config('filter.customer.clo_name')))
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label for="clo_name">CLO Name</label>
                                    <select name="customer[clo_name][]" id="clo_name" multiple="true">
                                        
                                    </select>
                                   
                                </div>
                            </div>
                            @endif

                            @if(in_array($template_id,config('filter.customer.co_name')))
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label for="co_name">CO Name</label>
                                    <select name="customer[co_name][]" id="co_name" multiple="true">
                                       
                                    </select>
                                    
                                </div>
                            </div>
                            @endif
                            @endif
                    @if(in_array($template_id,config('template.sections.third_party_info')))
                        @if(in_array($template_id,config('filter.third_party_info.resolution_agent_name')))
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="resolution_agent_name">Resolution Agent Name</label>
                                <select class="form-control" name="third_party_info[resolution_agent_name][]"
                                    id="resolution_agent_name">
                                   
                                </select>
                                
                            </div>
                        </div>
                        @endif
                    @endif
                </div>
                <div class="row">
                            {{-- @if(in_array($template_id,config('template.sections.loan')))
                    @if(in_array($template_id,config('filter.loan.npa_date')))
                        <div class="input-group col-md-6">
                            <div class="form-group">
                                <label for="npa_date">NPA Date</label>
                                <div class="date-picker">
                                    <input type="text" class="form-control daterange" name="loan[npa_date]" id="npa_date" value="{{(Request::get('loan')['npa_date']) ?? null}}"
                            autocomplete="off">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endif --}}


                @if(in_array($template_id,config('template.sections.configuration')))
                    @if(in_array($template_id,config('filter.configuration.configuration')))
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="configuration">Configuration</label>
                            <select name="configuration[configuration]" id="configuration" class="cs-select">
                                <option value=""></option>
                                @foreach (config('assets.template1_config') as $k=>$v )
                                <option value={{$k}}
                                    {{(((Request::get('configuration')['configuration']) ?? null) == $k)?'selected':''}}>
                                    {{$v}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif
                @endif
                @if(in_array($template_id,config('template.sections.size')))
                    @if(in_array($template_id,config('filter.size.area')))
                    <!-- <div class="row">
                            <div class="col-md-8">
                                <label for="area">Area</label>
                                <div class="price-slider">
                                    <input id="Slider5" type="slider" name="size[area]" value="0;80000" class="form-control">
                                </div>
                            </div>
                        </div> -->
                    <div class="col-md-6 ">
                        <div class="form-group kap-price">
                            <label for="from_area">Total Area (sq ft)</label>
                            <input type="number" name="size[from_area]" id="from_area"
                                value="{{(Request::get('size')['from_area']) ?? null}}" class="form-control" placeholder="Min" min="0">
                            <span>-</span>
                            <input type="number" name="size[to_area]" id="from_area"
                                value="{{(Request::get('size')['to_area']) ?? null}}" class="form-control" placeholder="Max" min="0">
                        </div>
                    </div>
                    
                    @endif
                @endif
                </div>
            <div class="row">
                @if(in_array($template_id,config('template.sections.vehicle')))
                    @if(in_array($template_id,config('filter.vehicle.vehicle_location')))
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="vehicle_location">Vehicle Location</label>
                            <input type="text" name="vehicle[vehicle_location]" id="vehicle_location"
                                value="{{(Request::get('vehicle')['vehicle_location']) ?? null}}" class="form-control" placeholder="Vehicle Location">
                        </div>
                    </div>
                    @endif

                    @if(in_array($template_id,config('filter.vehicle.rto_region')))
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="rto_region">RTO Region</label>
                            <input type="text" name="vehicle[rto_region]" id="rto_region"
                                value="{{(Request::get('vehicle')['rto_region']) ?? null}}" class="form-control" placeholder="RTO Region">
                        </div>
                    </div>
                    @endif

                    @if(in_array($template_id,config('filter.vehicle.vehicle_type')))
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="vehicle_type">Vehicle Type</label>
                            <select name="vehicle[vehicle_type]" id="vehicle_type" class="cs-select">
                                <option value=""></option>
                                @foreach (config('assets.vehicle_type') as $k=>$v )
                                <option value={{$k}}
                                    {{(((Request::get('vehicle')['vehicle_type']) ?? null) == $k)?'selected':''}}>{{$v}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif

                    {{-- @if(in_array($template_id,config('filter.vehicle.vehicle_purpose')))
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="vehicle_purpose">Vehicle Purpose</label>
                            <select name="vehicle[vehicle_purpose]" id="vehicle_purpose" class="cs-select">
                                <option value=""></option>
                                @foreach (config('assets.vehicle_purpose') as $k=>$v )
                                <option value={{$k}}
                                    {{(((Request::get('vehicle')['vehicle_purpose']) ?? null) == $k)?'selected':''}}>{{$v}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif --}}

                    @if(in_array($template_id,config('filter.vehicle.manufacturer')))
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="manufacturer">Manufacturer</label>
                            <input type="text" name="vehicle[manufacturer]" id="manufacturer"
                                value="{{(Request::get('vehicle')['manufacturer']) ?? null}}" class="form-control" placeholder="Manufacturer">
                        </div>
                    </div>
                    @endif

                    @if(in_array($template_id,config('filter.vehicle.model')))
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="model">Model</label>
                            <input type="text" name="vehicle[model]" id="model"
                                value="{{(Request::get('vehicle')['model']) ?? null}}" class="form-control" placeholder="Model">
                        </div>
                    </div>
                    @endif

                    @if(in_array($template_id,config('filter.vehicle.month_year_mfg')))
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="month_year_mfg">Month Year Mfg</label>
                            <input type="text" name="vehicle[month_year_mfg]" id="month_year_mfg"
                                value="{{(Request::get('vehicle')['month_year_mfg']) ?? null}}" class="form-control" placeholder="Month Year Mfg">
                        </div>
                    </div>
                    @endif

                    @if(in_array($template_id,config('filter.vehicle.fuel_type')))
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="fuel_type">Fuel Type</label>
                            <select name="vehicle[fuel_type]" id="fuel_type" class="cs-select">
                                <option value=""></option>
                                @foreach (config('assets.fuel_type') as $k=>$v )
                                <option value={{$k}}
                                    {{(((Request::get('vehicle')['fuel_type']) ?? null) == $k)?'selected':''}}>{{$v}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif

                    @if(in_array($template_id,config('filter.vehicle.seating_capacity')))
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="seating_capacity">Seating Capacity</label>
                            <input type="text" name="vehicle[seating_capacity]" id="seating_capacity"
                                value="{{(Request::get('vehicle')['seating_capacity']) ?? null}}" class="form-control" placeholder="Seating Capacity">
                        </div>
                    </div>
                    @endif

                    @if(in_array($template_id,config('filter.vehicle.odo_meter_reading')))
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="odo_meter_reading">Odometer Reading (kms)</label>
                            <input type="text" name="vehicle[odo_meter_reading]" id="odo_meter_reading"
                                value="{{(Request::get('vehicle')['odo_meter_reading']) ?? null}}" class="form-control" placeholder="Odometer Reading (kms)">
                        </div>
                    </div>
                    @endif
                @endif
            </div>
            <div class="row">                
                @if(in_array($template_id,config('template.sections.address')))
                    @if(in_array($template_id,config('filter.address.state')))
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="state">State</label>
                                <select class="cs-select-multi" name="address[state][]" id="state" multiple="true">
                                    <option value=""></option>
                                    @foreach($banklist_and_state['state'] as $k => $v)
                                    <option value="{{$k}}" {{(in_array($k,(Request::get('address')['state'] ?? [])))?'selected':''}}>
                                        {{$v}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    @if(in_array($template_id,config('filter.address.city')))
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="city">City</label>
                                <select class="cs-select-multi" name="address[city][]" id="city" multiple="true">
                                    <option value="">Select City</option>
                                </select>
                            </div>
                        </div>
                    @endif
                    @if(in_array($template_id,config('filter.address.property_address')))
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="property_address">Location</label>
                            <input type="text" name="address[property_address]" id="property_address"
                                value="{{(Request::get('address')['property_address']) ?? null}}" class="form-control" placeholder="Location">
                        </div>
                    </div>
                    @endif
               
                @endif
            </div>
            <div class="row">
                @if(in_array($template_id,config('template.sections.office_summary')))
                    @if(in_array($template_id,config('filter.office_summary.unit_total_no')))
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="unit_total_no">Total Number of Units</label>
                                <input type="number" name="office_summary[unit_total_no]" id="unit_total_no"
                                    value="{{(Request::get('office_summary')['unit_total_no']) ?? null}}" class="form-control" min="0">
                            </div>
                        </div>
                    @endif
                    {{-- @if(in_array($template_id,config('filter.office_summary.total_area')))
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="total_area">Total Area</label>
                                <input type="number" name="office_summary[total_area]" id="total_area"
                                    value="{{(Request::get('office_summary')['total_area']) ?? null}}" class="form-control" min="0">
                            </div>
                        </div>
                    @endif --}}
                @endif
                @if(in_array($template_id,config('template.sections.valuation')))
                    @if(in_array($template_id,config('filter.valuation.realizable_value_1')))
                    <div class="col-md-6 ">
                        <div class="form-group kap-price">
                            <label for="realizable_value_1">Fair Market Value (in Rs.)</label>
                            
                            <input type="number" name="valuation[min_fair_market_value]" id="min_fair_market_value" value="{{(Request::get('valuation')['min_fair_market_value']) ?? null}}" placeholder="Min" class="form-control" min="0">
                            <span>-</span>
                            <input type="number" name="valuation[max_fair_market_value]" id="max_fair_market_value" value="{{(Request::get('valuation')['max_fair_market_value']) ?? null}}" placeholder="Max" class="form-control" min="0">
                        </div>
                    </div>
                    @endif
                @endif

                @if(in_array($template_id,config('template.sections.kap_data')))
                    @if(in_array($template_id,config('filter.kapdata.kap_price')))
                    <div class="col-md-6 ">
                        <div class="form-group kap-price">
                            <label for="kap_price">KAP Price (in Rs.)</label>
                           
                                <input type="number" name="kapdata[min_kap_price]" id="min_kap_price" value="{{(Request::get('kapdata')['min_kap_price']) ?? null}}" placeholder="Min" class="form-control" min="0">
                                <span>-</span>
                                <input type="number" name="kapdata[max_kap_price]" value="{{(Request::get('kapdata')['max_kap_price']) ?? null}}" placeholder="Max" class="form-control" min="0">
                        </div>
                    </div>
                    @endif
                @endif
            </div>
            <div class="row">

                @if(in_array($template_id,config('template.sections.upcoming_auction')))
                    @if(in_array($template_id,config('filter.upcoming_auction.auction_start_datetime')))
                    <div class="input-group col-md-6">
                        <div class="form-group">
                            <label for="auction_start_datetime">Auction Start Date / Time</label>
                            <div class="date-picker">
                                <div class="controls input-append">
                                    <input class="form-control datetimerange"
                                        name="upcoming_auction[auction_start_datetime]" id="auction_start_datetime"
                                        value="{{(Request::get('upcoming_auction')['auction_start_datetime']) ?? null}}"
                                        type="text" autocomplete="off" placeholder="Auction Start Date / Time">
                                    <span class="add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endif

                

                {{-- @if(in_array($template_id,config('template.sections.plot')))
                    @if(in_array($template_id,config('filter.plot.approved_land_use')))
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="approved_land_use">Approved Land Use</label>
                            <select name="plot[approved_land_use]" class="cs-select" id="approved_land_use">
                                <option value=""></option>
                                @foreach (config('assets.approved_land_use') as $k=>$v )
                                <option value={{$k}}
                                    {{(((Request::get('plot')['approved_land_use']) ?? null) == $k)?'selected':''}}>{{$v}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif
                @endif --}}
            </div>
            <div class="row">
                @if(in_array($template_id,config('template.sections.building')))
                    @if(in_array($template_id,config('filter.building.building_completion_year')))
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="building_completion_year">Building Completion Year</label>
                            <input type="number" name="building[building_completion_year]" id="building_completion_year"
                                value="{{(Request::get('building')['building_completion_year']) ?? null}}"
                                class="form-control" min="0" placeholder="Building Completion Year">
                        </div>
                    </div>
                    @endif

                    @if(in_array($template_id,config('filter.building.lift_in_building')))
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="lift_in_building">Lift in the Building</label>
                            <select name="building[lift_in_building]" class="cs-select" id="lift_in_building">
                                <option value=""></option>
                                @foreach (config('assets.yes_no_options') as $k=>$v )
                                <option value={{$k}}
                                    {{(((Request::get('building')['lift_in_building']) ?? null) == $k)?'selected':''}}>
                                    {{$v}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif

                    {{-- @if(in_array($template_id,config('filter.building.business_nature')))
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="business_nature">Business Nature</label>
                            <input type="text" name="building[business_nature]" id="business_nature"
                                value="{{(Request::get('building')['business_nature']) ?? null}}" class="form-control" placeholder="Business Nature">
                        </div>
                    </div>
                    @endif --}}
                @endif

                {{-- @if(in_array($template_id,config('template.sections.oc')))
                    @if(in_array($template_id,config('filter.oc.oc_status')))
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="oc_status">OC Status</label>
                            <select name="oc[oc_status]" id="oc_status" class="cs-select">
                                <option value=""></option>
                                @foreach (config('assets.yes_no_options') as $k=>$v )
                                <option value={{$k}} {{(((Request::get('oc')['oc_status']) ?? null) == $k)?'selected':''}}>
                                    {{$v}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif
                @endif --}}

                @if(in_array($template_id,config('template.sections.unit')))
                    {{-- @if(in_array($template_id,config('filter.unit.business_nature')))
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="business_nature">Business Nature</label>
                                <input type="text" name="unit[business_nature]" id="business_nature"
                                    value="{{(Request::get('unit')['business_nature']) ?? null}}" class="form-control" placeholder="Business Nature">
                            </div>
                        </div>
                    @endif --}}
                @endif
            </div>
            
                <div class="row">
                    @if(in_array($template_id,config('filter.document')))
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="min_no_of_auction_held">Photos Available ?</label>
                                <div class="row">
                                    <div class="col-9">
                                        <span class="no_photos">
                                            <input type="checkbox" id="no_photos" name="docuemnt[no_photos]" value="1" @if(isset(Request::get('docuemnt')['no_photos'])) checked="checked" @endif>
                                            <label for="no_photos">No Photos</label>
                                        </span>
                                    </div>
                                    <div class="col-9">
                                        <span class="with_photos">
                                            <input type="checkbox" id="with_photos" name="docuemnt[with_photos]" value="1" @if(isset(Request::get('docuemnt')['with_photos'])) checked="checked" @endif>
                                            <label for="with_photos">Only With Photos</label>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(in_array($template_id,config('template.sections.past_auction')))
                        @if(in_array($template_id,config('filter.past_auction.no_of_auction_held')))
                        
                        <div class="col-md-6 ">
                            <div class="form-group kap-price">
                                <label for="min_no_of_auction_held">Number of Auctions Held</label>
                                <input type="number" name="past_auction[min_no_of_auction_held]" id="min_no_of_auction_held"
                                    value="{{(Request::get('past_auction')['min_no_of_auction_held']) ?? null}}" class="form-control" placeholder="Min" min="0">
                                <span>-</span>
                                <input type="number" name="past_auction[max_no_of_auction_held]" id="max_no_of_auction_held"
                                    value="{{(Request::get('past_auction')['max_no_of_auction_held']) ?? null}}" class="form-control" placeholder="Max" min="0">
                            </div>
                        </div>
                        
                        @endif
                    @endif
                </div>
                
                @if(in_array($template_id,config('template.sections.sarfaesi_related')))
                    <div class="row">
                        @if(in_array($template_id,config('filter.sarfaesi_related.possession_type')))
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="possession_type">Possession Type</label>
                                <select name="sarfaesi_related[possession_type]" id="possession_type" class="cs-select">
                                    <option value=""></option>
                                    @foreach (config('assets.possession_type') as $k=>$v )
                                    <option value={{$k}}
                                        {{(((Request::get('sarfaesi_related')['possession_type']) ?? null) == $k)?'selected':''}}>{{$v}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                        @if(in_array($template_id,config('filter.sarfaesi_related.issuance_status_13_4')))
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="issuance_status_13_4">13(4) Issuance Status</label>
                                <select name="sarfaesi_related[issuance_status_13_4]" id="issuance_status_13_4" class="cs-select">
                                    <option value=""></option>
                                    @foreach (config('assets.issuance_status') as $k=>$v )
                                    <option value={{$k}}
                                        {{(((Request::get('sarfaesi_related')['issuance_status_13_4']) ?? null) == $k)?'selected':''}}>{{$v}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                        @if(in_array($template_id,config('filter.sarfaesi_related.issuance_status_13_2')))
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="issuance_status_13_2">13(2) issuance Status</label>
                                <select name="sarfaesi_related[issuance_status_13_2]" id="issuance_status_13_2" class="cs-select">
                                    <option value=""></option>
                                    @foreach (config('assets.issuance_status') as $k=>$v )
                                    <option value={{$k}}
                                        {{(((Request::get('sarfaesi_related')['issuance_status_13_2']) ?? null) == $k)?'selected':''}}>{{$v}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                        @if(in_array($template_id,config('filter.sarfaesi_related.issuance_date_13_2')))
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="issuance_day_13_2">Days Since Issuance of 13(2)</label>
                                <input type="number" name="sarfaesi_related[issuance_day_13_2]" id="issuance_day_13_2"
                                    value="{{(Request::get('sarfaesi_related')['issuance_day_13_2']) ?? null}}" class="form-control" placeholder="Days Since Issuance of 13(2)" min="0">
                            </div>
                        </div>
                        @endif
                    </div>
                    {{--  <div class="row">
                    @if(in_array($template_id,config('filter.sarfaesi_related.dm_cmm_application_status')))
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="dm_cmm_application_status">DM / CMM Application staus</label>
                                <select name="sarfaesi_related[dm_cmm_application_status]" id="dm_cmm_application_status" class="cs-select">
                                    <option value=""></option>
                                    @foreach (config('assets.dm_cmm_application_status') as $k=>$v )
                                    <option value={{$k}}
                                        {{(((Request::get('sarfaesi_related')['dm_cmm_application_status']) ?? null) == $k)?'selected':''}}>{{$v}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    @if(in_array($template_id,config('filter.sarfaesi_related.dm_cmm_inspection_conducted')))
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="dm_cmm_inspection_conducted">DM / CMM Inspection Conducted</label>
                                <select name="sarfaesi_related[dm_cmm_inspection_conducted]" id="dm_cmm_inspection_conducted" class="cs-select">
                                    <option value=""></option>
                                    @foreach (config('assets.dm_cmm_inspection_conducted') as $k=>$v )
                                    <option value={{$k}}
                                        {{(((Request::get('sarfaesi_related')['dm_cmm_inspection_conducted']) ?? null) == $k)?'selected':''}}>{{$v}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    @if(in_array($template_id,config('filter.sarfaesi_related.dm_cmm_order_status')))
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="dm_cmm_order_status">DM / CMM Order staus</label>
                                <select name="sarfaesi_related[dm_cmm_order_status]" id="dm_cmm_order_status" class="cs-select">
                                    <option value=""></option>
                                    @foreach (config('assets.dm_cmm_order_status') as $k=>$v )
                                    <option value={{$k}}
                                        {{(((Request::get('sarfaesi_related')['dm_cmm_order_status']) ?? null) == $k)?'selected':''}}>{{$v}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    @if(in_array($template_id,config('filter.sarfaesi_related.dm_application_day')))
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="dm_application_day">Days Since DM / CMM Application</label>
                            <input type="number" name="sarfaesi_related[dm_application_day]" id="dm_application_day"
                                value="{{(Request::get('sarfaesi_related')['dm_application_day']) ?? null}}" class="form-control" placeholder="Days Since DM / CMM Application" min="0">
                        </div>
                    </div>
                    @endif
                </div>  --}}
                @endif      
            
             
    </div>
</div>
<div class="modal-footer">
    <input type="hidden" name="property_category" id="filter_property_category" value="{{old('property_category')}}">
    <input type="hidden" name="property_type" id="filter_property_type" value="{{old('property_type')}}">
    <input type="hidden" name="property_sub_type" id="filter_property_sub_type" value="{{old('property_sub_type')}}">
    <input type="submit" value="Search" class="addbtn btn btn-primary btn-lg filterSubmitBtn">
    <input type="reset" value="Reset" class="resetbtn btn btn-secondary btn-lg">
</div>
</form>
</div>
</div>
</div>
@push('js')
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click','.resetbtn',function(e){
            e.preventDefault();
            $('#category-selection-form').submit();
        });
        $('.cs-select-multi').select2({       
            dropdownAutoWidth : true,
            multiple:true,
            width: '100%',
            placeholder: 'Select an option',
           
        });
    	$('.cs-select').select2({       
    		dropdownAutoWidth : true,
    		width: '100%',
    		placeholder: 'Select an option',
    	});
        //$('#clo_text').val($('#clo_name').text());
        let clo_name = '<?php echo json_encode((Request::get('customer')['clo_name'] ?? null)) ?>';
        $('#clo_name').select2({       
            dropdownAutoWidth : true,
            width: '100%',
            multiple:true,
            placeholder: 'Select an option',
            ajax: getMasterData('{{route("search-caseleadofficer")}}')
        }).on('change.select2', function (e) {
            var stateid = $(e.currentTarget).val();
            console.log(stateid);
        });

        if(clo_name != "null"){
            //$('#clo_name').val(JSON.parse(clo_name)).trigger('change.select2');
            getCloName('{{route("get-caseleadofficer")}}',JSON.parse(clo_name));
        }

        let co_name = '<?php echo json_encode((Request::get('customer')['co_name'] ?? null)) ?>';
        $('#co_text').val($('#co_name').text());
        $('#co_name').select2({       
            dropdownAutoWidth : true,
            width: '100%',
            multiple:true,
            placeholder: 'Select an option',
            ajax: getMasterData('{{route("search-caseofficer")}}')
        }).on('select2:select', function (e) {
            var data = e.params.data;
            $('#co_email').val(data.email);
            $('#co_text').val(data.text);
        });
        $('#res_text').val($('#resolution_agent_name').text());
        let resolution_agent_name = '<?php echo json_encode((Request::get('third_party_info')['resolution_agent_name'] ?? null)) ?>';
        $('#resolution_agent_name').select2({       
            dropdownAutoWidth : true,
            width: '100%',
            multiple:true,
            placeholder: 'Select an option',
            ajax: getMasterData('{{route("search-resolutionagent")}}')
        }).on('select2:select', function (e) {
            var data = e.params.data;
            $('#res_email').val(data.email);
            $('#res_text').val(data.text);
        });
        if(co_name != "null"){
            getCoName('{{route("get-caseofficer")}}',JSON.parse(co_name));
        }
        if(co_name != "null"){
            getResolutionAgent('{{route("get-resolutionagent")}}',JSON.parse(resolution_agent_name));
        }
        function getMasterData(path){
            return {
                url: path,
                quietMillis: 100,
                data: function (params) {
                    var query = {
                        q: params.term
                    }
                // Query parameters will be ?search=[term]&type=public
                return query;
                },
                processResults: function (data) {
                    let response = data.data;
                    return {
                            results: $.map(response, function(value) {
                            return {
                                id: value.id,
                                text: value.text,
                                contact: value.contact,
                                email: value.email,
                            }
                        })
                    };
                },
                cache: true
            }
        }
        function getCloName(path, data) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: path,
                data: {id:data},
                success: function (response) {
                    let data = [];
                    if (response.length != 0) {
                        $.each(JSON.parse(response), function (key, value) {
                            data.push({
                                id: key,
                                text: value
                            });
                        });
                        
                        $("#clo_name").select2({
                            dropdownAutoWidth: true,
                            width: '100%',
                            multiple:true,
                            placeholder: 'Select an option',
                            data: data,
                            ajax: getMasterData('{{route("search-caseleadofficer")}}')
                        });
                        $("#clo_name").val(JSON.parse(clo_name));
                        $("#clo_name").trigger('change');
                    }
                    
                }
            });
        }
        function getCoName(path, data) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: path,
                data: {id:data},
                success: function (response) {
                    let data = [];
                    if (response.length != 0) {
                        $.each(JSON.parse(response), function (key, value) {
                            data.push({
                                id: key,
                                text: value
                            });
                        });
                        
                        $("#co_name").select2({
                            dropdownAutoWidth: true,
                            width: '100%',
                            multiple:true,
                            placeholder: 'Select an option',
                            data: data,
                            ajax: getMasterData('{{route("search-caseofficer")}}')
                        });
                        $("#co_name").val(JSON.parse(co_name));
                        $("#co_name").trigger('change');
                    }
                    
                }
            });
        }
        function getResolutionAgent(path, data) {
            $.ajax({
                type: 'GET',
                url: path,
                data: {id:data},
                success: function (response) {
                    let data = [];
                    if (response.length != 0) {
                        $.each(JSON.parse(response), function (key, value) {
                            data.push({
                                id: key,
                                text: value
                            });
                        });
                        
                        $("#resolution_agent_name").select2({
                            dropdownAutoWidth: true,
                            width: '100%',
                            multiple:true,
                            placeholder: 'Select an option',
                            data: data,
                            ajax: getMasterData('{{route("search-resolutionagent")}}')
                        });
                        $("#resolution_agent_name").val(JSON.parse(resolution_agent_name));
                        $("#resolution_agent_name").trigger('change');
                    }
                    
                }
            });
        }
        let cityid = '<?php  echo json_encode((Request::get('address')['city'] ?? null)) ?>';
        let stateid = '<?php echo json_encode((Request::get('address')['state'] ?? null)) ?>';
        
        $('#state').select2({       
            dropdownAutoWidth : true,
            width: '100%',
            placeholder: 'Select an option',
        }).on('change.select2', function (e) {
            var stateid = $(e.currentTarget).val();
            var cityurl = '{{ route("city") }}'; 
            $.ajax({
                url:cityurl,
                type:"POST",
                data: {stateid:stateid,"_token": "{{ csrf_token() }}"},
                success: function (response) {
                    $('#city').empty();
                    $.map(response,function(city){
                        let $newOption = $("<option ></option>").val(city._id).text(city.city);
                        $('#city').append($newOption);
                    });
                    $('#city').val(JSON.parse(cityid)).trigger('change');
                }
            });
        });
        if(stateid != "null"){

            $('#state').val(JSON.parse(stateid)).trigger('change.select2');
        }
        if(cityid != "null"){
            $('#city').val(JSON.parse(cityid)).trigger('change.select2');
        }
        // date range time picker
        $('.datetimerange').daterangepicker({
            timePicker: true,
            showDropdowns: true,
            changeMonth: true,
            changeYear: true,
            opens: 'top',
            drops: 'up',
            //startDate: moment().startOf('hour'),
            //endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
                format: 'DD/MM/YYYY hh:mm A',
                cancelLabel: 'Clear',
            }
        });

        var datetimerange = "{{ Request::get('upcoming_auction')['auction_start_datetime'] }}";
        if(datetimerange.length < 1){
            $('.datetimerange').val('');
        }
        // date range time picker ends

        // date picker 
        $('.daterange').daterangepicker({
            showDropdowns: true,
            changeMonth: true,
            changeYear: true,
            // minYear: 1901,
            // maxYear: parseInt(moment().format('YYYY'),10),
            maxDate: new Date(),
            opens: 'left',
            locale: {
                format: 'DD/MM/YYYY',
                cancelLabel: 'Clear',
            }
        });
        var datetimerange = "{{ Request::get('upcoming_auction')['auction_start_datetime'] }}";
        if(datetimerange.length < 1){
            $('.datetimerange').val('');
        }
        var daterange = "{{ Request::get('customer')['recall_date'] }}";
        if(daterange.length < 1){
            $('.daterange').val('');
        }

        $('.daterange,.datetimerange').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
        // date range picker ends

        /*$('.form_datetime').datetimepicker({
            //startDate: new Date(),
            format: 'dd/mm/yyyy hh:ii',
            autoclose: true,
            pickerPosition: "bottom-left"
        });*/
        /*$('.past_date').datepicker({
            endDate: new Date(),
            todayHighlight: true,
            //startDate: '+1d',
            format: 'dd/mm/yyyy',
            autoclose: true,
        });
        $('.upcoming_date').datepicker({
            startDate: new Date(),
            todayHighlight: true,
            //startDate: '+1d',
            format: 'yyyy/mm/dd',
            autoclose: true,
        });*/

        $(".filterSubmitBtn").click(function(){
            var property_category = $('#property_category').val();
            var property_type = $('#property_type').val();
            var property_sub_type = $('#property_sub_type').val();
            $('#filter_property_category').val(property_category);
            $('#filter_property_type').val(property_type);
            $('#filter_property_sub_type').val(property_sub_type);
            $("#filterForm").submit();
        });

        //Firefox Month and Year dropdown Open
        var enforceModalFocusFn = $.fn.modal.Constructor.prototype.enforceFocus;

        $.fn.modal.Constructor.prototype._enforceFocus = function() {};
        $confModal = $('.advancefilter');
        $confModal.on('hidden', function() {
            $.fn.modal.Constructor.prototype.enforceFocus = enforceModalFocusFn;
        });

        $confModal.modal({ backdrop : false });
        
    });
</script>
@endpush