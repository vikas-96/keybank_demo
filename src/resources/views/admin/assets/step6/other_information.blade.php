    <div class="col-md-24 section-heading">
        <h5>Other Information</h5>
    </div>
    @php
    $borrower_cooperation = old('other_information.borrower_cooperation',($assets['other_information']['borrower_cooperation'] ?? null));
    $sarfaesi_complaint = old('other_information.sarfaesi_complaint',($assets['other_information']['sarfaesi_complaint'] ?? null));
    $title_deed_type = old('other_information.title_deed_type',($assets['other_information']['title_deed_type'] ?? null));
    @endphp
            <div class="col-md-6">
                <div class="form-group">
                <label for="borrower_cooperation" class="">Cooperation of the borrower</label>
                <select name="other_information[borrower_cooperation]" id="borrower_cooperation">
                    <option value="">Select</option>
                    @foreach(config('assets.borrower_cooperation') as $k => $v)
                    <option value="{{$k}}" {{($borrower_cooperation == $k)?'selected':''}}>{{$v}}</option>
                    @endforeach
                </select>
            </div>
        </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="sarfaesi_complaint" class="">SARFAESI Compliant</label>
                <select name="other_information[sarfaesi_complaint]" id="sarfaesi_complaint">
                    <option value="">Select</option>
                    @foreach(config('assets.sarfaesi_complaint') as $k => $v)
                    <option value="{{$k}}" {{($sarfaesi_complaint == $k)?'selected':''}}>{{$v}}</option>
                    @endforeach
                </select>
            </div>
        </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="other_resolution_effort" class="">Other resolution efforts in process and doability</label>
                <input type="text" name="other_information[other_resolution_effort]" id="other_resolution_effort" value="{{old('other_information.other_resolution_effort',($assets['other_information']['other_resolution_effort'] ?? null))}}">
            </div>
        </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="keys_location" class="">Location of Keys</label>
                <input type="text" name="other_information[keys_location]" id="keys_location" value="{{old('other_information.keys_location',($assets['other_information']['keys_location'] ?? null))}}">
            </div>
        </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="title_deed_type" class="">Type of Title Deed</label>
                <select name="other_information[title_deed_type]" id="title_deed_type">
                    <option value="">Select</option>
                    @foreach(config('assets.title_deed_type') as $k => $v)
                    <option value="{{$k}}" {{($title_deed_type==$k)?'selected':''}}>{{$v}}</option>
                    @endforeach
                </select>
            </div>
        </div>
@push('js')
<script>
    $('#borrower_cooperation,#sarfaesi_complaint,#title_deed_type').select2({
        allowClear: true,
        dropdownAutoWidth: true,
        allowClear : true,
        width: '100%',
        placeholder: 'Select an option',
    });
</script>

@endpush