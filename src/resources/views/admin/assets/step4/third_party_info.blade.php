<div class="col-md-24 section-heading">
    <h5>Third Party Information</h5>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="latest_valuer_name_1" class="required">Name of Latest Valuer - 1</label>
        <select class="form-control" required="true" name="third_party_info[latest_valuer_name_1]"
            id="latest_valuer_name_1">
            <option value="" selected>Select</option>
            @if(old('third_party_info.latest_valuer_name_1',($assets['third_party_info']['valuer1']['_id'] ??
            null)))
            <option
                value="{{old('third_party_info.latest_valuer_name_1',($assets['third_party_info']['valuer1']['_id'] ?? null))}}"
                selected>
                {{old('latest_valuer_name_1_text',($assets['third_party_info']['valuer1']['name'] ?? null))}}
            </option>
            @endif
        </select>
        <input type="hidden" name="latest_valuer_name_1_text" id="latest_valuer_name_1_text"
            value="{{old('latest_valuer_name_1_text',($assets['third_party_info']['valuer1']['name'] ?? null))}}">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="latest_valuer_email_1" class="">Email of Valuer - 1</label>
        <input type="text" class="form-control" name="third_party_info[latest_valuer_email_1]" readonly="true"
            id="latest_valuer_email_1"
            value="{{old('third_party_info.latest_valuer_email_1',($assets['third_party_info']['valuer1']['email'] ?? null))}}">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="valuer_contact_number_1" class="">Contact Number of Valuer - 1</label>
        <input type="text" class="form-control" readonly="true" name="third_party_info[valuer_contact_number_1]"
            id="valuer_contact_number_1"
            value="{{old('third_party_info.valuer_contact_number_1',($assets['third_party_info']['valuer1']['contact'] ?? null))}}">
    </div>
</div>


<div class="col-md-6">
    <div class="form-group">
        <label for="latest_valuer_name_2" class="">Name of Latest Valuer - 2</label>
        <select class="form-control" name="third_party_info[latest_valuer_name_2]" id="latest_valuer_name_2">
            <option value="" selected>Select</option>
            @if(old('third_party_info.latest_valuer_name_1',($assets['third_party_info']['valuer2']['_id'] ??
            null)))
            <option
                value="{{old('third_party_info.latest_valuer_name_2',($assets['third_party_info']['valuer2']['_id'] ?? null))}}"
                selected>
                {{old('latest_valuer_name_2_text',($assets['third_party_info']['valuer2']['name'] ?? null))}}
            </option>
            @endif
        </select>
        <input type="hidden" name="latest_valuer_name_2_text" id="latest_valuer_name_2_text"
            value="{{old('latest_valuer_name_2_text',($assets['third_party_info']['valuer1']['name'] ?? null))}}">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="latest_valuer_email_2" class="">Email of Valuer - 2</label>
        <input type="text" class="form-control" readonly="true" name="third_party_info[latest_valuer_email_2]"
            id="latest_valuer_email_2"
            value="{{old('third_party_info.latest_valuer_email_2',($assets['third_party_info']['valuer2']['email'] ?? null))}}">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="valuer_contact_number_2" class="">Contact Number of Valuer - 2</label>
        <input type="text" class="form-control" readonly="true" name="third_party_info[valuer_contact_number_2]"
            id="valuer_contact_number_2"
            value="{{old('third_party_info.valuer_contact_number_2',($assets['third_party_info']['valuer2']['contact'] ?? null))}}">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="resolution_agent_name" class="required">Name of Resolution Agent</label>
        <select class="form-control" required="true" name="third_party_info[resolution_agent_name]"
            id="resolution_agent_name">
            <option value="" selected>Select</option>
            @if(old('third_party_info.resolution_agent_name',($assets['third_party_info']['resolution_agent']['_id']
            ?? null)))
            <option
                value="{{old('third_party_info.resolution_agent_name',($assets['third_party_info']['resolution_agent']['_id'] ?? null))}}"
                selected>
                {{old('resolution_agent_name_text',($assets['third_party_info']['resolution_agent']['name'] ?? null))}}
            </option>
            @endif
        </select>
        <input type="hidden" name="resolution_agent_name_text" id="resolution_agent_name_text"
            value="{{old('resolution_agent_name_text',($assets['third_party_info']['resolution_agent']['name'] ?? null))}}">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="resolution_agent_email" class="">Email of Resolution Agent</label>
        <input type="text" class="form-control" readonly="true" name="third_party_info[resolution_agent_email]"
            id="resolution_agent_email"
            value="{{old('third_party_info.resolution_agent_email',($assets['third_party_info']['resolution_agent']['email'] ?? null))}}">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="resolution_agent_contact_number" class="">Contact Number of Resolution Agent</label>
        <input type="text" class="form-control" readonly="true" name="third_party_info[resolution_agent_contact_number]"
            id="resolution_agent_contact_number"
            value="{{old('third_party_info.resolution_agent_contact_number',($assets['third_party_info']['resolution_agent']['contact'] ?? null))}}">
    </div>
