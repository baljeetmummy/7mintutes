<?php 

/* PLUGIN SETTINGS IN WORDPRESS DASHBOARD  */

/**
 * Add the top level menu page.
*/

function seven_minute_budget_admin_tabs( $current = 'general' ) {
    global $wpdb;
     $tabs = array( 
        'general' => 'General', 
        'records' => 'Records',
        'emailcontent' => 'Email Content',
        'emaillisting' => 'Email Reminder Data',
        //'email_reminder_data' => 'Email Reminder Data',
        //'emailstatus' => 'Email Status'
    );
     echo '<div id="icon-themes" class="icon32"><br></div>';
     echo '<h2 style="padding: 50px 10px 10px;">7 Minute Budget</h2>';
     echo '<div class="nav-tab-wrapper">';
     foreach( $tabs as $tab => $name ){
         $class = ( $tab == $current ) ? ' nav-tab-active' : '';
         echo "<a class='nav-tab$class' href='?page=seven_minute_budget&tab=$tab'>$name</a>";
     }
     echo '</div>';
 }
  
function seven_minute_budget_options_page_html() {
    global $pagenow;
    $settings = get_option( "seven_minute_budget_theme_settings" );
    //generic HTML and code goes here
    if ( isset ( $_GET['tab'] ) ) seven_minute_budget_admin_tabs($_GET['tab']); else seven_minute_budget_admin_tabs('general');
         require("settings-form-template.php");
    }


  
function seven_minute_budget_options_page() {
    add_menu_page(
        '7 Minute Budget',
        '7 Minute Budget',
        'manage_options',
        'seven_minute_budget',
        'seven_minute_budget_options_page_html',
        'dashicons-media-spreadsheet', 20, 25
    );
}
 
 
/**
 * Register our seven_minute_budget_options_page to the admin_menu action hook.
 */
add_action( 'admin_menu', 'seven_minute_budget_options_page' );

// save settings in database 

