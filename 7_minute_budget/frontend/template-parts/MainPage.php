<?php 
/*

   Template Name: MainPage

*/

 $settings = get_option( "seven_minute_budget_theme_settings" );



 global $wpdb;

//  use Dompdf\Dompdf;

 $upload_dir = wp_upload_dir();
 
// if(isset($_POST['submitbudg'])) {
//   // get the form data
//   $name = $_POST['name'];
//   $email = $_POST['email'];
//   $reminder = isset($_POST['reminder']) ? 'yes' : 'no';
//   print_r($name);
//   // generate the PDF of the current page with Dompdf
//   require_once ABSPATH . 'wp-content/plugins/dompdf/autoload.inc.php';
  
//   $dompdf = new Dompdf();
//   $dompdf->loadHtmlFile(get_permalink());
//   $dompdf->render();
//   $pdf = $dompdf->output();
  
//   // send the PDF as an email attachment
//   $to = $email;
//   $subject = 'Your budget';
//   $message = 'Please find your budget attached.';
//   $headers = array(
//     'From: My Budget App <noreply@mybudgetapp.com>',
//     'Reply-To: My Budget App <noreply@mybudgetapp.com>',
//     'Content-Type: application/pdf',
//     'Content-Disposition: attachment; filename="budget.pdf"'
//   );
//   wp_mail($to, $subject, $message, $headers, $pdf);
  
//   // send a response back to the client
// //   wp_send_json_success('Form submitted successfully!');
//   wp_die();
// }

?>



<!DOCTYPE html>

<html>

<head>

   <meta charset="utf-8">

   <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>Financial Calculator Tool</title>

   <?php include("template-widgets/HeaderWidget.php"); ?>      

</head>

<body>



