@extends('admin.layouts.auth')

@section('title', 'Add Asset')

@section('content')
<div class="row">
    <div class="col-24">
        <div class="card">
            <div class="card-header">
                <strong>Add New Asset</strong>
            </div>

            <div class="card-body card-block">
                <form method="POST" id="property_category_form" action="{{ route('post-asset-category') }}" class="row">
                    @csrf
                    <div class="col-md-24 section-heading">
                        <h5>Property Details</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="property_category">Property Category:</label>
                            <select name="property_category" id="property_category">
                                <option></option>
                                @foreach(config('assets.property_category') as $k=>$v)
                                <option value="{{$k}}" {{ (old('property_category')==$k) ? "selected":"" }}>{{$v}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 property_type_section" style="display:none">
                        <div class="form-group">
                            <label class="required" for="property_type">Property Type:</label>
                            <select name="property_type" id="property_type" class="cs-select">
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 property_subtype_section" class="cs-select" style="display:none">
                        <div class="form-group">
                            <label class="required" for="property_sub_type">Property Sub Type:</label>
                            <select name="property_sub_type" id="property_sub_type">
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 other_section" style="display:none">
                        <div class="form-group">
                            <label class="required" for=" description">Description:</label>
                            <input type="text" id=" description" name="description">
                        </div>
                    </div>

            </div>
            <div class=" card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    Save & Next
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
    let old_property_type = "{{old('property_type')}}"
    let old_property_sub_type = "{{old('property_sub_type')}}"

    $(document).ready(function () {

        $('.cs-select').select2({
            placeholder: 'Select an option',
            dropdownAutoWidth: true,
            width: '100%'
        });

        $("#property_category").select2({
            placeholder: 'Select an option',
            dropdownAutoWidth: true,
            width: '100%',
        }).on('change.select2', function (e) {
            let property_category = e.target.value;
            if (property_category) {
                $('.property_type_section').css('display', 'block');
                getCategoryOptions('property_category', property_category);
            }
        });

        $("#property_category").trigger('change');

        $('#property_type').change(function (e) {

            e.preventDefault();
            let property_type = $(this).val();

            if (property_type) {
                $('.property_subtype_section').css('display', 'block');
                if (property_type == "others" || property_type == "vehicles" ||
                        property_type == "stock") {
                    $(".other_section").css('display', 'block');
                    $("#property_sub_type").select2().empty().prop("disabled", true);
                } else {
                    $("#property_sub_type").prop("disabled", false)
                    $(".other_section").css('display', 'none');
                }
                getCategoryOptions('property_sub_type', property_type);
            }
        });

        function getCategoryOptions(type, selected_val) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: "{{ route('get-categories') }}",
                data: {type: type, val: selected_val},
                success: function (response) {
                    let data = [];
                    if (response.length != 0) {
                        $.each(JSON.parse(response), function (key, value) {
                            data.push({
                                id: key,
                                text: value
                            });
                        });
                    }
                    if (type == "property_category") {
                        $("#property_type").empty();
                        $("#property_sub_type").empty();
                        $("#property_type").select2({
                            dropdownAutoWidth: true,
                            width: '100%',
                            placeholder: 'Select an option',
                            data: data
                        });
                        $("#property_type").val(old_property_type).trigger('change');
                    } else if (type == "property_sub_type") {
                        $("#property_sub_type").empty();
                        $("#property_sub_type").select2({
                            dropdownAutoWidth: true,
                            width: '100%',
                            placeholder: 'Select an option',
                            data: data
                        });
                        $("#property_sub_type").val(old_property_sub_type).trigger('change');
                    }
                }
            });
        }
    });
</script>
@endpush