@extends('admin.layouts.auth')

@section('title', 'Add Asset')

@push('progress-bar')

@include('admin.assets.progress-bar')

@endpush
@section('content')

<div class="row">
    <div class="col-24">
        <div class="card">
            <form method="POST" id="step2-form" action="{{ route('step2-post',$asset_id)}}" style="width:100%">
                <div class="card-header">
                    <strong>Property Details
                        <span>{{ $property_id ? '('.$property_id.')':"" }}</span>
                    </strong>
                </div>
                <div class="card-body card-block">
                    <div class="row">
                        @csrf
                        <input type="hidden" name="template_id" id="template_id"
                            value="{{old('template_id',$template_id)}}">
                        @if(in_array($template_id,config('template.sections.size')))
                        @include('admin.assets.step2.size')
                        @endif

                        @if(in_array($template_id,config('template.sections.vehicle')))
                        @include('admin.assets.step2.vehicle')
                        @endif

                        @if(in_array($template_id,config('template.sections.configuration')))
                        @include('admin.assets.step2.configuration')
                        @endif

                        @if(in_array($template_id,config('template.sections.unit')))
                        @include('admin.assets.step2.unit')
                        @endif

                        @if(in_array($template_id,config('template.sections.building')))
                        @include('admin.assets.step2.building-information')
                        @endif

                        @if(in_array($template_id,config('template.sections.plot')))
                        @include('admin.assets.step2.plot')
                        @endif

                        @if(in_array($template_id,config('template.sections.office_detail')))
                        @include('admin.assets.step2.office_detail')
                        @endif

                        @if(in_array($template_id,config('template.sections.general_mall_information')))
                        @include('admin.assets.step2.general_mall_information')
                        @endif

                        @if(in_array($template_id,config('template.sections.amenities')))
                        @include('admin.assets.step2.basic-amenties')
                        @endif

                        @if(in_array($template_id,config('template.sections.occupancy')))
                        @include('admin.assets.step2.occupancy')
                        @endif

                        @if(in_array($template_id,config('template.sections.charges')))
                        @include('admin.assets.step2.charges')
                        @endif

                        @if(in_array($template_id,config('template.sections.pricing')))
                        @include('admin.assets.step2.pricing')
                        @endif


                        @if(in_array($template_id,config('template.sections.neighbourhood')))
                        @include('admin.assets.step2.neighbourhood')
                        @endif

                        @if(in_array($template_id,config('template.sections.oc')))
                        @include('admin.assets.step2.oc')
                        @endif

                        @if(in_array($template_id,config('template.sections.other')))
                        @include('admin.assets.step2.other')
                        @endif
                    </div>
                </div>
                <div class=" card-footer">
                    @php
                    $steps_array = array_flip(config('template.steps.'.$template_id));
                    @endphp
                    <a href="{{ route('step'.$steps_array["2"],[$asset_id]) }}" class="btn btn-secondary btn-sm"
                        role="button">Back</a>
                    <button type="submit" class="btn btn-primary btn-sm ">
                        Save & Next
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@push('js')
<script>
    $(document).ready(function(){

        $('.cs-select').select2({       
            dropdownAutoWidth : true,
            allowClear : true,
			width: '100%',
            placeholder: 'Select an option',
           
        });
        
        $('.cs-select-multi').select2({       
            dropdownAutoWidth : true,
            multiple:true,
			width: '100%',
            placeholder: 'Select an option',
           
        });

        $(document).on('click', '.remove-tr', function(){  
            $(this).parents('tr').remove();
        });
    });

</script>

@endpush