@extends('admin.layouts.auth')

@section('title', 'Add Uploads')

@push('progress-bar')

@include('admin.assets.progress-bar')

@endpush

@section('content')

<div class="row">
    <div class="col-md-24">
        <div class="card">
            
                <form method="POST" id="step8_form" action="{{ isset($finalDocuments) ? route('step8-update',['id'=>$asset_id]) : route('step8-post',['id'=>$asset_id]) }}" enctype="multipart/form-data">
                    <div class="card-header">
                        <strong>Documents
                            <span>{{ $property_id ? '('.$property_id.')':"" }}</span>
                        </strong>
                    </div>
                    <div class="card-body card-block">
                        <div class="row">
                    @csrf
                    <input type="hidden" name="asset_id" id="asset_id" value="{{$asset_id}}">
                    
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="property_category" class="">Latest Valuation Report - 1</label>
                            <input type="file" class="upload_document" name="valuation_report_1" id="valuation_report_1" @if(isset($finalDocuments) &&  array_key_exists('valuation_report_1', $finalDocuments)) disabled="true" @endif value="{{ (isset($finalDocuments) &&  array_key_exists('valuation_report_1', $finalDocuments)) ? $finalDocuments['valuation_report_1']['document']:'' }}">
                            <input type="hidden" id="valuation_report_1_path" name="property[valuation_report_1][document]" value="{{ (isset($finalDocuments) &&  array_key_exists('valuation_report_1', $finalDocuments)) ? $finalDocuments['valuation_report_1']['document']:'' }}">
                            <input type="hidden" name="property[valuation_report_1][_id]" value="{{ (isset($finalDocuments) &&  array_key_exists('valuation_report_1', $finalDocuments)) ? $finalDocuments['valuation_report_1']['_id']:'' }}">
                            @if(isset($finalDocuments) && array_key_exists('valuation_report_1', $finalDocuments))
                                <div class="col-md-6">
                                    <a class="deleteDocument" href="javascript:;" data-id="{{$finalDocuments['valuation_report_1']['_id']}}" data-type="valuation_report_1" style="float: right;"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    @if(isset($finalDocuments['valuation_report_1']['filetype']) && $finalDocuments['valuation_report_1']['filetype']== 'pdf')
                                        <div class="pdf_link">
                                            <i class="fa fa-file-pdf-o fa-3x"></i>
                                            <a href="{{$finalDocuments['valuation_report_1']['url']}}" target="_blank">Click To View</a>
                                        </div>
                                    @else
                                        <img src="{{$finalDocuments['valuation_report_1']['url']}}" width="100%" />
                                    @endif
                                </div>
                            @endif
                            <div class="error valuation_report_1_error"></div>
                        </div>
                    </div>
                    
                        <div class="col-md-6 ">
                            <div class="form-group">
                            <label for="property_category" class="">Latest Valuation Report - 2</label>
                            <input type="file" class="upload_document" name="valuation_report_2" id="valuation_report_2" @if(isset($finalDocuments) &&  array_key_exists('valuation_report_2', $finalDocuments)) disabled="true" @endif value="{{ (isset($finalDocuments) &&  array_key_exists('valuation_report_2', $finalDocuments)) ? $finalDocuments['valuation_report_2']['document']:'' }}">
                            <input type="hidden" id="valuation_report_2_path" name="property[valuation_report_2][document]" value="{{ (isset($finalDocuments) &&  array_key_exists('valuation_report_2', $finalDocuments)) ? $finalDocuments['valuation_report_2']['document']:'' }}">
                            <input type="hidden" name="property[valuation_report_2][_id]" value="{{ (isset($finalDocuments) &&  array_key_exists('valuation_report_2', $finalDocuments)) ? $finalDocuments['valuation_report_2']['_id']:'' }}">
                            @if(isset($finalDocuments) && array_key_exists('valuation_report_2', $finalDocuments))
                                <div class="col-md-6">
                                    <a class="deleteDocument" href="javascript:;" data-id="{{$finalDocuments['valuation_report_2']['_id']}}" data-type="valuation_report_2" style="float: right;"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    @if(isset($finalDocuments['valuation_report_2']['filetype']) && $finalDocuments['valuation_report_2']['filetype'] == 'pdf')
                                        <div class="pdf_link">
                                            <i class="fa fa-file-pdf-o fa-3x"></i>
                                            <a href="{{$finalDocuments['valuation_report_2']['url']}}" target="_blank">Click To View</a>
                                        </div>
                                    @else
                                        <img src="{{$finalDocuments['valuation_report_2']['url']}}" width="100%" />
                                    @endif
                                </div>
                            @endif
                            <div class="error valuation_report_2_error"></div>
                        </div>
                    </div>
                    
                        <div class="col-md-6 ">
                            <div class="form-group">
                            <label for="property_category" class="">Property Photos (Max Allowed Files: 5)</label>
                            @php
                                $count = 0;
                            @endphp
                            @if(isset($finalDocuments) && array_key_exists('property_photos', $finalDocuments))
                                @php
                                    $count = count($finalDocuments['property_photos']);
                                @endphp
                            @endif
                            <input type="file" class="upload_document" name="property_photos[]" multiple="multiple" id="property_photos" @if(isset($finalDocuments) &&  array_key_exists('property_photos', $finalDocuments) && $count >= 5) disabled="true" @endif value="{{ (isset($finalDocuments) &&  array_key_exists('property_photos', $finalDocuments)) ? $finalDocuments['property_photos'][0]['document']:'' }}">
                            
                            @if(isset($finalDocuments) && array_key_exists('property_photos', $finalDocuments) && $count > 0)
                                
                                
                                @for($i=0;$i<$count;$i++)
                                    <div class="col-md-6">
                                        <input type="hidden" id="property_photos_path_{{$i}}" name="property[property_photos][document][]" value="{{ (isset($finalDocuments) &&  array_key_exists('property_photos', $finalDocuments)) ? $finalDocuments['property_photos'][$i]['document']:'' }}">
                                        <input type="hidden" name="property[property_photos][_id][]" value="{{ (isset($finalDocuments) &&  array_key_exists('property_photos', $finalDocuments)) ? $finalDocuments['property_photos'][$i]['_id']:'' }}">
                                        <a class="deleteDocument" href="javascript:;" data-id="{{$finalDocuments['property_photos'][$i]['_id']}}" data-type="property_photos" style="float: right;"><i class="fa fa-times" aria-hidden="true"></i></a>
                                        @if(isset($finalDocuments['property_photos'][$i]['filetype']) && $finalDocuments['property_photos'][$i]['filetype'] == 'pdf')
                                            <div class="pdf_link">
                                                <i class="fa fa-file-pdf-o fa-3x"></i>
                                                <a href="{{$finalDocuments['property_photos'][$i]['url']}}" target="_blank">Click To View</a>
                                            </div>
                                        @else
                                            <img src="{{$finalDocuments['property_photos'][$i]['url']}}" width="100%" />
                                        @endif
                                    </div>
                                @endfor
                                
                                <div class="showProperyHiddenField" style="display: none;">
                                    <input type="hidden" id="property_photos_path" name="property[property_photos][document][]" value="">
                                    <input type="hidden" name="property[property_photos][_id]" value="">
                                </div>
                            @else
                                <input type="hidden" id="property_photos_path" name="property[property_photos][document][]" value="">
                                <input type="hidden" name="property[property_photos][_id]" value="">
                            @endif
                            <input type="hidden" id="count" name="count" value="{{$count}}">
                            <div class="error property_photos_error"></div>
                        </div>
                    </div>
                    
                        <div class="col-md-6 ">
                            <div class="form-group">
                            <label for="property_category" class="">Property Documents</label>
                            <input type="file" class="upload_document" name="index_2" id="index_2" @if(isset($finalDocuments) &&  array_key_exists('index_2', $finalDocuments)) disabled="true" @endif value="{{ (isset($finalDocuments) &&  array_key_exists('index_2', $finalDocuments)) ? $finalDocuments['index_2']['document']:'' }}">
                            <input type="hidden" id="index_2_path" name="property[index_2][document]" value="{{ (isset($finalDocuments) &&  array_key_exists('index_2', $finalDocuments)) ? $finalDocuments['index_2']['document']:'' }}" >
                            <input type="hidden" name="property[index_2][_id]" value="{{ (isset($finalDocuments) &&  array_key_exists('index_2', $finalDocuments)) ? $finalDocuments['index_2']['_id']:'' }}">
                            <input type="hidden" name="property[index_2][_id]" value="{{ (isset($finalDocuments) &&  array_key_exists('index_2', $finalDocuments)) ? $finalDocuments['index_2']['_id']:'' }}">
                            @if(isset($finalDocuments) && array_key_exists('index_2', $finalDocuments))
                                <div class="col-md-6">
                                     <a class="deleteDocument" href="javascript:;" data-id="{{$finalDocuments['index_2']['_id']}}" data-type="index_2" style="float: right;"><i class="fa fa-times" aria-hidden="true"></i></a>
                                     @if(isset($finalDocuments['index_2']['filetype']) && $finalDocuments['index_2']['filetype'] == 'pdf')
                                        <div class="pdf_link">
                                            <i class="fa fa-file-pdf-o fa-3x"></i>
                                            <a href="{{$finalDocuments['index_2']['url']}}" target="_blank">Click To View</a>
                                        </div>
                                    @else
                                        <img src="{{$finalDocuments['index_2']['url']}}" width="100%" />
                                    @endif
                                </div>
                            @endif
                            <div class="error index_2_error"></div>
                        </div>
                    </div>
                    
                        <div class="col-md-6 ">
                            <div class="form-group">
                            <label for="property_category" class="">Floor Plan</label>
                            <input type="file" class="upload_document"  name="floor_plan" id="floor_plan" @if(isset($finalDocuments) &&  array_key_exists('floor_plan', $finalDocuments)) disabled="true" @endif value="{{ (isset($finalDocuments) &&  array_key_exists('floor_plan', $finalDocuments)) ? $finalDocuments['floor_plan']['document']:'' }}">
                            <input type="hidden" id="floor_plan_path" name="property[floor_plan][document]" value="{{ (isset($finalDocuments) &&  array_key_exists('floor_plan', $finalDocuments)) ? $finalDocuments['floor_plan']['document']:'' }}">
                            <input type="hidden" name="property[floor_plan][_id]" value="{{ (isset($finalDocuments) &&  array_key_exists('floor_plan', $finalDocuments)) ? $finalDocuments['floor_plan']['_id']:'' }}">
                            @if(isset($finalDocuments) && array_key_exists('floor_plan', $finalDocuments))
                                <div class="col-md-6">
                                     <a class="deleteDocument" href="javascript:;" data-id="{{$finalDocuments['floor_plan']['_id']}}" data-type="floor_plan" style="float: right;"><i class="fa fa-times" aria-hidden="true"></i></a>
                                     @if(isset($finalDocuments['floor_plan']['filetype']) && $finalDocuments['floor_plan']['filetype'] == 'pdf')
                                        <div class="pdf_link">
                                            <i class="fa fa-file-pdf-o fa-3x"></i>
                                            <a href="{{$finalDocuments['floor_plan']['url']}}" target="_blank">Click To View</a>
                                        </div>
                                    @else
                                        <img src="{{$finalDocuments['floor_plan']['url']}}" width="100%" />
                                    @endif
                                </div>
                            @endif
                            <div class="error floor_plan_error"></div>
                        </div>
                    </div>
                    
                        <div class="col-md-6 ">
                            <div class="form-group">
                            <label for="property_category" class="">Insurance Policy</label>
                            <input type="file" class="upload_document" name="insurance_policy" id="insurance_policy" @if(isset($finalDocuments) &&  array_key_exists('insurance_policy', $finalDocuments)) disabled="true" @endif value="{{ (isset($finalDocuments) &&  array_key_exists('insurance_policy', $finalDocuments)) ? $finalDocuments['insurance_policy']['document']:'' }}">
                            <input type="hidden" id="insurance_policy_path" name="property[insurance_policy][document]" value="{{ (isset($finalDocuments) &&  array_key_exists('insurance_policy', $finalDocuments)) ? $finalDocuments['insurance_policy']['document']:'' }}">
                            <input type="hidden" name="property[insurance_policy][_id]" value="{{ (isset($finalDocuments) &&  array_key_exists('insurance_policy', $finalDocuments)) ? $finalDocuments['insurance_policy']['_id']:'' }}">
                            @if(isset($finalDocuments) && array_key_exists('insurance_policy', $finalDocuments))
                                <div class="col-md-6">
                                     <a class="deleteDocument" href="javascript:;" data-id="{{$finalDocuments['insurance_policy']['_id']}}" data-type="insurance_policy" style="float: right;"><i class="fa fa-times" aria-hidden="true"></i></a>
                                     @if(isset($finalDocuments['insurance_policy']['filetype']) && $finalDocuments['insurance_policy']['filetype'] == 'pdf')
                                        <div class="pdf_link">
                                            <i class="fa fa-file-pdf-o fa-3x"></i>
                                            <a href="{{$finalDocuments['insurance_policy']['url']}}" target="_blank">Click To View</a>
                                        </div>
                                    @else
                                        <img src="{{$finalDocuments['insurance_policy']['url']}}" width="100%" />
                                    @endif
                                </div>
                            @endif
                            <div class="error insurance_policy_error"></div>
                        </div>
                    </div>
                    
                        <div class="col-md-6 ">
                            <div class="form-group">
                            <label for="property_category" class="">Inspection Report</label>
                            <input type="file" class="upload_document" name="inspection_report" id="inspection_report" @if(isset($finalDocuments) &&  array_key_exists('inspection_report', $finalDocuments)) disabled="true" @endif value="{{ (isset($finalDocuments) &&  array_key_exists('inspection_report', $finalDocuments)) ? $finalDocuments['inspection_report']['document']:'' }}">
                            <input type="hidden" id="inspection_report_path" name="property[inspection_report][document]" value="{{ (isset($finalDocuments) &&  array_key_exists('inspection_report', $finalDocuments)) ? $finalDocuments['inspection_report']['document']:'' }}">
                            <input type="hidden" name="property[inspection_report][_id]" value="{{ (isset($finalDocuments) &&  array_key_exists('inspection_report', $finalDocuments)) ? $finalDocuments['inspection_report']['_id']:'' }}">
                            @if(isset($finalDocuments) && array_key_exists('inspection_report', $finalDocuments))
                                <div class="col-md-6">
                                     <a class="deleteDocument" href="javascript:;" data-id="{{$finalDocuments['inspection_report']['_id']}}" data-type="inspection_report" style="float: right;"><i class="fa fa-times" aria-hidden="true"></i></a>
                                     @if(isset($finalDocuments['inspection_report']['filetype']) && $finalDocuments['inspection_report']['filetype'] == 'pdf')
                                        <div class="pdf_link">
                                            <i class="fa fa-file-pdf-o fa-3x"></i>
                                            <a href="{{$finalDocuments['inspection_report']['url']}}" target="_blank">Click To View</a>
                                        </div>
                                    @else
                                        <img src="{{$finalDocuments['inspection_report']['url']}}" width="100%" />
                                    @endif
                                </div>
                            @endif
                            <div class="error inspection_report_error"></div>
                        </div>
                    </div>
                    
                        <div class="col-md-6 ">
                            <div class="form-group">
                            <label for="property_category" class="">13(2)</label>
                            <input type="file" class="upload_document" name="form_13_2" id="form_13_2" @if(isset($finalDocuments) &&  array_key_exists('form_13_2', $finalDocuments)) disabled="true" @endif value="{{ (isset($finalDocuments) &&  array_key_exists('form_13_2', $finalDocuments)) ? $finalDocuments['form_13_2']['document']:'' }}">
                            <input type="hidden" id="form_13_2_path" name="property[form_13_2][document]" value="{{ (isset($finalDocuments) &&  array_key_exists('form_13_2', $finalDocuments)) ? $finalDocuments['form_13_2']['document']:'' }}">
                            <input type="hidden" name="property[form_13_2][_id]" value="{{ (isset($finalDocuments) &&  array_key_exists('form_13_2', $finalDocuments)) ? $finalDocuments['form_13_2']['_id']:'' }}">
                            @if(isset($finalDocuments) && array_key_exists('form_13_2', $finalDocuments))
                                <div class="col-md-6">
                                     <a class="deleteDocument" href="javascript:;" data-id="{{$finalDocuments['form_13_2']['_id']}}" data-type="form_13_2" style="float: right;"><i class="fa fa-times" aria-hidden="true"></i></a>
                                     @if(isset($finalDocuments['form_13_2']['filetype']) && $finalDocuments['form_13_2']['filetype'] == 'pdf')
                                        <div class="pdf_link">
                                            <i class="fa fa-file-pdf-o fa-3x"></i>
                                            <a href="{{$finalDocuments['form_13_2']['url']}}" target="_blank">Click To View</a>
                                        </div>
                                    @else
                                        <img src="{{$finalDocuments['form_13_2']['url']}}" width="100%" />
                                    @endif
                                </div>
                            @endif
                            <div class="error form_13_2_error"></div>
                        </div>
                    </div>
                    
                        <div class="col-md-6 ">
                            <div class="form-group">
                            <label for="property_category" class="">13(4)</label>
                            <input type="file" class="upload_document" name="form_13_4" id="form_13_4" @if(isset($finalDocuments) &&  array_key_exists('form_13_4', $finalDocuments)) disabled="true" @endif value="{{ (isset($finalDocuments) &&  array_key_exists('form_13_4', $finalDocuments)) ? $finalDocuments['form_13_4']['document']:'' }}">
                            <input type="hidden" id="form_13_4_path" name="property[form_13_4][document]" value="{{ (isset($finalDocuments) &&  array_key_exists('form_13_4', $finalDocuments)) ? $finalDocuments['form_13_4']['document']:'' }}">
                            <input type="hidden" name="property[form_13_4][_id]" value="{{ (isset($finalDocuments) &&  array_key_exists('form_13_4', $finalDocuments)) ? $finalDocuments['form_13_4']['_id']:'' }}">
                            @if(isset($finalDocuments) && array_key_exists('form_13_4', $finalDocuments))
                                <div class="col-md-6">
                                     <a class="deleteDocument" href="javascript:;" data-id="{{$finalDocuments['form_13_4']['_id']}}" data-type="form_13_4" style="float: right;"><i class="fa fa-times" aria-hidden="true"></i></a>
                                     @if(isset($finalDocuments['form_13_4']['filetype']) && $finalDocuments['form_13_4']['filetype'] == 'pdf')
                                        <div class="pdf_link">
                                            <i class="fa fa-file-pdf-o fa-3x"></i>
                                            <a href="{{$finalDocuments['form_13_4']['url']}}" target="_blank">Click To View</a>
                                        </div>
                                    @else
                                        <img src="{{$finalDocuments['form_13_4']['url']}}" width="100%" />
                                    @endif
                                </div>
                            @endif
                            <div class="error form_13_4_error"></div>
                        </div>
                    </div>
                    
                        <div class="col-md-6 ">
                            <div class="form-group">
                            <label for="property_category" class="">DM Application</label>
                            <input type="file" class="upload_document" name="dm_application" id="dm_application" @if(isset($finalDocuments) &&  array_key_exists('dm_application', $finalDocuments)) disabled="true" @endif value="{{ (isset($finalDocuments) &&  array_key_exists('dm_application', $finalDocuments)) ? $finalDocuments['dm_application']['document']:'' }}">
                            <input type="hidden" id="dm_application_path" name="property[dm_application][document]" value="{{ (isset($finalDocuments) &&  array_key_exists('dm_application', $finalDocuments)) ? $finalDocuments['dm_application']['document']:'' }}">
                            <input type="hidden" name="property[dm_application][_id]" value="{{ (isset($finalDocuments) &&  array_key_exists('dm_application', $finalDocuments)) ? $finalDocuments['dm_application']['_id']:'' }}">
                            @if(isset($finalDocuments) && array_key_exists('dm_application', $finalDocuments))
                                <div class="col-md-6">
                                     <a class="deleteDocument" href="javascript:;" data-id="{{$finalDocuments['dm_application']['_id']}}" data-type="dm_application" style="float: right;"><i class="fa fa-times" aria-hidden="true"></i></a>
                                     @if(isset($finalDocuments['dm_application']['filetype']) && $finalDocuments['dm_application']['filetype'] == 'pdf')
                                        <div class="pdf_link">
                                            <i class="fa fa-file-pdf-o fa-3x"></i>
                                            <a href="{{$finalDocuments['dm_application']['url']}}" target="_blank">Click To View</a>
                                        </div>
                                    @else
                                        <img src="{{$finalDocuments['dm_application']['url']}}" width="100%" />
                                    @endif
                                </div>
                            @endif
                            <div class="error dm_application_error"></div>
                        </div>
                    </div>
                    
                        <div class="col-md-6 ">
                            <div class="form-group">
                            <label for="property_category" class="">DM Order</label>
                            <input type="file" class="upload_document" name="dm_order" id="dm_order" @if(isset($finalDocuments) &&  array_key_exists('dm_order', $finalDocuments)) disabled="true" @endif value="{{ (isset($finalDocuments) &&  array_key_exists('dm_order', $finalDocuments)) ? $finalDocuments['dm_order']['document']:'' }}">
                            <input type="hidden" id="dm_order_path" name="property[dm_order][document]" value="{{ (isset($finalDocuments) &&  array_key_exists('dm_order', $finalDocuments)) ? $finalDocuments['dm_order']['document']:'' }}">
                            <input type="hidden" name="property[dm_order][_id]" value="{{ (isset($finalDocuments) &&  array_key_exists('dm_order', $finalDocuments)) ? $finalDocuments['dm_order']['_id']:'' }}">
                            @if(isset($finalDocuments) && array_key_exists('dm_order', $finalDocuments))
                                <div class="col-md-6">
                                     <a class="deleteDocument" href="javascript:;" data-id="{{$finalDocuments['dm_order']['_id']}}" data-type="dm_order" style="float: right;"><i class="fa fa-times" aria-hidden="true"></i></a>
                                     @if(isset($finalDocuments['dm_order']['filetype']) && $finalDocuments['dm_order']['filetype'] == 'pdf')
                                        <div class="pdf_link">
                                            <i class="fa fa-file-pdf-o fa-3x"></i>
                                            <a href="{{$finalDocuments['dm_order']['url']}}" target="_blank">Click To View</a>
                                        </div>
                                    @else
                                        <img src="{{$finalDocuments['dm_order']['url']}}" width="100%" />
                                    @endif
                                </div>
                            @endif
                            <div class="error dm_order_error"></div>
                        </div>
                    </div>
                    
                        <div class="col-md-6 ">
                            <div class="form-group">
                            <label for="property_category" class="">Possession Order</label>
                            <input type="file" class="upload_document" name="possession_order" id="possession_order" @if(isset($finalDocuments) &&  array_key_exists('possession_order', $finalDocuments)) disabled="true" @endif value="{{ (isset($finalDocuments) &&  array_key_exists('possession_order', $finalDocuments)) ? $finalDocuments['possession_order']['document']:'' }}">
                            <input type="hidden" id="possession_order_path" name="property[possession_order][document]" value="{{ (isset($finalDocuments) &&  array_key_exists('possession_order', $finalDocuments)) ? $finalDocuments['possession_order']['document']:'' }}">
                            <input type="hidden" name="property[possession_order][_id]" value="{{ (isset($finalDocuments) &&  array_key_exists('possession_order', $finalDocuments)) ? $finalDocuments['possession_order']['_id']:'' }}">
                            @if(isset($finalDocuments) && array_key_exists('possession_order', $finalDocuments))
                                <div class="col-md-6">
                                     <a class="deleteDocument" href="javascript:;" data-id="{{$finalDocuments['possession_order']['_id']}}" data-type="possession_order" style="float: right;"><i class="fa fa-times" aria-hidden="true"></i></a>
                                     @if(isset($finalDocuments['possession_order']['filetype']) && $finalDocuments['possession_order']['filetype'] == 'pdf')
                                        <div class="pdf_link">
                                            <i class="fa fa-file-pdf-o fa-3x"></i>
                                            <a href="{{$finalDocuments['possession_order']['url']}}" target="_blank">Click To View</a>
                                        </div>
                                    @else
                                        <img src="{{$finalDocuments['possession_order']['url']}}" width="100%" />
                                    @endif
                                </div>
                            @endif
                            <div class="error possession_order_error"></div>
                        </div>
                    </div>
                    
                        <div class="col-md-6 ">
                            <div class="form-group">
                            <label for="property_category" class="">Possession Receipt</label>
                            <input type="file" class="upload_document" name="possession_receipt" id="possession_receipt" @if(isset($finalDocuments) &&  array_key_exists('possession_receipt', $finalDocuments)) disabled="true" @endif value="{{ (isset($finalDocuments) &&  array_key_exists('possession_receipt', $finalDocuments)) ? $finalDocuments['possession_receipt']['document']:'' }}">
                            <input type="hidden" id="possession_receipt_path" name="property[possession_receipt][document]" value="{{ (isset($finalDocuments) &&  array_key_exists('possession_receipt', $finalDocuments)) ? $finalDocuments['possession_receipt']['document']:'' }}">
                            <input type="hidden" name="property[possession_receipt][_id]" value="{{ (isset($finalDocuments) &&  array_key_exists('possession_receipt', $finalDocuments)) ? $finalDocuments['possession_receipt']['_id']:'' }}">
                            @if(isset($finalDocuments) && array_key_exists('possession_receipt', $finalDocuments))
                                <div class="col-md-6">
                                     <a class="deleteDocument" href="javascript:;" data-id="{{$finalDocuments['possession_receipt']['_id']}}" data-type="possession_receipt" style="float: right;"><i class="fa fa-times" aria-hidden="true"></i></a>
                                     @if(isset($finalDocuments['possession_receipt']['filetype']) && $finalDocuments['possession_receipt']['filetype'] == 'pdf')
                                        <div class="pdf_link">
                                            <i class="fa fa-file-pdf-o fa-3x"></i>
                                            <a href="{{$finalDocuments['possession_receipt']['url']}}" target="_blank">Click To View</a>
                                        </div>
                                    @else
                                        <img src="{{$finalDocuments['possession_receipt']['url']}}" width="100%" />
                                    @endif
                                </div>
                            @endif
                            <div class="error possession_receipt_error"></div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="property_category" class="">Panchanama</label>
                            <input type="file" class="upload_document" name="panchanama" id="panchanama" @if(isset($finalDocuments) &&  array_key_exists('panchanama', $finalDocuments)) disabled="true" @endif value="{{ (isset($finalDocuments) &&  array_key_exists('panchanama', $finalDocuments)) ? $finalDocuments['panchanama']['document']:'' }}">
                            <input type="hidden" id="panchanama_path" name="property[panchanama][document]" value="{{ (isset($finalDocuments) &&  array_key_exists('panchanama', $finalDocuments)) ? $finalDocuments['panchanama']['document']:'' }}">
                            <input type="hidden" name="property[panchanama][_id]" value="{{ (isset($finalDocuments) &&  array_key_exists('panchanama', $finalDocuments)) ? $finalDocuments['panchanama']['_id']:'' }}">
                            @if(isset($finalDocuments) && array_key_exists('panchanama', $finalDocuments))
                                <div class="col-md-6">
                                     <a class="deleteDocument" href="javascript:;" data-id="{{$finalDocuments['panchanama']['_id']}}" data-type="panchanama" style="float: right;"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    @if(isset($finalDocuments['panchanama']['filetype']) && $finalDocuments['panchanama']['filetype'] == 'pdf')
                                        <div class="pdf_link">
                                            <i class="fa fa-file-pdf-o fa-3x"></i>
                                            <a href="{{$finalDocuments['panchanama']['url']}}" target="_blank">Click To View</a>
                                        </div>
                                    @else
                                        <img src="{{$finalDocuments['panchanama']['url']}}" width="100%" />
                                    @endif
                                </div>
                            @endif
                            <div class="error panchanama_error"></div>
                        </div>
                    </div> 
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="property_category" class="">Feature Image</label>
                            <input type="file" class="upload_document" name="feature_image" id="feature_image" @if(isset($finalDocuments) &&  array_key_exists('feature_image', $finalDocuments)) disabled="true" @endif value="{{ (isset($finalDocuments) &&  array_key_exists('feature_image', $finalDocuments)) ? $finalDocuments['feature_image']['document']:'' }}">
                            <input type="hidden" id="feature_image_path" name="property[feature_image][document]" value="{{ (isset($finalDocuments) &&  array_key_exists('feature_image', $finalDocuments)) ? $finalDocuments['feature_image']['document']:'' }}">
                            <input type="hidden" name="property[feature_image][_id]" value="{{ (isset($finalDocuments) &&  array_key_exists('feature_image', $finalDocuments)) ? $finalDocuments['feature_image']['_id']:'' }}">
                            @if(isset($finalDocuments) && array_key_exists('feature_image', $finalDocuments))
                                <div class="col-md-6">
                                     <a class="deleteDocument" href="javascript:;" data-id="{{$finalDocuments['feature_image']['_id']}}" data-type="feature_image" style="float: right;"><i class="fa fa-times" aria-hidden="true"></i></a>
                                     @if(isset($finalDocuments['feature_image']['filetype']) && $finalDocuments['feature_image']['filetype'] == 'pdf')
                                        <div class="pdf_link">
                                            <i class="fa fa-file-pdf-o fa-3x"></i>
                                            <a href="{{$finalDocuments['feature_image']['url']}}" target="_blank">Click To View</a>
                                        </div>
                                    @else
                                        <img src="{{$finalDocuments['feature_image']['url']}}" width="100%" />
                                    @endif
                                </div>
                            @endif
                            <div class="error feature_image_error"></div>
                        </div>
                    </div>                      
                </div>
            </div>
            <div class=" card-footer">
                    @php
                    $steps_array = array_flip(config('template.steps.'.$template_id));
                    @endphp
                    <a href="{{ route('step'.$steps_array["8"],[$asset_id]) }}" class="btn btn-secondary btn-sm"
                        role="button">Back</a>
                    <button type="submit" class="btn btn-primary btn-sm">Save & Next</button>
                </div>
            
        </div>
        </form>
    </div>

</div>


@endsection

@push('js')
<script type="text/javascript">
    const STEP8_DELETE_URL = "{{ route('step8-delete')}}";
    const STEP8_UPLOAD_URL = "{{ route('step8-upload')}}";
</script>
<script src="{{URL::asset('admin/js/assets/step8.js')}}"></script>

@endpush