</div>


<div class="col-md-6">
    <div class="form-group">
        <label for="advocate_name" class="">Name of advocate</label>
        <select class="form-control" name="third_party_info[advocate_name]" id="advocate_name">
            <option value="" selected>Select</option>
            @if(old('third_party_info.advocate_name',($assets['third_party_info']['advocate']['_id'] ?? null)))
            <option
                value="{{old('third_party_info.advocate_name',($assets['third_party_info']['advocate']['_id'] ?? null))}}"
                selected>{{old('advocate_name_text',($assets['third_party_info']['advocate']['name'] ?? null))}}
            </option>
            @endif
        </select>
        <input type="hidden" name="third_party_info[advocate_name_text]" id="advocate_name_text"
            value="{{old('advocate_name_text',($assets['third_party_info']['advocate']['name'] ?? null))}}">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="advocate_email" class="">Email of advocate</label>
        <input type="text" class="form-control" readonly="true" name="third_party_info[advocate_email]"
            id="advocate_email"
            value="{{old('third_party_info.advocate_email',($assets['third_party_info']['advocate']['email'] ?? null))}}">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="advocate_contact_number" class="">Contact number of advocate</label>
        <input type="text" class="form-control" readonly="true" name="third_party_info[advocate_contact_number]"
            id="advocate_contact_number"
            value="{{old('third_party_info.advocate_contact_number',($assets['third_party_info']['advocate']['contact'] ?? null))}}">
    </div>
</div>


@push('js')
<script type="text/javascript">
    $(document).ready(function(){
        // $('#latest_valuer_name_1_text').val($('#latest_valuer_name_1').text());
    });

    $('#latest_valuer_name_1').select2({       
        dropdownAutoWidth : true,
        width: '100%',
        placeholder: 'Enter keywords to search..',
        ajax: assetsMastersData('{{route("search-valuer")}}')
    }).on('select2:select', function (e) {
        let data = e.params.data;
        $('#latest_valuer_email_1').val(data.email);
        $('#valuer_contact_number_1').val(data.contact);
        $('#latest_valuer_name_1_text').val(data.text);
    });

    $('#latest_valuer_name_2').select2({       
        dropdownAutoWidth : true,
        width: '100%',
        placeholder: 'Enter keywords to search..',
        ajax: assetsMastersData('{{route("search-valuer")}}')
    }).on('select2:select', function (e) {
        let data = e.params.data;
        $('#latest_valuer_email_2').val(data.email);
        $('#valuer_contact_number_2').val(data.contact);
        $('#latest_valuer_name_2_text').val(data.text);
    });

    $('#resolution_agent_name').select2({       
        dropdownAutoWidth : true,
        width: '100%',
        placeholder: 'Enter keywords to search..',
        ajax: assetsMastersData('{{route("search-resolutionagent")}}')
    }).on('select2:select', function (e) {
        let data = e.params.data;
        $('#resolution_agent_email').val(data.email);
        $('#resolution_agent_contact_number').val(data.contact);
        $('#resolution_agent_name_text').val(data.text);
    });

    $('#advocate_name').select2({       
        dropdownAutoWidth : true,
        width: '100%',
        placeholder: 'Enter keywords to search..',
        ajax: assetsMastersData('{{route("search-advocate")}}')
    }).on('select2:select', function (e) {
        let data = e.params.data;
        $('#advocate_email').val(data.email);
        $('#advocate_contact_number').val(data.contact);
        $('#advocate_name_text').val(data.text);
    });

    function assetsMastersData(path){
        return {
            url: path,
            quietMillis: 100,
            data: function (params) {
                var query = {
                    q: params.term
                }
            // Query parameters will be ?search=[term]&type=public
            return query;
            },
            processResults: function (data) {
                let response = data.data;
                return {
                        results: $.map(response, function(value) {
                        return {
                            id: value.id,
                            text: value.text,
                            name: value.name,
                            email: value.email,
                            contact: value.contact,
                        }
                    })
                };
            },
            cache: true
        }
    }

</script>
@endpush