////////////////////////////////////////////////////////////////////////////////////    
// Script for Frontend Only Starts ===============================================//
////////////////////////////////////////////////////////////////////////////////////    

/////////////////////////////////////////////////////////////////////////
// Calculator Page Functionalities Starts >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
/////////////////////////////////////////////////////////////////////////

// Get the fixed element
var fixedElement = document.querySelector('#calculator-graph--above');


	


// Get the offset position of the fixed element
var sticky = fixedElement.offsetTop;

// Add the sticky class to the fixed element and adjust its position when needed
function myFunction() {
  if (window.pageYOffset >= sticky) {
    fixedElement.style.position = 'fixed';
    fixedElement.style.zIndex = '999999999';
    fixedElement.style.width = '100%';
    fixedElement.style.left = '0';
    fixedElement.style.right = '0';
    fixedElement.style.maxWidth = '1000px';
    fixedElement.style.margin = 'auto';
    fixedElement.style.top = '0';
    fixedElement.style.padding = '10px';
  } else {
    fixedElement.style.position = '';
    fixedElement.style.zIndex = '';
    fixedElement.style.width = '';
    fixedElement.style.left = '';
    fixedElement.style.right = '';
    fixedElement.style.maxWidth = '';
    fixedElement.style.margin = '';
    fixedElement.style.top = '';
    fixedElement.style.padding = '';
  }
}

// Listen for the scroll, resize, and click events
window.addEventListener('scroll', myFunction);
window.addEventListener('resize', myFunction);
window.addEventListener('click', myFunction);


$(window).on("load", function () {
    setTimeout(function(){
    jQuery(document).on("click", ".cr-open-mobile-nav", function(evt){
        evt.preventDefault();
        jQuery("div#cr-mobile-panel").toggleClass("active");
    });
    
    jQuery(document).on("click", ".cr-mobile-close_navbar", function(evt){
        evt.preventDefault();
        jQuery("div#cr-mobile-panel").removeClass("active");
    });
  }, 1000);
  console.log("run--custom");
    jQuery("#payyourselffirst").val(0).attr("value", "0");
    setTimeout(function(){
        if( jQuery.cookie("this_month_spend_on_housing") ){
            jQuery("input").trigger("keyup");
        }
    }, 100);
});  
    
