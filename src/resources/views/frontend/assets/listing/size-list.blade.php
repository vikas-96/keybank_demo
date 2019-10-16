

    {{--  @if(in_array($template_id,config('list.size.area_type')))
    <div class="col-md-6">
        <span>Area Type</span>
        <!-- <strong>{{ ($value['size']['area_type']) ?? null }}</strong> -->

    {{ config('assets.area_type.'.$value['size']['area_type']) }}
</div>
@endif --}}


@if(in_array($template_id,config('list.size.area')) && in_array($template_id,config('list.size.unit')) &&
in_array($template_id,config('list.size.area_type')) )
<div class="col-md-6">
    <span>{{ config('assets.area_type.'.$value['size']['area_type']) }}</span>
    <strong>{{ ($value['size']['area']) ?? null }} {{ config('assets.unit.'.$value['size']['unit']) }}</strong>
</div>
@endif


{{--  @if(in_array($template_id,config('list.size.unit')))
    <div class="col-md-6">
        <span>Unit</span>
        <!--          <strong>{{ ($value['size']['unit']) ?? null }}</strong>
-->
{{ config('assets.unit.'.$value['size']['unit']) }}
</div>
@endif --}}
