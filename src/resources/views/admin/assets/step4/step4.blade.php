@extends('admin.layouts.auth')

@section('title', 'Add Asset')

@push('progress-bar')

@include('admin.assets.progress-bar')

@endpush

@section('content')


<div class="row">
    <div class="col-24">
        <div class="card">
            <form method="POST" id="step4-form" action="{{ route('step4-post',$asset_id) }}" style="width:100%">
                <div class="card-header">
                    <strong>Third Party Information
                        <span>{{ $property_id ? '('.$property_id.')':"" }}</span>
                    </strong>
                </div>
                @csrf
                <div class="card-body card-block">
                    <div class="row">
                        @if(in_array($template_id,config('template.sections.third_party_info')))
                        @include('admin.assets.step4.third_party_info')
                        @endif
                    </div>
                </div>
                <div class=" card-footer">
                    @php
                    $steps_array = array_flip(config('template.steps.'.$template_id));
                    @endphp
                    <a href="{{ route('step'.$steps_array["4"],[$asset_id]) }}" class="btn btn-secondary btn-sm"
                        role="button">Back</a>
                    <button type="submit" class="btn btn-primary btn-sm">
                        Save & Next
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection @push('js') <script>
    $(document).ready(function(){

    $('.cs-select').select2({
    dropdownAutoWidth : true,
    width: '100%',
    placeholder: 'Select an option',

    });

    $('.cs-select-multi').select2({
    dropdownAutoWidth : true,
    multiple:true,
    width: '100%',
    placeholder: 'Select an option',

    });
    });

</script>

@endpush