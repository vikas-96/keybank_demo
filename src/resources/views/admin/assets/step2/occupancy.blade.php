<div class="col-md-24 section-heading">
    <h5>Occupancy</h5>
</div>
@if(in_array($template_id,config('template.occupancy.occupied_by')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="occupied_by">Occupied by</label>
        <select name="occupancy[occupied_by]" id="occupied_by" class="cs-select">
            <option value=""></option>
            @foreach (config('assets.occupied_by') as $k=>$v )
            <option value={{$k}}
                {{(old('occupancy.occupied_by',($assets['occupancy']['occupied_by'] ?? null)) == $k)?'selected':''}}>
                {{$v}}</option>
            @endforeach
        </select>
    </div>
</div>
@endif
@if(in_array($template_id,config('template.occupancy.no_of_unit_sold')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="occupancy[no_of_unit_sold]">Number of units sold</label>
        <input type="number" name="no_of_unit_sold" id="no_of_unit_sold"
            value="{{old('occupancy.no_of_unit_sold',($assets['occupancy']['no_of_unit_sold'] ?? null))}}"
            class="form-control">
    </div>
</div>
@endif
@if(in_array($template_id,config('template.occupancy.no_of_tenants')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="no_of_tenants">Number of tenants</label>
        <select name="occupancy[no_of_tenants]" id="no_of_tenants" class="">
            <option value="">Select</option>
            @for($j=1;$j<=5;$j++) <option value="{{$j}}"
                {{(old('occupancy.no_of_tenants',($assets['occupancy']['no_of_tenants'] ?? null)) == $j)?'selected':''}}>
                {{$j}}</option>
                @endfor
        </select>
    </div>
</div>
@endif
@if(in_array($template_id,config('template.occupancy.no_of_tenants')))
<div class="form-group tenant_table" style="display:none">
    <table class="table">
        <tr>
            <th><label class="required">Tenant Since</label></th>
            <th><label class="required">Rent received per month from tenants</label></th>
        </tr>
        <tbody id="tenant_section">
            @if(old('occupancy.tenant',($assets['occupancy']['tenant'] ?? null)))
            @php $count = count(old('occupancy.tenant',($assets['occupancy']['tenant'] ?? null))); @endphp
            @for($i=0;$i<$count;$i++) <tr>
                <td>
                    <input type="number" name="occupancy[tenant][{{$i}}][tenant_since]" id="tenant_since_{{$i}}"
                        value="{{ old('occupancy.tenant.'.$i.'.tenant_since',($assets['occupancy']['tenant'][$i]['tenant_since'] ?? null)) }}"
                        class="form-control" required>
                </td>
                <td>
                    <input type="number" name="occupancy[tenant][{{$i}}][tenant_rent_per_month]"
                        id="tenant_rent_per_month_{{$i}}"
                        value="{{ old('occupancy.tenant.'.$i.'.tenant_rent_per_month',($assets['occupancy']['tenant'][$i]['tenant_rent_per_month'] ?? null)) }}"
                        class="form-control" required>
                </td>
                </tr>
                @endfor
                @endif
        </tbody>
    </table>
</div>
@endif



@push('js')
<script type="text/javascript">
    $('#no_of_tenants').select2({
        dropdownAutoWidth : true,
        width: '100%',
        allowClear: true,
        placeholder: 'Select an option',
    }).on('select2:select', function (e) {
        var data = e.params.data;
        let tenant_detail = '';
        for(let i = 0; i < data.text; i++){
            tenant_detail += '<tr><td>'+
                    '<input type="number" name="occupancy[tenant]['+i+'][tenant_since]" id="tenant_since_'+i+'" class="form-control" required>'+
                    '</td><td>'+
                    '<input type="number" name="occupancy[tenant]['+i+'][tenant_rent_per_month]" id="tenant_rent_per_month_'+i+'" class="form-control" required>'+
                    '</td></tr>';
        }
        $('#tenant_section').html(tenant_detail);
        $('.tenant_table').show();
    }).on('select2:unselecting', function(e){
        $('#tenant_section').html('');
        $('.tenant_table').hide();
    });

    $(document).ready(function(){
        let tenant_count = "{{ (old('occupancy.tenant',($assets['occupancy']['tenant'] ?? null)))?count(old('occupancy.tenant',($assets['occupancy']['tenant'] ?? null))):0 }}";
        if(tenant_count > 0){
            $('.tenant_table').show();
        }
    });

</script>
@endpush