$(document).ready(function () {

    console.log("run");
    console.log("processform");
    
        // Attach an event listener to the form's submit button
$('#my-form').submit(function(event) {
     console.log("budget");
  // Prevent the default form submission behavior
  event.preventDefault();

  // Get the form data as an object
  var formData = $(this).serialize();
 
  //console.log(formData);

  // Send an AJAX request to the server to process the form data
  $.ajax({
     type : 'POST',
     url : ajaxurl,
     data: {
     'action': 'process_form',
     'form_data': formData
    },
    
    success: function(response ) {
      // Handle the server's response here
      //console.log(response.data);
      /*if ( ! response.success ) { 
        console.log(response.data);
        jQuery('div#overlay.budgetmodal').addClass("alert_success_max_height");
        jQuery('#alert_error').show(); 
        jQuery('#alert_error').text("Error : " + response.data);
      } else {*/
      console.log( response );
     // jQuery('div#overlay.budgetmodal').hide(); 
      //swal("Success : " + response.data);
      jQuery('div#overlay.budgetmodal').addClass("alert_success_max_height");
      jQuery('#alert_success').show(); 
      jQuery('#alert_success').text("Success : " + response.data);
    /*}*/
       
      
    },
    error: function(xhr, status, error) {
      // Handle any errors that occurred during the AJAX request here
     console.log("Error: " + error);
     jQuery('#alert_error').show(); 
     jQuery('#alert_error').text("Error: " + error); 
    }
  });
});

// append cookies values input boxes
    jQuery("input").each(function(){
        var name_7minutebudget =  jQuery(this).attr("name");
        jQuery('#cst_form_id input[name="'+name_7minutebudget+'"]').val( jQuery.cookie(name_7minutebudget) );
        jQuery('#my-form input[name="'+name_7minutebudget+'"]').val( jQuery.cookie(name_7minutebudget) );

    });

    setTimeout(function(){
        if( jQuery.cookie("this_month_spend_on_housing") ){
            jQuery("input").trigger("keyup");
        }
    }, 100);

    var Housing = parseFloat( jQuery("#this_month_spend_on_housing").val() );
    var Schooling = parseFloat( jQuery("#this_month_spend_on_schooling").val() );
    var Transportation = parseFloat( jQuery("#this_month_spend_on_transportation").val() );
    var Groceries = parseFloat( jQuery("#this_month_spend_on_groceries").val() );
    var PhoneInternet = parseFloat( jQuery("#this_month_spend_on_phoneinternetaccess").val() );
    var EmergencyFund = parseFloat( jQuery("#invest_towards_emergency_fund").val() );
    var CreditCardDebt = parseFloat( jQuery("#towardcredit_card_debt_this_month").val() );
    var GuiltFreeSpending = parseFloat( jQuery("#this_month_spend_on_guiltfreespending").val() );
    // var Papercuts  = parseFloat( jQuery("#payyourselffirst").val() );
    var Papercuts  = 0;
    var FreedomContribution = parseFloat( jQuery("#freedom_contribution").val() );
    var JobEarnings = parseFloat( jQuery("#youllearn_this_month_fromjob").val() );
    var SideHustle = parseFloat( jQuery("#earn_side_hustling").val() );
    var Savings = parseFloat( jQuery("#passive_income_coming").val() );
    var Gifts = parseFloat( jQuery("#receive_from_gifts").val() );

    // Allow Whole Positive parseFloats Only //

    $(".calculator-input").on("keydown", function(evt) {

        // console.log("clicked ! ");

        if (( evt.which != 46 ) && (evt.which < 48 || evt.which > 57) && (evt.which != 8 ) && (evt.which != 37 ) && (evt.which != 39 ) && (evt.which < 96 || evt.which > 105)) 
        {
          evt.preventDefault();

        }
        
    });

    // Adding error classes in all inputs with missing values //

    $(document).on("keyup", ".calculator-input", function(){

        $('.calculator-input').each(function(index) {

            if( $(this).val() == "" ){

                $(this).addClass("error");

            }else{

                $(this).removeClass("error");

            }

        });
        
    });
    

    $(document).on("keyup", ".calculator-input", function(){
       

            jQuery("#realtimeCalculateSave_Export").attr("disabled", "disabled");

        if($("#this_month_spend_on_housing").val() == ""){

            console.log("this_month_spend_on_housing value is Missing !");
            jQuery("#calculator-subtitle-error").html('<b>Please fill How much will you spend this month on housing?</b> ');

        }else if($("#this_month_spend_on_schooling").val() == ""){

            console.log("this_month_spend_on_schooling value is Missing !");
            jQuery("#calculator-subtitle-error").html('<b>Please fill How much will you spend this month on schooling?</b> ');

        }else if($("#this_month_spend_on_transportation").val() == ""){

            console.log("this_month_spend_on_transportation value is Missing !");
            jQuery("#calculator-subtitle-error").html('<b>Please fill How much will you spend this month on transportation?</b> ');

        }else if($("#this_month_spend_on_groceries").val() == ""){

            console.log("this_month_spend_on_groceries value is Missing !");
            jQuery("#calculator-subtitle-error").html('<b>Please fill How much will you spend this month on groceries?</b> ');

        }else if($("#this_month_spend_on_phoneinternetaccess").val() == ""){

            console.log("this_month_spend_on_phoneinternetaccess value is Missing !");
            jQuery("#calculator-subtitle-error").html('<b>Please fill How much will you spend this month on phone/internet service?</b> ');

        }else if($("#invest_towards_emergency_fund").val() == ""){

            console.log("invest_towards_emergency_fund value is Missing !");
            jQuery("#calculator-subtitle-error").html('<b>Please fill How much do you want to invest toward your emergency fund?</b> ');

        }else if($("#towardcredit_card_debt_this_month").val() == ""){

            console.log("towardcredit_card_debt_this_month value is Missing !");
            jQuery("#calculator-subtitle-error").html('<b>Please fill How much do you want to pay towardcredit card debt this month?</b> ');

        }else if($("#this_month_spend_on_guiltfreespending").val() == ""){

            console.log("this_month_spend_on_guiltfreespending value is Missing !");
            jQuery("#calculator-subtitle-error").html('<b>Please fill How much do you want to spend this month on guilt-free spending?</b> ');

        }else if($("#payyourselffirst").val() == ""){

            console.log("payyourselffirst value is Missing !");
            jQuery("#calculator-subtitle-error").html('<b>Please fill How much will you pay yourself first this month by saving on papercuts?</b> ');

        }else if($("#freedom_contribution").val() == ""){

            console.log("freedom_contribution value is Missing !");
            jQuery("#calculator-subtitle-error").html('<b>Please fill How much would you like to invest toward your Freedom Contribution at the beginning of the month?</b> ');
            
        }else if($("#youllearn_this_month_fromjob").val() == ""){

            console.log("youllearn_this_month_fromjob value is Missing !");
            jQuery("#calculator-subtitle-error").html('<b>Please fill How much money will you earn this month at your job?</b> ');

        }else if($("#earn_side_hustling").val() == ""){

            console.log("earn_side_hustling value is Missing !");
            jQuery("#calculator-subtitle-error").html('<b>Please fill How much will you earn side hustling this month?</b> ');

        }else if($("#passive_income_coming").val() == ""){

            console.log("passive_income_coming value is Missing !");
            jQuery("#calculator-subtitle-error").html('<b>Please fill Do you have any savings or passive income coming in this month?</b> ');

        }else if($("#receive_from_gifts").val() == ""){

            console.log("receive_from_gifts value is Missing !");
            jQuery("#calculator-subtitle-error").html('<b>Please fill How much money will you receive from gifts to spend this month?</b> ');

        }else{

            // Good to go with the Calculations and Formulas //
            jQuery("#calculator-subtitle-error").html('');
            jQuery("#realtimeCalculateSave_Export").removeAttr("disabled");

            // hide all answer divs by default
            jQuery(".calculator-money-results-varying .calculator-money-results-varying").hide();
            // remove classes by default
            jQuery(".meter-progress .meter-progress-niddle").removeClass("niddle-blue");
            jQuery(".meter-progress .meter-progress-niddle").removeClass("niddle-red");
            jQuery(".meter-progress .meter-progress-niddle").removeClass("niddle-yellow");

            var Housing = parseFloat( jQuery('input[name="this_month_spend_on_housing"]').val() );
            var Schooling = parseFloat( jQuery('input[name="this_month_spend_on_schooling"]').val() );
            var Transportation = parseFloat( jQuery('input[name="this_month_spend_on_transportation"]').val() );
            var Groceries = parseFloat( jQuery('input[name="this_month_spend_on_groceries"]').val() );
            var PhoneInternet = parseFloat( jQuery('input[name="this_month_spend_on_phoneinternetaccess"]').val() );
            var EmergencyFund = parseFloat( jQuery('input[name="invest_towards_emergency_fund"]').val() );
            var CreditCardDebt = parseFloat( jQuery('input[name="towardcredit_card_debt_this_month"]').val() );
            var GuiltFreeSpending = parseFloat( jQuery('input[name="this_month_spend_on_guiltfreespending"]').val() );
            // var Papercuts  = parseFloat( jQuery('input[name="payyourselffirst"]').val() );
            var Papercuts  = 0;
            var FreedomContribution = parseFloat( jQuery('input[name="freedom_contribution"]').val() );

            var JobEarnings = parseFloat( jQuery('input[name="youllearn_this_month_fromjob"]').val() );
            var SideHustle = parseFloat( jQuery('input[name="earn_side_hustling"]').val() );
            var Savings = parseFloat( jQuery('input[name="passive_income_coming"]').val() );
            var Gifts = parseFloat( jQuery('input[name="receive_from_gifts"]').val() );


            /***********************************************************/
            /***********************Cashflow meter**********************/
            /***********************************************************/
            var FirstCalculation = (JobEarnings + SideHustle + Savings + Gifts);
            var SecondCalculation = (Housing + Schooling + Transportation + Groceries + PhoneInternet + EmergencyFund + CreditCardDebt + GuiltFreeSpending + FreedomContribution);

            var CashflowMeter = FirstCalculation - SecondCalculation;
                
            if( CashflowMeter < 1 && CashflowMeter != 0 ){
                jQuery(".meter-progress .meter-progress-niddle").addClass("niddle-red");
                jQuery(".calculator .calculator-total .calculator-total-container h2#calculator-total-amount").show();
                jQuery("#BelowZeroEntry").show();
                // change gauge pricing on keyup
                jQuery(".calculator-total-amount-abs--custom").html( "-$" + Math.abs( Math.round(CashflowMeter) ) );
                jQuery("h2.calculator-total-amount-abs.calculator-total-amount-abs--custom").removeClass("yellow green");
                jQuery("h2.calculator-total-amount-abs.calculator-total-amount-abs--custom").addClass("red");
                jQuery.cookie("calculator-total-amount-abs--custom", "-$" + Math.abs( Math.round(CashflowMeter) ),{ expires: 7 });

            } else if(CashflowMeter >= 1){
                jQuery(".calculator .calculator-total .calculator-total-container h2#calculator-total-amount").hide();
                jQuery(".meter-progress .meter-progress-niddle").addClass("niddle-green");
                jQuery("#AboveZeroEntry").show();
                // change gauge pricing on keyup
                jQuery(".calculator-total-amount-abs").html("+$" + Math.round(CashflowMeter) );
                jQuery("h2.calculator-total-amount-abs.calculator-total-amount-abs--custom").removeClass("yellow red");
                jQuery("h2.calculator-total-amount-abs.calculator-total-amount-abs--custom").addClass("green");
                jQuery.cookie("calculator-total-amount-abs--custom", "+$" + Math.round(CashflowMeter),{ expires: 7 });

            } else if (CashflowMeter == 0) {
                jQuery(".calculator .calculator-total .calculator-total-container h2#calculator-total-amount").hide();
                jQuery(".meter-progress .meter-progress-niddle").addClass("niddle-yellow");
                jQuery("#OnlyZeroEntry").show();
                // change gauge pricing on keyup
                jQuery(".calculator-total-amount-abs").html( "$"+Math.round(CashflowMeter) );
                jQuery("h2.calculator-total-amount-abs.calculator-total-amount-abs--custom").removeClass("red green");
                jQuery("h2.calculator-total-amount-abs.calculator-total-amount-abs--custom").addClass("yellow");
                jQuery.cookie("calculator-total-amount-abs--custom", "$"+Math.round(CashflowMeter),{ expires: 7 });

            } else {

            }


            /***********************************************************/
            /*************************Money In**************************/
            /***********************************************************/
            var MoneyIn = JobEarnings + SideHustle + Savings + Gifts;
            if(MoneyIn < 1 && MoneyIn != 0) {
                jQuery(".MoneyInValueAppend").html( "-$" + Math.abs( Math.round(MoneyIn).toLocaleString("en") ) );
                jQuery.cookie("MoneyInValueAppend", "-$" + Math.abs( Math.round(MoneyIn).toLocaleString("en") ),{ expires: 7 });
            }else{
                jQuery(".MoneyInValueAppend").html( "$" + Math.round(MoneyIn).toLocaleString("en") );
                jQuery.cookie("MoneyInValueAppend", "-$" + Math.round(MoneyIn).toLocaleString("en"),{ expires: 7 });
            }

            /***********************************************************/
            /*************************Money Out*************************/
            /***********************************************************/
            var MoneyOut = SecondCalculation;
            if(MoneyOut < 1 && MoneyOut != 0) {
                jQuery(".MoneyOutValueAppend").html( "-$" + Math.abs( Math.round(MoneyOut).toLocaleString("en") ) );
                jQuery.cookie("MoneyOutValueAppend", "-$" + Math.abs( Math.round(MoneyOut).toLocaleString("en") ),{ expires: 7 });
            }else{
                jQuery(".MoneyOutValueAppend").html( "$" + Math.round(MoneyOut).toLocaleString("en") );
                jQuery.cookie("MoneyOutValueAppend", "$" + Math.round(MoneyOut).toLocaleString("en"),{ expires: 7 });
            }

            /***********************************************************/
            /**********************Emergency fund **********************/
            /***********************************************************/
            var EmergencyFund = EmergencyFund;
            if(EmergencyFund < 1 && EmergencyFund != 0) {
                jQuery("#EmergencyFundThisMonth").html( "-$" + Math.abs( Math.round(EmergencyFund).toLocaleString("en") ) );
                jQuery.cookie("EmergencyFundThisMonth", "-$" + Math.abs( Math.round(EmergencyFund).toLocaleString("en") ),{ expires: 7 });
            }else{
                jQuery("#EmergencyFundThisMonth").html( "$" + Math.round(EmergencyFund).toLocaleString("en") );
                jQuery.cookie("EmergencyFundThisMonth", "$" + Math.round(EmergencyFund).toLocaleString("en"),{ expires: 7 });
            }

            /***********************************************************/
            /**********************DigitalEnvelope**********************/
            /***********************************************************/
            var DigitalEnvelope = (Housing + Schooling + Transportation + Groceries + PhoneInternet + CreditCardDebt + GuiltFreeSpending) - (Papercuts);
            if(DigitalEnvelope < 1 && DigitalEnvelope != 0) {
                jQuery("#DigitalEnvelopeThisMonth").html( "-$" + Math.abs( Math.round(DigitalEnvelope).toLocaleString("en") ) );
                jQuery.cookie("DigitalEnvelopeThisMonth", "-$" + Math.abs( Math.round(DigitalEnvelope).toLocaleString("en") ),{ expires: 7 });
            }else{
                jQuery("#DigitalEnvelopeThisMonth").html( "$" + Math.round(DigitalEnvelope).toLocaleString("en") );
                jQuery.cookie("DigitalEnvelopeThisMonth", "$" + Math.round(DigitalEnvelope).toLocaleString("en"),{ expires: 7 });
            }

            /***********************************************************/
            /**********************Papercut Account**********************/
            /***********************************************************/
            var PapercutAccount = Papercuts;
            if(PapercutAccount < 1 && PapercutAccount != 0) {
                jQuery("#PapercutAccountThisMonth").html( "-$" + Math.abs( Math.round(PapercutAccount).toLocaleString("en") ) );
                jQuery.cookie("DigitalEnvelopeThisMonth", "-$" + Math.abs( Math.round(PapercutAccount).toLocaleString("en") ),{ expires: 7 });
            }else{
                jQuery("#PapercutAccountThisMonth").html( "$" + Math.round(PapercutAccount).toLocaleString("en") );
                jQuery.cookie("DigitalEnvelopeThisMonth", "$" + Math.round(PapercutAccount).toLocaleString("en"),{ expires: 7 });
            }

            /***********************************************************/
            /**********************Freedom Account**********************/
            /***********************************************************/
            var FreedomContributionAnswer = FreedomContribution;
            if(FreedomContributionAnswer < 1 && FreedomContributionAnswer != 0) {
                jQuery("#FreedomAccountThisMonth").html( "-$" + Math.abs( Math.round(FreedomContributionAnswer).toLocaleString("en") ) );
                jQuery.cookie("DigitalEnvelopeThisMonth", "-$" + Math.abs( Math.round(FreedomContributionAnswer).toLocaleString("en") ),{ expires: 7 });
            }else{
                jQuery("#FreedomAccountThisMonth").html( "$" + Math.round(FreedomContributionAnswer).toLocaleString("en") );
                jQuery.cookie("DigitalEnvelopeThisMonth", "$" + Math.round(FreedomContributionAnswer).toLocaleString("en"),{ expires: 7 });
            }

            /***********************************************************/
            /**********************Papercut Account**********************/
            /***********************************************************/
            var JobsSideHustlesGiftsSavings = JobEarnings + SideHustle + Savings + Gifts;
            if(JobsSideHustlesGiftsSavings < 1 && JobsSideHustlesGiftsSavings != 0) {
                jQuery(".JobsSideHustlesGiftsSavings_Price").html( "-$" + Math.abs( Math.round(JobsSideHustlesGiftsSavings).toLocaleString("en") ) );
                jQuery.cookie("DigitalEnvelopeThisMonth", "-$" + Math.abs( Math.round(JobsSideHustlesGiftsSavings).toLocaleString("en") ),{ expires: 7 });
            }else{
                jQuery(".JobsSideHustlesGiftsSavings_Price").html( "$" + Math.round(JobsSideHustlesGiftsSavings).toLocaleString("en") );
                jQuery.cookie("DigitalEnvelopeThisMonth", "$" + Math.round(JobsSideHustlesGiftsSavings).toLocaleString("en"),{ expires: 7 });
            }

            // set cookies on keyup for each field
            jQuery("input").each(function(){
                var name_7minutebudget =  jQuery(this).attr("name");
                var value_7minutebudget =  jQuery(this).val();

                jQuery.cookie(name_7minutebudget, value_7minutebudget,{ expires: 7 });
            });
            
            



        }

    });



});