<div class="calculator-section" id="calculatorSectionOutMain">

   <div class="calculator-container">





         <div class="calculator-graph" id="calculator-graph--above">

            <div class="calculator-meter">

               <div class="meter-progress">

                  <?php  

                     if($settings['fileupload4'] != null || $settings['fileupload4']!= '' ){

                  ?>

                     <img src="<?php echo $upload_dir['baseurl'] .'/7_minute_budget/'. $settings['fileupload4'] ?>" alt="" class="meter-progress-bg" />

                  <?php

                     } else {

                  ?>

                  <img src="https://7minutebudget.urtestsite.com/wp-content/uploads/7_minute_budget/11-58-56-17-02-2023-meter-background.png" alt="" class="meter-progress-bg">

                  <?php } ?>
                  <?php  

                     if($settings['fileupload4'] != null || $settings['fileupload5']!= '' ){

                  ?>

                     <img src="<?php echo $upload_dir['baseurl'] .'/7_minute_budget/'. $settings['fileupload5'] ?>" alt="" class="meter-progress-niddle niddle-yellow" />

                  <?php

                     } else {

                  ?>

                  <img src="https://7minutebudget.urtestsite.com/wp-content/uploads/7_minute_budget/11-58-56-17-02-2023-meter-niddle.png" alt="" class="meter-progress-niddle niddle-yellow">

                  <?php } ?>

                  <h2 class="calculator-total-amount-abs calculator-total-amount-abs--custom">$0</h2>

               </div>

            </div>



            <!-- start top overlay content -->

               <div class="calculator-total__maintop">

                  <div class="calculator-total-top__maintop">

                     <div class="calculator-total-container__maintop">

                        <div class="calculator-money-outputs-group">

                           <div class="calculator-money-inout-grid">

                              <div class="money-outputs-box">

                                 <p class="money-outputs-label">Money Out</p>

                                 <h4 class="money-outputs-value red MoneyOutValueAppend" id="MoneyOutValue">$0</h4>

                              </div>

                              <div class="money-outputs-box">

                                 <p class="money-outputs-label">Money In</p>

                                 <h4 class="money-outputs-value green MoneyInValueAppend" id="MoneyInValue">$0</h4>

                              </div>

                           </div>

                        </div>

                     </div>

                  </div>

               </div>

            <!-- end top overlay content -->

         </div>



      <div class="calculator" id="cst_form_id">

         <div class="calculator-money-out">

            <div class="calculator-head">

               <h2 class="calculator-title red"><?php echo $settings['calculatortext']; ?> </h2>

               <p class="calculator-subtitle"><b><?php echo $settings['calculatordescription']; ?></b></p>

               <p class="calculator-subtitle-error alert--error hide hidden" hide hidden id="calculator-subtitle-error" style="display: none !important;"></p>

            </div>

            <div class="calculator-content">

               <div class="calculator-grid">

                  <div class="calculator-column">

                     <div class="calculator-group">

                        <label class="calculator-label">

                           <b>Housing</b><br>How much will you spend this month on housing?<br>Think rent, utilities, etc. Note: If you live in a dorm enter $0.

                        </label>

                        <div class="calculator-input-group">

                           <span class="dollor-sign">$</span>

                           <input type="text"  name="this_month_spend_on_housing" id="this_month_spend_on_housing" class="calculator-input" pattern="[0-9]*" inputmode="numeric">

                        </div>

                        <div class="calculator-input-helper hide hidden" hide hidden>Think rent, utitlies, etc. Note: If you live in a dorm and that is included in your tuition, don’t include that here.</div>

                     </div>

                  </div>

                  <div class="calculator-column">

                     <div class="calculator-group">

                        <label class="calculator-label">

                           <b>School</b><br>How much will you spend this month on schooling?<br>Think books, tuition, loans, etc. 

                        </label>

                        <div class="calculator-input-group">

                           <span class="dollor-sign">$</span>

                           <input  type="text" name="this_month_spend_on_schooling" id="this_month_spend_on_schooling" class="calculator-input" pattern="[0-9]*" inputmode="numeric">

                        </div>

                        <div class="calculator-input-helper hide hidden" hide hidden>Think books, tuition, loans, etc. </div>

                     </div>

                  </div>

                  <div class="calculator-column">

                     <div class="calculator-group">

                        <label class="calculator-label">

                           <b>Transportation</b><br>How much will you spend this month on transportation?<br>Think public transportation, car payments, gas, etc.</label>

                        <div class="calculator-input-group">

                           <span class="dollor-sign">$</span>

                           <input  type="text" name="this_month_spend_on_transportation" id="this_month_spend_on_transportation" class="calculator-input" pattern="[0-9]*" inputmode="numeric">

                        </div>

                        <div class="calculator-input-helper hide hidden" hide hidden>Think public transportation, car payments, gas, etc.</div>

                     </div>

                  </div>

                  <div class="calculator-column">

                     <div class="calculator-group">

                        <label class="calculator-label"><b>Groceries</b><br>How much will you spend this month on groceries?<br>Do not include money allocated for eating out here.  Just groceries.</label>

                        <div class="calculator-input-group">

                           <span class="dollor-sign">$</span>

                           <input  type="text" name="this_month_spend_on_groceries" id="this_month_spend_on_groceries" class="calculator-input" pattern="[0-9]*" inputmode="numeric">

                        </div>

                        <div class="calculator-input-helper"></div>

                     </div>

                  </div>

                  <div class="calculator-column">

                     <div class="calculator-group">

                        <label class="calculator-label"><b>Emergency Fund</b><br>How much do you want to contribute towards your Emergency Fund this month?</label>

                        <div class="calculator-input-group">

                           <span class="dollor-sign">$</span>

                           <input  type="text" name="invest_towards_emergency_fund" id="invest_towards_emergency_fund" class="calculator-input" pattern="[0-9]*" inputmode="numeric">

                        </div>

                        <div class="calculator-input-helper"></div>

                     </div>

                  </div>

                  <div class="calculator-column">

                     <div class="calculator-group">

                        <label class="calculator-label"><b>Phone/Internet</b><br>How much will you spend this month on phone/internet service?</label>

                        <div class="calculator-input-group">

                           <span class="dollor-sign">$</span>

                           <input  type="text" name="this_month_spend_on_phoneinternetaccess" id="this_month_spend_on_phoneinternetaccess" class="calculator-input" pattern="[0-9]*" inputmode="numeric">

                        </div>

                        <div class="calculator-input-helper"></div>

                     </div>

                  </div>

                  <div class="calculator-column">

                     <div class="calculator-group">

                        <label class="calculator-label"><b>Debt</b><br>If you have any credit card debt, how much will you pay toward that debt this month?<br>Enter at least the minimum monthly payment amount.</label>

                        <div class="calculator-input-group">

                           <span class="dollor-sign">$</span>

                           <input  type="text" name="towardcredit_card_debt_this_month" id="towardcredit_card_debt_this_month" class="calculator-input" pattern="[0-9]*" inputmode="numeric">

                        </div>

                        <div class="calculator-input-helper hide hidden" hide hidden>(at least minimum payment)</div>

                     </div>

                  </div>

                  <div class="calculator-column">

                     <div class="calculator-group">

                        <label class="calculator-label"><b>Guilt-Free Spending</b><br>How much do you want to spend this month on guilt-free spending?<br>Think things like entertainment, going out, shopping, eating at restaurants, etc.</label>

                        <div class="calculator-input-group">

                           <span class="dollor-sign">$</span>

                           <input  type="text" name="this_month_spend_on_guiltfreespending" id="this_month_spend_on_guiltfreespending" class="calculator-input" pattern="[0-9]*" inputmode="numeric">

                        </div>

                        <div class="calculator-input-helper"></div>

                     </div>

                  </div>

                  <div class="calculator-column">

                     <div class="calculator-group">

                        <label class="calculator-label"><b>Freedom Contribution</b><br>How much would you like to invest toward your Freedom Contribution at the beginning of this month?</label>

                        <div class="calculator-input-group">

                           <span class="dollor-sign">$</span>

                           <input  type="text" name="freedom_contribution" id="freedom_contribution" class="calculator-input" pattern="[0-9]*" inputmode="numeric">

                        </div>

                        <div class="calculator-input-helper"></div>

                     </div>

                  </div>

                  <div class="calculator-column hide hidden" hide hidden>

                     <div class="calculator-group">

                        <label class="calculator-label"><b>Papercuts</b><br>How much will you saving on papercuts this month?<br>Think things like gambling, shopping, lattes, vaping, etc. </label>

                        <div class="calculator-input-group">

                           <span class="dollor-sign">$</span>

                           <input  type="text" name="payyourselffirst" id="payyourselffirst" class="calculator-input" pattern="[0-9]*" inputmode="numeric" value="0">

                        </div>

                        <div class="calculator-input-helper"><b><u style="color: #000000;">Make sure your papercuts are not higher than your guilt free spending.</u></b></div>

                     </div>

                  </div>

               </div>

            </div>

         </div>

         <div class="calculator-money-in">

            <div class="calculator-head">

               <h2 class="calculator-title green"><?php echo $settings['calculatorheading_in']; ?></h2>

               <p class="calculator-subtitle"><b><?php echo $settings['calculatordescription_in']; ?></b></p>

            </div>

            <div class="calculator-content">

               <div class="calculator-grid">

                  <div class="calculator-column">

                     <div class="calculator-group">

                        <label class="calculator-label"><b>Jobs</b><br>How much money will you earn this month from a job?</label>

                        <div class="calculator-input-group">

                           <span class="dollor-sign">$</span>

                           <input  type="text" name="youllearn_this_month_fromjob" id="youllearn_this_month_fromjob" class="calculator-input" pattern="[0-9]*" inputmode="numeric">

                        </div>

                        <div class="calculator-input-helper"></div>

                     </div>

                  </div>

                  <div class="calculator-column">

                     <div class="calculator-group">

                        <label class="calculator-label"><b>Side Hustles</b><br>How much money will you earn this month from a side hustle?</label>

                        <div class="calculator-input-group">

                           <span class="dollor-sign">$</span>

                           <input  type="text" name="earn_side_hustling" id="earn_side_hustling" class="calculator-input" pattern="[0-9]*" inputmode="numeric">

                        </div>

                        <div class="calculator-input-helper"></div>

                     </div>

                  </div>

                  <div class="calculator-column">

                     <div class="calculator-group">

                        <label class="calculator-label"><b>Gifts</b><br>How much money will you receive this month from a gift?</label>

                        <div class="calculator-input-group">

                           <span class="dollor-sign">$</span>

                           <input  type="text" name="receive_from_gifts" id="receive_from_gifts" class="calculator-input" pattern="[0-9]*" inputmode="numeric">

                        </div>

                        <div class="calculator-input-helper"></div>

                     </div>

                  </div>

                  <div class="calculator-column">

                     <div class="calculator-group">

                        <label class="calculator-label"><b>Savings</b><br>How much money will you use from savings for this month's expenses?</label>

                        <div class="calculator-input-group">

                           <span class="dollor-sign">$</span>

                           <input  type="text" name="passive_income_coming" id="passive_income_coming" class="calculator-input" pattern="[0-9]*" inputmode="numeric">

                        </div>

                        <div class="calculator-input-helper"></div>

                     </div>

                  </div>
                  

               </div>

            </div>         

         </div>

         <div class="calculator-graph">

            <div class="calculator-meter">

               <div class="meter-progress">

                  <?php  

                     if($settings['fileupload4'] != null || $settings['fileupload4']!= '' ){

                  ?>

                     <img src="<?php echo $upload_dir['baseurl'] .'/7_minute_budget/'. $settings['fileupload4'] ?>" alt="" class="meter-progress-bg" />

                  <?php

                     } else {

                  ?>

                  <img src="https://7minutebudget.urtestsite.com/wp-content/uploads/7_minute_budget/11-58-56-17-02-2023-meter-background.png" alt="" class="meter-progress-bg">

                  <?php } ?>







                  <?php  

                     if($settings['fileupload4'] != null || $settings['fileupload5']!= '' ){

                  ?>

                     <img src="<?php echo $upload_dir['baseurl'] .'/7_minute_budget/'. $settings['fileupload5'] ?>" alt="" class="meter-progress-niddle niddle-yellow" />

                  <?php

                     } else {

                  ?>

                  <img src="https://7minutebudget.urtestsite.com/wp-content/uploads/7_minute_budget/11-58-56-17-02-2023-meter-niddle.png" alt="" class="meter-progress-niddle niddle-yellow">

                  <?php } ?>

               </div>

            </div>

         </div>

         <div class="calculator-total">

            <div class="calculator-total-top">

               <div class="calculator-total-container">

                  <h2 class="calculator-total-amount red calculator-total-amount-abs calculator-total-amount-abs--custom" id="calculator-total-amount" style="display: none;">-$0</h2>

                  <div class="calculator-money-outputs-group">

                     <div class="calculator-money-results-varying">

                        <div class="calculator-money-results-varying" id="BelowZeroEntry" style="display: none;">

                           <div class="realtimeDescription">

                              <?php echo $settings['realtimemain_description']; ?>

                           </div>

                        </div>

                        <div class="calculator-money-results-varying" id="OnlyZeroEntry" style="display: block;">

                           <div class="realtimeDescription">

                              <?php echo $settings['realtimealternative_description']; ?>

                           </div>

                        </div>

                        <div class="calculator-money-results-varying" id="AboveZeroEntry" style="display: none;">

                           <div class="realtimeDescription">

                              <?php echo $settings['realtimemain_description_positive']; ?>

                           </div>

                        </div>

                     </div>

                  </div>

               </div>

            </div>

            <div class="calculator-total-bot" id="realtimealternative_description">

               <div class="calculator-card-container">

                  <div class="MoneyInOut_Container">

                     <div class="MoneyInOut_Container_Inner">

                        <p>Money In</p>

                     </div>

                     <div class="MoneyInOut_Container_Inner">

                        <p>Money Out</p>

                     </div>

                  </div>

                  <div class="calculator-money-outputs-grid-outer">

                     <div class="calculator-money-outputs-grid-left">

                        <div class="money-outputs-box JobsSideHustlesGiftsSavings--outer">

                           <p>Jobs, Side Hustles, Gifts & Savings</p>

                           <p class="JobsSideHustlesGiftsSavings_Price green">$0</p>

                        </div>

                     </div>

                     <div class="calculator-money-outputs-grid-right">

                        <div class="money-outputs-box-money__out" style="display: none;">

                           Money Out

                        </div>

                        <div class="money-outputs-box--outer" style="width: 100%; display: flex; justify-content: center; flex-wrap: wrap;">

                        <div class="money-outputs-box">

                           <p class="money-outputs-label">Digital Envelope</p>

                           <h4 class="money-outputs-value red" id="DigitalEnvelopeThisMonth">$0</h4>

                        </div>

                        <div class="money-outputs-box hide hidden" hide hidden>

                           <p class="money-outputs-label">Papercut Account</p>

                           <h4 class="money-outputs-value green" id="PapercutAccountThisMonth">$0</h4>

                        </div>

                        </div>

                        <div class="money-outputs-box">

                           <p class="money-outputs-label">Emergency Fund</p>

                           <h4 class="money-outputs-value green" id="EmergencyFundThisMonth">$0</h4>

                        </div>

                        <div class="money-outputs-box">

                           <p class="money-outputs-label">Freedom Account</p>

                           <h4 class="money-outputs-value green" id="FreedomAccountThisMonth">$0</h4>

                        </div>

                     </div>

                  </div>

               </div>

            </div>

            <div class="calculator-action">

               <div class="calculator-action-cotainer">
            <button type="button" onclick="show('popup')" class="calculator-button" id="CalculateSave_Export" name="realtimeCalculateSave_Export">
               <?php echo $settings['realtimeCalculate_button']; ?>
               
            </button>

               </div>

            </div>
            
            <!--<div id="popup-container" style="display: none;">-->
              
            <!--    </div>-->

