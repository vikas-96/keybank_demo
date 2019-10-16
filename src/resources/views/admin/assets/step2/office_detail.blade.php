    <div class="col-md-24 section-heading">
        @if($template_id == 'T7')
        <h5>Details of Individual Units, Offices and Shops</h5>
        @else
        <h5>Details of Flats and Shops</h5>
        @endif
    </div>
    <?php
        // $office_detail = old('office_detail')!==null?count(old('office_detail')):1;
        $office_detail = (old('office_detail',($assets['office_detail'] ?? null))!==null) && (!empty(old('office_detail',($assets['office_detail'] ?? null))))?count(old('office_detail',($assets['office_detail'] ?? null))):1;
    ?>
        <table class="table" id="dynamicTable-office-detail">
            <tr>
                <!-- <th>Sr. No.</th> -->
                <th>Flat No./Shop No./Office No.</th>
                <th>Description</th>
                <th>Type of Area</th>
                <th>Area</th>
                <th>Unit</th>
                <th>Has unit been sold?</th>
                <th>Market Value</th>
                <th></th>
            </tr>
            <div class="elements">
                @for($k = 0; $k < $office_detail; $k++) 
                    @php 
                        $area_type=old('office_detail.'.$k.'.area_type',($assets['office_detail'][$k]['area_type'] ?? null));
                        $unit_sold=old('office_detail.'.$k.'.unit_sold',($assets['office_detail'][$k]['unit_sold'] ?? null)); 
                    @endphp 
                    <tr id="office_detail_{{$k}}">
                        <td><input type="text" id="office_no_{{$k}}" name="office_detail[{{$k}}][office_no]"
                                class="form-control" value="{{ old('office_detail.'.$k.'.office_no',($assets['office_detail'][$k]['office_no'] ?? null)) }}" />
                        </td>
                        <td><input type="text" id="description_{{$k}}" name="office_detail[{{$k}}][description]"
                                class="form-control" value="{{ old('office_detail.'.$k.'.description',($assets['office_detail'][$k]['description'] ?? null)) }}" />
                        </td>
                        <td>
                            <select name="office_detail[{{$k}}][area_type]" id="area_type_{{$k}}" class="cs-select">
                                <option value="">Select</option>
                                <option value="carpet" {{($area_type == 'carpet')?"selected":''}}>Carpet Area</option>
                                <option value="builtup" {{($area_type == 'builtup')?"selected":''}}>Builtup Area</option>
                                <option value="super_builtup" {{($area_type == 'super_builtup')?"selected":''}}>Super
                                    Builtup Area</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" id="area_{{$k}}" name="office_detail[{{$k}}][area]" class="form-control"
                                value="{{ old('office_detail.'.$k.'.area',($assets['office_detail'][$k]['area'] ?? null)) }}" />
                        </td>
                        <td>
                            <input type="text" id="unit_{{$k}}" name="office_detail[{{$k}}][unit]" class="form-control"
                                value="{{ old('office_detail.'.$k.'.unit',($assets['office_detail'][$k]['unit'] ?? null)) }}" />
                        </td>
                        <td>
                            <select name="office_detail[{{$k}}][unit_sold]" id="unit_sold_{{$k}}" class="cs-select">
                                <option value="">Select</option>
                                <option value="yes" {{($unit_sold == 'yes')?"selected":''}}>Yes</option>
                                <option value="no" {{($unit_sold == 'no')?"selected":''}}>No</option>
                                <option value="unknown" {{($unit_sold == 'unknown')?"selected":''}}>Unknown</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" id="market_value_{{$k}}" name="office_detail[{{$k}}][market_value]"
                                class="form-control" value="{{ old('office_detail.'.$k.'.market_value',($assets['office_detail'][$k]['market_value'] ?? null)) }}" />
                        </td>
                        @if($k == 0)
                            <td><button type="button" id="add-office-detail" class="btn btn-success">Add More</button></td>
                        @else
                            <td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>
                        @endif
                    </tr>
                @endfor
            </div>
        </table>


@push('js')
<script type="text/javascript">
    var i = {{$office_detail}}

    $("#add-office-detail").click(function(){	
   
        let j = i-1;
        let area_type = <?php echo json_encode(config('assets.area_type')); ?>;
        let unit_sold = <?php echo json_encode(config('assets.yes_no_options')); ?>;
        let appnd = 
                '<tr>'+
                '<td><input type="text" name="office_detail['+i+'][office_no]" id="office_no_'+i+'" class="form-control">'+
                '</td><td><input id="description_'+i+'" type="text" name="office_detail['+i+'][description]" class="form-control" />'+
                '</td><td><select name="office_detail['+i+'][area_type]" id="area_type_'+i+'" class="cs-select">'+
                                '<option value="">Select</option>';
                    $.map(area_type,function(v,k){
                        appnd += '<option value='+k+'>'+v+'</option>';
                    });
            appnd += '</select>'+
                '</td><td><input id="area_'+i+'" type="text" name="office_detail['+i+'][area]" class="form-control" />'+
                '</td><td><input id="unit_'+i+'" type="text" name="office_detail['+i+'][unit]" class="form-control" />';
            appnd += '</td><td><select name="office_detail['+i+'][unit_sold]" id="unit_sold_'+i+'" class="cs-select">'+
                                '<option value="">Select</option>';
                    $.map(unit_sold,function(v,k){
                        appnd += '<option value='+k+'>'+v+'</option>';
                    });
            appnd += '</select>'+
                '</td><td><input id="market_value_'+i+'" type="text" name="office_detail['+i+'][market_value]" class="form-control" />'+
                '</td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>'+
                '</tr>';
        $("#dynamicTable-office-detail").append(appnd);
    
        $('#area_type_'+i).select2({
            dropdownAutoWidth : true,
            width: '100%',
            placeholder: 'Search',
        });

        $('#unit_sold_'+i).select2({
            dropdownAutoWidth : true,
            width: '100%',
            placeholder: 'Search',
        });
        i++;
    });

</script>
@endpush