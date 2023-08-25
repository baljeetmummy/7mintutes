<?php
/**
* Plugin Name: 7 Minute budget
* Plugin URI: https://www.your-site.com/
* Description: A tool where users can input data and see live updates of the numbers.
* Version: 1.0.0
* Author: Baljeet Mummy 
* Author URI: https://www.your-site.com/
**/


require("admin/settings.php");
require("frontend/user-frontend.php");
require("database/create-table-schema.php");
use Dompdf\Dompdf;


////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////// AJAX REQUESTS FOR BACKEND STARTS HERE  ///////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////


// Ajax for Exporting All Calculations as CSV Starts //

function export_all_calculations_functionality_for_seven(){

    global $wpdb;

    if(isset($_POST)){

        // print_r($_POST);

        $getAllCalculations = "SELECT  ip,housing_out,schooling_out,transportation_out,groceries_out,phone_internet_out,emergency_fund_out,credit_card_debt_out,spend_guiltfree_month_out,pay_yourself_out,freedom_cont_out,job_earning_in,hustle_earning_in,monthly_saving_in,gifts_in,cashflow_results,money_in_results,money_out_results,emergency_results,digital_results,guiltfree_results,papercut_results,freedom_results from " . $wpdb->prefix . "smb_submissions";

        $resultsgetAllCalculations = $wpdb->get_results($getAllCalculations);

        echo json_encode($resultsgetAllCalculations);


        // $decoderesultsgetAllCalculations = json_decode(json_encode($resultsgetAllCalculations), true);

        // // echo "<pre>";
        // // print_r($decoderesultsgetAllCalculations);
    
    }    

    wp_die();

}

add_action('wp_ajax_export_all_calculations_functionality_for_seven', 'export_all_calculations_functionality_for_seven');


// Ajax for email_logs_status_update //

function email_logs_status_update(){

  global $wpdb;
  $table_name  = $wpdb->prefix."dompdf_data";

$email_status = $_POST['email_status']; 

$email_status_value= $_POST['email_status_value']; 
foreach ($email_status as  $value) {

  $wpdb->query("UPDATE $table_name SET status='".$email_status_value."' WHERE ID=$value");
}
// send a response back to the client
   wp_send_json_success('Status successfully updated');
wp_die();

 }    

add_action('wp_ajax_email_logs_status_update', 'email_logs_status_update');

add_action('wp_ajax_nopriv_upload_file', 'upload_file_callback');
add_action( 'wp_ajax_upload_file', 'upload_file_callback' );

function upload_file_callback(){
  // check security nonce which one we created in html form and sending with data.
  check_ajax_referer('uploadingFile', 'security');

  // removing white space
  $fileName = preg_replace('/\s+/', '-', $_FILES["file"]["name"]);

  // removing special character but keep . character because . seprate to extantion of file
  $fileName = preg_replace('/[^A-Za-z0-9.\-]/', '', $fileName);

  // rename file using time
  $fileName = time().'-'.$fileName;
  echo $fileName; 
  // upload file
  /*if(wp_upload_bits($fileName, null, file_get_contents($_FILES["file"]["tmp_name"])))
  {
    echo json_encode(['code'=>200]);
  }
  else{
    echo json_encode(['code'=>404, 'msg'=>'Some thing is wrong! Try again.']);
  }*/

  wp_die();
}

//add_action('wp_ajax_csv_upload_submit', 'csv_upload_submit');

function email_logs_status(){

  global $wpdb;
  $table_name  = $wpdb->prefix."email_logs_status";

$email_status = $_POST['email_status']; 
echo '<pre>'; print_r($_POST); die;
// Counting No fo skilss
$count = count($_POST["status"]);
//Getting post values
$status=$_POST["status"]; 

  for($i=0; $i<$count; $i++)
  {
    if(trim($_POST["status"][$i] != ''))
    {
      $wpdb->insert( $table_name, array(
            'status' => $status[$i]
            ),
            array( '%s') 
        );
    }
  }

// send a response back to the client
   wp_send_json_success('Status inserted successfully');
wp_die();

 }    

