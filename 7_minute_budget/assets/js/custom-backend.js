////////////////////////////////////////////////////////////////////////////////////    
// Script for General Settings Starts //////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////    

$(document).ready( function() {

    var currentURL = window.location.href;
    
    var str1 = currentURL;

    var getMainPage = str1.substring(str1.length - 24); 

    // console.log("====="+getMainPage);

    var str2 = "?page=seven_minute_budget&tab=general";
	
	var substr2 = "?page=seven_minute_budget&updated=true&tab=general";
	
	var substr3 = "?page=seven_minute_budget&updated=true";

    if((getMainPage == "page=seven_minute_budget")||(str1.indexOf(str2) != -1)||(str1.indexOf(substr2) != -1)||(str1.indexOf(substr3) != -1)){    
    
    //////////////////////////////////////////////    
    // Script for Color Pickers Starts ///////////
    /////////////////////////////////////////////

        $('.demo').each( function() {
        
        $(this).minicolors({
        control: $(this).attr('data-control') || 'hue',
        defaultValue: $(this).attr('data-defaultValue') || '',
        format: $(this).attr('data-format') || 'hex',
        keywords: $(this).attr('data-keywords') || '',
        inline: $(this).attr('data-inline') === 'true',
        letterCase: $(this).attr('data-letterCase') || 'lowercase',
        opacity: $(this).attr('data-opacity'),
        // opacity: true,
        position: $(this).attr('data-position') || 'bottom',
        swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
        hide: function() {

            var getclass = $(this).attr('name');

            console.log(getclass + " ---- ");

            $("#"+getclass+"-opacity").attr('value',$(this).attr('data-opacity'));
            
        },
        change: function(hex, opacity) {
        var log;
        
        console.log(" >>>>>>>> "+opacity);

        try {
        log = hex ? hex : 'transparent';
        if( opacity ) log += ', ' + opacity;
        console.log(log);
        } catch(e) {}

        },
        theme: 'default'
        });
        
        });
        
    //////////////////////////////////////////////    
    // Script for Color Pickers Ends ////////////
    /////////////////////////////////////////////


    //////////////////////////////////////////////    
    // Script for Image Uplaod and Preview Starts 
    //////////////////////////////////////////////    
        
        
        fileupload4.onchange = evt => {
        const [file] = fileupload4.files
        if (file) {
        logoupload4.src = URL.createObjectURL(file)
        }
        }
        
        fileupload5.onchange = evt => {
        const [file] = fileupload5.files
        if (file) {
        logoupload5.src = URL.createObjectURL(file)
        }
        }

        
    //////////////////////////////////////////////    
    // Script for Image Uplaod and Preview Ends 
    ////////////////////////////////////////////// 
    
    }

});	

////////////////////////////////////////////////////////////////////////////////////    
// Script for General Settings Ends ////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////    

////////////////////////////////////////////////////////////////////////////////////    
// Script for Other Settings Starts ////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////  

