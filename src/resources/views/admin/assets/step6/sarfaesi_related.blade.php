    <div class="col-md-24 section-heading">
        <h5>Sarfaesi Related</h5>
    </div>
    @php
    $possession_type = old('sarfaesi_related.possession_type',($assets['sarfaesi_related']['possession_type'] ?? null));
    $issuance_status_13_2 = old('sarfaesi_related.issuance_status_13_2',($assets['sarfaesi_related']['issuance_status_13_2'] ?? null));
    $issuance_status_13_4 = old('sarfaesi_related.issuance_status_13_4',($assets['sarfaesi_related']['issuance_status_13_4'] ?? null));
    @endphp
    <div class="col-md-6">
        <div class="form-group">
        <label for="possession_type" class="required">Possession Type</label>
        <select name="sarfaesi_related[possession_type]" required="true" id="possession_type">
            <option value="">Select</option>
            @foreach(config('assets.possession_type') as $k => $v)
            <option value="{{$k}}" {{($possession_type==$k)?'selected':''}}>{{$v}}</option>
            @endforeach
        </select>
    </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="possession_date" class="">Date of Possession</label>
        <div class="input-group form-group date past_date" data-provide="datepicker" data-date-format="dd-mm-yyyy">
            <div class="date-picker">
            <input type="text" name="sarfaesi_related[possession_date]" id="" value="{{ old('sarfaesi_related.possession_date',($assets['sarfaesi_related']['possession_date'] ?? null)) }}" readonly>
            <div class="input-group-addon">
                <i class="fa fa-calendar" aria-hidden="true"></i>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="issuance_status_13_2" class="">13(2) issuance Status</label>
        <select name="sarfaesi_related[issuance_status_13_2]" id="issuance_status_13_2">
            <option value="">Select</option>
            @foreach(config('assets.issuance_status') as $k => $v)
            <option value="{{$k}}" {{($issuance_status_13_2==$k)?'selected':''}}>{{$v}}</option>
            @endforeach
        </select>
    </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="issuance_date_13_2" class="">13(2) issuance Date</label>
        <div class="input-group form-group date past_date" data-provide="datepicker" data-date-format="dd-mm-yyyy">
            <div class="date-picker">
            <input type="text" name="sarfaesi_related[issuance_date_13_2]" id="" value="{{ old('sarfaesi_related.issuance_date_13_2',($assets['sarfaesi_related']['issuance_date_13_2'] ?? null)) }}" readonly>
            <div class="input-group-addon">
                <i class="fa fa-calendar" aria-hidden="true"></i>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="dues_amount_13_2" class="">13(2) Amount of Dues</label>
        <input type="number" name="sarfaesi_related[dues_amount_13_2]" id="dues_amount_13_2" value="{{old('sarfaesi_related.dues_amount_13_2',($assets['sarfaesi_related']['dues_amount_13_2'] ?? null))}}">
    </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="issuance_status_13_4" class="">13(4) Issuance Status</label>
        <select name="sarfaesi_related[issuance_status_13_4]" id="issuance_status_13_4">
            <option value="">Select</option>
            @foreach(config('assets.issuance_status') as $k => $v)
            <option value="{{$k}}" {{($issuance_status_13_4==$k)?'selected':''}}>{{$v}}</option>
            @endforeach
        </select>
    </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="issuance_date_13_4" class="">13(4) Issuance Date</label>
        <div class="input-group form-group date past_date" data-provide="datepicker" data-date-format="dd-mm-yyyy">
            <div class="date-picker">
            <input type="text" name="sarfaesi_related[issuance_date_13_4]" id="" value="{{ old('sarfaesi_related.issuance_date_13_4',($assets['sarfaesi_related']['issuance_date_13_4'] ?? null)) }}" readonly>
            <div class="input-group-addon">
                <i class="fa fa-calendar" aria-hidden="true"></i>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="dm_application_date" class="">DM / CMM Application Date</label>
        <div class="input-group form-group date past_date" data-provide="datepicker" data-date-format="dd-mm-yyyy">
            <div class="date-picker">
            <input type="text" name="sarfaesi_related[dm_application_date]" id="" value="{{ old('sarfaesi_related.dm_application_date',($assets['sarfaesi_related']['dm_application_date'] ?? null)) }}" readonly>
            <div class="input-group-addon">
                <i class="fa fa-calendar" aria-hidden="true"></i>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="dm_inspection_date" class="">DM / CMM Inspection Date</label>
        <div class="input-group form-group date past_date" data-provide="datepicker" data-date-format="dd-mm-yyyy">
            <div class="date-picker">
            <input type="text" name="sarfaesi_related[dm_inspection_date]" id="" value="{{ old('sarfaesi_related.dm_inspection_date',($assets['sarfaesi_related']['dm_inspection_date'] ?? null)) }}" readonly>
            <div class="input-group-addon">
                <i class="fa fa-calendar" aria-hidden="true"></i>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="dm_order_date" class="">DM / CMM Order Date</label>
        <div class="input-group form-group date past_date" data-provide="datepicker" data-date-format="dd-mm-yyyy">
            <div class="date-picker">
            <input type="text" name="sarfaesi_related[dm_order_date]" id="" value="{{ old('sarfaesi_related.dm_order_date',($assets['sarfaesi_related']['dm_order_date'] ?? null)) }}" readonly>
            <div class="input-group-addon">
                <i class="fa fa-calendar" aria-hidden="true"></i>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="fixation_possession_date" class="">Fixation of Physical Possession Date</label>
        <div class="input-group form-group date past_date" data-provide="datepicker" data-date-format="dd-mm-yyyy">
            <div class="date-picker">
            <input type="text" name="sarfaesi_related[fixation_possession_date]" id="" value="{{ old('sarfaesi_related.fixation_possession_date',($assets['sarfaesi_related']['fixation_possession_date'] ?? null)) }}" readonly>
            <div class="input-group-addon">
                <i class="fa fa-calendar" aria-hidden="true"></i>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="panchnama_assuance_date" class="">Panchnama Issuance Date</label>
        <div class="input-group form-group date past_date" data-provide="datepicker" data-date-format="dd-mm-yyyy">
            <div class="date-picker">
            <input type="text" name="sarfaesi_related[panchnama_assuance_date]" id="" value="{{ old('sarfaesi_related.panchnama_assuance_date',($assets['sarfaesi_related']['panchnama_assuance_date'] ?? null)) }}" readonly>
            <div class="input-group-addon">
                <i class="fa fa-calendar" aria-hidden="true"></i>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="possession_receipt_date" class="">Possession Receipt Date</label>
        <div class="input-group form-group date past_date" data-provide="datepicker" data-date-format="dd-mm-yyyy">
            <div class="date-picker">
            <input type="text" name="sarfaesi_related[possession_receipt_date]" id="" value="{{ old('sarfaesi_related.possession_receipt_date',($assets['sarfaesi_related']['possession_receipt_date'] ?? null)) }}" readonly>
            <div class="input-group-addon">
                <i class="fa fa-calendar" aria-hidden="true"></i>
            </div>
        </div>
        </div>
    </div>
    </div>
@push('js')
<script>
    $('#possession_type,#issuance_status_13_2,#issuance_status_13_4').select2({
        allowClear: true,
        dropdownAutoWidth: true,
        allowClear : true,
        width: '100%',
        placeholder: 'Select an option',
    });
</script>

@endpush