function seven_minute_budget_save_theme_settings() {
    global $pagenow;
    $settings = get_option( "seven_minute_budget_theme_settings" );
 
    if ( $pagenow == 'admin.php' && $_GET['page'] == 'seven_minute_budget' ){
       if ( isset ( $_GET['tab'] ) )
            $tab = $_GET['tab'];
        else
            $tab = 'general';
 
       switch ( $tab ){
          case 'general' :
          // GENERAL SETTINGS BEGINS //   
 

             // FILE UPLOAD SETTINGS STARTS - Meter Settings - Page's Results Block I //

                global $wp_filesystem;
                WP_Filesystem();
 
                $content_directory = $wp_filesystem->wp_content_dir() . 'uploads/';
 
                $wp_filesystem->mkdir( $content_directory . '7_minute_budget' );
 
                $target_dir_location = $content_directory . '7_minute_budget/';
 
                
                if(isset($_FILES['fileupload4'])) {
                
                  $name_file = date('H-i-s-d-m-Y-').$_FILES['fileupload4']['name'];
                  $tmp_name = $_FILES['fileupload4']['tmp_name'];
               
                  if( move_uploaded_file( $tmp_name,  $target_dir_location.$name_file ) ) {
                     $settings['fileupload4'] = $name_file;
                     echo "File was successfully uploaded";
                  } 
               
               }

                if(isset($_FILES['fileupload5'])) {
                
                   $name_file = date('H-i-s-d-m-Y-').$_FILES['fileupload5']['name'];
                   $tmp_name = $_FILES['fileupload5']['tmp_name'];
                
                   if( move_uploaded_file( $tmp_name,  $target_dir_location.$name_file ) ) {
                      $settings['fileupload5'] = $name_file;
                      echo "File was successfully uploaded";
                   } 
                
                }
             // FILE UPLOAD SETTINGS STARTS - Meter Settings - Page's Results Block I //

             // Start -- COLOR SAVE SETTINGS BEGINS //
 
                $settings['calculatorbg'] = $_POST['calculatorbg'];
                $settings['calculatorbg-opacity'] = $_POST['calculatorbg-opacity'];
                $settings['caltextcolor'] = $_POST['caltextcolor'];
                $settings['caltextcolor-opacity'] = $_POST['caltextcolor-opacity'];
                $settings['calbutcolor'] = $_POST['calbutcolor'];
                $settings['calbutcolor-opacity'] = $_POST['calbutcolor-opacity'];
                $settings['calbuttext'] = $_POST['calbuttext'];
                $settings['calbuttext-opacity'] = $_POST['calbuttext-opacity'];
 
               /******** Meter Settings - Page's Results Block I ********/
                $settings['block1bg'] = $_POST['block1bg'];
                $settings['block1bg-opacity'] = $_POST['block1bg-opacity'];
                $settings['block1text'] = $_POST['block1text'];
                $settings['block1text-opacity'] = $_POST['block1text-opacity'];
 
               /******** Realtime Results - Page's Results Block II ********/
                $settings['realtimebg_color'] = $_POST['realtimebg_color'];
                $settings['realtimebg_color-opacity'] = $_POST['realtimebg_color-opacity'];
                $settings['realtimetext'] = $_POST['realtimetext'];
                $settings['realtimetext-opacity'] = $_POST['realtimetext-opacity'];

 
               /******** Realtime Results - Page's Results Block II ********/
                $settings['realtimebutttonbackground'] = $_POST['realtimebutttonbackground'];
                $settings['realtimebutttonbackground-opacity'] = $_POST['realtimebutttonbackground-opacity'];
                $settings['realtimebutttontext'] = $_POST['realtimebutttontext'];
                $settings['realtimebutttontext-opacity'] = $_POST['realtimebutttontext-opacity'];
 
             // End -- COLOR SAVE SETTINGS BEGINS //

  
             // Start -- Money Out Calculator Section BEGINS //

                $settings['calculatortext'] = $_POST['calculatortext'];
                $settings['calculatordescription'] = $_POST['calculatordescription'];
                $settings['calculatorbutton'] = $_POST['calculatorbutton'];
 
             // End -- Money Out Calculator Section ENDS //

             // Start -- Money In Calculator Section BEGINS //
 
                $settings['calculatorheading_in'] = $_POST['calculatorheading_in'];
                $settings['calculatordescription_in'] = $_POST['calculatordescription_in'];
                $settings['calculatorbutton_in'] = $_POST['calculatorbutton_in'];
  
             // End -- Money In Calculator Section ENDS //

 
             // Start -- Realtime Results - Page's Results Block II //
 
                $settings['realtimemain_description'] = $_POST['realtimemain_description'];
                $settings['realtimealternative_description'] = $_POST['realtimealternative_description'];
                $settings['realtimemain_description_positive'] = $_POST['realtimemain_description_positive'];
                $settings['realtimeCalculate_button'] = $_POST['realtimeCalculate_button'];
  
             // End -- Realtime Results - Page's Results Block II //
 
            // CTA SETTINGS BEGINS //
 
                $settings['ctaredirectlink'] = $_POST['ctaredirectlink'];
                $settings['ctacouleur'] = $_POST['ctacouleur'];
 
             // CTA SETTINGS ENDS //
 
             break;  

             case 'emailcontent' :

             $settings['email_subject'] = $_POST['email_subject'];
             $settings['email_message'] = $_POST['email_message'];
             $settings['email_from'] = $_POST['email_from'];
             $settings['email_reply_to'] = $_POST['email_reply_to'];
             $settings['email_s_m'] = $_POST['email_s_m'];
             $settings['email_txt'] = $_POST['email_txt'];
             $settings['submitted_email_records_title'] = $_POST['submitted_email_records_title'];
             $settings['submitted_email_records_text'] = $_POST['submitted_email_records_text'];
             $settings['csv_upload_btn_name'] = $_POST['csv_upload_btn_name'];
             $settings['email_success_msg'] = $_POST['email_success_msg'];
             $settings['email_err_msg'] = $_POST['email_err_msg'];
             $settings['email_success_msg1'] = $_POST['email_success_msg1'];
             $settings['email_err_msg1'] = $_POST['email_err_msg1'];

             break; 
 
        }
    }
    
    //code to filter html goes here
    $updated = update_option( "seven_minute_budget_theme_settings", $settings );
 }
 

 function seven_minute_budget_load_settings_page() {

   if(isset($_POST["Submit"])){
   
      if ( $_POST["Submit"] == 'Update Settings' ) {
         check_admin_referer( "seven_minute_budget-settings-page" );
         seven_minute_budget_save_theme_settings();
      
         // print_r("=====>>>>>>======>>>".$_POST);
      
         $url_parameters = isset($_GET['tab'])? 'updated=true&tab='.$_GET['tab'] : 'updated=true';
         wp_redirect(admin_url('admin.php?page=seven_minute_budget&'.$url_parameters));
         exit;
        }
   
   }   
   
   }

/**
 * Register our gamification_settings_init to the admin_init action hook.
 */
add_action( 'admin_init', 'seven_minute_budget_load_settings_page' );
