<div class="property-highlights row">
    @if(in_array($template_id,config('list.oc.oc_status')))
    <div class="col-md-6">
        <span>Oc status :</span>
        <strong>{{ ($value['oc']['oc_status']) ?? null }}</strong>
    </div>
    @endif
</div>