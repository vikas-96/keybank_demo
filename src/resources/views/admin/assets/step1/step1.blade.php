@extends('admin.layouts.auth')

@section('title', 'Add Asset')

@push('progress-bar')

@include('admin.assets.progress-bar')

@endpush

@push('css')
<style type="text/css">
    .text_capital {
        text-transform: capitalize;
    }
</style>
@endpush
@section('content')
<div class="row">
    <div class="col-24">
        <div class="card">
            <div class="card-header">
                <strong>Primary Data & Account Info
                    <span>{{ $property_id ? '('.$property_id.')':"" }}</span>

                </strong>
            </div>
            <div class="card-body card-block">
                <form method="POST" id="step1_form" action="{{ route('step1-post',$asset_id) }}" class="row">
                    @csrf
                    <div class="col-md-24 section-heading">
                        <h5>Primary Data</h5>
                    </div>
                    <input type="hidden" name="template_id" id="template_id"
                        value="{{old('template_id',$template_id)}}">
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="property_category" class="required">Property Category</label>
                            <input type="text" class="form-control text_capital" readonly name="customer[property_category]"
                                id="property_category" value="{{old('customer.property_category',$property_category)}}">
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label class="required" for="property_type">Property Type</label>
                            <input type="text" class="form-control text_capital" readonly name="customer[property_type]"
                                id="property_type" value="{{old('customer.property_type',$property_type)}}">
                        </div>
                    </div>
                    @if(old('customer.property_sub_type',($property_sub_type)??null))
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label class="required" for="property_sub_type">Property Sub Type</label>
                            <input type="hidden" class="form-control text_capital" readonly name="customer[property_sub_type]"
                                id="property_sub_type" value="{{old('customer.property_sub_type',$property_sub_type)}}">
                            <input type="text" class="form-control text_capital" readonly name="property_sub_type_text"
                                id="property_sub_type_text" value="{{config('assets.'.$property_type.'.'.old('customer.property_sub_type',$property_sub_type))}}">
                        </div>
                    </div>
                    @endif
                    @if(old('customer.description',$description) && (isset($property_type) && ($property_type ==
                    'vehicles' ||
                    $property_type == 'stock' || $property_type == 'others')))
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label class="required" for="description">Description</label>
                            <input type="text" class="form-control" readonly name="customer[description]"
                                id="description" value="{{old('customer.description',$description)}}">
                        </div>
                    </div>
                    @endif
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="cersai_number">CERSAI Number</label>
                            <input type="text" class="form-control" name="customer[cersai_number]" id="cersai_number"
                                value="{{old('customer.cersai_number',($assets['customer']['cersai_number'] ?? null))}}">
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label class="required" for="lender_name">Name of Lender</label>
                            <select name="customer[lender_name]" id="lender_name">
                                <option value="" selected>Select Bank</option>
                                @foreach($banklist_and_state['banklist'] as $k => $v)
                                @if(old('customer.lender_name',($assets['customer']['lender_name']['_id'] ?? null))
                                == $k)
                                <option value="{{$k}}" selected>{{$v}}</option>
                                @else
                                <option value="{{$k}}">{{$v}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="owner_name">Name of Owner:</label>
                            <input type="text" name="customer[owner_name]" id="owner_name"
                                value="{{old('customer.owner_name',($assets['customer']['owner_name'] ?? null))}}">
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label nclt for="is_nclt" class="required">Has Account Been Referred to NCLT</label>
                            <select name="customer[is_nclt]" id="is_nclt">
                                <option value="">Select an option</option>
                                @foreach (config('assets.yes_no_options') as $k=>$v )
                                <option value={{$k}}
                                    {{(old('customer.is_nclt',($assets['customer']['is_nclt'] ?? null))==$k)?'selected':''}}>
                                    {{$v}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-group date past_date col-md-6" data-provide="datepicker"
                        data-date-format="dd/mm/yyyy">
                        <div class="form-group">
                            <label for="referral_date">Date of Referral</label>
                            <div class="date-picker"><input type="text" class="form-control"
                                    name="customer[referral_date]" id="referral_date"
                                    value="{{old('customer.referral_date',($assets['customer']['referral_date'] ?? null))}}">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label class="required" for="migrating_branch">Migrating Branch</label>     
                            <select name="customer[migrating_branch]" id="migrating_branch">
                                <option value="">Select Migrating Branch</option>
                                @foreach($migrating_branchs as $branch)
                                @if(old('customer.migrating_branch',($assets['customer']['migrating_branch']['_id'] ??
                                null)) == $branch['_id'])
                                 <option value="{{$branch['_id']}}" selected>{{$branch['name']}}</option>
                                @else
                                    <option value="{{$branch['_id']}}">{{$branch['name']}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label class="required" for="recovery_branch">Recovery Branch</label>
                            <select name="customer[recovery_branch]" id="recovery_branch">
                                <option value="">Select Branch</option>
                                @foreach($banklist_and_state['branch'] as $k => $v)
                                @if(old('customer.recovery_branch',($assets['customer']['recovery_branch']['_id'] ??
                                null)) == $k)
                                <option value="{{$k}}" selected>{{$v}}</option>
                                @else
                                <option value="{{$k}}">{{$v}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-group date past_date col-md-6" data-provide="datepicker"
                        data-date-format="dd/mm/yyyy">
                        <div class="form-group">
                            <label class="required" for="recall_date">Recall Date</label>
                            <div class="date-picker"><input type="text" class="form-control"
                                    name="customer[recall_date]" id="recall_date"
                                    value="{{old('customer.recall_date',($assets['customer']['recall_date'] ?? null))}}">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label class="required" for="clo_name">Case Lead Officer Name</label>
                            <select name="customer[clo_name]" id="clo_name">
                                <option
                                    value="{{old('customer.clo_name',($assets['customer']['clo_name']['_id'] ?? null))}}"
                                    selected>{{old('clo_text',($assets['customer']['clo_name']['name'] ?? null))}}
                                </option>
                            </select>
                            <input type="hidden" name="clo_text" id="clo_text"
                                value="{{old('clo_text',($assets['customer']['clo_name']['name'] ?? null))}}">
                        </div>
                    </div>

                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="clo_number">Case Lead Officer No.</label>
                            <input type="number" name="customer[clo_number]" id="clo_number"
                                value="{{old('customer.clo_number',($assets['customer']['clo_name']['contact'] ?? null))}}"
                                readonly>
                        </div>
                    </div>

                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="clo_email">Case Lead Officer Email</label>
                            <input type="email" name="customer[clo_email]" id="clo_email"
                                value="{{old('customer.clo_email',($assets['customer']['clo_name']['email'] ?? null))}}"
                                readonly>
                        </div>
                    </div>


                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label class="required" for="co_name">Case Officer Name</label>
                            <select name="customer[co_name]" id="co_name">
                                <option
                                    value="{{old('customer.co_name',($assets['customer']['co_name']['_id'] ?? null))}}"
                                    selected>{{old('co_text',($assets['customer']['co_name']['name'] ?? null))}}
                                </option>
                            </select>
                            <input type="hidden" name="co_text" id="co_text"
                                value="{{old('co_text',($assets['customer']['co_name']['name'] ?? null))}}">
                        </div>
                    </div>

                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="co_numbet">Case Officer No.</label>
                            <input type="number" name="customer[co_number]" id="co_number"
                                value="{{old('customer.co_number',($assets['customer']['co_name']['contact'] ?? null))}}"
                                readonly>
                        </div>
                    </div>

                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="co_email">Case Officer Email</label>
                            <input type="email" name="customer[co_email]" id="co_email"
                                value="{{old('customer.co_email',($assets['customer']['co_name']['email'] ?? null))}}"
                                readonly>
                        </div>
                    </div>
                    @include('admin.assets.step1.loan')


                    @if(in_array($template_id,config('template.sections.address')))
                    @include('admin.assets.step1.address')
                    @endif

                    @if(in_array($template_id,config('template.sections.stock_other')))
                    @include('admin.assets.step1.stock_other_template')
                    @endif
            </div>

            @if(in_array($template_id,config('template.sections.stock_other')))
            <div class=" card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    Submit
                </button>
            </div>
            @else
            <div class=" card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    Save & Next
                </button>
            </div>
            @endif
        </div>
        </form>
    </div>
</div>

</div>


@endsection

@push('js')
<script>
    $(document).ready(function(){

    

    $('#lender_name').select2({       
        dropdownAutoWidth : true,
        width: '100%'
    });
    $('#recovery_branch, #is_nclt ,#migrating_branch ,#micromarket').select2({       
        dropdownAutoWidth : true,
        placeholder: 'Select an option',
        width: '100%'
    });
    $('#clo_text').val($('#clo_name').text());
    $('#clo_name').select2({       
        dropdownAutoWidth : true,
        width: '100%',
        placeholder: 'Enter keywords to search..',
        ajax: getMasterData('{{route("search-caseleadofficer")}}')
    }).on('select2:select', function (e) {
        var data = e.params.data;
        $('#clo_number').val(data.contact);
        $('#clo_email').val(data.email);
        $('#clo_text').val(data.text);
    });

    $('#co_text').val($('#co_name').text());
    $('#co_name').select2({       
        dropdownAutoWidth : true,
        width: '100%',
        placeholder: 'Enter keywords to search..',
        ajax: getMasterData('{{route("search-caseofficer")}}')
    }).on('select2:select', function (e) {
        var data = e.params.data;
        $('#co_number').val(data.contact);
        $('#co_email').val(data.email);
        $('#co_text').val(data.text);
    });

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

    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });
    
});
</script>

@endpush