$(document).ready( function() {


    var currentURL = window.location.href;
    var str1 = currentURL;
    var str7 = "?page=seven_minute_budget&tab=records";
    var str8 = "?page=seven_minute_budget&tab=emaillisting";
    var str10 = "?page=seven_minute_budget&tab=email_reminder_data";

/////////////////////////////////////////////////////////////////////////////////
// Submissions  Settings Starts /////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

if(str1.indexOf(str10) != -1){
    
    $(document).ready(function(){

        $('#dtSubmittedEmailListing22').DataTable({
            dom: 'Bfrtip',
            buttons: ['excel', 'csv']
        });

    });
}

if(str1.indexOf(str8) != -1){

    $('select#select_all').on('change', function() {
        var currentValue = this.value; 
        console.log( currentValue);

        if(currentValue == 'selectall') {
            
            $('input.send_email_status').addClass('selected');
            $("input.send_email_status").prop('checked', true);  
            
        } else if (currentValue == 'unselectall') { 

            $('input.send_email_status').removeClass('selected');
            $("input.send_email_status").prop('checked', false); 

        } else {

            $('input.send_email_status').removeClass('selected');
            $("input.send_email_status").prop('checked', false); 

        }

    });  

    $('select#select_status').on('change', function() { 
        $(this).prop("selected", true);
     });  
    
    $('#select_all_status').on('click', function(event) {

        var formData = [];
        
        $('input.send_email_status:checkbox:checked').each(function(i){
          formData[i] = $(this).val();
        });

        var email_status_val= jQuery('select#select_status option:selected').val();

        if(formData != '' && email_status_val != ''){
            
            $.ajax({
                type : 'POST',
                url : ajaxurl,
                data: {
                    'action': 'email_logs_status_update',
                    'email_status': formData,
                    'email_status_value': email_status_val,
                },
                
                beforeSend: function () {
                    $("#myAjaxLoader").show();
                },
                
                success: function(response) {
                    // Handle the server's response here
                    console.log(response.data);
                    jQuery('#alert_success1').show(); 
                    jQuery('#alert_success1').text("Success : " + response.data); 
                    setTimeout(function () {
                        location.reload(true);
                    }, 5000);
                },
                error: function(xhr, status, error) {
                    // Handle any errors that occurred during the AJAX request here
                    console.log("Error: " + error);
                    jQuery('#alert_error1').show(); 
                    jQuery('#alert_error1').text("Error: " + error); 
                    setTimeout(function () {
                        location.reload(true);
                    }, 5000);
                }
            }); 
        } else {
            if(formData != '') {
                alert('Select Status');

            } else if(email_status_val != ''){

                alert('Select Bulk Option');

            } else {
                
                alert('Select Both Options');    
            }
        }
    });

    $('#dtSubmittedEmailListing').DataTable( {
        order:[[1,"asc"]],  
        dom: 'Bfrtip',
        buttons: ['excel','csv']
        
    });

    $('#dtSubmittedEmailListing tbody').on('click', 'tr td .form-group input.send_email_status', function () {
        $(this).toggleClass('selected');
    });


    $('.dataTables_length').addClass('bs-select'); 
    $("#dtSubmittedEmailListing thead tr th").eq("0").click();
}

if(str1.indexOf(str7) != -1) {
    
    console.log(str7 + " found");

    // Script for Adding MDB Pagination and search etc . //

    $('#dtSubmittedCalculations').DataTable();
    $('.dataTables_length').addClass('bs-select'); 
    $("#dtSubmittedCalculations thead tr th").eq("0").click();


    $("#exportAllCalculations").on( "click", function() {

        $.ajax({
            type : 'POST',
            url : ajaxurl,
            data : {
                'action' : 'export_all_calculations_functionality_for_seven'
            },
    
            beforeSend: function () {
                $("#myAjaxLoader").show();
            },
    
            success : function (callback) {
    
                var response = JSON.parse(callback);   
                console.log("Exporting CSV >>>>>>>> ".response);
                var csv = "IP,Housing,Schooling,Transportation,Groceries,Phone/Internet,Emergency,CreditCard Debt,Spend GuiltFree,Pay Yourself,Freedom Cont,JobEarning,HustleEarning,Monthly Saving,Gifts,Cashflow,Money In,Money Out,Emergency,Digital,GuiltFree,Papercut,Freedom\n";

                for(var i = 0; i < response.length; i++){

                    csv += response[i]['ip'] + "," + response[i]['housing_out'] + "," + response[i]['schooling_out'] + "," + response[i]['transportation_out'] + "," + response[i]['groceries_out'] + "," + response[i]['phone_internet_out'] + "," + response[i]['emergency_fund_out'] + "," + response[i]['credit_card_debt_out'] + "," + response[i]['spend_guiltfree_month_out'] + "," + response[i]['pay_yourself_out'] + "," + response[i]['freedom_cont_out'] + "," + response[i]['job_earning_in'] + "," + response[i]['hustle_earning_in'] + "," + response[i]['monthly_saving_in'] + "," + response[i]['gifts_in'] + "," + response[i]['cashflow_results'] + "," + response[i]['money_in_results'] + "," + response[i]['money_out_results'] + "," + response[i]['emergency_results'] + "," + response[i]['digital_results'] + "," + response[i]['guiltfree_results'] + "," + response[i]['papercut_results'] + "," + response[i]['freedom_results'] + "\n";
                }
                
                // Get current date //

                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();

                today = '(' + mm + '/' + dd + '/' + yyyy + ')';

                 // Create a link and trigger the download
                 var link = document.createElement("a");
                 link.href = "data:text/csv;charset=utf-8," + encodeURIComponent(csv);
                 link.download = today+" Calculations.csv";
                 document.body.appendChild(link);
                 link.click();
             
                 // Remove the link
                 document.body.removeChild(link);

                 // Hide Loader //

                 $("#myAjaxLoader").hide();

            },
                
            error: function(errorThrown) {
                    console.log("Error-------"+JSON.stringify(errorThrown));
            }
        }); 

    });

    // Open Warning Modal before deleting entire data table //

    $("#openRemoveSubmissionModal").on( "click", function() {

        $('#del-submissions').modal('show');

    });

    // Delete enteries from Submissions table //
        
    $("#removeSubmissionsPermanently").on( "click", function() {

        $.ajax({
            type : 'POST',
            url : ajaxurl,
            data : {
                'action' : 'delete_submitted_calculations_functionality_for_seven'
            },
            
            beforeSend: function () {
                $("#myAjaxLoader").show();
            },
            
            success : function (callback) {
                console.log("ALL SUBMISSIONS DELETED SUCCESFULLY !");
                $("#myAjaxLoader").hide();
                    location.reload();
     
                },
            error: function(errorThrown) {
                console.log("Error-------"+JSON.stringify(errorThrown));
            }
        });	
    });
}

/////////////////////////////////////////////////////////////////////////////////
// Submissions  Settings Ends ///////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
    
});	

////////////////////////////////////////////////////////////////////////////////////    
// Script for Other Settings Ends //////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////  

