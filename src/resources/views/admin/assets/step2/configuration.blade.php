    <div class="col-md-24 section-heading">
        <h5>Configuration</h5>
    </div>
        @if(in_array($template_id,config('template.configuration.configuration')))
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label class="required" for="configuration">Configuration</label>
                <select name="configuration[configuration]" required="true" id="configuration" class="cs-select">
                    @foreach (config('assets.template1_config') as $k=>$v )
                    <option value={{$k}}
                        {{(old('configuration.configuration',($assets['configuration']['configuration'] ?? null)) == $k)?'selected':''}}>
                        {{$v}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @endif

        @if(in_array($template_id,config('template.configuration.no_of_servant_rooms')))
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="no_of_servant_rooms">Number of Servant Rooms
                </label>
                <input type="number" name="configuration[no_of_servant_rooms]" id="no_of_servant_rooms"
                    value="{{old('configuration.no_of_servant_rooms',($assets['configuration']['no_of_servant_rooms'] ?? null))}}">
            </div>
        </div>
        @endif

        @if(in_array($template_id,config('template.configuration.no_of_servant_toilets')))
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="no_of_servant_toilets">Number of Servant Toilets
                </label>
                <input type="number" name="configuration[no_of_servant_toilets]" id="no_of_servant_toilets"
                    value="{{old('configuration.no_of_servant_toilets',($assets['configuration']['no_of_servant_toilets'] ?? null))}}">
            </div>
        </div>
        @endif
        @if(in_array($template_id,config('template.configuration.no_of_toilets')))
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="no_of_toilets">Number of Baths / Toilets
                </label>
                <input type="number" name="configuration[no_of_toilets]" id="no_of_toilets"
                    value="{{old('configuration.no_of_toilets',($assets['configuration']['no_of_toilets'] ?? null))}}">
            </div>
        </div>
        @endif
        @if(in_array($template_id,config('template.configuration.no_of_terraces')))
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="no_of_terraces">Number of Balconies / Terraces
                </label>
                <input type="number" name="configuration[no_of_terraces]" id="no_of_terraces"
                    value="{{old('configuration.no_of_terraces',($assets['configuration']['no_of_terraces'] ?? null))}}">
            </div>
        </div>
        @endif
        @if(in_array($template_id,config('template.configuration.no_of_floor_in_unit')))
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="no_of_floor_in_unit">Number of floors in the unit
                </label>
                <input type="number" name="configuration[no_of_floor_in_unit]" id="no_of_floor_in_unit"
                    value="{{old('configuration.no_of_floor_in_unit',($assets['configuration']['no_of_floor_in_unit'] ?? null))}}">
            </div>
        </div>

        @endif
        @if(in_array($template_id,config('template.configuration.self_contained')))
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="self_contained">Self contained
                </label>
                <select name="configuration[self_contained]" id="self_contained" class="cs-select">
                    <option value="">Select</option>
                    @foreach(config('assets.yes_no_options') as $k => $v)
                    <option value="{{$k}}"
                        {{(old('configuration.self_contained',($assets['configuration']['self_contained'] ?? null)) == $k)?'selected':''}}>
                        {{$v}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @endif
        @if(in_array($template_id,config('template.configuration.no_of_cabins')))
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="no_of_cabins">Number of cabins
                </label>
                <input type="number" name="configuration[no_of_cabins]" id="no_of_cabins"
                    value="{{old('configuration.no_of_cabins',($assets['configuration']['no_of_cabins'] ?? null))}}">
            </div>
        </div>

        @endif
        @if(in_array($template_id,config('template.configuration.no_of_conference_rooms')))
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="no_of_conference_rooms">Number of conference rooms
                </label>
                <input type="number" name="configuration[no_of_conference_rooms]" id="no_of_conference_rooms"
                    value="{{old('configuration.no_of_conference_rooms',($assets['configuration']['no_of_conference_rooms'] ?? null))}}">
            </div>
        </div>
        @endif
        @if(in_array($template_id,config('template.configuration.no_of_seats')))
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="no_of_seats">Number of seats
                </label>
                <input type="number" name="configuration[no_of_seats]" id="no_of_seats"
                    value="{{old('configuration.no_of_seats',($assets['configuration']['no_of_seats'] ?? null))}}">
            </div>
        </div>
        @endif
        @if(in_array($template_id,config('template.configuration.pantry')))
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="pantry">Pantry
                </label>
                <input type="number" name="configuration[pantry]" id="pantry"
                    value="{{old('configuration.pantry',($assets['configuration']['pantry'] ?? null))}}">
            </div>
        </div>
        @endif
        @if(in_array($template_id,config('template.configuration.other_rooms')))
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="other_rooms">Other rooms / cabins
                </label>
                <input type="number" name="configuration[other_rooms]" id="other_rooms"
                    value="{{old('configuration.other_rooms',($assets['configuration']['other_rooms'] ?? null))}}">
            </div>
        </div>
        @endif
        @if(in_array($template_id,config('template.configuration.no_of_rooms')))
        <div class="form-group">
            <div class="col-md-3 ">
                <label for="no_of_rooms">No of Rooms
                </label>
                <input type="number" name="configuration[no_of_rooms]" id="no_of_rooms"
                    value="{{old('configuration.no_of_rooms',($assets['configuration']['no_of_rooms'] ?? null))}}">
            </div>
        </div>
        @endif



@push('js')
<script type="text/javascript">

</script>
@endpush