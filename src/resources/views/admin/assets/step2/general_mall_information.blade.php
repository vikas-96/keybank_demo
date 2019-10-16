    <div class="col-md-24 section-heading">
        <h5>General Mall Information</h5>
    </div>
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="mall_common_conference_rooms">Common Conference rooms</label>
                <input type="number" name="mall_info[common_conference_rooms]" id="mall_common_conference_rooms"
                    value="{{ old('mall_info.common_conference_rooms',($assets['mall_info']['common_conference_rooms'] ?? null))}}">
            </div>
        </div>
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="mall_no_of_restaurants">Number of restaurants / cafeterias</label>
                <input type="number" name="mall_info[no_of_restaurants]" id="mall_no_of_restaurants"
                    value="{{ old('mall_info.no_of_restaurants',($assets['mall_info']['no_of_restaurants'] ?? null))}}">
            </div>
        </div>
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="mall_children_playing_area">Children playing area?</label>
                <input type="text" name="mall_info[children_playing_area]" id="mall_children_playing_area"
                    value="{{ old('mall_info.children_playing_area',($assets['mall_info']['children_playing_area'] ?? null))}}">
            </div>
        </div>
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="mall_comment_on_security_system">Comment on security systems</label>
                <input type="text" name="mall_info[comment_on_security_system]" id="mall_office_comment_on_security_system"
                    value="{{ old('mall_info.comment_on_security_system',($assets['mall_info']['comment_on_security_system'] ?? null))}}">
            </div>
        </div>
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="mall_comment_on_parking_availability">Comment on parking availability</label>
                <input type="text" name="mall_info[comment_on_parking_availability]" id="mall_office_comment_on_parking_availability"
                    value="{{ old('mall_info.comment_on_parking_availability',($assets['mall_info']['comment_on_parking_availability'] ?? null))}}">
            </div>
        </div>
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="mall_other_mall_usp">Other Mall USP</label>
                <input type="text" name="mall_info[other_mall_usp]" id="mall_other_mall_usp"
                    value="{{ old('mall_info.other_mall_usp',($assets['mall_info']['other_mall_usp'] ?? null))}}">
            </div>
        </div>
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="mall_painting_status">Status of painting</label>
                <select name="mall_info[painting_status]" class="cs-select" id="mall_painting_status">
                    <option value=""></option>
                    @foreach (config('assets.painting_status') as $k=>$v )
                        <option value={{$k}} {{(old('mall_info.painting_status',($assets['mall_info']['painting_status'] ?? null)) == $k)?'selected':''}}>{{$v}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="mall_basement_construction">Basement Construction</label>
                <select name="mall_info[basement_construction]" class="cs-select" id="mall_basement_construction">
                    <option value=""></option>
                    @foreach (config('assets.yes_no_options') as $k=>$v )
                        <option value={{$k}} {{(old('mall_info.basement_construction',($assets['mall_info']['basement_construction'] ?? null)) == $k)?'selected':''}}>{{$v}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="mall_basement_usage">Basement - Usage</label>
                <select name="mall_info[basement_usage]" class="cs-select" id="mall_basement_usage">
                    <option value=""></option>
                    @foreach (config('assets.usage') as $k=>$v )
                        <option value={{$k}} {{(old('mall_info.basement_usage',($assets['mall_info']['basement_usage'] ?? null)) == $k)?'selected':''}}>{{$v}}</option>
                    @endforeach
                </select>
            </div>
        </div>
