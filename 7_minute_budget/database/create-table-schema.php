<?php
/*/var/www/html/7minutebudget/wp-content/plugins/7_minute_budget/database*/
global $wpdb;
$pf_parts_db_version = '1.0.0';
$charset_collate = $wpdb->get_charset_collate();

//////////////////////////////////////////////////////////
// CREATING TABLES STARTS ////////////////////////////////
//////////////////////////////////////////////////////////

// CREATE TABLE FOR SUBMITTING CALCULATIONS //

$table_submitted_calculations = $wpdb->prefix . 'smb_submissions';

if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_submitted_calculations}'" ) != $table_submitted_calculations ) {

  $sql = "CREATE TABLE IF NOT EXISTS $table_submitted_calculations (
      id bigint(20) NOT NULL AUTO_INCREMENT,
      ip  VARCHAR(255) NOT NULL,
      housing_out  VARCHAR(255) NOT NULL,
      schooling_out  VARCHAR(255) NOT NULL,
      transportation_out  VARCHAR(255) NOT NULL,
      groceries_out  VARCHAR(255) NOT NULL,
      phone_internet_out  VARCHAR(255) NOT NULL,
      emergency_fund_out  VARCHAR(255) NOT NULL,
      credit_card_debt_out  VARCHAR(255) NOT NULL,
      spend_guiltfree_month_out  VARCHAR(255) NOT NULL,
      pay_yourself_out  VARCHAR(255) NOT NULL,
      freedom_cont_out VARCHAR(255) NOT NULL,
      job_earning_in VARCHAR(255) NOT NULL,
      hustle_earning_in VARCHAR(255) NOT NULL,
      monthly_saving_in VARCHAR(255) NOT NULL,
      gifts_in VARCHAR(255) NOT NULL,
      cashflow_results VARCHAR(255) NOT NULL,
      money_in_results VARCHAR(255) NOT NULL,
      money_out_results VARCHAR(255) NOT NULL,
      emergency_results VARCHAR(255) NOT NULL,
      digital_results VARCHAR(255) NOT NULL,
      guiltfree_results VARCHAR(255) NOT NULL,
      papercut_results VARCHAR(255) NOT NULL,
      freedom_results VARCHAR(255) NOT NULL,
      PRIMARY KEY id (id)
    ) $charset_collate;";


  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );
  add_option( 'pf_parts_db_version', $pf_parts_db_version );
}


//////////////////////////////////////////////////////////
// CREATING TABLES ENDS  /////////////////////////////////
//////////////////////////////////////////////////////////

