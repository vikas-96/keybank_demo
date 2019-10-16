    <div class="col-md-24 section-heading">
        <h5>Inspection Data Logs</h5>
    </div>       
    <div class="col-md-6">
        <div class="form-group">
        <label for="inspection_date" class="">Date of Inspection</label>
        <div class="input-group form-group date past_date" data-provide="datepicker" data-date-format="dd-mm-yyyy">
            <div class="date-picker">
            <input type="text" name="inspection_data_logs[inspection_date]" id="" value="{{ old('inspection_data_logs.inspection_date',($assets['inspection_data_logs']['inspection_date'] ?? null)) }}" readonly>
            <div class="input-group-addon">
                <i class="fa fa-calendar" aria-hidden="true"></i>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="officer_name" class="">Name of Officer</label>
        <input type="text" name="inspection_data_logs[officer_name]" id="officer_name" value="{{old('inspection_data_logs.officer_name',($assets['inspection_data_logs']['officer_name'] ?? null))}}">
    </div>
    </div>
@push('js')
<script>

</script>

@endpush