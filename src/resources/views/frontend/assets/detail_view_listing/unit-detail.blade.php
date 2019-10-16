<div class="property-highlights row">

    @if(in_array($template_id,config('list.unit.furnishing_status')))
    <div class="col-md-6">
        <span>furnishing Status :</span>
        <!-- <strong>{{ ($value['unit']['furnishing_status'] ) ?? null }}</strong> -->

        {{ config('assets.furnishing_status.'.$value['unit']['furnishing_status']) }}
    </div>
    @endif
    @if(in_array($template_id,config('list.unit.flat_usp')))
    <div class="col-md-6">
        <span>Flat USP :</span>
        <strong>{{ ($value['unit']['flat_usp'] ) ?? null }}</strong>
    </div>
    @endif
    @if(in_array($template_id,config('list.unit.office_usp')))
    <div class="col-md-6">
        <span>Office USP :</span>
        <strong>{{ ($value['unit']['office_usp'] ) ?? null }}</strong>
    </div>
    @endif

    @if(in_array($template_id,config('list.unit.unit_usp')))
    <div class="col-md-6">
        <span>Unit USP :</span>
        <strong>{{ ($value['unit']['unit_usp'] ) ?? null }}</strong>
    </div>
    @endif

    @if(in_array($template_id,config('list.unit.business_nature')))
    <div class="col-md-6">
        <span>Nature of Business :</span>
        <strong>{{ ($value['unit']['business_nature'] ) ?? null }}</strong>
    </div>
    @endif

    @if(in_array($template_id,config('list.unit.business_nature')))
    <div class="col-md-6">
        <span>Nature of Business :</span>
        <strong>{{ ($value['unit']['business_nature'] ) ?? null }}</strong>
    </div>
    @endif

    @if(in_array($template_id,config('list.unit.p&m_description')))
    <div class="col-md-6">
        <span>P&M Description :</span>
        <strong>{{ ($value['unit']['p&m_description']) ?? null }}</strong>
    </div>
    @endif
</div>