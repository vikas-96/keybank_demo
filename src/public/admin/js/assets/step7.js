$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name = "_token"]').val()
        }
    });
    $("#marketability").select2({
        allowClear: true,
        placeholder: 'Select an option',
        dropdownAutoWidth : true,
        width: '100%',
    });

    $("input.numbers").keypress(function(event) {
      return /\d/.test(String.fromCharCode(event.keyCode));
    });
});