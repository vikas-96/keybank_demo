<div class="nav-wrapper">
    <div class="container">
        <form action="{{ route('reports-filter') }}" id="filter-selection-form" method="post">
            @csrf
            @if(!empty($errors->all()))
            <div class="alert alert-danger fade show" data-auto-dismiss="3000">
                <div>Please Select Alteast One</div>
            </div>
            @endif
            <div class="row">
                <div class="col-lg-24">
                    <ul class="search-form-header">
                        <li>
                            <select class="form-control" name="state[]" id="state" multiple="true">
                                @foreach($branch_and_state['state'] as $k => $v)
                                @if(in_array($k,(Session::get('reportsfilter.state')) ?? []))
                                <option value="{{$k}}" selected>{{$v}}</option>
                                @else
                                <option value="{{$k}}">{{$v}}</option>
                                @endif
                                @endforeach
                            </select>
                        </li>
                        <li>
                            <select class="form-control" name="city[]" id="city" multiple="true">

                            </select>
                        </li>
                        <li>
                            <select class="form-control" name="pincode[]" id="pincode" multiple="true">

                            </select>
                        </li>
                        <li>
                            <select class="form-control" name="recovery_branch[]" id="recovery_branch" multiple="true">
                                @foreach($branch_and_state['branch'] as $k => $v)
                                @if(in_array($k,(Session::get('reportsfilter.recovery_branch')) ?? []))
                                <option value="{{$k}}" selected>{{$v}}</option>
                                @else
                                <option value="{{$k}}">{{$v}}</option>
                                @endif
                                @endforeach
                            </select>
                        </li>
                        <li>
                            <input type="submit" class="btn btn-primary" value="Search">
                            <!-- <a href="/assets" class="btn btn-primary">Back to Admin</a> -->
                        </li>
                    </ul>
                </div>
            </div>
        </form>

    </div>
</div>

@push('js')
<script type="text/javascript">
    let cityid = '<?php  echo json_encode(Session::get('reportsfilter.city')) ?>';
    let stateid = '<?php echo json_encode(Session::get('reportsfilter.state')) ?>';
    let pincode = '<?php  echo json_encode(Session::get('reportsfilter.pincode')) ?>';

    $(document).ready(function(){
        if(stateid != "null"){
            $('#state').val(JSON.parse(stateid)).trigger('change.select2');
        }
        if(cityid != "null"){
            $('#city').val(JSON.parse(cityid)).trigger('change.select2');
        }
    });

    $('#pincode').select2({
        dropdownAutoWidth : true,
        width: '100%',
        placeholder: 'Select Pincode',
    });

    $('#recovery_branch').select2({
        dropdownAutoWidth : true,
        width: '100%',
        placeholder: 'Select Recovery Branch',
    })

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
                $('#city').val(JSON.parse(cityid)).trigger('change');
            }
        });
    });

    // }).on('select2:close', function (e) {
    //     if(e.currentTarget.value == 'all'){
    //         var st = $('#state > option').prop("selected",true);
    //         $('#state').trigger('change');
    //     }
    // });

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
                $('#pincode').val(JSON.parse(pincode)).trigger('change');
            }
        });
    });
</script>


@endpush