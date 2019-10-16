<div class="property-highlights row">
    @if(in_array($template_id,config('list.office_summary.unit_total_no')))
    <div class="col-md-6">
        <span>Total no. of units :</span>
        <strong>{{ ($value['office_summary']['unit_total_no']) ?? null }}</strong>
    </div>
    @endif
    @if(in_array($template_id,config('list.office_summary.area_type')))
    <div class="col-md-6">
        <span>Area Type :</span>
        <strong>{{ ($value['office_summary']['area_type']) ?? null }}</strong>
    </div>
    @endif
    @if(in_array($template_id,config('list.office_summary.total_area')))
    <div class="col-md-6">
        <span>Total Area :</span>
        <strong>{{ ($value['office_summary']['total_area']) ?? null }}</strong>
    </div>
    @endif
    @if(in_array($template_id,config('list.office_summary.unit')))
    <div class="col-md-6">
        <span>Unit :</span>
        <strong>{{ ($value['office_summary']['unit']) ?? null }}</strong>
    </div>
    @endif

</div>