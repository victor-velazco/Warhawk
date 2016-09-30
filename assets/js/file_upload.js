$("#btn-file-upload").click(function() {
    $( "#file-upload" ).trigger( "click" );
});

$("#load-file").click(function() {

    //console.log("Load clicked!");
    var file_data = $('#file-upload').prop('files')[0];   
    if (file_data===undefined) {
    	$("#m-title").html("Error!");
    	$("#m-message").html("<p>Please select a file.</p>");
    	$("#wgc-modal").modal('show');
    	return;
    }
    var form_data = new FormData(); 
    //console.log("In form data");                 
    form_data.append('file', file_data);
    //console.log((!file_data['name'].endsWith('.xls') && !file_data['name'].endsWith('.xlsx')) );    
    //if (!file_data['name'].endsWith('.xls') && !file_data['name'].endsWith('.xlsx')) {
    if (!file_data['name'].endsWith('.csv')) {
    	$("#m-title").html("Warning!");
    	//$("#m-message").html("<p>Please select a valid Excel file (.xls or .xlsx)</p>");
        $("#m-message").html("<p>Please select a valid CSV file (.csv)</p>");
    	$('#file-upload').val('');
    	$("#wgc-modal").modal('show');
    	return;
    } 
    //console.log('Uploading file...');
    
    $("#load-file").prop('disabled', true);
    $("#m-header").hide();
    $("#m-footer").hide();
    $("#m-title").html("Loading file");
    $("#m-message").html("Please wait while loading file....<br/>This can take a while.");
    $("#wgc-modal").modal({ backdrop: 'static', keyboard: true, show: true });
    $.ajax({
        url: $('#url-server').val() + 'index.php/administrator/upload_file', // point to server-side PHP script 
        dataType: 'json',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'POST',
        success: function(php_script_response){
            //console.log(JSON.stringify(php_script_response));
            $('#file-upload').val('');
            $("#load-file").prop('disabled', false);
            $("#m-message").html(php_script_response['message']);
            $("#m-footer").show();
            location = $('#url-server').val();
        },
        error: function(result) {
            $('#file-upload').val('');
            $("#load-file").prop('disabled', false);
            if (result['responseJSON']===undefined) {
                $("#m-message").html("<h3>An unexpected error has ocurred, please contact your system adminstrator.<br />&nbsp;&nbsp;&nbsp;Error details: </h3>" + 
                    result.responseText);
            } else {            
                $("#m-message").html(result['responseJSON']['message']);
            }
            $("#m-footer").show();
            //$("#wgc-modal").modal('hide');
        }
     });
     
});