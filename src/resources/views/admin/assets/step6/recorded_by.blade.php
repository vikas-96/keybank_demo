<div class="col-md-24 section-heading">
    <h5>Recorded By</h5>
</div>
@php
$user_id = old('recorded_by.user_id',($assets['recorded_by']['user_id']['_id'] ?? null));
@endphp

<div class="col-md-6">
    <div class="form-group">
        <label for="user_id" class="">User</label>
        <select name="recorded_by[user_id]" id="user_id">
            <option value="">Select</option>
            @if($user_id)
            <option value="{{ $user_id }}" selected>
                {{ old('user_text',($assets['recorded_by']['user_id']['firstname'] ?? null)) }}</option>
            @endif
        </select>
        <input type="hidden" name="user_text" id="user_text"
            value="{{old('user_text',($assets['recorded_by']['user_id']['firstname'] ?? null))}}">
    </div>
</div>
@push('js')
<script>
    $('#user_id').select2({
        dropdownAutoWidth : true,
        width: '100%',    
        placeholder: 'Enter keywords to search..',
        ajax: assetsUserData('{{route("search-user")}}')
    }).on('select2:select', function (e) {
        var data = e.params.data;
        $('#user_text').val(data.text);
    });

    function assetsUserData(path){
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
                        }
                    })
                };
            },
            cache: true
        }
    }
</script>

@endpush