<!-- This is what will be included inside the popup -->
<!--<div id="overlay" class="budgetmodal">-->
<!--      <div id="popup">-->
<!--        <div id="close">X</div>-->
<!--     <form action="" method="POST" id="my-form">-->
<!--          <div class="form-group">-->
<!--            <label for="name">Name:</label>-->
<!--            <input type="text" class="form-control" id="name" name="name" required>-->
<!--          </div>-->
<!--          <div class="form-group">-->
<!--            <label for="email">Email address:</label>-->
<!--            <input type="email" class="form-control" id="email" name="email" required>-->
<!--          </div>-->
<!--          <div class="form-check">-->
<!--            <input type="checkbox" class="form-check-input" id="reminder" name="reminder" checked>-->
<!--            <label class="form-check-label" for="reminder">Remind me to do my budget</label>-->
<!--          </div>-->
<!--          <button type="submit" name="submitbudg" class="btn btn-primary">Submit</button>-->
<!--        </form>-->
<!--      </div>-->
<!--    </div>-->
         </div>

      </div>

   </div>

</div>

    <!--scripts loaded here-->

    <?php include("template-widgets/FooterWidget.php"); ?>

<style>

#overlay {
    z-index: 999999999;
}

#overlay {
  position: fixed;
  /*height: 100%;*/
  width: 100%;
  top: 0;
  right: 0;
  /*bottom: 0;*/
  left: 0;
  background: rgba(0,0,0,0.8);
  display: none;
}

