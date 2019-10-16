@extends('frontend.layouts.auth')
@push('css')
<link rel="stylesheet" href="{{URL::asset('frontend/css/slick.css')}}">
<link rel="stylesheet" href="{{URL::asset('frontend/css/slick-theme.css')}}">
@endpush
@section('content')
<?php $value = $assets; ?>
<div class="row">
    <div class="col-lg-24">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a
                        href="{{ (redirect()->back()->getTargetUrl() == URL::current())? route('asset.list') : redirect()->back()->getTargetUrl() }}">Listing</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $value['property_id'] }}</li>
            </ol>
        </nav>
        <div class=" project-overview">
            <div class="row">
                <div class="col-lg-17">
                    <div class="addrrss-price-wrapper">
                        @if(isset($value['kapdata']['kap_price']) || isset($value['kapdata']['kap_price_upper']))
                        <span class="price">₹
                            @if(isset($value['kapdata']['kap_price']))
                            {{ price_format($value['kapdata']['kap_price']) ??'--' }}
                            @endif
                            @if(isset($value['kapdata']['kap_price']) && isset($value['kapdata']['kap_price_upper']))
                            -
                            @endif
                            @if(isset($value['kapdata']['kap_price_upper']))
                            {{ price_format($value['kapdata']['kap_price_upper']) ??'--' }}
                            @endif
                        </span>
                        @endif
                        <span class="address">
                            <h5>@php
                                echo
                                isset($value['configuration']['configuration'])?$value['configuration']['configuration']."
                                ":'';
                                echo
                                isset($value['customer']['property_sub_type'])?config('assets.property_sub_type.'.$value['customer']['property_sub_type']):config('assets.property_sub_type.'.$value['customer']['property_type']);
                                @endphp
                                <span>
                                    @if(isset($value['size']['area']))
                                    {{$value['size']['area']}}
                                    @endif
                                    @if(isset($value['size']['unit']))
                                    {{ config('assets.unit.'.$value['size']['unit']) }}
                                    @endif
                                </span>
                            </h5>
                            <p>
                                @if(isset($assets['address']['property_address']))
                                {{ $assets['address']['property_address']}}
                                @endif
                            </p>
                        </span>
                    </div>
                </div>
                @if(isset($assets['address']['latitude']) && isset($assets['address']['longitude']))
                <div class="col-lg-4 loc-map">
                    <a href="#displaymap"><i class="fa fa-map-marker" aria-hidden="true"></i>Show in Map</a>
                </div>
                @endif
                <div class="col-lg-3 tooltip-custom">
                    <i
                        class="{{ isset($value['kapdata']['marketability'])?$value['kapdata']['marketability']:'' }}"></i>
                    <span class="tooltiptext">
                        <ul>
                            <li><i class="green"></i> Highest</li>
                            <li><i class="orange"></i> Medium</li>
                            <li><i class="red"></i> Low</li>
                        </ul>
                    </span>
                </div>
            </div>
            <ul class="ul-list">
                <li><a href="#overview" class="active">OverView</a></li>
                @if(in_array($template_id,config('template.sections.address')) ||
                in_array($template_id,config('template.sections.valuation')) ||
                in_array($template_id,config('template.sections.configuration')) ||
                in_array($template_id,config('template.sections.size')) ||
                in_array($template_id,config('template.sections.unit')) ||
                in_array($template_id,config('template.sections.amenities')) ||
                in_array($template_id,config('template.sections.building')) ||
                in_array($template_id,config('template.sections.plot')) ||
                in_array($template_id,config('template.sections.vehicle')) ||
                in_array($template_id,config('template.sections.neighbourhood')))

                @if($template_id == 'T13')
                <li class=""><a href="#property_details">Vehicle Details</a></li>
                @else
                <li class=""><a href="#property_details">Property Details</a></li>
                @endif
                @endif

                @if(in_array($template_id,config('template.sections.upcoming_auction')) ||
                in_array($template_id,config('template.sections.past_auction')))
                <li><a href="#auction_details">Auction Details</a></li>
                @endif

                @if(in_array($template_id,config('template.sections.third_party_info')))
                <li><a href="#third_party_information">Third Party Information</a></li>
                @endif

                @if(in_array($template_id,config('template.sections.sarfaesi_related')) ||
                in_array($template_id,config('template.sections.other_dues')) ||
                in_array($template_id,config('template.sections.stock_other')))
                <li><a href="#other_details">Other Details</a></li>
                @endif

                @if($template_id != 'T11' && $template_id != 'T15')
                <li><a href="#documents_attached">Documents Attached</a></li>
                @endif
            </ul>
        </div>

        <div class="project-detail">
            <ul class="property-listing">
                <li>
                    <div class="project-img-slider">
                        <div class="slider-for">
                            <div class="item">
                                <a href="{{ isset($value['feature_image']['url'])?$value['feature_image']['url']: URL::asset('frontend/images/no-image.png') }}"
                                    target="_blank">
                                    <img class="property-image"
                                        src="{{ isset($value['feature_image']['url'])?$value['feature_image']['url']: URL::asset('frontend/images/no-image.png') }}" />
                                </a>
                            </div>
                            @if(isset($value['document_master']))
                            @foreach($value['document_master'] as $key=>$val)
                            @if($val['type'] == 'property_photos')
                            <div class="item">
                                <a href="{{$val['url']}}" target="_blank"><img src="{{$val['url']}}" /></a>
                            </div>
                            @endif
                            @endforeach
                            @endif

                        </div>
                        <div class="slider-nav">
                            @if($value['feature_image']['url'])
                            <div class="item">
                                <img class="property-image"
                                    src="{{ isset($value['feature_image']['url'])?$value['feature_image']['url']:URL::asset('frontend/images/no-image.png') }}" />
                            </div>
                            @endif
                            @if(isset($value['document_master']))
                            @foreach($value['document_master'] as $key=>$val)
                            @if($val['type'] == 'property_photos')
                            <div class="item"><img src="{{$val['url']}}" /></div>
                            @endif
                            @endforeach
                            @endif
                        </div>

                    </div>
                    <div class="property-data">
                        <div class="property-details">
                            <a href="JavaScript:Void(0)">
                                <h4>{{ $value['property_id'] }}</h4>
                                <p>{{ ucfirst($value['customer']['property_category']) }} -
                                    {{ ucfirst($value['customer']['property_type']) }}
                                    @if(isset($value['customer']['property_sub_type']))
                                    -
                                    <strong>{{ config('assets.' . $value['customer']['property_type'] . '.' . $value['customer']['property_sub_type']) }}</strong>
                                    @endif
                                </p>
                                <!-- for properties template -->
                                @if(isset($value['address']['property_address']))
                                <p class="margin-bottom">
                                    <strong>{{ $value['address']['property_address'] }}</strong>
                                </p>
                                @endif

                                <!-- for vehicle template (T13) -->
                                @if(isset($value['vehicle']['vehicle_location']) && ($template_id == 'T13'))
                                <p class="margin-bottom">
                                    <strong>{{ $value['vehicle']['vehicle_location'] }}</strong>
                                </p>
                                @endif

                                {{--  Configuration section Start --}}
                                {{--  @if(in_array($template_id,config('template.sections.configuration'))) --}}
                                {{--  @include('frontend.assets.detail_view_listing.configuration-detail') --}}
                                {{--  @endif --}}
                                {{--  Configuration section  Ends --}}


                                {{--  Size section start  --}}
                                @if(in_array($template_id,config('template.sections.size')))
                                @include('frontend.assets.detail_view_listing.size-detail')
                                @endif
                                {{--  Size section ends  --}}
                                <div class="property-highlights row">
                                    @if(in_array($template_id,config('template.sections.customer')))
                                    <div class="col-md-6">
                                        <span>CERSAI Number</span>
                                        <strong>{{ ($value['customer']['cersai_number']) ?? null }}</strong>
                                    </div>
                                    @endif
                                </div>
                                {{--  Building section start  --}}
                                @if(in_array($template_id,config('template.sections.building')))
                                @include('frontend.assets.detail_view_listing.building-detail')
                                @endif
                                {{--  Building section ends  --}}


                                {{--  Unit section start  --}}
                                {{--  @if(in_array($template_id,config('template.sections.unit')))  --}}
                                {{--  @include('frontend.assets.detail_view_listing.unit-detail')  --}}
                                {{--  @endif  --}}
                                {{--  Unit section ends  --}}

                                {{--  Neighbourhood section start  --}}
                                {{--  @if(in_array($template_id,config('template.sections.neighbourhood')))  --}}
                                {{--  @include('frontend.assets.detail_view_listing.neighbourhood-detail')  --}}
                                {{--  @endif  --}}
                                {{--  Neighbourhood section ends  --}}

                                {{--  Plot section start  --}}
                                @if(in_array($template_id,config('template.sections.plot')))
                                @include('frontend.assets.detail_view_listing.plot-detail')
                                @endif
                                {{--  Plot section ends  --}}

                                {{--  Office Summary section start  --}}
                                {{-- @if(in_array($template_id,config('template.sections.office_summary')))  --}}
                                {{-- @include('frontend.assets.detail_view_listing.office-summary-detail')  --}}
                                {{-- @endif  --}}
                                {{--  Office Summary section ends  --}}

                                {{--  OC section start  --}}
                                {{--  @if(in_array($template_id,config('template.sections.oc')))  --}}
                                {{--  @include('frontend.assets.detail_view_listing.oc-detail')  --}}
                                {{--  @endif  --}}
                                {{--  OC section ends  --}}

                                {{--  Stock section start  --}}
                                {{-- @if(in_array($template_id,config('template.sections.stock_other')))  --}}
                                {{-- @include('frontend.assets.detail_view_listing.stock-detail')  --}}
                                {{-- @endif  --}}
                                {{--  Stock section ends  --}}

                                {{--  Stock section start  --}}
                                {{-- @if(in_array($template_id,config('template.sections.vehicle')))  --}}
                                {{-- @include('frontend.assets.detail_view_listing.vehicle-detail')  --}}
                                {{-- @endif  --}}
                                {{--  Stock section ends  --}}

                                {{--  loan section Start --}}
                                @if(in_array($template_id,config('template.sections.loan')))
                                @include('frontend.assets.detail_view_listing.loan-detail')
                                @endif
                                {{--  loan section  Ends --}}
                            </a>
                        </div>
                        <div class="property-costing">
                            <ul>
                                <li><span>Market Value:
                                        <span class="tooltip-custom">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            <span class="tooltiptext">
                                                Average of Market Values from the latest Valuation Report.
                                            </span>
                                        </span>
                                    </span> {{ $value['valuation']['fair_market_value_avg'] ??'--' }}</li>
                                <li><span>Realizable Value:
                                        <span class="tooltip-custom">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            <span class="tooltiptext">
                                                Average of Realizable Values from the latest Valuation Report.
                                            </span>
                                        </span>
                                    </span>
                                    {{ $value['valuation']['realizable_value_avg'] ??'--' }}</li>
                                <li><span>Distress Value:
                                        <span class="tooltip-custom">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            <span class="tooltiptext">
                                                Average of Distress Values from the latest Valuation Report.
                                            </span>
                                        </span>
                                    </span> {{ $value['valuation']['distress_value_avg'] ??'--' }}
                                </li>
                                <div class="cost-compare-wrapper">
                                    @if(isset($value['kapdata']['kap_price']) ||
                                    isset($value['kapdata']['kap_price_upper']))
                                    <div class="cost">
                                        <h5>KAP PRICE</h5>
                                        <span>
                                            &#x20b9;
                                            @if(isset($value['kapdata']['kap_price']))
                                            {{ price_format($value['kapdata']['kap_price']) ??'--' }}
                                            @endif
                                            @if(isset($value['kapdata']['kap_price']) &&
                                            isset($value['kapdata']['kap_price_upper']))
                                            -
                                            @endif
                                            @if(isset($value['kapdata']['kap_price_upper']))
                                            {{ price_format($value['kapdata']['kap_price_upper']) ??'--' }}
                                            @endif
                                        </span>
                                    </div>
                                    @endif
                                    <span class="add-to-compare">
                                        <input type="checkbox" id="add-to-compare" name="" class="compare-check"
                                            data-property="{{ $value['_id'] }}">
                                        <label for="add-to-compare">Add To Compare</label>
                                    </span>
                                </div>
                                @if(isset($value['kapdata']['other_insights']))
                                <div class="message">
                                    <p>{{ $value['kapdata']['other_insights'] }}</p>
                                </div>
                                @endif
                                @if(isset($value['kapdata']['google_rating']))
                                <p>Google Rating : {{ $value['kapdata']['google_rating'] ?? null }}</p>
                                @endif
                                @if(isset($value['kapdata']['no_of_reviews']))
                                <p>Number of Reviews : {{ $value['kapdata']['no_of_reviews'] ?? null }}</p>
                                @endif
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="project-detail-accordian">
            <div class="accordion" id="accordionExample">
                <div class="card" id="overview">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                OVERVIEW
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="row">
                                @include('frontend.assets.detail_view.customer')
                                @include('frontend.assets.detail_view.loan')
                            </div>
                        </div>
                    </div>
                </div>
                @if(in_array($template_id,config('template.sections.address')) ||
                in_array($template_id,config('template.sections.valuation')) ||
                in_array($template_id,config('template.sections.configuration')) ||
                in_array($template_id,config('template.sections.size')) ||
                in_array($template_id,config('template.sections.unit')) ||
                in_array($template_id,config('template.sections.amenities')) ||
                in_array($template_id,config('template.sections.building')) ||
                in_array($template_id,config('template.sections.plot')) ||
                in_array($template_id,config('template.sections.vehicle')) ||
                in_array($template_id,config('template.sections.neighbourhood')))
                <div class="card" id="property_details">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo"
                                aria-expanded="false" aria-controls="collapseTwo">
                                @if($template_id == 'T13')
                                VEHICLE DETAILS
                                @else
                                PROPERTY DETAILS
                                @endif

                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="row">
                                @if(in_array($template_id,config('template.sections.vehicle')))
                                @include('frontend.assets.detail_view.vehicle')
                                @endif

                                @if(in_array($template_id,config('template.sections.address')))
                                @include('frontend.assets.detail_view.address')
                                @endif

                                @if(in_array($template_id,config('template.sections.valuation')))
                                @include('frontend.assets.detail_view.valuation')
                                @endif
                                @if(in_array($template_id,config('template.sections.configuration')))
                                @include('frontend.assets.detail_view.configuration')
                                @endif

                                @if(in_array($template_id,config('template.sections.size')))
                                @include('frontend.assets.detail_view.size')
                                @endif

                                @if(in_array($template_id,config('template.sections.unit')))
                                @include('frontend.assets.detail_view.unit')
                                @endif

                                @if(in_array($template_id,config('template.sections.amenities')))
                                @include('frontend.assets.detail_view.basic_amenities')
                                @endif

                                @if(in_array($template_id,config('template.sections.building')))
                                @include('frontend.assets.detail_view.building_information')
                                @endif

                                @if(in_array($template_id,config('template.sections.plot')))
                                @include('frontend.assets.detail_view.plot')
                                @endif

                                @if(in_array($template_id,config('template.sections.neighbourhood')))
                                @include('frontend.assets.detail_view.neighbourhood')
                                @endif

                                @if(in_array($template_id,config('template.sections.office_summary')))
                                @include('frontend.assets.detail_view.office_summary')
                                @endif

                                @if(in_array($template_id,config('template.sections.office_detail')))
                                @include('frontend.assets.detail_view.office_detail')
                                @endif

                                @if(in_array($template_id,config('template.sections.general_mall_information')))
                                @include('frontend.assets.detail_view.general_mall_information')
                                @endif

                                @if(in_array($template_id,config('template.sections.occupancy')))
                                @include('frontend.assets.detail_view.occupancy')
                                @endif

                                @if(in_array($template_id,config('template.sections.charges')))
                                @include('frontend.assets.detail_view.charges')
                                @endif


                                @if(in_array($template_id,config('template.sections.pricing')))
                                @include('frontend.assets.detail_view.pricing')
                                @endif

                                @if(in_array($template_id,config('template.sections.oc')))
                                @include('frontend.assets.detail_view.oc')
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                @endif
                @if(in_array($template_id,config('template.sections.upcoming_auction')) ||
                in_array($template_id,config('template.sections.past_auction')))
                <div class="card" id="auction_details">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                data-target="#collapsefour" aria-expanded="true" aria-controls="collapseOne">
                                AUCTION DETAILS
                            </button>
                        </h2>
                    </div>
                    <div id="collapsefour" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="row">
                                @if(in_array($template_id,config('template.sections.upcoming_auction')))
                                @include('frontend.assets.detail_view.upcoming_auction')
                                @endif

                                @if(in_array($template_id,config('template.sections.past_auction')))
                                @include('frontend.assets.detail_view.past_auction')
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if(in_array($template_id,config('template.sections.third_party_info')))
                <div class="card" id="third_party_information">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                data-target="#collapseseven" aria-expanded="true" aria-controls="collapseOne">
                                Third Party Information
                            </button>
                        </h2>
                    </div>
                    <div id="collapseseven" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="row">
                                @if(in_array($template_id,config('template.sections.third_party_info')))
                                @include('frontend.assets.detail_view.third_party_info')
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if(in_array($template_id,config('template.sections.sarfaesi_related')) ||
                in_array($template_id,config('template.sections.other_dues')) ||
                in_array($template_id,config('template.sections.stock_other')))
                <div class="card" id="other_details">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                data-target="#collapsefive" aria-expanded="true" aria-controls="collapseOne">
                                OTHER DETAILS
                            </button>
                        </h2>
                    </div>
                    <div id="collapsefive" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="row">
                                @if(in_array($template_id,config('template.sections.sarfaesi_related')))
                                @include('frontend.assets.detail_view.sarfaesi_related')
                                @endif

                                @if(in_array($template_id,config('template.sections.insurance_data_policy')))
                                @include('frontend.assets.detail_view.insurance_data_policy')
                                @endif

                                {{-- @if(in_array($template_id,config('template.sections.kap_data')))
                                @include('frontend.assets.detail_view.kap_data')
                                @endif --}}

                                @if(in_array($template_id,config('template.sections.other_dues')))
                                @include('frontend.assets.detail_view.other_dues')
                                @endif

                                @if(in_array($template_id,config('template.sections.stock_other')))
                                @include('frontend.assets.detail_view.stock_other')
                                @endif

                                @if(in_array($template_id,config('template.sections.other')))
                                @include('frontend.assets.detail_view.other')
                                @endif

                                @if(in_array($template_id,config('template.sections.other_known_encumbrances')))
                                @include('frontend.assets.detail_view.other_known_encumbrances')
                                @endif

                                @if(in_array($template_id,config('template.sections.legal_issue_by_borrower')))
                                @include('frontend.assets.detail_view.legal_issue_by_borrower')
                                @endif


                                @if(in_array($template_id,config('template.sections.inspection_data_logs')))
                                @include('frontend.assets.detail_view.inspection_data_logs')
                                @endif

                                {{-- @if(in_array($template_id,config('template.sections.entry_status')))
                                @include('frontend.assets.detail_view.entry_status')
                                @endif --}}

                                @if(in_array($template_id,config('template.sections.recorded_by')))
                                @include('frontend.assets.detail_view.recorded_by')
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if(isset($value['document']) && $template_id != 'T11' && $template_id != 'T15')
                <div class="card" id="documents_attached">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                DOCUMENTS ATTACHED
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse show" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-24">
                                    <div class="card-detail">
                                        <h4>Documents Attached</h4>
                                        <div class="row">
                                            @php
                                                $countDocument = 0;
                                            @endphp
                                            @if(isset($value['document']['valuation_report_1']) ||
                                            isset($value['document']['valuation_report_2']) ||
                                            isset($value['document']['index_2']) ||
                                            isset($value['document']['floor_plan']) ||
                                            isset($value['document']['insurance_policy']) ||
                                            isset($value['document']['inspection_report']) ||
                                            isset($value['document']['panchanama']))
                                            <div class="col-lg-12">
                                                <ul class="property-detail">
                                                    @if(isset($value['document']['valuation_report_1']) ||
                                                    isset($value['document']['valuation_report_2']))
                                                    <li>
                                                        <span>Latest Valuation Report</span>
                                                        @if(isset($value['document']['valuation_report_1']))
                                                        <a href="{{ $value['document']['valuation_report_1'] }}"
                                                            target="_blank">View</a>
                                                        @endif
                                                        @if(isset($value['document']['valuation_report_2']))
                                                        <a href="{{ $value['document']['valuation_report_2'] }}"
                                                            target="_blank">View</a>
                                                        @endif
                                                    </li>
                                                    @endif
                                                    {{-- @if(isset($value['document_master']))  
                                                        <li>
                                                            @php $p = 0; @endphp
                                                            @foreach($value['document_master'] as $key=>$val)
                                                                @if($p == 0)
                                                                    <span>Property Photos</span>
                                                                @endif
                                                                @if($val['type'] == 'property_photos')
                                                                    <a href="{{$val['url']}}" target="_blank">View</a>
                                                    ,
                                                    @endif
                                                    @php $p++; @endphp
                                                    @endforeach
                                                    </li>
                                                    @endif --}}
                                                    @if(isset($value['document']['index_2']))
                                                    <li>
                                                        <span>Property Documents</span> <a
                                                            href="{{ $value['document']['index_2'] }}"
                                                            target="_blank">View</a>
                                                    </li>
                                                    @endif
                                                    @if(isset($value['document']['floor_plan']))
                                                    <li>
                                                        <span>Floor Plan</span> <a
                                                            href="{{ $value['document']['floor_plan'] }}"
                                                            target="_blank">View</a>
                                                    </li>
                                                    @endif
                                                    @if(isset($value['document']['insurance_policy']))
                                                    <li>
                                                        <span>Insurance Policy</span> <a
                                                            href="{{ $value['document']['insurance_policy'] }}"
                                                            target="_blank">View</a>
                                                    </li>
                                                    @endif
                                                    @if(isset($value['document']['inspection_report']))
                                                    <li>
                                                        <span>Inspection Report</span> <a
                                                            href="{{ $value['document']['inspection_report'] }}"
                                                            target="_blank">View</a>
                                                    </li>
                                                    @endif
                                                    @if(isset($value['document']['panchanama']))
                                                    <li>
                                                        <span>Panchanama</span> <a
                                                            href="{{ $value['document']['panchanama'] }}"
                                                            target="_blank">View</a>
                                                    </li>
                                                    @endif
                                                </ul>
                                                @php
                                                    $countDocument++;
                                                @endphp
                                            </div>
                                            @endif
                                            @if(isset($value['document']['form_13_2']) || isset($value['document']['form_13_4']) || isset($value['document']['dm_application']) || isset($value['document']['dm_order']) || isset($value['document']['possession_order']) || isset($value['document']['possession_receipt']))
                                                <div class="col-lg-12">
                                                    <ul class="property-detail bl">
                                                        @if(isset($value['document']['form_13_2']))
                                                        <li>
                                                            <span>13(2)</span> <a
                                                                href="{{ $value['document']['form_13_2'] }}"
                                                                target="_blank">View</a>
                                                        </li>
                                                        @endif
                                                        @if(isset($value['document']['form_13_4']))
                                                        <li>
                                                            <span>13(4)</span> <a
                                                                href="{{ $value['document']['form_13_4'] }}"
                                                                target="_blank">View</a>
                                                        </li>
                                                        @endif
                                                        @if(isset($value['document']['dm_application']))
                                                        <li>
                                                            <span>DM Application</span> <a
                                                                href="{{ $value['document']['dm_application'] }}"
                                                                target="_blank">View</a>
                                                        </li>
                                                        @endif
                                                        @if(isset($value['document']['dm_order']))
                                                        <li>
                                                            <span>DM Order</span> <a
                                                                href="{{ $value['document']['dm_order'] }}"
                                                                target="_blank">View</a>
                                                        </li>
                                                        @endif
                                                        @if(isset($value['document']['possession_order']))
                                                        <li>
                                                            <span>Possession Order</span> <a
                                                                href="{{ $value['document']['possession_order'] }}"
                                                                target="_blank">View</a>
                                                        </li>
                                                        @endif
                                                        @if(isset($value['document']['possession_receipt']))
                                                        <li>
                                                            <span>Possession Receipt</span> <a
                                                                href="{{ $value['document']['possession_receipt'] }}"
                                                                target="_blank">View</a>
                                                        </li>
                                                        @endif
                                                    </ul>
                                                    @php
                                                        $countDocument++;
                                                    @endphp
                                                </div>
                                            @endif
                                            @if($countDocument == '0')
                                                <div class="col-lg-12">
                                                    <ul class="property-detail">
                                                        <li>No Data Available</li>
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('advance-filter')
@if(isset($template_id))
@include('frontend.layouts.partials.advance-filter')
@endif
@endpush

@push('js')
<script src="{{URL::asset('frontend/js/slick.js')}}"></script>
<script src="{{URL::asset('frontend/js/slick-lightbox.js')}}"></script>
<script src="{{URL::asset('frontend/js/custom.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.card-detail .property-detail').each(function(){
            if(($(this).find('li').length < 1) && !$(this).hasClass("bl")){
                $(this).html('<li>No Data Available</li>');
            } 
        });

        $('.card-body').each(function(){
            if(($(this).find('.property-detail').length < 1)){
                $(this).html('No Data Available');
            }
        });
    });
</script>
@endpush