<?php 

/* This file controls the Frontend */


function seven_minute_budget_financial_calculator_page() {

    $pages = get_posts([
        'name'      => '7MinuteBudget',
        'post_type' => 'page'
    ]);


    if(empty($pages)){
        $page_id = wp_insert_post(array(
            'post_title' => '7 Minute Budget',
            'post_type' =>'page',       
            'post_name' => '7MinuteBudget',
            'post_status' => 'publish',
            'post_excerpt' => 'Financial Calculator Page for Frontend',
            'page_template'  => 'MainPage.php'    
        ));

        add_post_meta( $page_id, '_wp_page_template', 'template-parts/MainPage.php' );
    }
    
}
// function seven_minute_budget_after_calculations_page() {

//     $pages = get_posts([
//         'name'      => '7MinuteBudget-Results',
//         'post_type' => 'page'
//     ]);


//     if(empty($pages)){
//         $page_id = wp_insert_post(array(
//             'post_title' => '7MinuteBudget After Calculation Results',
//             'post_type' =>'page',       
//             'post_name' => '7MinuteBudget-Results',
//             'post_status' => 'publish',
//             'post_excerpt' => 'After Calculations Page for Frontend',
//             'page_template'  => '7MinuteBudgetAfterCaclulationPage.php'  
//         ));

//         add_post_meta( $page_id, '_wp_page_template', 'template-parts/7MinuteBudgetAfterCaclulationPage.php' );
//     }
    
// }

add_action('admin_init', 'seven_minute_budget_financial_calculator_page');

// add_action('admin_init', 'seven_minute_budget_after_calculations_page');


/* Frontend Calculator Page Template Auto Assign Starts */

add_filter( 'page_template', 'calculator_page_template_for_seven' );
function calculator_page_template_for_seven( $page_template ){

    if ( get_page_template_slug() == 'MainPage.php' ) {
        $page_template = dirname( __FILE__ ) . '/template-parts/MainPage.php';
    }
    return $page_template;
}
add_filter( 'theme_page_templates', 'CalculatorPage_template_to_select_for_seven', 10, 4 );
function CalculatorPage_template_to_select_for_seven( $post_templates, $wp_theme, $post, $post_type ) {

    // Add custom template named template-custom.php to select dropdown 
    $post_templates['MainPage.php'] = __('MainPage');

    return $post_templates;
}

// add_filter( 'page_template', 'after_calculations_page_template_for_seven' );

// function after_calculations_page_template_for_seven( $page_template ){

//     if ( get_page_template_slug() == '7MinuteBudgetAfterCaclulationPage.php' ) {
//         $page_template = dirname( __FILE__ ) . '/template-parts/7MinuteBudgetAfterCaclulationPage.php';
//     }
//     return $page_template;
// }
// add_filter( 'theme_page_templates', 'AfterCaclulationPage_template_to_select_for_seven', 10, 4 );
// function AfterCaclulationPage_template_to_select_for_seven( $post_templates, $wp_theme, $post, $post_type ) {

//     // Add custom template named template-custom.php to select dropdown 
//     $post_templates['7MinuteBudgetAfterCaclulationPage.php'] = __('7MinuteBudgetAfterCaclulationPage');

//     return $post_templates;
// }



?>