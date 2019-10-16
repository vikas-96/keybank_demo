@extends('admin.layouts.auth')

@section('title', 'Add Asset')

@push('progress-bar')

@include('admin.assets.progress-bar')

@endpush

@section('content')


<div class="row">
    <div class="col-24">
        <div class="card">
            <form method="POST" id="step5-form" action="{{ route('step5-post',$asset_id)}}">
                @csrf
                <div class="card-header">
                    <strong>Upcoming & Past Auction Details
                        <span>{{ $property_id ? '('.$property_id.')':"" }}</span>
                    </strong>
                </div>
                <div class="card-body card-block">
                    <div class="row">
                        @if(in_array($template_id,config('template.sections.upcoming_auction')))
                        @include('admin.assets.step5.upcoming_auction')
                        @endif

                        @if(in_array($template_id,config('template.sections.past_auction')))
                        @include('admin.assets.step5.past_auction')
                        @endif
                    </div>
                </div>
                <div class=" card-footer">
                    @php
                    $steps_array = array_flip(config('template.steps.'.$template_id));
                    @endphp
                    <a href="{{ route('step'.$steps_array["5"],[$asset_id]) }}" class="btn btn-secondary btn-sm"
                        role="button">Back</a>
                    <button type="submit" class="btn btn-primary btn-sm">Save & Next</button>
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
        $('.form_datetime').datetimepicker({
            startDate: new Date(),
            format: 'dd/mm/yyyy hh:ii',
            autoclose: true,
            pickerPosition: "bottom-left"
        });
        $('.upcoming_date').datepicker({
            startDate: new Date(),
            todayHighlight: true,
            //startDate: '+1d',
            format: 'dd/mm/yyyy',
            autoclose: true,
        });
    });

</script>

@endpush