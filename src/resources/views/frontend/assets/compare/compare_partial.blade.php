<h3>Compare Projects</h3>
<div class="row m-0 justify-content-end">
    @foreach($assetLists as $assets)
        <div class="col-lg-6 p-0">
            <div class="card">
                <button class="close close_compare" data-property="{{ $assets['customer']['_id'] }}"><i class="fa fa-times" aria-hidden="true"></i></button>
                <h5> {{ asset_compare_value($assets,'customer','property_id') }}</h5>
                @if(in_array($template_id,config('template.sections.address')))
                    @if(validate_assetdetail($assets,'address','property_address',$template_id))
                    <span>{{ asset_compare_value($assets,'address','property_address') }}</span>
                    @endif
                @endif
                @if(in_array($template_id,config('template.sections.kap_data')))
                    @if(validate_assetdetail($assets,'kap_data','kap_price',$template_id))
                        <p class="red">{{ asset_compare_value($assets,'kap_data','kap_price') }}</p>
                    @endif
                @endif
                @if(in_array($template_id,config('template.sections.configuration')))
                    <p>{{ asset_compare_value($assets,'configuration','configuration') }}</p>
                @endif
            </div>
        </div>
    @endforeach
    @if(count($assetLists) < 3)
        <div class="col-lg-6 add-property">
            <a href="{{ route('asset.list') }}"><button class="btn ">Add Properties</button></a>
        </div>
    @endif