add_action('wp_ajax_email_logs_status', 'email_logs_status');

add_action( 'wp_ajax_nopriv_process_form', 'process_form' );
add_action( 'wp_ajax_process_form', 'process_form' );

function process_form() {
    
  global $wpdb;    
 // get the form data

error_reporting(E_ALL);
ini_set('display_errors', '1');
    
$upload_dir = wp_upload_dir();
$upload_url = $upload_dir['basedir'].'/7_minute_budget/PDF/';
$upload_pdf_url = $upload_dir['baseurl'].'/7_minute_budget/PDF/budget.pdf';    
  
//echo $upload_pdf_url; die;
$output = array();
parse_str($_POST['form_data'], $output);

$settings = get_option( "seven_minute_budget_theme_settings" );
$fname = $output['fname'];
$lname = $output['lname'];
$email = $output['email'];
$freedom_contribution = $output['freedom_contribution'];
$invest_towards_emergency_fund = $output['invest_towards_emergency_fund'];
$payyourselffirst = $output['payyourselffirst'];
$reminder = isset($output['reminder']) ? 'yes' : 'no';
$housing = $output['this_month_spend_on_housing'];
$schooling = $output['this_month_spend_on_schooling'];
$transportation = $output['this_month_spend_on_transportation'];
$groceries = $output['this_month_spend_on_groceries'];
$phoneinternetaccess = $output['this_month_spend_on_phoneinternetaccess'];
$credit_card_debt = $output['towardcredit_card_debt_this_month'];
$guiltfreespending = $output['this_month_spend_on_guiltfreespending'];
$youllearn_this_month_fromjob = $output['youllearn_this_month_fromjob'];
$earn_side_hustling = $output['earn_side_hustling'];
$this_month_spend_on_guiltfreespending = $output['this_month_spend_on_guiltfreespending'];
$receive_from_gifts = $output['receive_from_gifts'];
$passive_income_coming = $output['passive_income_coming'];

$DigitalEnvelope =  (int)$housing + (int)$schooling + (int)$transportation + (int)$groceries + (int)$phoneinternetaccess + (int)$credit_card_debt + (int)$guiltfreespending; 

$money_out = (int)$youllearn_this_month_fromjob + (int)$earn_side_hustling + (int)$this_month_spend_on_guiltfreespending + (int)$receive_from_gifts; 

$money_out_new = (int)$housing + (int)$schooling + (int)$transportation + (int)$groceries + (int)$invest_towards_emergency_fund
+ (int)$phoneinternetaccess + (int)$credit_card_debt + (int)$guiltfreespending + (int)$freedom_contribution; 

$money_in_new = (int)$youllearn_this_month_fromjob + (int)$passive_income_coming + (int)$earn_side_hustling + (int)$receive_from_gifts; 

require_once ABSPATH . 'dompdf/autoload.inc.php';      

// instantiate and use the dompdf class
$upload_dir_image = wp_upload_dir();

if($money_in_new > $money_out_new) {

$getimage =  plugin_dir_path( __FILE__ ) . '/assets/images/logo.png';

} elseif($money_out_new > $money_in_new){

$getimage =  plugin_dir_path( __FILE__ ) . '/assets/images/logo.png';

} else {

$getimage =  plugin_dir_path( __FILE__ ) . '/assets/images/new_images/logo.png';

}
$type = pathinfo($getimage, PATHINFO_EXTENSION);
$data = file_get_contents($getimage);
$TopImage = 'data:image/' . $type . ';base64,' . base64_encode($data);

$print_image_qrcode =  plugin_dir_path( __FILE__ ) . '/assets/images/qe-code.png';
$type_print_image_qrcode = pathinfo($print_image_qrcode, PATHINFO_EXTENSION);
$data_print_image_qrcode = file_get_contents($print_image_qrcode);
$base64_print_image_qrcode = 'data:image/' . $type_print_image_qrcode . ';base64,' . base64_encode($data_print_image_qrcode);

$image_cash_flow =  plugin_dir_path( __FILE__ ) . '/assets/images/new_images/cash-flow.jpg';
$type_cash_flow = pathinfo($image_cash_flow, PATHINFO_EXTENSION);
$data_image_cash_flow = file_get_contents($image_cash_flow);
$base64_cash_flow = 'data:image/' . $type_cash_flow . ';base64,' . base64_encode($data_image_cash_flow);
//$pdf_HMTL= plugin_dir_path( __FILE__ ) . '/frontend/template-parts/pdf-html.php';
//$html = file_get_contents($pdf_HMTL);
$website7bugetURL= site_url().'/7MinuteBudget';
//$html= 
$month = date('F');
$html= '<!DOCTYPE html><html><head><meta charset="utf-8"><!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
  <title></title><style type="text/css">body { font-family: sans-serif; } html { margin: 0px; }</style></head>
<body>
  <table align="center" style="border:1px solid #000 !important;" cellpadding="0" cellspacing="0" width="1000px;">
    <tr>
      <td align="left" width="100%">

        <!-- 7 minutes header start -->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="">
          <tr style="background: rgb(221, 221, 220); width: 100%; border: none; box-sizing: border-box; ">
            <td align="left" width="100%" style="border-bottom: 1px solid #000;padding-top:40px;padding-bottom:40px;padding-left:20px;">
              <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr width="100%" style=" padding: 20px 30px;">
                  <td align="center" style="position: relative;z-index: 999999; width: 200px;">
                    <img src="'.$TopImage.'" alt="" style="float: left;max-width: 125px;" width="260">
                  </td>
                  <td align="center" width="80%">
                    <span style="width: 80%;text-align: center;">
                      <p style="font-weight: 600;font-size: 2rem;margin: 0;">Your '.$month.' 7-Minute Budget Report</p>
                    </span>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        <!-- 7 minutes budget report start -->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="padding: 20px 30px;border: none;">

          <tr>
            <td align="left" width="100%" style="padding-top: 20px;padding-bottom: 20px;">
              <table align="center" border="0" cellpadding="0" cellspacing="0" width="800px" style="padding-bottom: 20px;">
                <tr>
                  <td align="center" style="display: block; text-align: center; color: #000;">
                    <h3 style="color: #000; font-size: 26px;">Stay on track to be Free By 40</h3>
                  </td>
                </tr>
              </table>
              <table align="center" border="0" cellpadding="0" cellspacing="0" width="900px" style="padding-bottom: 90px;">
        <tr>
        <td>
        <h4>Make the following transfers now.</h4>
        </td></tr>
                
                <tr style="vertical-align: top;">
        <td width="30px" style="display: inline-block; padding-top:2px">
        <input type="checkbox" name="" value="" style="height: 20px; width: 20px; margin-left:0;">
        </td>
                  <td width="500px" style="display: inline-block; padding-right: 20px;">
                    <h3 style="font-weight: 300; font-size: 16px; color: #000; margin: 0; padding-bottom: 0px; line-height: 24px;">Transfer $'.number_format($DigitalEnvelope).' from your Primary Account to your Digital Envelope.<br>Make this transfer to cover your expenses for this month.<br><br>Tip: Before making a purchase, make sure you’ve accounted for it in your budget!<br><br>Tip: Check the balance once a week to make sure you’re on track for the month. Make adjustments weekly to ensure you meet your monthly goal!</h3>
                  </td>
                    
                  <td width="350px" style="display: inline-block; text-align:center;">
                    <span style="background-color: #dddddc;display: inline-block; padding-top: 30px;padding-right: 40px;padding-bottom: 30px;padding-left: 40px;text-align: center;border-radius: 12px;">
                      <p style="font-size: 26px;line-height: 1.2; margin: 0;font-weight: 400; color: #000;">Digital Envelope</p>
                      <h5 style="font-size: 54px;line-height: 1.2; margin: 0; padding-top: 10px; color: #e8472e;font-weight: 700;">$'.number_format($DigitalEnvelope).'</h5>  
                    </span>
                    <p style="font-size: 16px; line-height: 24px; font-weight: 300; padding-top: 10px; margin: 0; color: #000;">Don&#39;t have a Digital Envelope? Set it up <a href="#" style="color: #2b70e4; text-decoration: underline;">here</a></p>
                  </td>
                  
                </tr>
              </table>

              <table align="center" border="0" cellpadding="0" cellspacing="0" width="900px" style="padding-bottom: 90px;    vertical-align: top;">
                <tr style="vertical-align: top;">
        <td width="30px" style="display: inline-block; padding-top:2px">
        <input type="checkbox" name="" value="" style="height: 20px; width: 20px; margin-left:0;">
        </td>
                <td width="500px" style="display: inline-block; padding-right: 20px;">
                    <h3 style="color: #fff; font-weight: 300; font-size: 16px; color: #000; margin: 0; padding-bottom: 0px; line-height: 24px;">Transfer $'.number_format($invest_towards_emergency_fund).' from your Primary Account to your Emergency Fund.<br>This will give you a safety net for financial emergencies.<br><br>Tip: Shoot for $500 or more in this account!</h3>
                  </td>
                  <td width="350px" style="display: inline-block; text-align:center;">
                    <span style="background-color: #dddddc;display: inline-block; padding-top: 30px;padding-bottom: 30px;padding-left: 40px;padding-right: 40px;text-align: center;border-radius: 12px;">
                      <p style="font-size: 26px;line-height: 1.2; margin: 0;font-weight: 400; color: #000;">Emergency Fund</p>
                      <h5 style="font-size: 54px;line-height: 1.2; margin: 0; padding-top: 10px; color: #3db86e;font-weight: 700;">$'.number_format($invest_towards_emergency_fund).'</h5>  
                    </span>
                    <p style="font-size: 16px; line-height: 24px; font-weight: 300; padding-top: 10px; margin: 0; color: #000;">Don&#39;t have a Emergency Fund? Set it up <a href="#" style="color: #2b70e4; text-decoration: underline;">here</a></p>
                  </td>
                  
                </tr>
              </table>
              <table align="center" border="0" cellpadding="0" cellspacing="0" width="900px" style="padding-bottom: 90px;">
                <tr style="vertical-align: top;">
        <td width="30px" style="display: inline-block; padding-top:2px">
        <input type="checkbox" name="" value="" style="height: 20px; width: 20px; margin-left:0;">
        </td>
                  <td width="500px" style="display: inline-block; padding-right: 20px;">
                    <h3 style="color: #fff; font-weight: 300; font-size: 16px; color: #000; margin: 0; padding-bottom: 0px;  line-height: 24px;">Transfer $'.number_format($freedom_contribution).' from your Primary Account to your Freedom Account. Your Freedom Account will generate passive income, so you can be Free By 40!<br><br>Tip: Free By 40 is reached by compounding small monthly investments. Get started investing now - any amount is better than none!</h3>
                  </td>
                  <td width="350px" style="display: inline-block; text-align:center;">
                    <span style="background-color: #dddddc;display: inline-block; padding-top: 30px;padding-right: 40px;padding-bottom: 30px;padding-left: 40px;text-align: center;border-radius: 12px;">
                      <p style="font-size: 26px;line-height: 1.2; margin: 0;font-weight: 400; color: #000;">Freedom Account</p>
                      <h5 style="font-size: 54px;line-height: 1.2; margin: 0; padding-top: 10px; color: #3db86e;font-weight: 700;">$'.number_format($freedom_contribution).'</h5>  
                    </span>
                    <p style="font-size: 16px; line-height: 24px; font-weight: 300; padding-top: 10px; margin: 0; color: #000;">Don&#39;t have a Freedom Account? Set it up <a href="#" style="color: #2b70e4; text-decoration: underline;">here</a></p>
                  </td>
                  
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-bottom: 20px;">
                    <tr>
                        <td align="center" style="display: block; text-align: center; color: #000;">
                            <img style="max-width: 250px;" src="'.$base64_print_image_qrcode.'" alt="" width="100%">
                            <p style="line-height: 1.5; font-weight: 600; font-size: 20px;">Help a Friend.<br>Share the 7-Minute Budget tool! </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    </td>
</tr>
</table>
</body>
</html>';

$customPaper = array(0,0,900,890);

$dompdf = new Dompdf();
$dompdf->set_option('chroot', site_url());
$dompdf->set_option('enable_remote', true);
$dompdf->load_html($html);
//$dompdf->setPaper('A4', 'landscape');
$dompdf->set_paper($customPaper);
$dompdf->render();
ob_end_clean();
$pdf= $dompdf->output();

chmod($upload_url.'budget.pdf', 0777);

file_put_contents($upload_url.'budget.pdf', $pdf);

// Storing the Form data into dompdf_data table

$table_name = $wpdb->prefix.'dompdf_data';
$table_name2 = $wpdb->prefix.'email_reminder_data';

$dataJson = array("money_in"=>$money_in_new, "money_out"=>$money_out_new, "digital_envelope"=>$DigitalEnvelope, "emergency_fund"=>$invest_towards_emergency_fund, "emergency_fund"=>$invest_towards_emergency_fund, "freedom_contribution"=>$freedom_contribution
, "housing"=>$housing, "schooling"=>$schooling, "transportation"=>$transportation, "groceries"=>$groceries, "invest_towards_emergency_fund"=>$invest_towards_emergency_fund, "phoneinternetaccess"=>$phoneinternetaccess, "credit_card_debt"=>$credit_card_debt, "guiltfreespending"=>$guiltfreespending, "youllearn_this_month_fromjob"=>$youllearn_this_month_fromjob, "earn_side_hustling"=>$earn_side_hustling, "receive_from_gifts"=>$receive_from_gifts, "passive_income_coming"=>$passive_income_coming);

$data= json_encode($dataJson);
/*echo json_encode($data);
die; 
*/
if(isset($output['reminder'])) {

$status = 'yes';
$reminder = 1;
}
else {
  $status = 'yes';
  $reminder = 0;
}
$no_send = 'yes'; 

$amNY = new DateTime('America/New_York');
$estTime = $amNY->format('Y-m-d h:i:s');

$email_address = $wpdb->get_row( "SELECT * FROM $table_name2 WHERE email='".$email."'") ;

if(isset($email_address->email) && !empty($email_address->email)){

  $wpdb->update($table_name2, array('status' => $status), array('email' => $email));

} else {  

$wpdb->insert( $table_name2, array('fname' => $fname,'lname' => $lname,'email' => $email,'status' => $status),array( '%s', '%s', '%s', '%s' ));

} 

$wpdb->insert( $table_name, array('fname' => $fname,'lname' => $lname,'email_address' => $email,'data' => $data, 'pdf_link' => $upload_pdf_url,'status' => $status,'created_at' => $estTime),array( '%s', '%s', '%s', '%s', '%s', '%s' ));

       
// send the PDF as an email attachment
  $print_pdf =  plugin_dir_path( __FILE__ ) . '/assets/images/pdf.png';
  $type = pathinfo($print_pdf, PATHINFO_EXTENSION);
  $data = file_get_contents($print_pdf);
  $GetPDFemailimg = 'data:image/' . $type . ';base64,' . base64_encode($data);      

  $to = $email;
  $subject = $settings['email_subject'];
  $message = $settings['email_message'];
  $headers = array(
    'From: '. $settings['email_from'],
    'Reply-To: '.$settings['email_reply_to'],
    'Content-type:text/html;charset=UTF-8" . "\r\n";',
  );

$FileDir= $upload_url.'budget.pdf'; 
    
if(wp_mail($to, $subject, $message, $headers, $FileDir))
 {
// send a response back to the client
   wp_send_json_success($settings['email_s_m']);
}
else
{
  wp_send_json_success('Mail Not Sent');
}

  exit;
}