#popup {
  max-width: 600px;
  width: 80%;
  max-height: 300px;
  height: 80%;
  padding: 20px;
  position: relative;
  background: #fff;
  margin: 20px auto;
  /*top:200px;*/
}

#close {
  position: absolute;
  top: 10px;
  right: 10px;
  cursor: pointer;
  color: #000;
}

.budgetmodal #popup {
    border-radius: 4px;
    padding: 60px;
    max-height: 500px;
    text-align: left;
}
.budgetmodal .btn {
    border-radius: 50px;
    padding: 12px 40px;
    margin-top: 20px;
}
.budgetmodal label.form-check-label {
    padding: 0;
}
.budgetmodal .form-check-input {
    margin-left: 0;
    position: static;
    margin-right: 5px;
    padding: 13px;
}
.budgetmodal #close {
    top: 20px !important;
    right: 20px !important;;
    font-weight: 600;
}


#overlay.budgetmodal {
    height: 100%;
    bottom: 0;
    z-index: 99999999999999;
    max-height: inherit !important;
}
.budgetmodal #popup {
    max-height: inherit !important;
    width: 96% !important;
    height: auto !important;
    top: 50%;
    transform: translateY(-50%);
}


#realtimeCalculateSave_Export[disabled] {

    opacity: .7;

}

   .calculator .calculator-total .calculator-total-container h2#calculator-total-amount {

       position: unset;

   }

   #cr-mobile-panel.active {

    transform: unset;

    transform: translate(0);

    visibility: visible;

    z-index: 999999999999;

}
button#CalculateSave_Export:hover {
   background-color: #0cb04d;
   box-shadow: 0 5px #0275d8;
   transform: translateY(4px);
}

