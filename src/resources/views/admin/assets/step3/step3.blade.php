@extends('admin.layouts.auth')

@section('title', 'Add Asset')

@push('progress-bar')

@include('admin.assets.progress-bar')

@endpush

@section('content')


<div class="row">
    <div class="col-24">
        <div class="card">
            <form method="POST" id="step3-form" action="{{ route('step3-post',$asset_id)}}">
                <div class="card-header">
                    <strong>Valuation Details
                        <span>{{ $property_id ? '('.$property_id.')':"" }}</span>
                    </strong>
                </div>
                @csrf
                <div class="card-body card-block">
                    <div class="row">
                        @if(in_array($template_id,config('template.sections.valuation')))
                        @include('admin.assets.step3.valuation')
                        @endif
                    </div>
                </div>
                <div class=" card-footer">
                    @php
                    $steps_array = array_flip(config('template.steps.'.$template_id));
                    @endphp
                    <a href="{{ route('step'.$steps_array["3"],[$asset_id]) }}" class="btn btn-secondary btn-sm"
                        role="button">Back</a>
                    <button type="submit" class="btn btn-primary btn-sm">Save & Next</button>
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