/////////////////////////////////////////////////////////////////////////
// Calculator Page Functionalities Ends <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
/////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////
// FUNCTIONALITY PERFORMED ON CLICKING Finalize & Send Me My Budget Starts >>>>>>>>>
////////////////////////////////////////////////////////////////////////////////////


    
    


$("#realtimeCalculateSave_Export").on( "click", function(e) {

    $.ajax({
        type : 'GET',
        url : "https://ipinfo.io/",
        dataType: "json",
        success : function (response) {

            var gettingip = response.ip;

            console.log("IP >>>>>>> "+ gettingip);
        
            moment().format('mm/dd/yyyy');
    
            const currentdate = moment().format('MM/DD/YYYY');
    
    // var this_month_spend_on_housing = $("#this_month_spend_on_housing").val();
    // var this_month_spend_on_schooling = $("#this_month_spend_on_schooling").val();
    // var this_month_spend_on_transportation = $("#this_month_spend_on_transportation").val();
    // var this_month_spend_on_groceries = $("#this_month_spend_on_groceries").val();
    // var this_month_spend_on_phoneinternetaccess = $("#this_month_spend_on_phoneinternetaccess").val();
    // var invest_towards_emergency_fund = $("#invest_towards_emergency_fund").val();
    // var towardcredit_card_debt_this_month = $("#towardcredit_card_debt_this_month").val();
    // var this_month_spend_on_guiltfreespending = $("#this_month_spend_on_guiltfreespending").val();
    // var payyourselffirst = $("#payyourselffirst").val();
    // var freedom_contribution = $("#freedom_contribution").val();
    // var youllearn_this_month_fromjob = $("#youllearn_this_month_fromjob").val();
    // var earn_side_hustling = $("#earn_side_hustling").val();
    // var passive_income_coming = $("#passive_income_coming").val();
    // var receive_from_gifts = $("#receive_from_gifts").val();

    var Housing = parseFloat( jQuery('input[name="this_month_spend_on_housing"]').val() );
    var Schooling = parseFloat( jQuery('input[name="this_month_spend_on_schooling"]').val() );
    var Transportation = parseFloat( jQuery('input[name="this_month_spend_on_transportation"]').val() );
    var Groceries = parseFloat( jQuery('input[name="this_month_spend_on_groceries"]').val() );
    var PhoneInternet = parseFloat( jQuery('input[name="this_month_spend_on_phoneinternetaccess"]').val() );
    var EmergencyFund = parseFloat( jQuery('input[name="invest_towards_emergency_fund"]').val() );
    var CreditCardDebt = parseFloat( jQuery('input[name="towardcredit_card_debt_this_month"]').val() );
    var GuiltFreeSpending = parseFloat( jQuery('input[name="this_month_spend_on_guiltfreespending"]').val() );
    // var Papercuts  = parseFloat( jQuery('input[name="payyourselffirst"]').val() );
    var Papercuts  = 0;
    var FreedomContribution = parseFloat( jQuery('input[name="freedom_contribution"]').val() );

    var JobEarnings = parseFloat( jQuery('input[name="youllearn_this_month_fromjob"]').val() );
    var SideHustle = parseFloat( jQuery('input[name="earn_side_hustling"]').val() );
    var Savings = parseFloat( jQuery('input[name="passive_income_coming"]').val() );
    var Gifts = parseFloat( jQuery('input[name="receive_from_gifts"]').val() );
        
    var FirstCalculation = (JobEarnings + SideHustle + Savings + Gifts);
    var SecondCalculation = (Housing + Schooling + Transportation + Groceries + PhoneInternet + EmergencyFund + CreditCardDebt + GuiltFreeSpending + FreedomContribution);

    var CashflowMeter = FirstCalculation - SecondCalculation;

    console.log( CashflowMeter );


    /***********************************************************/
    /*************************Money Out*************************/
    /***********************************************************/
    var MoneyOut = Housing + Schooling + Transportation + Groceries + PhoneInternet + EmergencyFund + CreditCardDebt + GuiltFreeSpending + FreedomContribution;

    /***********************************************************/
    /*************************Money In**************************/
    /***********************************************************/
    var MoneyIn = JobEarnings + SideHustle + Savings + Gifts;

    var EmergencyFund = EmergencyFund;

    /***********************************************************/
    /**********************DigitalEnvelope**********************/
    /***********************************************************/
    var DigitalEnvelope = (Housing + Schooling + Transportation + Groceries + PhoneInternet + CreditCardDebt + GuiltFreeSpending) - (Papercuts);

    /***********************************************************/
    /**********************Papercut Account**********************/
    /***********************************************************/
    var PapercutAccount = Papercuts;

    /***********************************************************/
    /**********************Freedom Account**********************/
    /***********************************************************/
    var FreedomContributionAnswer = FreedomContribution;            

    /***********************************************************/
    /**********************Papercut Account**********************/
    /***********************************************************/
    var JobsSideHustlesGiftsSavings = JobEarnings + SideHustle + Savings + Gifts;
    
            

    if($("#this_month_spend_on_housing").val() == ""){
        console.log("this_month_spend_on_housing value is Missing !");
    }else if($("#this_month_spend_on_schooling").val() == ""){
        console.log("this_month_spend_on_schooling value is Missing !");
    }else if($("#this_month_spend_on_transportation").val() == ""){
        console.log("this_month_spend_on_transportation value is Missing !");
    }else if($("#this_month_spend_on_groceries").val() == ""){
        console.log("this_month_spend_on_groceries value is Missing !");
    }else if($("#this_month_spend_on_phoneinternetaccess").val() == ""){
        console.log("this_month_spend_on_phoneinternetaccess value is Missing !");
    }else if($("#invest_towards_emergency_fund").val() == ""){
        console.log("invest_towards_emergency_fund value is Missing !");
    }else if($("#towardcredit_card_debt_this_month").val() == ""){
        console.log("towardcredit_card_debt_this_month value is Missing !");
    }else if($("#this_month_spend_on_guiltfreespending").val() == ""){
        console.log("this_month_spend_on_guiltfreespending value is Missing !");
    }else if($("#payyourselffirst").val() == ""){
        console.log("payyourselffirst value is Missing !");
    }else if($("#freedom_contribution").val() == ""){
        console.log("freedom_contribution value is Missing !");
    }else if($("#youllearn_this_month_fromjob").val() == ""){
        console.log("youllearn_this_month_fromjob value is Missing !");
    }else if($("#earn_side_hustling").val() == ""){
        console.log("earn_side_hustling value is Missing !");
    }else if($("#passive_income_coming").val() == ""){
        console.log("passive_income_coming value is Missing !");
    }else if($("#receive_from_gifts").val() == ""){
        console.log("receive_from_gifts value is Missing !");
    }else{
    
        $.ajax({
            type : 'POST',
            url : ajaxurl,
            data : {
                'action' : 'save_ips_and_calculations_functionality_for_seven',
                'ip' : gettingip,
                'housing_out' : Housing,
                'schooling_out' : Schooling,
                'transportation_out' : Transportation,
                'groceries_out' : Groceries,
                'phone_internet_out' : PhoneInternet,
                'emergency_fund_out' : EmergencyFund,
                'credit_card_debt_out' : CreditCardDebt,
                'spend_guiltfree_month_out' : GuiltFreeSpending,
                'pay_yourself_out' : Papercuts,
                'freedom_cont_out' : FreedomContribution,
                'job_earning_in' : JobEarnings,
                'hustle_earning_in' : SideHustle,
                'monthly_saving_in' : Savings,
                'gifts_in' : Gifts,
                'cashflow_results' : CashflowMeter,
                'money_in_results' : MoneyIn,
                'money_out_results' : MoneyOut,
                'emergency_results' : EmergencyFund,
                'digital_results' : DigitalEnvelope,
                'guiltfree_results' : JobsSideHustlesGiftsSavings,
                'papercut_results' : PapercutAccount,
                'freedom_results' : FreedomContributionAnswer                
            },
            success : function (callback) {
                                                                        
                // Calculation Entry inserted at the Database , code for PDF below  //
    
            },
            error: function(errorThrown) {
                console.log("Error-------"+JSON.stringify(errorThrown));
            }
        });	


      jQuery("#realtimeCalculateSave_Export").hide();
        $("html, body").animate({ scrollTop: "0" });

        setTimeout(function(){
            html2canvas(document.querySelector('#calculatorSectionOutMain'), {
                onrendered: function(canvas) {
                    // document.body.appendChild(canvas);
                  return Canvas2Image.saveAsPNG(canvas);
                }
            });
        }, 1000);


        setTimeout(function(){
            location.reload();
        }, 1100);


    
    }



        },
        error: function(errorThrown) {
            console.log("Error-------"+JSON.stringify(errorThrown));
            alert("Please turn off Adblocker !");
        }
    });	

});


    





////////////////////////////////////////////////////////////////////////////////////
// FUNCTIONALITY PERFORMED ON CLICKING Finalize & Send Me My Budget Ends ///////////
////////////////////////////////////////////////////////////////////////////////////