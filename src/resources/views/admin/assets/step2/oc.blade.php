<div class="col-md-24 section-heading">
    <h5>OC</h5>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="oc_status">OC Status</label>
        <select name="oc[oc_status]" id="oc_status" class="cs-select">
            <option value="">Select status</option>
            @foreach (config('assets.yes_no_options') as $k=>$v )
            <option value={{$k}} {{(old('oc.oc_status',($assets['oc']['oc_status'] ?? null)) == $k)?'selected':''}}>
                {{$v}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="input-group form-group date past_date col-md-6" data-provide="datepicker" data-date-format="dd/mm/yyyy">
    <div class="form-group">
        <label for="oc_date">Date of OC</label>
        <div class="date-picker">
            <input type="text" class="form-control" name="oc[oc_date]" id="oc_date"
                value="{{ old('oc.oc_date',($assets['oc']['oc_date'] ?? null)) }}">
            <div class="input-group-addon">
                <i class="fa fa-calendar" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</div>


@push('js')
<script type="text/javascript">
</script>
@endpush