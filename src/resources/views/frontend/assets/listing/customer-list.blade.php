{{-- @if(in_array($template_id,config('list.customer.migrating_branch')))
<div class="col-md-6">
    <span>Migrating Branch</span>
    <strong>{{ $value['customer']['migrating_branch'] ?? null }}</strong>
</div>
@endif --}}
@if(in_array($template_id,config('list.customer.recovery_branch')))
<div class="col-md-6">
    <span>Recovery Branch</span>
    <strong>{{ $value['customer']['recovery_branch'] ?? null }}</strong>
</div>
@endif
@if(in_array($template_id,config('list.customer.recall_date')))
<div class="col-md-6">
    <span>Recall Date</span>
    <strong>{{ $value['customer']['recall_date'] ?? null }}</strong>
</div>
@endif
@if(in_array($template_id,config('list.customer.clo_name')))
<div class="col-md-6">
    <span>Case Lead Officer Name</span>
    <strong>{{ $value['customer']['clo_name'] ?? null }}</strong>
</div>
@endif
@if(in_array($template_id,config('list.customer.co_name')))
<div class="col-md-6">
    <span>Case Officer Name</span>
    <strong>{{ $value['customer']['co_name'] ?? null }}</strong>
</div>
@endif