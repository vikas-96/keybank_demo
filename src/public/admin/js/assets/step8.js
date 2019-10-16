$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name = "_token"]').val()
        }
    });
    var count = $('#count').val();
    $('.deleteDocument').click(function(){
        var documentMasterId = $(this).attr('data-id');
        var documentType = $(this).attr('data-type');
        var deleteDocumentDiv = $(this).parent();
        
        let conf = confirm('Are you sure you want to delete this document?');
        if(conf){
            $('.loading').show();
            $.ajax({
                url: STEP8_DELETE_URL,
                type: "POST",
                data: {
                    'id' : documentMasterId
                },
                success: function (data) {
                    //console.log(data);
                    $('.loading').hide();
                    var returnedData = JSON.parse(data);
                    if(returnedData.response == 'success'){
                        if(documentType == 'property_photos'){
                            //$('#'+documentType+'_path').val(''); 
                            deleteDocumentDiv.remove();
                            count--;
                            if(count < 5)
                            {
                                $('#'+documentType).val('');
                                $('#'+documentType).prop("disabled", false);
                                $('.showProperyHiddenField').show();
                            }
                            $('#count').val(count);
                        }else{
                            $('#'+documentType+'_path').val(''); 
                            $('#'+documentType).val('');
                            $('#'+documentType).prop("disabled", false);
                            deleteDocumentDiv.remove();
                        }
                    }else{

                        //$('#'+documentType).val(''); 
                        $('.'+documentType+'_error').html(returnedData.message);
                    }
                }
            });
        }
    });
    $('.upload_document').change(function(){    
        //on change event  
        formdata = new FormData();
        var curr_doc = this;
        inputId = $(this).prop('id');
        $('.'+inputId+'_error').html('');
        var file_length = $(this).prop('files').length;
        if(inputId == 'property_photos'){
            file_length = parseInt(file_length) + parseInt(count);
        }
        var arr = [];

        if(file_length > 0 && file_length < 6)
        {   
            $.each(curr_doc.files, function(i, obj){
                file =curr_doc.files[i];
                formdata.append('file', file);
                formdata.append('id', $('#asset_id').val());
                formdata.append('type', inputId);
                $('.loading').show();
                $.ajax({
                    url: STEP8_UPLOAD_URL,
                    type: "POST",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        //console.log(data);
                        $('.loading').hide();
                        var returnedData = JSON.parse(data);
                        if(returnedData.response == 'success'){
                            if(returnedData.data.path != null)
                            {
                                //$('#'+returnedData.data.type+'_path').val(returnedData.data.path);
                                if(inputId == 'property_photos'){
                                    arr.push(returnedData.data.path)
                                    $('input:hidden[name="property[property_photos][document][]"]').val(JSON.stringify(arr));
                                    
                                }else{
                                   $('#'+returnedData.data.type+'_path').val(returnedData.data.path); 
                                }
                                
                            }
                        }else{
                            $('#'+inputId).val(''); 
                            $('.'+inputId+'_error').html(returnedData.message);
                        }
                        
                    }
                });
            });
        }else{
            alert('You can only upload a maximum of 5 files');
            $(this).val('');
        }
    });
    $("#step8_submit_btn").click(function(){        
        $("#step8_form")[0].submit(); // Submit the form
    });
});