//add_action('wp_ajax_process_form', 'process_form');
//add_action('wp_ajax_nopriv_process_form', 'process_form');

// Ajax for Exporting All Calculations as CSV Ends //


// Remove enteries from Submissions Data table Starts //

function delete_submitted_calculations_functionality_for_seven(){

    global $wpdb;

    if(isset($_POST)){

        $id = $_POST['id'];
        

        $sql = "TRUNCATE TABLE ".$wpdb->prefix."smb_submissions";

        $results = $wpdb->get_results($sql);

        echo json_encode($results);

    }

    wp_die();

}

add_action('wp_ajax_delete_submitted_calculations_functionality_for_seven', 'delete_submitted_calculations_functionality_for_seven');

// Remove enteries from Submissions Data table Ends //


////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////// AJAX REQUESTS FOR BACKEND ENDS HERE  /////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////




///////////////////////////////////////////////////////////////
// Saving Data after Calculations Starts //////////////////////
///////////////////////////////////////////////////////////////

function save_ips_and_calculations_functionality_for_seven(){

    global $wpdb;

    if(isset($_POST)){

        $ip = $_POST['ip'];
        $housing_out = $_POST['housing_out'];
        $schooling_out = $_POST['schooling_out'];
        $transportation_out = $_POST['transportation_out'];
        $groceries_out = $_POST['groceries_out'];
        $phone_internet_out = $_POST['phone_internet_out'];
        $emergency_fund_out = $_POST['emergency_fund_out'];
        $credit_card_debt_out = $_POST['credit_card_debt_out'];
        $spend_guiltfree_month_out = $_POST['spend_guiltfree_month_out'];
        $pay_yourself_out = $_POST['pay_yourself_out'];
        $freedom_cont_out = $_POST['freedom_cont_out'];

        $job_earning_in = $_POST['job_earning_in'];
        $hustle_earning_in = $_POST['hustle_earning_in'];
        $monthly_saving_in = $_POST['monthly_saving_in'];
        $gifts_in = $_POST['gifts_in'];

        $cashflow_results = $_POST['cashflow_results'];
        $money_in_results = $_POST['money_in_results'];
        $money_out_results = $_POST['money_out_results'];
        $emergency_results = $_POST['emergency_results'];
        $digital_results = $_POST['digital_results'];
        $guiltfree_results = $_POST['guiltfree_results'];
        $papercut_results = $_POST['papercut_results'];
        $freedom_results = $_POST['freedom_results'];


        $sql = "INSERT INTO ".$wpdb->prefix . 'smb_submissions'."
        (
            ip,
            housing_out,
            schooling_out,
            transportation_out,
            groceries_out,
            phone_internet_out,
            emergency_fund_out,
            credit_card_debt_out,
            spend_guiltfree_month_out,
            pay_yourself_out,
            freedom_cont_out,
            job_earning_in,
            hustle_earning_in,
            monthly_saving_in,
            gifts_in,
            cashflow_results,
            money_in_results,
            money_out_results,
            emergency_results,
            digital_results,
            guiltfree_results,
            papercut_results,
            freedom_results
        ) VALUES 
        (
            '".$ip."',
            '".$housing_out."',
            '".$schooling_out."',
            '".$transportation_out."',
            '".$groceries_out."',
            '".$phone_internet_out."',
            '".$emergency_fund_out."',
            '".$credit_card_debt_out."',
            '".$spend_guiltfree_month_out."',
            '".$pay_yourself_out."',
            '".$freedom_cont_out."',
            '".$job_earning_in."',
            '".$hustle_earning_in."',
            '".$monthly_saving_in."',
            '".$gifts_in."',
            '".$cashflow_results."',
            '".$money_in_results."',
            '".$money_out_results."',
            '".$emergency_results."',
            '".$digital_results."',
            '".$guiltfree_results."',
            '".$papercut_results."',
            '".$freedom_results."'
        )";

        echo $sql;

        $results_insert_calculations = $wpdb->get_results($sql);
        
    }
    

    wp_die();

}

add_action('wp_ajax_save_ips_and_calculations_functionality_for_seven', 'save_ips_and_calculations_functionality_for_seven');
add_action("wp_ajax_nopriv_save_ips_and_calculations_functionality_for_seven", "save_ips_and_calculations_functionality_for_seven");

// function my_enqueue_scripts() {
//   // Enqueue jQuery
//   wp_enqueue_script('jquery');
//   // Set the AJAX URL for your plugin or theme
//   wp_localize_script('jquery', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));
// }
// add_action('wp_enqueue_scripts', 'my_enqueue_scripts');

