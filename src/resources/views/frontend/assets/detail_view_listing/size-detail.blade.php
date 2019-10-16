<div class="property-highlights row">

    {{--  @if(in_array($template_id,config('list.size.area_type')))
    <div class="col-md-6">
        <span>Area Type :</span>
        <!-- <strong>{{ ($value['size']['area_type']) ?? null }}</strong> -->

    {{ config('assets.area_type.'.$value['size']['area_type']) }}
</div>
@endif --}}


<div class="col-md-6">
    @if(isset($value['size']['area_type']) && in_array($template_id,config('list.size.area_type')))
        <span>{{ config('assets.area_type.'.$value['size']['area_type']) }}</span>
    @endif
    <strong>
    @if(isset($value['size']['area']) && in_array($template_id,config('list.size.area')))
        {{ ($value['size']['area']) ?? null }}
    @endif
    @if(isset($value['size']['unit']) && in_array($template_id,config('list.size.unit')))
    {{ config('assets.unit.'.$value['size']['unit']) }}
    @endif
    </strong>
</div>


{{--  @if(in_array($template_id,config('list.size.unit')))
    <div class="col-md-6">
        <span>Unit :</span>
        <!--          <strong>{{ ($value['size']['unit']) ?? null }}</strong>
-->
{{ config('assets.unit.'.$value['size']['unit']) }}
</div>
@endif --}}
</div>