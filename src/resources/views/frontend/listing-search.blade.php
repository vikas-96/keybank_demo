@extends('frontend.layouts.auth')


@section('content')
	<form action="{{ route('asset.list',['view'=>($view) ?? '']) }}" id="category-selection-form">
		<ul class="search-form-main">
			<li>
				<select class="form-control" name="property_category" id="property_category">
					<option></option>
					<option value="immovable"
						{{(old('property_category',($property_category ?? null)) == 'immovable')?'selected':''}}>
						Immovable</option>
					<option value="movable"
						{{(old('property_category',($property_category ?? null)) == 'movable')?'selected':''}}>
						Movable</option>
				</select>
			</li>
			<li>
				<select class="form-control" name="property_type" id="property_type">
					<option></option>
					{{--<option {{old('property_type',($property_type ?? null))}} selected>
					{{old('property_type',($property_type ?? null))}}
					</option>--}}
				</select>
			</li>
			<li>
				<select class="form-control" name="property_sub_type" id="property_sub_type">
					<option></option>
					{{--<option {{old('property_sub_type',($property_sub_type ?? null))}}
					selected>{{old('property_sub_type',($property_sub_type ?? null))}}</option>--}}
				</select>
			</li>
			<li>
				<button type="submit" class="btn btn-primary">Search</button>
			</li>
		</ul>
	</form>

@endsection



@push('js')
<script type="text/javascript">
	$(document).ready(function(){

		$("#property_category").attr("data-placeholder","Select Category");
		$("#property_type").attr("data-placeholder","Select Property Type");
		$("#property_sub_type").attr("data-placeholder","Select Subtype");
		$('#property_category, #property_type, #property_sub_type').select2({
            dropdownAutoWidth: true,
            width: '100%'
        });
        var property_category = $("#property_category").val();
        var property_type = "{{old('property_type',($property_type ?? null))}}";
        var property_sub_type ="{{old('property_sub_type',($property_sub_type ?? null))}}";
		$("#property_category").change(function(e){
			let property_category = e.target.value;
            if (property_category) {
                getCategoryOptions('property_category', property_category);
            }
		});

		$("#property_type").change(function(e){
			let property_type = e.target.value;
			if(property_type){
			if (property_type == "others" || property_type == "vehicles" ||
                        property_type == "stock") {
                    $("#property_sub_type").select2().empty().prop("disabled", true);
                } else {
                    $("#property_sub_type").prop("disabled", false)
                   
                }
				getCategoryOptions('property_sub_type', property_type);
				}
		});
		
		if(property_category != '')
		{
			$('#property_category').trigger('change');
		}

		function getCategoryOptions(type, selected_val) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: "{{ route('get-cat') }}",
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
                            placeholder: 'Select Property Type',
                            data: data
                        });
                        if(property_type != ''){
                        	$("#property_type").val(property_type);
                        	$('#property_type').trigger('change');
                        }
                    } else if (type == "property_sub_type") {
                        $("#property_sub_type").empty();
                        $("#property_sub_type").select2({
                            dropdownAutoWidth: true,
                            width: '100%',
                            placeholder: 'Select Property Subtype',
                            data: data
                        });
                        if(property_sub_type != ''){
                        	$("#property_sub_type").val(property_sub_type);
                        	$('#property_sub_type').trigger('change');
                        }
                       
                    }
                }
            });
        }
});
</script>


@endpush