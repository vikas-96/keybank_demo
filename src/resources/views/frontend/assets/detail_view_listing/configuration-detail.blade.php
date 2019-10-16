<div class="property-highlights row">

    @if(in_array($template_id,config('list.configuration.configuration')))
    <div class="col-md-6">
        <span>Configuration :</span>
        <!-- <strong>{{ ($value['configuration']['configuration']) ?? null }}</strong>
 -->
    {{ config('assets.template1_config.'.$value['configuration']['configuration']) }}
    </div>
    @endif

    @if(in_array($template_id,config('list.configuration.no_of_cabins')))
    <div class="col-md-6">
        <span>No. of Cabins :</span>
        <strong>{{ ($value['configuration']['no_of_cabins']) ?? null }}</strong>
    </div>
    @endif

    @if(in_array($template_id,config('list.configuration.no_of_conference_rooms')))
    <div class="col-md-6">
        <span>No. of Conference Rooms :</span>
        <strong>{{ ($value['configuration']['no_of_conference_rooms']) ?? null }}</strong>
    </div>
    @endif

    @if(in_array($template_id,config('list.configuration.no_of_seats')))
    <div class="col-md-6">
        <span>No. of Seats:</span>
        <strong>{{ ($value['configuration']['no_of_seats']) ?? null }}</strong>
    </div>
    @endif

    @if(in_array($template_id,config('list.configuration.pantry')))
    <div class="col-md-6">
        <span>Pantry :</span>
        <strong>{{ ($value['configuration']['pantry']) ?? null }}</strong>
    </div>
    @endif

    @if(in_array($template_id,config('list.configuration.no_of_toilets')))
    <div class="col-md-6">
        <span>No. of Toilets :</span>
        <strong>{{ ($value['configuration']['no_of_toilets']) ?? null }}</strong>
    </div>
    @endif

</div>