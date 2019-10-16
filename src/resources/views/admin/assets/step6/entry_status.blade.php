    <div class="col-md-24 section-heading">
        <h5>Entry Status</h5>
    </div>
    @php
    $entry_status = old('entry_status.entry_status',($assets['entry_status']['entry_status'] ?? null));
    @endphp
    
    <div class="col-md-6">
        <div class="form-group">
        <label for="entry_status" class="">Entry Status</label>
        <select name="entry_status[entry_status]" id="entry_status">
            <option value="">Select</option>
            @foreach(config('assets.entry_status') as $k => $v)
                <option value="{{$k}}" {{($entry_status==$k)?'selected':''}}>{{$v}}</option>
            @endforeach
        </select>
    </div>
    </div>

@push('js')
<script>
    $('#entry_status').select2({
        dropdownAutoWidth : true,
        allowClear : true,
        width: '100%',
        placeholder: 'Select an option',
    });
</script>

@endpush