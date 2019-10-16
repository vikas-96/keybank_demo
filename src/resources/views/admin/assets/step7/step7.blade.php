@extends('admin.layouts.auth')

@section('title', 'Add Asset')

@push('progress-bar')

@include('admin.assets.progress-bar')

@endpush

@section('content')


<div class="row">
    <div class="col-24">
        <div class="card">
            <form method="POST" id="step7-form" action="{{ route('step7-post',$asset_id)}}">
                @csrf
                <div class="card-header">
                    <strong>KAP Data
                        <span>{{ $property_id ? '('.$property_id.')':"" }}</span>
                    </strong>
                </div>
                <div class="card-body card-block">
                    <div class="row">
                        @if(in_array($template_id,config('template.sections.kap_data')))
                        @include('admin.assets.step7.kapdata')
                        @endif
                    </div>
                </div>
                <div class=" card-footer">
                    @php
                    $steps_array = array_flip(config('template.steps.'.$template_id));
                    @endphp
                    <a href="{{ route('step'.$steps_array["7"],[$asset_id]) }}" class="btn btn-secondary btn-sm"
                        role="button">Back</a>
                    <button type="submit" class="btn btn-primary btn-sm">Save & Next</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@push('js')

<script src="{{URL::asset('admin/js/assets/step7.js')}}"></script>

@endpush