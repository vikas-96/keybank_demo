    <div class="col-md-24 section-heading">
        <h5>Building Information</h5>
    </div>
            @if(in_array($template_id,config('template.building.fsi_permitted')))
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="fsi_permitted">FSI Permitted</label>
                <input type="number" name="building[fsi_permitted]" id="fsi_permitted"
                    value="{{ old('building.fsi_permitted',($assets['building']['fsi_permitted'] ?? null))}}">
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.fsi_consumed')))
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="fsi_consumed">FSI Consumed</label>
                <input type="number" name="building[fsi_consumed]" id="fsi_consumed"
                    value="{{ old('building.fsi_consumed',($assets['building']['fsi_consumed'] ?? null))}}">
            </div>
        </div>
            @endif
            @if(in_array($template_id,config('template.building.no_of_floors_in_building')))
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="no_of_floors_in_building">No. of floors in the building</label>
                <input type="text" name="building[no_of_floors_in_building]" id="no_of_floors_in_building"
                    value={{ old('building.no_of_floors_in_building',($assets['building']['no_of_floors_in_building'] ?? null))}}>
            </div>
        </div>
            @endif
            @if(in_array($template_id,config('template.building.lift_in_building')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="lift_in_building">Lift in the building</label>
                    <select name="building[lift_in_building]" class="cs-select" id="lift_in_building">
                        <option value=""></option>
                        @foreach (config('assets.yes_no_options') as $k=>$v )
                        <option value={{$k}} {{(old('building.lift_in_building',($assets['building']['lift_in_building'] ?? null)) == $k)?'selected':''}}>{{$v}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.building_amenities')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="building_amenities">Building Amenities</label>
                    <select name="building[building_amenities][]" class="cs-select-multi" id="building_amenities" multiple="true">
                        @foreach (config('assets.building_amenities') as $k=>$v )
                        <option value={{$k}} 
                        {{(in_array($k,old('building.building_amenities',($assets['building']['building_amenities'] ?? []))))?'selected':''}}>{{$v}} 
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.business_nature')))
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="business_nature">Nature of Business</label>
                <input type="text" name="building[business_nature]" id="business_nature"
                    value="{{ old('building.business_nature',($assets['building']['business_nature'] ?? null))}}">
            </div>
        </div>
            @endif
            @if(in_array($template_id,config('template.building.any_leakages')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="any_leakages">Any Leakages</label>
                    <select name="building[any_leakages][]" class="cs-select-multi" id="any_leakages" multiple='true'>
                        @foreach (config('assets.yes_no_options') as $k=>$v )
                        <option value={{$k}} 
                        {{(in_array($k,old('building.any_leakages',($assets['building']['any_leakages'] ?? []))))?'selected':''}}>{{$v}} 
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.common_conference_rooms')))
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="common_conference_rooms">Common Conference rooms</label>
                <input type="number" name="building[common_conference_rooms]" id="common_conference_rooms"
                    value="{{ old('building.common_conference_rooms',($assets['building']['common_conference_rooms'] ?? null))}}">
            </div>
        </div>
            @endif
            @if(in_array($template_id,config('template.building.no_of_restaurants')))
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="no_of_restaurants">Number of restaurants / cafeterias</label>
                <input type="number" name="building[no_of_restaurants]" id="no_of_restaurants"
                    value="{{ old('building.no_of_restaurants',($assets['building']['no_of_restaurants'] ?? null))}}">
            </div>
        </div>
            @endif
            @if(in_array($template_id,config('template.building.comment_on_security_system')))
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="comment_on_security_system">Comment on security systems</label>
                <input type="text" name="building[comment_on_security_system]" id="comment_on_security_system"
                    value="{{ old('building.comment_on_security_system',($assets['building']['comment_on_security_system'] ?? null))}}">
            </div>
        </div>
            @endif
            @if(in_array($template_id,config('template.building.comment_on_parking_availability')))
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="comment_on_parking_availability">Comment on parking availability</label>
                <input type="text" name="building[comment_on_parking_availability]" id="comment_on_parking_availability"
                    value="{{ old('building.comment_on_parking_availability',($assets['building']['comment_on_parking_availability'] ?? null))}}">
            </div>
        </div>
            @endif
            @if(in_array($template_id,config('template.building.building_completion_year')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="building_completion_year">Year of completion of the building </label>
                    <input type="number" name="building[building_completion_year]" id="building_completion_year" value="{{ old('building.building_completion_year',($assets['building']['building_completion_year'] ?? null))}}">
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.construction_stage')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="construction_stage">Stage of construction</label>
                    <input type="number" name="building[construction_stage]" id="construction_stage" value="{{ old('building.construction_stage',($assets['building']['construction_stage'] ?? null))}}">
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.residual_life_of_building')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="residual_life_of_building">Residual Life of Building</label>
                    <input type="number" step=".01" name="building[residual_life_of_building]" id="residual_life_of_building" value="{{ old('building.residual_life_of_building',($assets['building']['residual_life_of_building'] ?? null))}}">
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.shed_condition')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="shed_condition">Shed Condition</label>
                    <select name="building[shed_condition]" class="cs-select" id="shed_condition">
                        <option value=""></option>
                        @foreach (config('assets.shed_condition') as $k=>$v )
                        <option value={{$k}} {{(old('building.shed_condition',($assets['building']['shed_condition'] ?? null)) == $k)?'selected':''}}>{{$v}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.shed_empty_or_equipped')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="shed_empty_or_equipped">Shed Empty or equipped with P&M</label>
                    <input type="text" name="building[shed_empty_or_equipped]" id="shed_empty_or_equipped" value="{{ old('building.shed_empty_or_equipped',($assets['building']['shed_empty_or_equipped'] ?? null))}}">
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.p&m')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="p&m">P & M</label>
                    <input type="text" name="building[p&m]" id="p&m" value="{{ old('building.p&m',($assets['building']['p&m'] ?? null))}}">
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.other_construction')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="other_construction">Other Construction?</label>
                    <input type="text" name="building[other_construction]" id="other_construction" value="{{ old('building.other_construction',($assets['building']['other_construction'] ?? null))}}">
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.other_usp')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="other_usp">Other USP</label>
                    <input type="text" name="building[other_usp]" id="other_usp" value="{{ old('building.other_usp',($assets['building']['other_usp'] ?? null))}}">
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.building_condition')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="building_condition">Building Condition</label>
                    <select name="building[building_condition]" class="cs-select" id="building_condition">
                        <option value=""></option>
                        @foreach (config('assets.building_condition') as $k=>$v )
                        <option value={{$k}} {{(old('building.building_condition',($assets['building']['building_condition'] ?? null)) == $k)?'selected':''}}>{{$v}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.painting_status')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="painting_status">Status of painting</label>
                    <select name="building[painting_status]" class="cs-select" id="painting_status">
                        <option value=""></option>
                        @foreach (config('assets.painting_status') as $k=>$v )
                        <option value={{$k}} {{(old('building.painting_status',($assets['building']['painting_status'] ?? null)) == $k)?'selected':''}}>{{$v}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.demolition_proceedings')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="demolition_proceedings">Demolition Proceedings if any</label>
                    <select name="building[demolition_proceedings]" class="cs-select" id="demolition_proceedings">
                        <option value=""></option>
                        @foreach (config('assets.yes_no_options') as $k=>$v )
                        <option value={{$k}} {{(old('building.demolition_proceedings',($assets['building']['demolition_proceedings'] ?? null)) == $k)?'selected':''}}>{{$v}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
            <!-- basement -->
            @if(in_array($template_id,config('template.building.basement_contruction')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="basement_contruction">Basement Construction</label>
                    <select name="building[basement_contruction]" class="cs-select" id="basement_contruction">
                        <option value=""></option>
                        @foreach (config('assets.yes_no_options') as $k=>$v )
                        <option value={{$k}} {{(old('building.basement_contruction',($assets['building']['basement_contruction'] ?? null)) == $k)?'selected':''}}>{{$v}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.basement_construction_area')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="basement_construction_area">Basement Construction Area</label>
                    <input type="number" step=".01" name="building[basement_construction_area]" id="basement_construction_area" value="{{ old('building.basement_construction_area',($assets['building']['basement_construction_area'] ?? null))}}">
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.basement_area_type')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="basement_area_type">Type of Area</label>
                    <select name="building[basement_area_type]" class="cs-select" id="basement_area_type">
                        <option value=""></option>
                        @foreach (config('assets.area_type') as $k=>$v )
                        <option value={{$k}} {{(old('building.basement_area_type',($assets['building']['basement_area_type'] ?? null)) == $k)?'selected':''}}>{{$v}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.basement_unit')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="basement_unit">Unit</label>
                    <select name="building[basement_unit]" class="cs-select" id="basement_unit">
                        <option value=""></option>
                        @foreach (config('assets.unit') as $k=>$v )
                        <option value={{$k}} {{(old('building.basement_unit',($assets['building']['basement_unit'] ?? null)) == $k)?'selected':''}}>{{$v}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.basement_usage')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="basement_usage">Basement - Usage</label>
                    <select name="building[basement_usage]" class="cs-select" id="basement_usage">
                        <option value=""></option>
                        @foreach (config('assets.usage') as $k=>$v )
                        <option value={{$k}} {{(old('building.basement_usage',($assets['building']['basement_usage'] ?? null)) == $k)?'selected':''}}>{{$v}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
            <!-- basement end -->
            @if(in_array($template_id,config('template.building.construction_type')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="construction_type">Type of Construction</label>
                    <input type="text" name="building[construction_type]" id="construction_type" value="{{ old('building.construction_type',($assets['building']['construction_type'] ?? null))}}">
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.flooring')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="flooring">Flooring</label>
                    <input type="text" name="building[flooring]" id="flooring" value="{{ old('building.flooring',($assets['building']['flooring'] ?? null))}}">
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.wiring')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="wiring">Wiring</label>
                    <input type="text" name="building[wiring]" id="wiring" value="{{ old('building.wiring',($assets['building']['wiring'] ?? null))}}">
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.plumbing')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="plumbing">Plumbing</label>
                    <input type="text" name="building[plumbing]" id="plumbing" value="{{ old('building.plumbing',($assets['building']['plumbing'] ?? null))}}">
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.infrastructure_availability')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="infrastructure_availability">Infrastructure Availability</label>
                    <select name="building[infrastructure_availability][]" class="cs-select-multi"
                        id="infrastructure_availability" multiple='true'>
                        @foreach (config('assets.infrastructure_availability') as $k=>$v )
                        <option value={{$k}} 
                        {{(in_array($k,old('building.infrastructure_availability',($assets['building']['infrastructure_availability'] ?? []))))?'selected':''}}>{{$v}} 
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.material_technology_used')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="material_technology_used">Material and Technology used</label>
                    <input type="text" name="building[material_technology_used]" id="material_technology_used" value="{{ old('building.material_technology_used',($assets['building']['material_technology_used'] ?? null))}}">
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.structural_safety')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="structural_safety">Structural Safety</label>
                    <input type="text" name="building[structural_safety]" id="structural_safety" value="{{ old('building.structural_safety',($assets['building']['structural_safety'] ?? null))}}">
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.earthquake_resitance_design')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="earthquake_resitance_design">Earthquake resitance design</label>
                    <select name="building[earthquake_resitance_design]" class="cs-select"
                        id="earthquake_resitance_design">
                        @foreach (config('assets.yes_no_options') as $k=>$v )
                        <option value={{$k}} {{(old('building.earthquake_resitance_design',($assets['building']['earthquake_resitance_design'] ?? null)) == $k)?'selected':''}}>
                            {{$v}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.visible_damage_in_building')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="visible_damage_in_building">Visible Damage in the Building</label>
                    <input type="text" name="building[visible_damage_in_building]" id="visible_damage_in_building" value="{{ old('building.visible_damage_in_building',($assets['building']['visible_damage_in_building'] ?? null))}}">
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.central_air_conditioning_system')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="central_air_conditioning_system">Central Air conditioning system</label>
                    <select name="building[central_air_conditioning_system]" class="cs-select"
                        id="central_air_conditioning_system">
                        @foreach (config('assets.yes_no_options') as $k=>$v )
                        <option value={{$k}} {{(old('building.central_air_conditioning_system',($assets['building']['central_air_conditioning_system'] ?? null)) == $k)?'selected':''}}>
                            {{$v}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.firefighting_provision')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="firefighting_provision">Provision of firefighting</label>
                    <select name="building[firefighting_provision]" class="cs-select" id="firefighting_provision">
                        @foreach (config('assets.yes_no_options') as $k=>$v )
                        <option value={{$k}} {{(old('building.firefighting_provision',($assets['building']['firefighting_provision'] ?? null)) == $k)?'selected':''}}>{{$v}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
            @if(in_array($template_id,config('template.building.architectural_description')))
            
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="architectural_description">Architectural description</label>
                    <input type="text" name="building[architectural_description]" id="architectural_description" value="{{ old('building.architectural_description',($assets['building']['architectural_description'] ?? null))}}">
                </div>
            </div>
            @endif


@push('js')
<script type="text/javascript">

</script>
@endpush