</div>
<div class="project-detail-accordian">
    <div class="accordion" id="accordionExample">
            @if(in_array($template_id,config('template.sections.customer')))
    	    <div class="card" id="overview">
                <div class="card-header" id="headingOne">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Primary Data
                    </button>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 pr-0">
                                <div class="card-detail">
                                    <ul class="property-detail">
                                        <li>Property Category</li>
                                        <li>Property Type</li>
                                    </ul>
                                </div>
                            </div>
                            @foreach($assetLists as $assets)
                            <div class="col-lg-6 px-0 ">
                                <div class="card-detail">
                                    <ul class="property-detail bl">
                                        <li><span>{{ ucfirst(asset_compare_value($assets,'customer','property_category')) }}</span></li>
                                        <li><span>{{ ucfirst(asset_compare_value($assets,'customer','property_type')) }}</span></li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
            @endif

            @if(in_array($template_id,config('template.sections.customer')))
            <div class="card" id="overview">
                <div class="card-header" id="headingOne">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true" aria-controls="collapseOne">
                    Account Information
                    </button>
                </div>
                <div id="collapsetwo" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 pr-0">
                                <div class="card-detail">
                                    <ul class="property-detail">
                                        <li>Recovery Branch</li>
                                        <li>Recall Date</li>
                                        <li>Case Lead Officer Name</li>
                                    </ul>
                                </div>
                            </div>
                            @foreach($assetLists as $assets)
                            <div class="col-lg-6 px-0 ">
                                <div class="card-detail">
                                    <ul class="property-detail bl">
                                        <li><span>{{ asset_compare_value($assets,'customer','recovery_branch') }}</span></li>
                                        <li><span>{{ asset_compare_value($assets,'customer','recall_date') }}</span></li>
                                        <li><span>{{ asset_compare_value($assets,'customer','clo_name') }}</span></li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if(in_array($template_id,config('template.sections.loan')))
            <div class="card" id="overview">
                <div class="card-header" id="headingOne">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true" aria-controls="collapseOne">
                    Loan
                    </button>
                </div>
                <div id="collapsethree" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 pr-0">
                                <div class="card-detail">
                                    <ul class="property-detail">
                                        <li>Loan Account No</li>
                                        <li>Name of borrower</li>
                                        <li>NPA Date</li>
                                    </ul>
                                </div>
                            </div>
                            @foreach($assetLists as $assets)
                            <div class="col-lg-6 px-0">
                                <div class="card-detail">
                                    <ul class="property-detail bl">
                                        <li>
                                            @foreach($assets['loan'] as $loandetail)
                                                <span>{{ $loandetail['account_no'] }} </span>
                                            @endforeach
                                        </li>
                                        <li>
                                            @foreach($assets['loan'] as $loandetail)
                                                <span>{{ $loandetail['borrower_detail']['name'] }} </span>
                                            @endforeach
                                        </li>
                                        <li>
                                            @foreach($assets['loan'] as $loandetail)
                                                <span>{{ $loandetail['npa_date'] }} </span>
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if(in_array($template_id,config('template.sections.address')))
            <div class="card" id="overview">
                <div class="card-header" id="headingOne">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsefour" aria-expanded="true" aria-controls="collapseOne">
                    Address
                    </button>
                </div>
                <div id="collapsefour" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 pr-0">
                                <div class="card-detail">
                                    <ul class="property-detail">
                                        <li>
                                            Property Address
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @foreach($assetLists as $assets)
                            <div class="col-lg-6 px-0 ">
                                <div class="card-detail">
                                    <ul class="property-detail bl">
                                        <li>
                                            @if(validate_assetdetail($assets,'address','property_address',$template_id))
                                                <span>{{ asset_compare_value($assets,'address','property_address') }}</span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
            @endif

            @if(in_array($template_id,config('template.sections.size')))
            <div class="card" id="overview">
                <div class="card-header" id="headingOne">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsefive" aria-expanded="true" aria-controls="collapseOne">
                    Size / Area
                    </button>
                </div>
                <div id="collapsefive" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 pr-0">
                                <div class="card-detail">
                                    <ul class="property-detail">
                                        <li>Area Type</li>
                                        <li>Area</li>
                                        <li>Unit</li>
                                        <li>Loft Area</li>
                                        <li>Loft Height</li>
                                        <li>Loft Area Type</li>
                                        <li>Loft Unit</li>
                                        <li>Terrace Area</li>
                                        <li>Terrace Unit</li>
                                        <li>Basement Construction Area</li>
                                        <li>Basement Area Type</li>
                                        <li>Basement Unit</li>
                                    </ul>
                                </div>
                            </div>
                            @foreach($assetLists as $assets)
                            <div class="col-lg-6 px-0 ">
                                <div class="card-detail">
                                    <ul class="property-detail bl">
                                        <li>
                                            @if(validate_assetdetail($assets,'size','area_type',$template_id))
                                            <span>{{ config('assets.area_type.'.asset_compare_value($assets,'size','area_type')) }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'size','area',$template_id))
                                            <span>{{ asset_compare_value($assets,'size','area') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'size','unit',$template_id))
                                            <span>{{ config('assets.unit.'.asset_compare_value($assets,'size','unit')) }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'size','loft_area',$template_id))
                                            <span>{{ asset_compare_value($assets,'size','loft_area') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'size','loft_height',$template_id))
                                            <span>{{ config('assets.height.'.asset_compare_value($assets,'size','loft_height')) }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'size','loft_area_type',$template_id))
                                            <span>{{ config('assets.area_type.'.asset_compare_value($assets,'size','loft_area_type')) }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'size','loft_unit',$template_id))
                                            <span>{{ config('assets.unit.'.asset_compare_value($assets,'size','loft_unit')) }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'size','terrace_area',$template_id))
                                            <span>{{ asset_compare_value($assets,'size','terrace_area') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'size','terrace_unit',$template_id))
                                            <span>{{ config('assets.unit.'.asset_compare_value($assets,'size','terrace_unit')) }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'size','basement_construction_area',$template_id))
                                            <span>{{ asset_compare_value($assets,'size','basement_construction_area') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'size','basement_area_type',$template_id))
                                            <span>{{ config('assets.area_type.'.asset_compare_value($assets,'size','basement_area_type')) }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'size','basement_unit',$template_id))
                                            <span>{{ config('assets.unit.'.asset_compare_value($assets,'size','basement_unit')) }}</span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
            @endif

            @if(in_array($template_id,config('template.sections.configuration')))
            <div class="card" id="overview">
                <div class="card-header" id="headingOne">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsesix" aria-expanded="true" aria-controls="collapseOne">
                    Configuration
                    </button>
                </div>
                <div id="collapsesix" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 pr-0">
                                <div class="card-detail">
                                    <ul class="property-detail">
                                        <li>Number of Baths / Toilets</li>
                                        <li>Number of Cabins</li>
                                        <li>Number of Conference Rooms</li>
                                    </ul>
                                </div>
                            </div>
                            @foreach($assetLists as $assets)
                            <div class="col-lg-6 px-0 ">
                                <div class="card-detail">
                                    <ul class="property-detail bl">
                                        <li>
                                            @if(validate_assetdetail($assets,'configuration','no_of_toilets',$template_id))
                                            <span>{{ asset_compare_value($assets,'configuration','no_of_toilets') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'configuration','no_of_cabins',$template_id))
                                            <span>{{ asset_compare_value($assets,'configuration','no_of_cabins') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'configuration','no_of_conference_rooms',$template_id))
                                            <span>{{ asset_compare_value($assets,'configuration','no_of_conference_rooms') }}</span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
            @endif

            @if(in_array($template_id,config('template.sections.unit')))
            <div class="card" id="overview">
                <div class="card-header" id="headingOne">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseseven" aria-expanded="true" aria-controls="collapseOne">
                    Unit Details
                    </button>
                </div>
                <div id="collapseseven" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 pr-0">
                                <div class="card-detail">
                                    <ul class="property-detail">
                                        <li>Furnishing Status</li>
                                        <li>Furnishing Details</li>
                                        <li>Flooring Type</li>
                                        <li>Painting Status</li>
                                        <li>Office Usp</li>
                                        <li>Business Nature</li>
                                        <li>Fire Safety Compliant</li>
                                        <li>Flat Usp</li>
                                        <li>Apartment Facing</li>
                                        <li>Facing Other Text</li>
                                        <li>Leakage</li>
                                    </ul>
                                </div>
                            </div>
                            @foreach($assetLists as $assets)
                            <div class="col-lg-6 px-0 ">
                                <div class="card-detail">
                                    <ul class="property-detail bl">
                                        <li>
                                            @if(validate_assetdetail($assets,'unit','furnishing_status',$template_id))
                                            <span>{{ config('assets.furnishing_status.'.asset_compare_value($assets,'unit','furnishing_status')) }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'unit','furnishing_details',$template_id))
                                            <span>{{ asset_compare_value($assets,'unit','furnishing_details') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'unit','flooring_type',$template_id))
                                            <span>{{ asset_compare_value($assets,'unit','flooring_type') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'unit','painting_status',$template_id))
                                            <span>{{ asset_compare_value($assets,'unit','painting_status') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'unit','office_usp',$template_id))
                                            <span>{{ asset_compare_value($assets,'unit','office_usp') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'unit','business_nature',$template_id))
                                            <span>{{ asset_compare_value($assets,'unit','business_nature') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'unit','fire_safety_compliant',$template_id))
                                            <span>{{ asset_compare_value($assets,'unit','fire_safety_compliant') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'unit','flat_usp',$template_id))
                                            <span>{{ asset_compare_value($assets,'unit','flat_usp') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'unit','apartment_facing',$template_id))
                                            <span>{{ asset_compare_value($assets,'unit','apartment_facing') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'unit','facing_other_text',$template_id))
                                            <span>{{ asset_compare_value($assets,'unit','facing_other_text') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'unit','leakage',$template_id))
                                            <span>{{ asset_compare_value($assets,'unit','leakage') }}</span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
            @endif

            @if(in_array($template_id,config('template.sections.building')))
            <div class="card" id="overview">
                <div class="card-header" id="headingOne">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseeight" aria-expanded="true" aria-controls="collapseOne">
                    Plot/ Building Information
                    </button>
                </div>
                <div id="collapseeight" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 pr-0">
                                <div class="card-detail">
                                    <ul class="property-detail">
                                        <li>Basement Contruction</li>
                                        <li>Basement Construction_area</li>
                                        <li>Basement Area_type</li>
                                        <li>Basement Unit</li>
                                        <li>Basement Usage</li>
                                        <li>No of floors in building</li>
                                        <li>Lift in building</li>
                                        <li>Building amenities</li>
                                        <li>Building completion_year</li>
                                        <li>Residual life of building</li>
                                        <li>Building Condition</li>
                                        <li>Life</li>
                                        <li>Fsi Permitted</li>
                                        <li>Fsi Consumed</li>
                                        <li>Construction Type</li>
                                        <li>Architectural Description</li>
                                        <li>Other</li>
                                        <li>Painting Status</li>
                                        <li>Business Nature</li>
                                        <li>Wiring</li>
                                        <li>Plumbing</li>
                                    </ul>
                                </div>
                            </div>
                            @foreach($assetLists as $assets)
                            <div class="col-lg-6 px-0 ">
                                <div class="card-detail">
                                    <ul class="property-detail bl">
                                        <li>
                                            @if(validate_assetdetail($assets,'building','basement_contruction',$template_id))
                                            <span>{{ config('assets.yes_no_options.'.asset_compare_value($assets,'building','basement_contruction')) }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'building','basement_construction_area',$template_id))
                                            <span>{{ asset_compare_value($assets,'building','basement_construction_area') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'building','basement_area_type',$template_id))
                                            <span>{{ asset_compare_value($assets,'building','basement_area_type') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'building','basement_unit',$template_id))
                                            <span>{{ config('assets.unit.'.asset_compare_value($assets,'building','basement_unit')) }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'building','basement_usage',$template_id))
                                            <span>{{ config('assets.usage.'.asset_compare_value($assets,'building','basement_usage')) }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'building','no_of_floors_in_building',$template_id))
                                            <span>{{ asset_compare_value($assets,'building','no_of_floors_in_building') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'building','lift_in_building',$template_id))
                                            <span>{{ config('assets.yes_no_options.'.asset_compare_value($assets,'building','lift_in_building')) }}</span>
                                            @endif
                                        </li>
                                        <li>
                                        @if(validate_assetdetail($assets,'building','building_amenities',$template_id))
                                            <span>
                                                @php
                                                    $building_amenities = asset_compare_value($assets,'building','building_amenities');
                                                    $building_amenities_value = '';
                                                @endphp
                                                @if(is_array($building_amenities))
                                                    @if(!empty($building_amenities))
                                                        @foreach($building_amenities as $amenities)
                                                            @php
                                                                $building_amenities_value .= config('assets.building_amenities.'.$amenities).', ';
                                                            @endphp
                                                        @endforeach
                                                        {{trim(ucwords($building_amenities_value),', ')}}
                                                    @endif
                                                @else
                                                    {{ ucwords($building_amenities) }}
                                                @endif
                                            </span>
                                        @endif
                                        </li>
                                            @if(validate_assetdetail($assets,'building','building_completion_year',$template_id))
                                            <span>{{ asset_compare_value($assets,'building','building_completion_year') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'building','residual_life_of_building',$template_id))
                                            <span>{{ asset_compare_value($assets,'building','residual_life_of_building') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'building','building_condition',$template_id))
                                            <span>{{ config('assets.building_condition.'.asset_compare_value($assets,'building','building_condition')) }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'building','Life',$template_id))
                                            <span>{{ asset_compare_value($assets,'building','Life') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'building','fsi_permitted',$template_id))
                                            <span>{{ asset_compare_value($assets,'building','fsi_permitted') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'building','fsi_consumed',$template_id))
                                            <span>{{ asset_compare_value($assets,'building','fsi_consumed') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'building','construction_type',$template_id))
                                            <span>{{ asset_compare_value($assets,'building','construction_type') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'building','architectural_description',$template_id))
                                            <span>{{ asset_compare_value($assets,'building','architectural_description') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'building','Other',$template_id))
                                            <span>{{ asset_compare_value($assets,'building','Other') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'building','painting_status',$template_id))
                                            <span>{{ config('assets.painting_status.'.asset_compare_value($assets,'building','painting_status')) }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'building','business_nature',$template_id))
                                            <span>{{ asset_compare_value($assets,'building','business_nature') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'building','wiring',$template_id))
                                            <span>{{ asset_compare_value($assets,'building','wiring') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'building','plumbing',$template_id))
                                            <span>{{ asset_compare_value($assets,'building','plumbing') }}</span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if(in_array($template_id,config('template.sections.neighbourhood')))
            <div class="card" id="overview">
                <div class="card-header" id="headingOne">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsenine" aria-expanded="true" aria-controls="collapseOne">
                    Neighbourhood Information
                    </button>
                </div>
                <div id="collapsenine" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 pr-0">
                                <div class="card-detail">
                                    <ul class="property-detail">
                                        <li>Locality Classification</li>
                                        <li>Metro Station 500 Meter</li>
                                        <li>No_of_schools</li>
                                        <li>No of shopping_malls</li>
                                        <li>No of hospitals</li>
                                        <li>No of atms</li>
                                        <li>No of restaurants</li>
                                        <li>No of parks</li>
                                        <li>Distance from closest airport</li>
                                        <li>No of petrol pumps</li>
                                    </ul>
                                </div>
                            </div>
                            @foreach($assetLists as $assets)
                            <div class="col-lg-6 px-0 ">
                                <div class="card-detail">
                                    <ul class="property-detail bl">
                                        <li>
                                            @if(validate_assetdetail($assets,'neighbourhood','locality_classification',$template_id))
                                            <span>{{ config('assets.locality_classification.'.asset_compare_value($assets,'neighbourhood','locality_classification')) }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'neighbourhood','metro_station_nearby',$template_id))
                                            <span>{{ asset_compare_value($assets,'neighbourhood','metro_station_nearby') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'neighbourhood','no_of_schools',$template_id))
                                            <span>{{ asset_compare_value($assets,'neighbourhood','no_of_schools') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'neighbourhood','no_of_shopping_malls',$template_id))
                                            <span>{{ asset_compare_value($assets,'neighbourhood','no_of_shopping_malls') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'neighbourhood','no_of_hospitals',$template_id))
                                            <span>{{ asset_compare_value($assets,'neighbourhood','no_of_hospitals') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'neighbourhood','no_of_atms',$template_id))
                                            <span>{{ asset_compare_value($assets,'neighbourhood','no_of_atms') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'neighbourhood','no_of_restaurants',$template_id))
                                            <span>{{ asset_compare_value($assets,'neighbourhood','no_of_restaurants') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'neighbourhood','no_of_parks',$template_id))
                                            <span>{{ asset_compare_value($assets,'neighbourhood','no_of_parks') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'neighbourhood','distance_from_closest_airport',$template_id))
                                            <span>{{ asset_compare_value($assets,'neighbourhood','distance_from_closest_airport') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'neighbourhood','no_of_petrol_pumps',$template_id))
                                            <span>{{ asset_compare_value($assets,'neighbourhood','no_of_petrol_pumps') }}</span>
                                            @endif                                    
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
            @endif

            @if(in_array($template_id,config('template.sections.valuation')))
            <div class="card" id="overview">
                <div class="card-header" id="headingOne">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseten" aria-expanded="true" aria-controls="collapseOne">
                    Asset Information
                    </button>
                </div>
                <div id="collapseten" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 pr-0">
                                <div class="card-detail">
                                    <ul class="property-detail">
                                        <li>Fair Market Value</li>
                                        <li>Realizable Value</li>
                                        <li>Forced Sale Value</li>
                                    </ul>
                                </div>
                            </div>
                            @foreach($assetLists as $assets)
                            <div class="col-lg-6 px-0 ">
                                <div class="card-detail">
                                    <ul class="property-detail bl">
                                        <li>
                                            @if(validate_assetdetail($assets,'valuation','fair_market_value_1',$template_id))
                                                <span>{{ asset_compare_value($assets,'valuation','fair_market_value_1') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'valuation','realizable_value_1',$template_id))
                                                <span>{{ asset_compare_value($assets,'valuation','realizable_value_1') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'valuation','forced_sale_value_1',$template_id))
                                                <span>{{ asset_compare_value($assets,'valuation','forced_sale_value_1') }}</span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
            @endif

            @if(in_array($template_id,config('template.sections.oc')))
            <div class="card" id="overview">
                <div class="card-header" id="headingOne">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseten" aria-expanded="true" aria-controls="collapseOne">
                    OC
                    </button>
                </div>
                <div id="collapseten" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 pr-0">
                                <div class="card-detail">
                                    <ul class="property-detail">
                                        <li>OC Status</li>
                                    </ul>
                                </div>
                            </div>
                            @foreach($assetLists as $assets)
                            <div class="col-lg-6 px-0 ">
                                <div class="card-detail">
                                    <ul class="property-detail bl">
                                        <li>
                                            @if(validate_assetdetail($assets,'oc','oc_status',$template_id))
                                                <span>{{ config('assets.yes_no_options.'.asset_compare_value($assets,'oc','oc_status')) }}</span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
            @endif


            @if(in_array($template_id,config('template.sections.stock_other')))
            <div class="card" id="overview">
                <div class="card-header" id="headingOne">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseten" aria-expanded="true" aria-controls="collapseOne">
                    Stock Other
                    </button>
                </div>
                <div id="collapseten" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 pr-0">
                                <div class="card-detail">
                                    <ul class="property-detail">
                                        <li>Latest Valud</li>
                                        <li>Stock Description</li>
                                    </ul>
                                </div>
                            </div>
                            @foreach($assetLists as $assets)
                            <div class="col-lg-6 px-0 ">
                                <div class="card-detail">
                                    <ul class="property-detail bl">
                                        <li>
                                            @if(validate_assetdetail($assets,'stock_other','latest_value',$template_id))
                                                <span>{{ asset_compare_value($assets,'stock_other','latest_value') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'stock_other','stock_description',$template_id))
                                                <span>{{ asset_compare_value($assets,'stock_other','stock_description') }}</span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
            @endif


            @if(in_array($template_id,config('template.sections.occupancy')))
            <div class="card" id="overview">
                <div class="card-header" id="headingOne">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseten" aria-expanded="true" aria-controls="collapseOne">
                    Occupancy
                    </button>
                </div>
                <div id="collapseten" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 pr-0">
                                <div class="card-detail">
                                    <ul class="property-detail">
                                        <li>No of tenants</li>
                                        <li>No of unit sold</li>
                                    </ul>
                                </div>
                            </div>
                            @foreach($assetLists as $assets)
                            <div class="col-lg-6 px-0 ">
                                <div class="card-detail">
                                    <ul class="property-detail bl">
                                        <li>
                                            @if(validate_assetdetail($assets,'occupancy','no_of_tenants',$template_id))
                                                <span>{{ asset_compare_value($assets,'occupancy','no_of_tenants') }}</span>
                                            @endif
                                        <li>
                                        </li>
                                            @if(validate_assetdetail($assets,'occupancy','no_of_unit_sold',$template_id))
                                                <span>{{ asset_compare_value($assets,'occupancy','no_of_unit_sold') }}</span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
            @endif

            @if(in_array($template_id,config('template.sections.office_summary')))
            <div class="card" id="overview">
                <div class="card-header" id="headingOne">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseten" aria-expanded="true" aria-controls="collapseOne">
                    Office Summary
                    </button>
                </div>
                <div id="collapseten" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 pr-0">
                                <div class="card-detail">
                                    <ul class="property-detail">
                                        <li>No of Total Unit</li>
                                        <li>Area Type</li>
                                        <li>Total Area</li>
                                        <li>Unit</li>
                                    </ul>
                                </div>
                            </div>
                            @foreach($assetLists as $assets)
                            <div class="col-lg-6 px-0 ">
                                <div class="card-detail">
                                    <ul class="property-detail bl">
                                        <li>
                                            @if(validate_assetdetail($assets,'office_summary','unit_total_no',$template_id))
                                                <span>{{ asset_compare_value($assets,'office_summary','unit_total_no') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'office_summary','area_type',$template_id))
                                                <span>{{ asset_compare_value($assets,'office_summary','area_type') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'office_summary','total_area',$template_id))
                                                <span>{{ asset_compare_value($assets,'office_summary','total_area') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'office_summary','unit',$template_id))
                                                <span>{{ asset_compare_value($assets,'office_summary','unit') }}</span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
            @endif

            @if(in_array($template_id,config('template.sections.general_mall_information')))
            <div class="card" id="overview">
                <div class="card-header" id="headingOne">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseten" aria-expanded="true" aria-controls="collapseOne">
                    Mall Info
                    </button>
                </div>
                <div id="collapseten" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 pr-0">
                                <div class="card-detail">
                                    <ul class="property-detail">
                                        <li>Other Mall Usp</li>
                                        <li>Painting Status</li>
                                        <li>Basement Construction</li>
                                        <li>Basement Usage</li>
                                    </ul>
                                </div>
                            </div>
                            @foreach($assetLists as $assets)
                            <div class="col-lg-6 px-0 ">
                                <div class="card-detail">
                                    <ul class="property-detail bl">
                                        <li>
                                            @if(validate_assetdetail($assets,'mall_info','other_mall_usp',$template_id))
                                                <span>{{ asset_compare_value($assets,'mall_info','other_mall_usp') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'mall_info','painting_status',$template_id))
                                                <span>{{ asset_compare_value($assets,'mall_info','painting_status') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'mall_info','basement_construction',$template_id))
                                                <span>{{ asset_compare_value($assets,'mall_info','basement_construction') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'mall_info','basement_usage',$template_id))
                                                <span>{{ asset_compare_value($assets,'mall_info','basement_usage') }}</span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
            @endif

            @if(in_array($template_id,config('template.sections.kap_data')))
            <div class="card" id="overview">
                <div class="card-header" id="headingOne">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseeleven" aria-expanded="true" aria-controls="collapseOne">
                    KAP Data
                    </button>
                </div>
                <div id="collapseeleven" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 pr-0">
                                <div class="card-detail">
                                    <ul class="property-detail">
                                        <li>Marketability</li>
                                        <li>Kap Price</li>
                                        <li>Packaging Suggestions</li>
                                        <li>Other Insights</li>
                                    </ul>
                                </div>
                            </div>
                            @foreach($assetLists as $assets)
                            <div class="col-lg-6 px-0 ">
                                <div class="card-detail">
                                    <ul class="property-detail bl">
                                        <li>
                                            @if(validate_assetdetail($assets,'kap_data','marketability',$template_id))
                                            <span>{{ config('assets.marketability.'.asset_compare_value($assets,'kap_data','marketability')) }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'kap_data','kap_price',$template_id))
                                            <span>{{ asset_compare_value($assets,'kap_data','kap_price') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'kap_data','packaging_suggestions',$template_id))
                                            <span>{{ asset_compare_value($assets,'kap_data','packaging_suggestions') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'kap_data','other_insights',$template_id))
                                            <span>{{ asset_compare_value($assets,'kap_data','other_insights') }}</span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach        
                        </div>
                        
                    </div>
                </div>
            </div>
            @endif

            @if(in_array($template_id,config('template.sections.vehicle')))
            <div class="card" id="overview">
                <div class="card-header" id="headingOne">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseeleven" aria-expanded="true" aria-controls="collapseOne">
                    Vehicle
                    </button>
                </div>
                <div id="collapseeleven" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 pr-0">
                                <div class="card-detail">
                                    <ul class="property-detail">
                                        <li>Vehicle Location</li>
                                        <li>Rto Reg no</li>
                                        <li>Rto Region</li>
                                        <li>Vehicle Type</li>
                                        <li>Vehicle Purpose</li>
                                        <li>Manufacturer</li>
                                        <li>Model</li>
                                        <li>Colour</li>
                                        <li>Month year mfg</li>
                                        <li>Fuel type</li>
                                        <li>Seating Capacity</li>
                                        <li>Asset Condition</li>
                                        <li>Odo Meter Reading</li>
                                    </ul>
                                </div>
                            </div>
                            @foreach($assetLists as $assets)
                            <div class="col-lg-6 px-0 ">
                                <div class="card-detail">
                                    <ul class="property-detail bl">
                                        <li>
                                            @if(validate_assetdetail($assets,'vehicle','vehicle_location',$template_id))
                                            <span>{{ asset_compare_value($assets,'vehicle','vehicle_location') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'vehicle','rto_regn_no',$template_id))
                                            <span>{{ asset_compare_value($assets,'vehicle','rto_regn_no') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'vehicle','rto_region',$template_id))
                                            <span>{{ asset_compare_value($assets,'vehicle','rto_region') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'vehicle','vehicle_type',$template_id))
                                            <span>{{ asset_compare_value($assets,'vehicle','vehicle_type') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'vehicle','vehicle_purpose',$template_id))
                                            <span>{{ asset_compare_value($assets,'vehicle','vehicle_purpose') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'vehicle','manufacturer',$template_id))
                                            <span>{{ asset_compare_value($assets,'vehicle','manufacturer') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'vehicle','model',$template_id))
                                            <span>{{ asset_compare_value($assets,'vehicle','model') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'vehicle','colour',$template_id))
                                            <span>{{ asset_compare_value($assets,'vehicle','colour') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'vehicle','month_year_mfg',$template_id))
                                            <span>{{ asset_compare_value($assets,'vehicle','month_year_mfg') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'vehicle','fuel_type',$template_id))
                                            <span>{{ asset_compare_value($assets,'vehicle','fuel_type') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'vehicle','seating_capacity',$template_id))
                                            <span>{{ asset_compare_value($assets,'vehicle','seating_capacity') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'vehicle','asset_condition',$template_id))
                                            <span>{{ asset_compare_value($assets,'vehicle','asset_condition') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if(validate_assetdetail($assets,'vehicle','odo_meter_reading',$template_id))
                                            <span>{{ asset_compare_value($assets,'vehicle','odo_meter_reading') }}</span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach        
                        </div>
                        
                    </div>
                </div>
            </div>
            @endif

    </div>
</div>