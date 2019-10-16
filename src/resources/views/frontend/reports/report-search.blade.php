@extends('frontend.layouts.auth')
@section('content')
<form action="{{ route('reports-filter') }}" id="filter-selection-form" method="post">
    @csrf
    @if(!empty($errors->all()))
    <div class="alert alert-danger fade show" data-auto-dismiss="3000">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <div>Please Select Alteast One</div>
    </div>
    @endif
    <ul class="search-form-main">
        <li>
            <select name="state[]" id="state" multiple="true">
                @foreach($branch_and_state['state'] as $k => $v)
                <option value="{{$k}}">{{$v}}</option>
                @endforeach
            </select>
        </li>
        <li>
            <select name="city[]" id="city" multiple="true">

            </select>
        </li>
        <li>
            <select name="pincode[]" id="pincode" multiple="true">

            </select>
        </li>
        <li>
            <select name="recovery_branch[]" id="recovery_branch" multiple="true">
                @foreach($branch_and_state['branch'] as $k => $v)
                <option value="{{$k}}">{{$v}}</option>
                @endforeach
            </select>
        </li>
        <li>
            <input type="submit" class="btn btn-primary" value="Search">
        </li>
    </ul>
</form>

@endsection



@push('js')
<script type="text/javascript">
    $('#city').select2({
        dropdownAutoWidth : true,
        width: '100%',
        placeholder: 'Select City',
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
        placeholder: 'Select Recovery Branch',
    });

    $('#pincode').select2({
        dropdownAutoWidth : true,
        width: '100%',
        placeholder: 'Select Pincode',
    });

    $('#state').select2({
        dropdownAutoWidth : true,
        width: '100%',
        placeholder: 'Select State',
    }).on('change.select2', function (e) {
        var stateid = $(e.currentTarget).val();
        var cityurl = '{{ route("city") }}';
        $.ajax({
            url:cityurl,
            type:"POST",
            data: {stateid:stateid,"_token": "{{ csrf_token() }}"},
            success: function (response) {
                $('#city').empty();
                $.map(response,function(city){
                    let $newOption = $("<option ></option>").val(city._id).text(city.city);
                    $('#city').append($newOption);
                });
                // $('#city').val(cityid).trigger('change');
            }
        });
    });
</script>

@endpush