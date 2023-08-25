<?php 

/* Footer Widget */


?>

<?php get_footer(); ?>
<?php
if(isset($_POST['submitbudg'])) {
  // get the form data
 /* $name = $_POST['name'];
  $email = $_POST['email'];
  $reminder = isset($_POST['reminder']) ? 'yes' : 'no';
  print_r($name);
  // generate the PDF of the current page with Dompdf
  require_once ABSPATH . 'wp-content/plugins/dompdf/autoload.inc.php';
  
  $dompdf = new Dompdf();
  $dompdf->loadHtmlFile(get_permalink());
  $dompdf->render();
  $pdf = $dompdf->output();
  
  // send the PDF as an email attachment
  $to = $email;
  $subject = 'Your budget';
  $message = 'Please find your budget attached.';
  $headers = array(
    'From: My Budget App <noreply@mybudgetapp.com>',
    'Reply-To: My Budget App <noreply@mybudgetapp.com>',
    'Content-Type: application/pdf',
    'Content-Disposition: attachment; filename="budget.pdf"'
  );
  wp_mail($to, $subject, $message, $headers, $pdf);*/
  
  // send a response back to the client
//   wp_send_json_success('Form submitted successfully!');
  wp_die();
}
// add_action('wp_ajax_process_form', 'process_form');
// add_action('wp_ajax_nopriv_process_form', 'process_form');

// function my_enqueue_scripts() {
//   wp_enqueue_script('jquery');
//   wp_localize_script('my-ajax-script', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));
// }

// add_action('wp_enqueue_scripts', 'my_enqueue_scripts');

$settings = get_option( "seven_minute_budget_theme_settings" );
?>

<div id="overlay" class="budgetmodal">
      <div id="popup">
        <div id="close">X</div>
     <form method="POST" id="my-form">
        <input type="hidden" class="form-control" name="passive_income_coming" value="<?php if(isset($_COOKIE['passive_income_coming'])) { echo $_COOKIE['passive_income_coming']; } ?>">

         <input type="hidden" class="form-control" name="youllearn_this_month_fromjob" value="<?php if(isset($_COOKIE['youllearn_this_month_fromjob'])) { echo $_COOKIE['youllearn_this_month_fromjob']; } ?>">

         <input type="hidden" class="form-control" name="earn_side_hustling" value="<?php if(isset($_COOKIE['earn_side_hustling'])) { echo $_COOKIE['earn_side_hustling']; } ?>">

         <input type="hidden" class="form-control" name="this_month_spend_on_guiltfreespending" value="<?php if(isset($_COOKIE['this_month_spend_on_guiltfreespending'])) {echo $_COOKIE['this_month_spend_on_guiltfreespending']; } ?>">

         <input type="hidden" class="form-control" name="receive_from_gifts" value="<?php if(isset($_COOKIE['receive_from_gifts'])) { echo $_COOKIE['receive_from_gifts']; } ?>">

         <input type="hidden" class="form-control" name="this_month_spend_on_housing" value="<?php if(isset($_COOKIE['this_month_spend_on_housing'])) { echo $_COOKIE['this_month_spend_on_housing']; } ?>">

         <input type="hidden" class="form-control" name="this_month_spend_on_schooling" value="<?php if(isset($_COOKIE['this_month_spend_on_schooling'])) { echo $_COOKIE['this_month_spend_on_schooling']; } ?>">

         <input type="hidden" class="form-control" name="this_month_spend_on_transportation" value="<?php if(isset($_COOKIE['this_month_spend_on_transportation'])) { echo $_COOKIE['this_month_spend_on_transportation']; } ?>">

         <input type="hidden" class="form-control" name="this_month_spend_on_groceries" value="<?php if(isset($_COOKIE['this_month_spend_on_groceries'])) { echo $_COOKIE['this_month_spend_on_groceries']; } ?>">

         <input type="hidden" class="form-control" name="this_month_spend_on_phoneinternetaccess" value="<?php if(isset($_COOKIE['this_month_spend_on_phoneinternetaccess'])) { echo $_COOKIE['this_month_spend_on_phoneinternetaccess']; } ?>">

         <input type="hidden" class="form-control" name="towardcredit_card_debt_this_month" value="<?php if(isset($_COOKIE['towardcredit_card_debt_this_month'])) { echo $_COOKIE['towardcredit_card_debt_this_month']; } ?>">

         <input type="hidden" class="form-control" name="this_month_spend_on_guiltfreespending" value="<?php if(isset($_COOKIE['this_month_spend_on_guiltfreespending'])) { echo $_COOKIE['this_month_spend_on_guiltfreespending']; } ?>">

         <input type="hidden" class="form-control" name="freedom_contribution" value="<?php if(isset($_COOKIE['freedom_contribution'])) { echo $_COOKIE['freedom_contribution']; } ?>">

         <input type="hidden" class="form-control" name="invest_towards_emergency_fund" value="<?php if(isset($_COOKIE['invest_towards_emergency_fund'])) { echo $_COOKIE['invest_towards_emergency_fund']; } ?>">

         <input type="hidden" class="form-control" name="payyourselffirst" value="<?php if(isset($_COOKIE['payyourselffirst'])) { echo $_COOKIE['payyourselffirst']; } ?>">

         <div class="alert alert-success" id="alert_success" style="display: none;">
           <span class="closebtn">&times;</span>
         </div>
         <div class="alert alert-danger" id="alert_error" style="display: none;"></div>
          <div class="form-group">
            <label for="name">First Name:</label>
            <input type="text" class="form-control" id="fname" name="fname" required>
          </div>
          <div class="form-group">
            <label for="name">Last Name:</label>
            <input type="text" class="form-control" id="lname" name="lname" required>
          </div>
          <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-check">
            <p style="font-size: 14px; ">By clicking "Submit", you agree to Evviva's <a href="<?php echo site_url(); ?>/wp-content/uploads/2022/08/Evviva-Wealth-Privacy-Policy.pdf" target="_blank">privacy policy</a>, and consent to being contacted by Evviva regarding offers and community content. You may opt out at any time, we hate spam!
              <?php 
                $email_txt = $settings["email_txt"]; 
                
                //echo str_replace( array( '\'',), ' ', $email_txt); ?>
            </p>
          </div>
          <!-- <div class="form-check">
            <input type="checkbox" class="form-check-input" id="reminder" name="reminder" checked>
            <label class="form-check-label" for="reminder">Send me reminders to do my 7-Minute Budget</label>
          </div> -->
          <button type="submit" name="submitbudg" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
