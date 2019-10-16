    <div class="col-md-24 section-heading">
        <h5>Other Known Encumbrances</h5>
    </div>
    <?php
    // $encumbrances = old('encumbrances') !== null ? count(old('encumbrances')) : 1;
    $encumbrances = (old('encumbrances', ($assets['encumbrances'] ?? null)) !== null) && (!empty(old('encumbrances', ($assets['encumbrances'] ?? null)))) ? count(old('encumbrances', ($assets['encumbrances'] ?? null))) : 1;
    ?>
        <div class="col-md-24" id="auction_details">
            <table class="table" id="encumbrancesTable">
                <tr>
                    <th>Other Known Encumbrances</th>
                    <th>Name of authority</th>
                    <th>Date of notice</th>
                    <th>Amount</th>
                    <th>Priority over bank dues</th>
                    <th>Action</th>
                </tr>

            @for($k = 0; $k < $encumbrances; $k++) 
                @php $selected=old('encumbrances.'.$k.'.priority_over_bank_dues',($assets['encumbrances'][$k]['priority_over_bank_dues'] ?? null)); @endphp 
                <tr id="encumbrances_section_{{$k}}">
                    <td>
                        <div class="form-group">
                            <select name="encumbrances[{{$k}}][other_known_encumbrances]" id="other_known_encumbrances_{{$k}}" class="cs-select">
                                <option value="">Select</option>
                                @foreach (config('assets.yes_no_options') as $key=>$v )
                                    <option value={{$key}}
                                        {{(old('encumbrances.'.$k.'.other_known_encumbrances',($assets['encumbrances'][$k]['other_known_encumbrances'] ?? null))==$key)?'selected':''}}>
                                        {{$v}}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" name="encumbrances[{{$k}}][authority_name]" id="authority_name_{{$k}}" value="{{ old('encumbrances.'.$k.'.authority_name',($assets['encumbrances'][$k]['authority_name'] ?? null)) }}">
                        </div>
                    </td>
                    <td>
                        <div class="input-group form-group date past_date" data-provide="datepicker" data-date-format="dd-mm-yyyy">
                            <div class="form-group">
                                <div class="date-picker">
                            <input type="text" name="encumbrances[{{$k}}][notice_date]" id="notice_date_{{$k}}" value="{{ old('encumbrances.'.$k.'.notice_date',($assets['encumbrances'][$k]['notice_date'] ?? null)) }}" readonly>
                            <div class="input-group-addon">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </div>
                        </div>
                        </div>
                    </div>
                    </td>
                    <td>
                        <div class="form-group">
                        <input type="number" name="encumbrances[{{$k}}][amount]" id="amount_{{$k}}" value="{{ old('encumbrances.'.$k.'.amount',($assets['encumbrances'][$k]['amount'] ?? null)) }}">
                    </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select name="encumbrances[{{$k}}][priority_over_bank_dues]" id="priority_over_bank_dues_{{$k}}" class="cs-select">
                                <option value="">Select</option>
                                <option value="yes" {{($selected == 'yes')?"selected":''}}>Yes</option>
                                <option value="no" {{($selected == 'no')?"selected":''}}>No</option>
                                <option value="unknown" {{($selected == 'unknown')?"selected":''}}>Unknown</option>
                            </select>
                        </div>
                    </td>
                    @if($k == 0)
                        <td><button type="button" id="add_encumbrances" class="btn btn-success">Add More</button></td>
                    @else
                        <td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>
                    @endif
                </tr>
            @endfor
            </table>
        </div>
@push('js')
<script>
    var i = {{ $encumbrances }};

    $(document).ready(function() {

        let options = <?php echo json_encode(config('assets.yes_no_options')); ?>;

        $("#add_encumbrances").click(function() {
            let appnd =
                '<tr>' +
                    '<td>'+
                        '<div class="form-group">'+
                            '<select name="encumbrances[' + i + '][other_known_encumbrances]" id="other_known_encumbrances_' + i + '" class="cs-select">' +
                                '<option value="">Select</option>';
                                    $.map(options, function(v, k) {
                                        appnd += '<option value=' + k + '>' + v + '</option>';
                                    });
                appnd +=    '</select>' +
                        '</div>'+
                    '</td>'+
                    '<td>'+
                        '<div class="form-group">'+
                            '<input type="text" name="encumbrances[' + i + '][authority_name]" id="authority_name_' + i + '">' +
                        '</div>'+
                    '</td>'+
                    '<td>'+
                        '<div class="input-group form-group date past_date" data-provide="datepicker" data-date-format="dd-mm-yyyy">' +
                            '<div class="form-group">'+
                                '<div class="date-picker">'+
                                    '<input type="text" name="encumbrances[' + i + '][notice_date]" id="notice_date_' + i + '" readonly>' +
                                    '<div class="input-group-addon">' +
                                        '<i class="fa fa-calendar" aria-hidden="true"></i>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</td>'+
                    '<td>'+
                        '<div class="form-group">'+
                            '<input id="amount_' + i + '" type="number" name="encumbrances[' + i + '][amount]" />' +
                        '</div>'+
                    '</td>'+
                    '<td>'+
                        '<div class="form-group">'+
                            '<select name="encumbrances[' + i + '][priority_over_bank_dues]" id="priority_over_bank_dues_' + i + '" class="cs-select">' +
                                '<option value="">Select</option>';
                                    $.map(options, function(v, k) {
                                        appnd += '<option value=' + k + '>' + v + '</option>';
                                    });
                appnd +=    '</select>' +
                        '</div>'+
                    '</td>'+
                    '<td>'+
                        '<div class="form-group">'+
                            '<button type="button" class="btn btn-danger remove-tr">Remove</button>'+
                        '</div>'+
                    '</td>' +
                    '</tr>';

            $("#encumbrancesTable").append(appnd);

            $('#priority_over_bank_dues_' + i).select2({
                allowClear: true,
                dropdownAutoWidth: true,
                width: '100%',
                placeholder: 'Select an option',
            });
            $('#other_known_encumbrances_' + i).select2({
                dropdownAutoWidth: true,
                width: '100%',
                placeholder: 'Select an option',
            });
            $('.past_date').datepicker({
                endDate: new Date(),
                todayHighlight: true,
                //startDate: '+1d',
                format: 'dd/mm/yyyy',
                autoclose: true,
            }); 
            i++;
        });

        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });

    });
</script>

@endpush