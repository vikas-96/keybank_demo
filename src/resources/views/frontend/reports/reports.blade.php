@extends('frontend.layouts.auth')
@section('content')
        @php $report_type = (Session::get('report_type') ?? null) @endphp <!-- report type session -->

        @if($report_type == 'property_type')
            @include('frontend.reports.partials.property_type_report')
        @endif
        @if($report_type == 'property_sub_type')
            @include('frontend.reports.partials.property_subtype_report')
        @endif
        @if($report_type == 'area_pincode')
            @include('frontend.reports.partials.area_pincode_report')
        @endif
        @if($report_type == 'reserve_price')
            @include('frontend.reports.partials.reserve_price_report')
        @endif
        @if($report_type == 'kap_price')
            @include('frontend.reports.partials.kap_price_report')
        @endif
        @if($report_type == 'area_spread')
            @include('frontend.reports.partials.area_spread_report')
        @endif
        @if($report_type == 'marketability')
            @include('frontend.reports.partials.marketability_report')
        @endif
        @if($report_type == 'possession_type')
            @include('frontend.reports.partials.possession_type_report')
        @endif
        @if($report_type == 'auction')
            @include('frontend.reports.partials.auction_report')
        @endif
@endsection

@push('js')

    <script type="text/javascript">

        $('#city').select2({       
            dropdownAutoWidth : true,
            width: '100%',
        }).on('change.select2', function (e) {
            var cityid = $(e.currentTarget).val();
            var pincodeurl = '{{ route("pincode") }}'; 
            $.ajax({
                url:pincodeurl,
                type:"POST",
                data: {cityid:cityid,"_token": "{{ csrf_token() }}"},
                success: function (response) {
                    $('#pincode').empty();
                    $.map(response,function(pincode){
                        let $newOption = $("<option></option>").val(pincode).text(pincode);
                        $('#pincode').append($newOption);
                    });
                    // $('#city').val(cityid).trigger('change');
                }
            });
        });

        $('#recovery_branch').select2({       
            dropdownAutoWidth : true,
            width: '100%',
        });

        $('#pincode').select2({       
            dropdownAutoWidth : true,
            width: '100%',
        });

        $('#state').select2({       
            dropdownAutoWidth : true,
            width: '100%',
        }).on('change.select2', function (e) {
            var stateid = $(e.currentTarget).val();
            var cityurl = '{{ route("city") }}'; 
            $.ajax({
                url:cityurl,
                type:"POST",
                data: {stateid:stateid,"_token": "{{ csrf_token() }}"},
                success: function (response) {
                    $('#city').empty();
                    $.map(response,function(city,id){
                        let $newOption = $("<option ></option>").val(id).text(city);
                        $('#city').append($newOption);
                    });
                    // $('#city').val(cityid).trigger('change');
                }
            });
        });
        </script>
@endpush