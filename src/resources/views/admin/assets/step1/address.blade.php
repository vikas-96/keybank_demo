<div class="col-md-24 section-heading">
    <h5>Address</h5>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="plot_no">Plot No.</label>
        <input type="text" name="address[plot_no]" id="plot_no"
            value="{{old('address.plot_no',($assets['address']['plot_no'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="survey_no">Survey No.</label>
        <input type="text" name="address[survey_no]" id="survey_no"
            value="{{old('address.survey_no',($assets['address']['survey_no'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="hissa_no">Hissa No.</label>
        <input type="text" name="address[hissa_no]" id="hissa_no"
            value="{{old('address.hissa_no',($assets['address']['hissa_no'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="unit_no">Unit No.</label>
        <input type="text" name="address[unit_no]" id="unit_no"
            value="{{old('address.unit_no',($assets['address']['unit_no'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="building_name">Building Name</label>
        <input type="text" name="address[building_name]" id="building_name"
            value="{{old('address.building_name',($assets['address']['building_name'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="rera">RERA #(If Applicable)</label>
        <input type="text" name="address[rera]" id="rera"
            value="{{old('address.rera',($assets['address']['rera'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="floor">Floor</label>
        <input type="text" name="address[floor]" id="floor"
            value="{{old('address.floor',($assets['address']['floor'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="wing">Wing</label>
        <input type="text" name="address[wing]" id="wing"
            value="{{old('address.wing',($assets['address']['wing'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="street_name">Street Name</label>
        <input type="text" name="address[street_name]" id="street_name"
            value="{{old('address.street_name',($assets['address']['street_name'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="locality">Locality</label>
        <input type="text" name="address[locality]" id="locality"
            value="{{old('address.locality',($assets['address']['locality'] ?? null))}}">
    </div>
</div>
{{-- <div class="col-md-6 ">
    <div class="form-group">
        <label for="micromarket">Micromarket</label>
        <input type="text" name="address[micromarket]" id="micromarket"
            value="{{old('address.micromarket',($assets['address']['micromarket'] ?? null))}}">
    </div>
</div> --}}
<div class="col-md-6 ">
    <div class="form-group">
        <label class="" for="micromarket">Micromarket</label>     
        <select name="address[micromarket]" id="micromarket">
            <option value="">Select Micromarket</option>
            @foreach($micromarkets as $micromarket)
            @if(old('address.micromarket',($assets['address']['micromarket']['_id'] ??
            null)) == $micromarket['_id'])
             <option value="{{$micromarket['_id']}}" selected>{{$micromarket['name']}}</option>
            @else
                <option value="{{$micromarket['_id']}}">{{$micromarket['name']}}</option>
            @endif
            @endforeach
        </select>
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label class="required" for="state">State</label>
        <select name="address[state]" id="state">
            <option value="">Select State</option>
            @foreach($banklist_and_state['state'] as $k => $v)
            @if(old('address.state',($assets['address']['state']['_id'] ?? null)) == $k)
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
        <label for="city">City</label>
        <select name="address[city]" id="city">
            <option value="">Select City</option>

        </select>
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label class="required" for="district">District</label>
        <input type="text" name="address[district]" id="district"
            value="{{old('address.district',($assets['address']['district'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label class="required" for="pincode">Pincode</label>
        <input type="number" name="address[pincode]" id="pincode"
            value="{{old('address.pincode',($assets['address']['pincode'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label class="required" for="property_address">Address of property</label>
        <input type="text" name="address[property_address]" id="property_address"
            value="{{old('address.property_address',($assets['address']['property_address'] ?? null))}}">
    </div>
</div>
@if(in_array($template_id,config('template.address.ward')))
<div class="col-md-6 ">
    <div class="form-group">
        <label for="village">Ward</label>
        <input type="text" name="address[ward]" id="village"
            value="{{old('address.ward',($assets['address']['ward'] ?? null))}}">
    </div>
</div>
@endif
<div class="col-md-6 ">
    <div class="form-group">
        <label for="village">Village</label>
        <input type="text" name="address[village]" id="village"
            value="{{old('address.village',($assets['address']['village'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="taluka">Taluka</label>
        <input type="text" name="address[taluka]" id="taluka"
            value="{{old('address.taluka',($assets['address']['taluka'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="other">Other</label>
        <input type="text" name="address[other]" id="other"
            value="{{old('address.other',($assets['address']['other'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="landmark">Landmark</label>
        <input type="text" name="address[landmark]" id="landmark"
            value="{{old('address.landmark',($assets['address']['landmark'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="latitude">Latitude</label>
        <input type="text" name="address[latitude]" id="latitude"
            value="{{old('address.latitude',($assets['address']['latitude'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="longitude">Longitude</label>
        <input type="text" name="address[longitude]" id="longitude"
            value="{{old('address.longitude',($assets['address']['longitude'] ?? null))}}">
    </div>
</div>


@push('js')
<script type="text/javascript">
    let cityid = "<?php echo old('address.city',($assets['address']['city']['_id'] ?? null)) ?>";
    let stateid = "<?php echo old('address.state',($assets['address']['state']['_id'] ?? null)) ?>";

    $(document).ready(function(){
        $('#state').val(stateid).trigger('change.select2');
    });

    $('#city').select2({       
        dropdownAutoWidth : true,
        width: '100%',
    });

    $('#state').select2({       
        dropdownAutoWidth : true,
        width: '100%',
    }).on('change.select2', function (e) {
        var stateid = e.target.value;
        var cityurl = '{{ route("get-city", ":id") }}'; 
        cityurl = cityurl.replace(':id', stateid);
        $.ajax({
            url:cityurl,
            type:"GET",
            success: function (response) {
                $('#city').empty();
                $.map(response,function(value){
                    let $newOption = $("<option ></option>").val(value._id).text(value.city);
                    $('#city').append($newOption);
                });
                $('#city').val(cityid).trigger('change');
            }
        });
    });


</script>
@endpush