<!--scripts loaded here-->
<script>
	var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
	var siteurl = "<?php echo get_site_url(); ?>";
</script>

<script>
$(document).ready(function() {
  $('#CalculateSave_Export').click(function() {
    $('#overlay').fadeIn(300);  
  });
  $('#close').click(function() {
    $('#overlay').fadeOut(300);
    jQuery('#alert_success').hide(); 
    jQuery('div#overlay.budgetmodal').removeClass('alert_success_max_height'); 
    jQuery('#alert_success').text("");

    jQuery('#alert_error').hide(); 
    jQuery('#alert_error').text("");
     
  });

   $('div#cst_form_id input').on('keyup', function() {
         var value_7minutebudget =  jQuery(this).val();
         var name_7minutebudget =  jQuery(this).attr("name");
         //jQuery.cookie(name_7minutebudget, value_7minutebudget,{ expires: 7 });
        jQuery.cookie(name_7minutebudget, value_7minutebudget,{ expires: 7 });

        jQuery('#cst_form_id input[name="'+name_7minutebudget+'"]').val(value_7minutebudget);
        jQuery('#my-form input[name="'+name_7minutebudget+'"]').val(value_7minutebudget);
            console.log(name_7minutebudget+ 'Val '+ value_7minutebudget);
    });

});
</script>

<script src="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/js/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"> </script>

<script src="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/js/tether.min.js"></script>
<script src="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/js/slick.min.js"></script>

<!-- <script type="text/javascript" src="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/bootstrap-iconpicker/js/iconset/fontawesome5-3-1.min.js"></script> -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/js/mdb.min.js"></script>

<!-- Moment Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

<!-- Jquery Masking -->
<script src="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/js/jquery.mask.js"></script>

<!-- Your custom scripts (optional) -->

<script src="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/js/hierarchy-select.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://superal.github.io/canvas2image/canvas2image.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>  
<script src="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/js/custom-frontend.js"></script>

 
