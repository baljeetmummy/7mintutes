<?php 

/* Header Widget */


?>

<?php get_header(); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!--link rel="stylesheet" href="<?php //echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/css/bootstrap.min.css"-->
<link rel="stylesheet" href="https://evviva.ai/wp-content/plugins/7_minute_budget/assets/css/bootstrap.min.css" />


<link rel="stylesheet" href="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/css/hierarchy-select.min.css" />

<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  
<?php 

	$settings = get_option( "seven_minute_budget_theme_settings" );

?>

<?php include("frontend-calculator-css.php");  ?>