button.btn.btn-primary.waves-effect.waves-light:hover {
    background-color: #0cb04d;
    box-shadow: 0 3px #0275d8;
    transform: translateY(5px);
}

@media only screen and (max-width: 600px)  {

.budgetmodal.alert_success_max_height {
    max-height: 800px;
}
.budgetmodal.alert_success_max_height #popup { max-height: 600px; }

.alert_success_max_height div#alert_success, .alert_success_max_height div#alert_error {
    font-size: 15px;
}

.budgetmodal label.form-check-label {
    display: inline;
}

.budgetmodal #popup {
    padding: 60px 30px;
}

}

@media only screen and (max-width: 1390px)  {
   .budgetmodal.alert_success_max_height #popup { max-height: 600px; }
.budgetmodal.alert_success_max_height {
    max-height: 800px;
}

}


/*@media screen and (max-width: 600px){
    .budgetmodal #popup {
    max-height: 500px;
}
.budgetmodal .form-check-input {
    margin: 0px;
}

}

@media screen and (max-width: 577px){

label.form-check-label {
      display: inline;
}

}

@media screen and (max-width: 557px){

.budgetmodal .form-check-input {
    margin: 0px;
}

label.form-check-label {
      display: inline;
}

}

@media screen and (max-width: 551px){

.budgetmodal .form-check-input {
    margin: 0px;
}

label.form-check-label {
        display: inline;
}

}

@media screen and (max-width: 526px){

.budgetmodal .form-check-input {
    margin: 0px;
}

label.form-check-label {
      display: inline;
}

}*/
    
</body>

</html>