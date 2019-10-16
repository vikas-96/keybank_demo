@extends('admin.layouts.auth')

@section('title', 'Add Asset')

@push('progress-bar')

@include('admin.assets.progress-bar')

@endpush

@section('content')


<div class="row">
    <div class="col-24">
        <div class="card">
            <form method="POST" id="step6-form" action="{{ route('step6-post',$asset_id)}}">
                @csrf
                <div class="card-header">
                    <strong>Other Details
                        <span>{{ $property_id ? '('.$property_id.')':"" }}</span>
                    </strong>
                </div>
                <div class="card-body card-block">
                    <div class="row">
                        @include('admin.assets.step6.other_known_encumbrances')
                        @include('admin.assets.step6.other_dues')
                        @include('admin.assets.step6.legal_issue_by_borrower')
                        @include('admin.assets.step6.sarfaesi_related')
                        @include('admin.assets.step6.insurance_data_policy')
                        @include('admin.assets.step6.inspection_data_logs')
                        @include('admin.assets.step6.other_information')
                        @include('admin.assets.step6.recorded_by')
                        @include('admin.assets.step6.entry_status')
                    </div>
                </div>
                <div class=" card-footer">
                    @php
                    $steps_array = array_flip(config('template.steps.'.$template_id));
                    @endphp
                    <a href="{{ route('step'.$steps_array["6"],[$asset_id]) }}" class="btn btn-secondary btn-sm"
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
        $('.datetimepicker').datetimepicker({
                format: 'YYYY/MM/DD HH:mm'
        });
        $('.datepicker').datepicker({
            //startDate: new Date(),
            todayHighlight: true,
            //startDate: '+1d',
            format: 'dd/mm/yyyy',
            autoclose: true,
        });
    });

</script>

@endpush