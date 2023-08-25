<?php

 $settings = get_option( "seven_minute_budget_theme_settings" );

 global $wpdb;


?>

<link rel="stylesheet" href="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/css/font-awesome.min.css" />
<link rel="stylesheet" href="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/css/style.css" />
<link rel="stylesheet" href="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/css/jquery.minicolors.css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">


<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

<!-- Google Fonts Roboto -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

<!-- Material Design Bootstrap -->
<link rel="stylesheet" href="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/css/datatables.min.css">
<link rel="stylesheet" href="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/css/buttons.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

<!-- Loading Editor at Plugin Settings Page -->
<!-- <link rel="stylesheet" href="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/css/editor.css"> -->



<form method="post" action="<?php admin_url( 'admin.php?page=seven_minute_budget' ); ?>" enctype="multipart/form-data">

        <?php
                    wp_nonce_field( "seven_minute_budget-settings-page" );

                    if ( $pagenow == 'admin.php' && $_GET['page'] == 'seven_minute_budget' ){

                    if ( isset ( $_GET['tab'] ) ) $tab = $_GET['tab'];
                    else $tab = 'general';

                    echo '<div class="form-table tab-det-wrp m-0">';
                    switch ( $tab ){
                        case 'general' :
        ?>
                            <!-- GENERAL SETTINGS START HERE  -->
                            <div class="general-container gernal-wrapper">
                                <div class="row">
                                    <div class="col-md-9 br-1">
                                        <div class="geranal-cards mb-5">
                                            <h2 class="primary-head hide hidden" hide hidden for="seven_minute_budget_intro">Calculators</h2>

                                            <!--**************************** Money Out Calculator Section  ****************************-->
                                            <h4 class="money-in-out-headings">Money Out Calculator Section </h4>
                                            <div class="geranal-cards-in geranal-cards-in-mb0">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 mt-tab-15">
                                                        <div class="gerenal-form">
                                                            <div class="form-group">
                                                                <label>Calculator Title</label>
                                                                <?php if(esc_html( isset( $settings["calculatortext"] ) )){ ?>  
                                                                    <input name="calculatortext" type="text" class="form-control" value="<?php echo stripslashes($settings["calculatortext"]); ?>">
                                                                <?php }else{ ?> 
                                                                    <input name="calculatortext" type="text" class="form-control">
                                                                <?php } ?>  
                                                            </div>


                                                            <div class="form-group">
                                                                <label>Calculator Quick Description</label>
                                                                <?php if(esc_html( isset( $settings["calculatordescription"] ) )){ ?>  
                                                                    <input name="calculatordescription" type="text" class="form-control" value="<?php echo stripslashes($settings["calculatordescription"]); ?>">
                                                                <?php }else{ ?> 
                                                                    <input name="calculatordescription" type="text" class="form-control">
                                                                <?php } ?>  
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Calculator Button</label>
                                                                <?php if(esc_html( isset( $settings["calculatorbutton"] ) )){ ?>	
                                                                    <input name="calculatorbutton" type="text" class="form-control" value="<?php echo stripslashes($settings["calculatorbutton"]); ?>">
                                                                <?php }else{ ?>	
                                                                    <input name="calculatorbutton" type="text" class="form-control">
                                                                <?php } ?>	
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">	
                                                    <div class="col-md-3">				
                                                        <div class="gerenal-form">
                                                        <label>Background</label>
                                                            <div class="form-group">

                                                                <?php if((esc_html( isset( $settings["calculatorbg"] ) )) && (esc_html( isset( $settings["calculatorbg-opacity"] ) ))){ ?>			

                                                                    <?php if($settings["calculatorbg-opacity"] != ""){ ?>
                                                                        <input type="hidden" class="opacity-handler" id="calculatorbg-opacity" name="calculatorbg-opacity" value="<?php echo $settings["calculatorbg-opacity"]; ?>">
                                                                        <input type="text" name="calculatorbg" id="text-field" data-opacity="<?php echo $settings["calculatorbg-opacity"]; ?>" class="demo" value="<?php echo $settings["calculatorbg"]; ?>">
                                                                    <?php }else{ ?>
                                                                        <input type="hidden" class="opacity-handler" id="calculatorbg-opacity" name="calculatorbg-opacity" value="1">
                                                                        <input type="text" name="calculatorbg" id="text-field" data-opacity="1" class="demo" value="#3db86e">
                                                                    <?php }	?>

                                                                <?php }else{ ?>

                                                                <input type="hidden" class="opacity-handler" id="calculatorbg-opacity" name="calculatorbg-opacity" value="">
                                                                <input type="text" name="calculatorbg" id="text-field" data-opacity="1" class="demo" value="#3db86e">

                                                            <?php } ?>	
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">				
                                                        <div class="gerenal-form">
                                                        <label>Text Color</label>	
                                                            <div class="form-group">

                                                                <?php if((esc_html( isset( $settings["caltextcolor"] ) )) && (esc_html( isset( $settings["caltextcolor-opacity"] ) ))){ ?>			

                                                                    <?php if($settings["caltextcolor-opacity"] != ""){ ?>
                                                                        <input type="hidden" class="opacity-handler" id="caltextcolor-opacity" name="caltextcolor-opacity" value="<?php echo $settings["caltextcolor-opacity"]; ?>">
                                                                        <input type="text" name="caltextcolor" id="text-field" data-opacity="<?php echo $settings["caltextcolor-opacity"]; ?>" class="demo" value="<?php echo $settings["caltextcolor"]; ?>">
                                                                    <?php }else{ ?>
                                                                        <input type="hidden" class="opacity-handler" id="caltextcolor-opacity" name="caltextcolor-opacity" value="1">
                                                                        <input type="text" name="caltextcolor" id="text-field" data-opacity="1" class="demo" value="#ffffff">
                                                                    <?php }	?>

                                                                <?php }else{ ?>

                                                                <input type="hidden" class="opacity-handler" id="caltextcolor-opacity" name="caltextcolor-opacity" value="">
                                                                <input type="text" name="caltextcolor" id="text-field" data-opacity="1" class="demo" value="#ffffff">

                                                            <?php } ?>	
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">				
                                                        <div class="gerenal-form">
                                                        <label>Button Color</label>	
                                                            <div class="form-group">

                                                                <?php if((esc_html( isset( $settings["calbutcolor"] ) )) && (esc_html( isset( $settings["calbutcolor-opacity"] ) ))){ ?>			

                                                                    <?php if($settings["calbutcolor-opacity"] != ""){ ?>
                                                                        <input type="hidden" class="opacity-handler" id="calbutcolor-opacity" name="calbutcolor-opacity" value="<?php echo $settings["calbutcolor-opacity"]; ?>">
                                                                        <input type="text" name="calbutcolor" id="text-field" data-opacity="<?php echo $settings["calbutcolor-opacity"]; ?>" class="demo" value="<?php echo $settings["calbutcolor"]; ?>">
                                                                    <?php }else{ ?>
                                                                        <input type="hidden" class="opacity-handler" id="calbutcolor-opacity" name="calbutcolor-opacity" value="1">
                                                                        <input type="text" name="calbutcolor" id="text-field" data-opacity="1" class="demo" value="#0074c7">
                                                                    <?php }	?>

                                                                <?php }else{ ?>

                                                                <input type="hidden" class="opacity-handler" id="calbutcolor-opacity" name="calbutcolor-opacity" value="">
                                                                <input type="text" name="calbutcolor" id="text-field" data-opacity="1" class="demo" value="#0074c7">

                                                            <?php } ?>	
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">				
                                                        <div class="gerenal-form">
                                                        <label>Button Text</label>	
                                                            <div class="form-group">

                                                                <?php if((esc_html( isset( $settings["calbuttext"] ) )) && (esc_html( isset( $settings["calbuttext-opacity"] ) ))){ ?>			

                                                                    <?php if($settings["calbuttext-opacity"] != ""){ ?>
                                                                        <input type="hidden" class="opacity-handler" id="calbuttext-opacity" name="calbuttext-opacity" value="<?php echo $settings["calbuttext-opacity"]; ?>">
                                                                        <input type="text" name="calbuttext" id="text-field" data-opacity="<?php echo $settings["calbuttext-opacity"]; ?>" class="demo" value="<?php echo $settings["calbuttext"]; ?>">
                                                                    <?php }else{ ?>
                                                                        <input type="hidden" class="opacity-handler" id="calbuttext-opacity" name="calbuttext-opacity" value="1">
                                                                        <input type="text" name="calbuttext" id="text-field" data-opacity="1" class="demo" value="#ffffff">
                                                                    <?php }	?>

                                                                <?php }else{ ?>

                                                                <input type="hidden" class="opacity-handler" id="calbuttext-opacity" name="calbuttext-opacity" value="">
                                                                <input type="text" name="calbuttext" id="text-field" data-opacity="1" class="demo" value="#ffffff">

                                                            <?php } ?>	
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>	
                                            </div>



                                            <!--**************************** Money In Calculator Section ****************************-->
                                            <h4 class="money-in-out-headings top--space-remove">Money In Calculator Section</h4>
                                            <div class="geranal-cards-in geranal-cards-in-mb0">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 mt-tab-15">
                                                        <div class="gerenal-form">
                                                            <div class="form-group">
                                                                <label>Calculator Title</label>
                                                                <?php if(esc_html( isset( $settings["calculatorheading_in"] ) )){ ?>  
                                                                    <input name="calculatorheading_in" type="text" class="form-control" value="<?php echo stripslashes($settings["calculatorheading_in"]); ?>">
                                                                <?php }else{ ?> 
                                                                    <input name="calculatorheading_in" type="text" class="form-control">
                                                                <?php } ?>  
                                                            </div>


                                                            <div class="form-group">
                                                                <label>Calculator Quick Description</label>
                                                                <?php if(esc_html( isset( $settings["calculatordescription_in"] ) )){ ?>  
                                                                    <input name="calculatordescription_in" type="text" class="form-control" value="<?php echo stripslashes($settings["calculatordescription_in"]); ?>">
                                                                <?php }else{ ?> 
                                                                    <input name="calculatordescription_in" type="text" class="form-control" />
                                                                <?php } ?>  
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Calculator Button</label>
                                                                <?php if(esc_html( isset( $settings["calculatorbutton_in"] ) )){ ?>    
                                                                    <input name="calculatorbutton_in" type="text" class="form-control" value="<?php echo stripslashes($settings["calculatorbutton_in"]); ?>">
                                                                <?php }else{ ?> 
                                                                    <input name="calculatorbutton_in" type="text" class="form-control">
                                                                <?php } ?>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <!--**************************** Start Meter Settings - Page's Results Block ****************************-->
                                            <h4 class="money-in-out-headings">Meter Settings - Page's Results Block I</h4>
                                            <div class="geranal-cards-in">
                                                <div class="row">   
                                                    <div class="col-md-6">
                                                        <h6>Meter Background Image</h6>
                                                        <div class="img-text-wrap dash-in mb-10">
                                                            <div class="media">
                                                            <?php if(esc_html( isset( $settings["fileupload4"] ) )){ ?>    
                                                                <img src="<?php echo  get_site_url().'/wp-content/uploads/7_minute_budget/'.$settings['fileupload4']; ?>" alt="dash-logo" id="logoupload4"/>
                                                            <?php }else{ ?> 
                                                                <img src="<?php echo  get_site_url().'/wp-content/plugins/7_minute_budget/assets/images/meter-background.png' ?>" alt="dash-logo" id="logoupload4"/>
                                                            <?php } ?>  
                                                                <div class="media-body">
                                                                    <p>PNG/JPG/SVG/WEBP file</p>
                                                                    <div class="file-upload file btn btn-lg btn-primary">
                                                                        <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                                            <g id="invisible_box" data-name="invisible box">
                                                                            <rect id="Rectangle_728" data-name="Rectangle 728" width="20" height="20" fill="none"/>
                                                                            </g>
                                                                            <g id="Q3_icons" data-name="Q3 icons" transform="translate(1.633 1.633)">
                                                                            <path id="Path_5199" data-name="Path 5199" d="M19.516,41.633H4.817a.817.817,0,0,1,0-1.633h14.7a.817.817,0,1,1,0,1.633Z" transform="translate(-4 -25.301)" fill="#1b0ef5"/>
                                                                            <path id="Path_5200" data-name="Path 5200" d="M16.246,14.412l2.45,2.409a.776.776,0,0,0,1.143,0l2.45-2.409a.857.857,0,0,0,.082-1.1.776.776,0,0,0-1.225-.082l-1.062,1.062V4.817a.817.817,0,1,0-1.633,0v9.473l-1.062-1.062a.776.776,0,0,0-1.225.082A.857.857,0,0,0,16.246,14.412Z" transform="translate(-11.101 -4)" fill="#1b0ef5"/>
                                                                            </g>
                                                                        </svg>
                                                                        Upload
                                                                        <input type="file" name="fileupload4" id="fileupload4"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Meter Niddle Image</h6>
                                                        <div class="img-text-wrap dash-in mb-10">
                                                            <div class="media">
                                                            <?php if(esc_html( isset( $settings["fileupload5"] ) )){ ?>    
                                                                <img src="<?php echo  get_site_url().'/wp-content/uploads/7_minute_budget/'.$settings['fileupload5']; ?>" alt="dash-logo" id="logoupload5"/>
                                                            <?php }else{ ?> 
                                                                <img src="<?php echo  get_site_url().'/wp-content/plugins/7_minute_budget/assets/images/meter-niddle.png' ?>" alt="dash-logo" id="logoupload5"/>
                                                            <?php } ?>  
                                                                <div class="media-body">
                                                                    <p>PNG/JPG/SVG/WEBP file</p>
                                                                    <div class="file-upload file btn btn-lg btn-primary">
                                                                        <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                                            <g id="invisible_box" data-name="invisible box">
                                                                            <rect id="Rectangle_728" data-name="Rectangle 728" width="20" height="20" fill="none"/>
                                                                            </g>
                                                                            <g id="Q3_icons" data-name="Q3 icons" transform="translate(1.633 1.633)">
                                                                            <path id="Path_5199" data-name="Path 5199" d="M19.516,41.633H4.817a.817.817,0,0,1,0-1.633h14.7a.817.817,0,1,1,0,1.633Z" transform="translate(-4 -25.301)" fill="#1b0ef5"/>
                                                                            <path id="Path_5200" data-name="Path 5200" d="M16.246,14.412l2.45,2.409a.776.776,0,0,0,1.143,0l2.45-2.409a.857.857,0,0,0,.082-1.1.776.776,0,0,0-1.225-.082l-1.062,1.062V4.817a.817.817,0,1,0-1.633,0v9.473l-1.062-1.062a.776.776,0,0,0-1.225.082A.857.857,0,0,0,16.246,14.412Z" transform="translate(-11.101 -4)" fill="#1b0ef5"/>
                                                                            </g>
                                                                        </svg>
                                                                        Upload
                                                                        <input type="file" name="fileupload5" id="fileupload5"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">              
                                                        <div class="gerenal-form">
                                                        <label>Block BG</label>
                                                            <div class="form-group">

                                                                <?php if((esc_html( isset( $settings["block1bg"] ) )) && (esc_html( isset( $settings["block1bg-opacity"] ) ))){ ?>          

                                                                    <?php if($settings["block1bg-opacity"] != ""){ ?>
                                                                        <input type="hidden" class="opacity-handler" id="block1bg-opacity" name="block1bg-opacity" value="<?php echo $settings["block1bg-opacity"]; ?>">
                                                                        <input type="text" name="block1bg" id="text-field" data-opacity="<?php echo $settings["block1bg-opacity"]; ?>" class="demo" value="<?php echo $settings["block1bg"]; ?>">
                                                                    <?php }else{ ?>
                                                                        <input type="hidden" class="opacity-handler" id="block1bg-opacity" name="block1bg-opacity" value="1">
                                                                        <input type="text" name="block1bg" id="text-field" data-opacity="1" class="demo" value="#2b70e4">
                                                                    <?php } ?>

                                                                <?php }else{ ?>

                                                                <input type="hidden" class="opacity-handler" id="block1bg-opacity" name="block1bg-opacity" value="">
                                                                <input type="text" name="block1bg" id="text-field" data-opacity="1" class="demo" value="#2b70e4">

                                                            <?php } ?>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">              
                                                        <div class="gerenal-form">
                                                        <label>Labels</label>   
                                                            <div class="form-group">

                                                                <?php if((esc_html( isset( $settings["block1text"] ) )) && (esc_html( isset( $settings["block1text-opacity"] ) ))){ ?>          

                                                                    <?php if($settings["block1text-opacity"] != ""){ ?>
                                                                        <input type="hidden" class="opacity-handler" id="block1text-opacity" name="block1text-opacity" value="<?php echo $settings["block1text-opacity"]; ?>">
                                                                        <input type="text" name="block1text" id="text-field" data-opacity="<?php echo $settings["block1text-opacity"]; ?>" class="demo" value="<?php echo $settings["block1text"]; ?>">
                                                                    <?php }else{ ?>
                                                                        <input type="hidden" class="opacity-handler" id="block1text-opacity" name="block1text-opacity" value="1">
                                                                        <input type="text" name="block1text" id="text-field" data-opacity="1" class="demo" value="#ffffff">
                                                                    <?php } ?>

                                                                <?php }else{ ?>

                                                                <input type="hidden" class="opacity-handler" id="block1text-opacity" name="block1text-opacity" value="">
                                                                <input type="text" name="block1text" id="text-field" data-opacity="1" class="demo" value="#ffffff">

                                                                <?php } ?>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--**************************** End Meter Settings - Page's Results Block ****************************-->





                                            <!--**************************** Start Live Results Calculations Settings ****************************-->
                                            <h4 class="money-in-out-headings">Realtime Results - Page's Results Block II</h4>
                                            <div class="geranal-cards-in">


                                            <div class="geranal-cards-in geranal-cards-in-mb0">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 mt-tab-15">
                                                        <div class="gerenal-form">
                                                            <div class="form-group">
                                                                <label>Main Description (If this is negative say)</label>
                                                                <?php if(esc_html( isset( $settings["realtimemain_description"] ) )){ ?>  
                                                                    <textarea name="realtimemain_description" style="min-height: 150px;" class="form-control" value="<?php echo stripslashes($settings["realtimemain_description"]); ?>"><?php echo stripslashes($settings["realtimemain_description"]); ?></textarea>
                                                                <?php }else{ ?> 
                                                                    <textarea  name="realtimemain_description" style="min-height: 150px;" class="form-control">
                                                                    </textarea>
                                                                <?php } ?>  
                                                            </div>


                                                            <div class="form-group">
                                                                <label>Descritpion, (If this is 0 say)</label>
                                                                <?php if(esc_html( isset( $settings["realtimealternative_description"] ) )){ ?>  
                                                                    <textarea name="realtimealternative_description" style="min-height: 150px;" class="form-control" value="<?php echo stripslashes($settings["realtimealternative_description"]); ?>"><?php echo stripslashes($settings["realtimealternative_description"]); ?></textarea>
                                                                <?php }else{ ?> 
                                                                    <textarea  name="realtimealternative_description" style="min-height: 150px;" class="form-control">
                                                                    </textarea>
                                                                <?php } ?>  
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label>Main Description (If this is positive say)</label>
                                                                <?php if(esc_html( isset( $settings["realtimemain_description_positive"] ) )){ ?>  
                                                                    <textarea name="realtimemain_description_positive" style="min-height: 150px;" class="form-control" value="<?php echo stripslashes($settings["realtimemain_description_positive"]); ?>"><?php echo stripslashes($settings["realtimemain_description_positive"]); ?></textarea>
                                                                <?php }else{ ?> 
                                                                    <textarea  name="realtimemain_description_positive" style="min-height: 150px;" class="form-control">
                                                                    </textarea>
                                                                <?php } ?>  
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Button Information/Text</label>
                                                                <?php if(esc_html( isset( $settings["realtimeCalculate_button"] ) )){ ?>    
                                                                    <input name="realtimeCalculate_button" type="text" class="form-control" value="<?php echo stripslashes($settings["realtimeCalculate_button"]); ?>">
                                                                <?php }else{ ?> 
                                                                    <input name="realtimeCalculate_button" type="text" class="form-control">
                                                                <?php } ?>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-3">              
                                                        <div class="gerenal-form">
                                                        <label>Block Background Color</label>
                                                            <div class="form-group">

                                                                <?php if((esc_html( isset( $settings["realtimebg_color"] ) )) && (esc_html( isset( $settings["realtimebg_color-opacity"] ) ))){ ?>          

                                                                    <?php if($settings["realtimebg_color-opacity"] != ""){ ?>
                                                                        <input type="hidden" class="opacity-handler" id="realtimebg_color-opacity" name="realtimebg_color-opacity" value="<?php echo $settings["realtimebg_color-opacity"]; ?>">
                                                                        <input type="text" name="realtimebg_color" id="text-field" data-opacity="<?php echo $settings["realtimebg_color-opacity"]; ?>" class="demo" value="<?php echo $settings["realtimebg_color"]; ?>">
                                                                    <?php }else{ ?>
                                                                        <input type="hidden" class="opacity-handler" id="realtimebg_color-opacity" name="realtimebg_color-opacity" value="1">
                                                                        <input type="text" name="realtimebg_color" id="text-field" data-opacity="1" class="demo" value="#2b70e4">
                                                                    <?php } ?>

                                                                <?php }else{ ?>

                                                                <input type="hidden" class="opacity-handler" id="realtimebg_color-opacity" name="realtimebg_color-opacity" value="">
                                                                <input type="text" name="realtimebg_color" id="text-field" data-opacity="1" class="demo" value="#2b70e4">

                                                            <?php } ?>  
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-3">              
                                                        <div class="gerenal-form">
                                                        <label>Block Labels Color</label>   
                                                            <div class="form-group">

                                                                <?php if((esc_html( isset( $settings["realtimetext"] ) )) && (esc_html( isset( $settings["realtimetext-opacity"] ) ))){ ?>          

                                                                    <?php if($settings["realtimetext-opacity"] != ""){ ?>
                                                                        <input type="hidden" class="opacity-handler" id="realtimetext-opacity" name="realtimetext-opacity" value="<?php echo $settings["realtimetext-opacity"]; ?>">
                                                                        <input type="text" name="realtimetext" id="text-field" data-opacity="<?php echo $settings["realtimetext-opacity"]; ?>" class="demo" value="<?php echo $settings["realtimetext"]; ?>">
                                                                    <?php }else{ ?>
                                                                        <input type="hidden" class="opacity-handler" id="realtimetext-opacity" name="realtimetext-opacity" value="1">
                                                                        <input type="text" name="realtimetext" id="text-field" data-opacity="1" class="demo" value="#ffffff">
                                                                    <?php } ?>

                                                                <?php }else{ ?>

                                                                <input type="hidden" class="opacity-handler" id="realtimetext-opacity" name="realtimetext-opacity" value="">
                                                                <input type="text" name="realtimetext" id="text-field" data-opacity="1" class="demo" value="#ffffff">

                                                                <?php } ?>  
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="col-md-3">              
                                                        <div class="gerenal-form">
                                                        <label>Button Background Color</label>   
                                                            <div class="form-group">

                                                                <?php if((esc_html( isset( $settings["realtimebutttonbackground"] ) )) && (esc_html( isset( $settings["realtimebutttonbackground-opacity"] ) ))){ ?>          

                                                                    <?php if($settings["realtimebutttonbackground-opacity"] != ""){ ?>
                                                                        <input type="hidden" class="opacity-handler" id="realtimebutttonbackground-opacity" name="realtimebutttonbackground-opacity" value="<?php echo $settings["realtimebutttonbackground-opacity"]; ?>">
                                                                        <input type="text" name="realtimebutttonbackground" id="text-field" data-opacity="<?php echo $settings["realtimebutttonbackground-opacity"]; ?>" class="demo" value="<?php echo $settings["realtimebutttonbackground"]; ?>">
                                                                    <?php }else{ ?>
                                                                        <input type="hidden" class="opacity-handler" id="realtimebutttonbackground-opacity" name="realtimebutttonbackground-opacity" value="1">
                                                                        <input type="text" name="realtimebutttonbackground" id="text-field" data-opacity="1" class="demo" value="#ffffff">
                                                                    <?php } ?>

                                                                <?php }else{ ?>

                                                                <input type="hidden" class="opacity-handler" id="realtimebutttonbackground-opacity" name="realtimebutttonbackground-opacity" value="">
                                                                <input type="text" name="realtimebutttonbackground" id="text-field" data-opacity="1" class="demo" value="#ffffff">

                                                                <?php } ?>  
                                                            </div>
                                                        </div>
                                                    </div>




                                                    <div class="col-md-3">              
                                                        <div class="gerenal-form">
                                                        <label>Button Text Color</label>   
                                                            <div class="form-group">

                                                                <?php if((esc_html( isset( $settings["realtimebutttontext"] ) )) && (esc_html( isset( $settings["realtimebutttontext-opacity"] ) ))){ ?>          

                                                                    <?php if($settings["realtimebutttontext-opacity"] != ""){ ?>
                                                                        <input type="hidden" class="opacity-handler" id="realtimebutttontext-opacity" name="realtimebutttontext-opacity" value="<?php echo $settings["realtimebutttontext-opacity"]; ?>">
                                                                        <input type="text" name="realtimebutttontext" id="text-field" data-opacity="<?php echo $settings["realtimebutttontext-opacity"]; ?>" class="demo" value="<?php echo $settings["realtimebutttontext"]; ?>">
                                                                    <?php }else{ ?>
                                                                        <input type="hidden" class="opacity-handler" id="realtimebutttontext-opacity" name="realtimebutttontext-opacity" value="1">
                                                                        <input type="text" name="realtimebutttontext" id="text-field" data-opacity="1" class="demo" value="#ffffff">
                                                                    <?php } ?>

                                                                <?php }else{ ?>

                                                                <input type="hidden" class="opacity-handler" id="realtimebutttontext-opacity" name="realtimebutttontext-opacity" value="">
                                                                <input type="text" name="realtimebutttontext" id="text-field" data-opacity="1" class="demo" value="#ffffff">

                                                                <?php } ?>  
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                            <!--**************************** End Live Results Calculations Settings ****************************-->



                                        </div>
                                    </div>
                                </div>
                            </div>

                     <!-- GENERAL SETTINGS ENDS HERE  -->
                    <?php
                if(strpos($_SERVER['REQUEST_URI'], "?page=seven_minute_budget") !== false){

?>
                <p class="submit" style="clear: both;">
                <input type="submit" id="UpdateSettings" name="Submit"  class="button-primary bottom-update" value="Update Settings" />
                <input type="hidden" name="fu_calculator-settings-submit" value="Y" />
                </p>
<?php

                }else if(strpos($_SERVER['REQUEST_URI'], "?page=fu_calculator&tab=records") !== false){

?>
                <p class="submit" style="clear: both;">
                <input type="submit" id="UpdateSettings" name="Submit"  class="button-primary bottom-update" value="Update Settings" />
                <input type="hidden" name="fu_calculator-settings-submit" value="Y" />
                </p>

        <?php 
                } else{


                }

                break;

                case 'records' :

                ?>

				<!-- RECORDS SETTINGS START HERE  -->

				<div class="Records-wrap">
					<div id="myAjaxLoader" class="dist-load" style="display:none;">
						<img id="loading-image" src="<?php echo  get_site_url().'/wp-content/plugins/7_minute_budget/assets/images/dualballs.gif' ?>"/>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="top-badge-head dash-d-flex">
								<h2 class="primary-head">Submitted Calculations</h2>
								<div class="cust-dash-rbtn" style="color: red;cursor: pointer;font-size: 15px;" id="openRemoveSubmissionModal">
									<i class="fa fa-trash" aria-hidden="true"></i> EMPTY DATA TABLE
								</div>
								<div class="cust-dash-rbtn" style="cursor: pointer;" id="exportAllCalculations">
									<div class="file-upload file def-icon-btn">
										<span>
											<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
												viewBox="0 0 490 490">
												<path d="M227.8,174.1v53.7h-53.7c-9.5,0-17.2,7.7-17.2,17.2s7.7,17.2,17.2,17.2h53.7v53.7c0,9.5,7.7,17.2,17.2,17.2
														s17.1-7.7,17.1-17.2v-53.7h53.7c9.5,0,17.2-7.7,17.2-17.2s-7.7-17.2-17.2-17.2h-53.7v-53.7c0-9.5-7.7-17.2-17.1-17.2
														S227.8,164.6,227.8,174.1z" fill="currentColor"/>
												<path d="M71.7,71.7C25.5,118,0,179.5,0,245s25.5,127,71.8,173.3C118,464.5,179.6,490,245,490s127-25.5,173.3-71.8
														C464.5,372,490,310.4,490,245s-25.5-127-71.8-173.3C372,25.5,310.5,0,245,0C179.6,0,118,25.5,71.7,71.7z M455.7,245
														c0,56.3-21.9,109.2-61.7,149s-92.7,61.7-149,61.7S135.8,433.8,96,394s-61.7-92.7-61.7-149S56.2,135.8,96,96s92.7-61.7,149-61.7
														S354.2,56.2,394,96S455.7,188.7,455.7,245z" fill="currentColor"/>
											</svg>
										</span>
										<span>
											Export All Calculations as CSV
											<span class="txt-grey btn-b-text">CSV will download automatically after clicking</span>
										</span>
									</div>
								</div>
							</div>			
						</div>
					</div>
					<div class="row custom-height">
						<div class="col-md-12 pr-0 pos-relative cust-order-in "> 
							<?php

								$resultOfCalculations = $wpdb->get_results("SELECT 
								* FROM ".$wpdb->prefix."smb_submissions  ORDER BY id DESC");

								$deoderesultOfCalculations = json_decode(json_encode($resultOfCalculations), true);
								

							?>
							<h4 class="cust-indash-hd">Data Table</h4>
							<div class="bg-white br-5 border-1 br-0 def-scroll">
								<div class="dist-table-wrap">
									<div class="wrapper">
										<table id="dtSubmittedCalculations" class="table table-scroll table-bordered table-striped">
											<thead>
											<tr>
                                                    <th style="width:5%;">Entry.No.</th>
													<th style="width:5%;">IP</th>
													<th style="width:5%;">Housing</th>
													<th style="width:5%;">Schooling</th>
													<th style="width:5%;">Transportation</th>
													<th style="width:5%;">Groceries</th>
													<th style="width:5%;">Phone/Internet</th>
													<th style="width:5%;">Emergency</th>
													<th style="width:10%;">CreditCard Debt</th>
													<th style="width:5%;">Spend GuiltFree</th>
													<th style="width:5%;">Pay Yourself</th>
													<th style="width:5%;">Freedom Cont.</th>
													<th style="width:5%;">JobEarning</th>
													<th style="width:5%;">HustleEarning</th>
													<th style="width:5%;">Monthly Saving</th>
													<th style="width:5%;">Gifts</th>
													<th style="width:5%;">Cashflow</th>
													<th style="width:5%;">Money In</th>
													<th style="width:5%;">Money Out</th>
													<th style="width:5%;">Emergency</th>
													<th style="width:5%;">Digital</th>
													<th style="width:5%;">GuiltFree</th>
													<th style="width:5%;">Papercut</th>
													<th style="width:5%;">Freedom</th>
											</tr>
											</thead>
											<tbody>
												<?php 
													// echo "<pre/>";
													// print_r($deoderesultOfCalculations);

													for ($i = 0; $i < count($deoderesultOfCalculations); $i++) {
														// echo $deoderesultOfCalculations[$i]['id']." ";

												?>
	
                                            <tr id="<?php echo "Submissions-".$deoderesultOfCalculations[$i]['id']; ?>" data-class="<?php echo $deoderesultOfCalculations[$i]['id']; ?>">
                                                <td><?php echo $deoderesultOfCalculations[$i]['id']; ?></td>
                                                <td><?php echo $deoderesultOfCalculations[$i]['ip']; ?></td>
                                                <td><?php echo "$".number_format(round($deoderesultOfCalculations[$i]['housing_out'] , 0)); ?></td>
                                                <td><?php echo "$".number_format(round($deoderesultOfCalculations[$i]['schooling_out'] , 0)); ?></td>
                                                <td><?php echo "$".number_format(round($deoderesultOfCalculations[$i]['transportation_out'] , 0)); ?></td>
                                                <td><?php echo "$".number_format(round($deoderesultOfCalculations[$i]['groceries_out'] , 0)); ?></td>
                                                <td><?php echo "$".number_format(round($deoderesultOfCalculations[$i]['phone_internet_out'] , 0)); ?></td>
                                                <td><?php echo "$".number_format(round($deoderesultOfCalculations[$i]['emergency_fund_out'] , 0)); ?></td>
                                                <td><?php echo "$".number_format(round($deoderesultOfCalculations[$i]['credit_card_debt_out'] , 0)); ?></td>
                                                <td><?php echo "$".number_format(round($deoderesultOfCalculations[$i]['spend_guiltfree_month_out'] , 0)); ?></td>
                                                <td><?php echo "$".number_format(round($deoderesultOfCalculations[$i]['pay_yourself_out'] , 0)); ?></td>
                                                <td><?php echo "$".number_format(round($deoderesultOfCalculations[$i]['freedom_cont_out'] , 0)); ?></td>
                                                <td><?php echo "$".number_format(round($deoderesultOfCalculations[$i]['job_earning_in'] , 0)); ?></td>
                                                <td><?php echo "$".number_format(round($deoderesultOfCalculations[$i]['hustle_earning_in'] , 0)); ?></td>
                                                <td><?php echo "$".number_format(round($deoderesultOfCalculations[$i]['monthly_saving_in'] , 0)); ?></td>
                                                <td><?php echo "$".number_format(round($deoderesultOfCalculations[$i]['gifts_in'] , 0)); ?></td>
                                                <td><?php echo "$".number_format(round($deoderesultOfCalculations[$i]['cashflow_results'] , 0)); ?></td>
                                                <td><?php echo "$".number_format(round($deoderesultOfCalculations[$i]['money_in_results'] , 0)); ?></td>
                                                <td><?php echo "$".number_format(round($deoderesultOfCalculations[$i]['money_out_results'] , 0)); ?></td>
                                                <td><?php echo "$".number_format(round($deoderesultOfCalculations[$i]['emergency_results'] , 0)); ?></td>
                                                <td><?php echo "$".number_format(round($deoderesultOfCalculations[$i]['digital_results'] , 0)); ?></td>
                                                <td><?php echo "$".number_format(round($deoderesultOfCalculations[$i]['guiltfree_results'] , 0)); ?></td>
                                                <td><?php echo "$".number_format(round($deoderesultOfCalculations[$i]['papercut_results'] , 0)); ?></td>
                                                <td><?php echo "$".number_format(round($deoderesultOfCalculations[$i]['freedom_results'] , 0)); ?></td>
                                            </tr>
												
												<?php
														// break;			
													}	
												?>		

											</tbody>
											<tfoot>
											<tr>
                                                    <th style="width:5%;">Entry.No.</th>
													<th style="width:5%;">IP</th>
													<th style="width:5%;">Housing</th>
													<th style="width:5%;">Schooling</th>
													<th style="width:5%;">Transportation</th>
													<th style="width:5%;">Groceries</th>
													<th style="width:5%;">Phone/Internet</th>
													<th style="width:5%;">Emergency</th>
													<th style="width:10%;">CreditCard Debt</th>
													<th style="width:5%;">Spend GuiltFree</th>
													<th style="width:5%;">Pay Yourself</th>
													<th style="width:5%;">Freedom Cont.</th>
													<th style="width:5%;">JobEarning</th>
													<th style="width:5%;">HustleEarning</th>
													<th style="width:5%;">Monthly Saving</th>
													<th style="width:5%;">Gifts</th>
													<th style="width:5%;">Cashflow</th>
													<th style="width:5%;">Money In</th>
													<th style="width:5%;">Money Out</th>
													<th style="width:5%;">Emergency</th>
													<th style="width:5%;">Digital</th>
													<th style="width:5%;">GuiltFree</th>
													<th style="width:5%;">Papercut</th>
													<th style="width:5%;">Freedom</th>
											</tr>
											</tfoot>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Remove Submissions modal -->
				<div class="modal fade def-cust-modl" id="del-submissions" tabindex="-1" role="dialog" aria-labelledby="del-table-tr" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content modal-def">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body pt-0">
								<h4 class="modal-title">WARNING</h4>
								<p>
									Are you Sure you want to empty submitted calculations ?
								</p>
								<input type="hidden" name="removingUsrId" id="removingUsrId">
								<button type="button" class="btn btn-secondary modal-btn cust-prim-btn" data-dismiss="modal">No</button>
								<button type="button" id="removeSubmissionsPermanently" class="btn btn-secondary modal-btn">Yes</button>
							</div>
						</div>
					</div>
				</div>

				<!-- RECORDS SETTINGS ENDS HERE  -->

                <?php 
                break;

                    case 'emailcontent' :

                ?>
                <!-- EMAIL CONTENT SETTINGS START HERE  -->
                <div class="general-container gernal-wrapper">
                    <div class="row">
                        <div class="col-md-9 br-1">
                            <h4 class="money-in-out-headings">Email Content</h4>

                            <div class="geranal-cards-in geranal-cards-in-mb0">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 mt-tab-15">
                                        <div class="gerenal-form">
                                            <div class="form-group">
                                                <label><strong>Email Subject:</strong></label>
                                                <?php if(esc_html( isset( $settings["email_subject"] ) )){ ?>  
                                                <input name="email_subject" type="text" class="form-control" value="<?php echo stripslashes($settings["email_subject"]); ?>">
                                                <?php }else{ ?> 
                                                <input name="email_subject" type="text" class="form-control">
                                                <?php } ?>  
                                            </div>

                                            <div class="form-group">
                                                <label><strong>Email Message:</strong></label>
                                                <?php if(esc_html( isset( $settings["email_message"] ) )){ ?>  
                                                <input name="email_message" type="text" class="form-control" value="<?php echo stripslashes($settings["email_message"]); ?>">
                                                <?php }else{ ?> 
                                                <input name="email_message" type="text" class="form-control">
                                                <?php } ?>  
                                            </div>

                                            <div class="form-group">
                                                <label><strong>Email From:</strong></label>
                                                <?php if(esc_html( isset( $settings["email_from"] ) )){ ?>  
                                                <input name="email_from" type="text" class="form-control" value="<?php echo stripslashes($settings["email_from"]); ?>">
                                                <?php }else{ ?> 
                                                <input name="email_from" type="text" class="form-control">
                                                <?php } ?>  
                                            </div>

                                            <div class="form-group">
                                                <label><strong>Email Reply To:</strong></label>
                                                <?php if(esc_html( isset( $settings["email_reply_to"] ) )){ ?>  
                                                <input name="email_reply_to" type="text" class="form-control" value="<?php echo stripslashes($settings["email_reply_to"]); ?>">
                                                <?php }else{ ?> 
                                                <input name="email_reply_to" type="text" class="form-control">
                                                <?php } ?>  
                                            </div>

                                            <div class="form-group">
                                                <label><strong>Email “Success Message:</strong></label>
                                                <?php if(esc_html( isset( $settings["email_s_m"] ) )){ ?>  
                                                <input name="email_s_m" type="text" class="form-control" value="<?php echo stripslashes($settings["email_s_m"]); ?>">
                                                <?php }else{ ?> 
                                                <input name="email_s_m" type="text" class="form-control">
                                                <?php } ?>  
                                            </div>

                                            <div class="form-group">
                                                <label><strong>Email Text:</strong></label>
                                                <?php if(esc_html( isset( $settings["email_txt"] ) )){ ?>  
                                                    <textarea name="email_txt" class="form-control" rows="10" cols="70"><?php echo stripslashes($settings["email_txt"]); ?></textarea>
                                                <?php }else{ ?> 
                                                <textarea name="email_txt" class="form-control" rows="10" cols="70"></textarea>
                                                <?php } ?>  
                                            </div>


                                            </div>
                                    </div>
                                </div>  <div class="row">
                                            <div class="col-sm-12 col-md-12 mt-tab-15">
                                                <div class="gerenal-form">
                                                <h4 class="money-in-out-headings">Email Reminder Data Content</h4>

                                                <div class="form-group">
                                                    <label><strong>Submitted Email Records Title:</strong></label>
                                                    <?php if(esc_html( isset( $settings["submitted_email_records_title"] ) )){ ?>  
                                                    <input name="submitted_email_records_title" type="text" class="form-control" value="<?php echo stripslashes($settings["submitted_email_records_title"]); ?>">
                                                    <?php }else{ ?> 
                                                    <input name="submitted_email_records_title" type="text" class="form-control">
                                                    <?php } ?>  
                                                </div>

                                                <div class="form-group">
                                                    <label><strong>Submitted Email Records Text:</strong></label>
                                                    <?php if(esc_html( isset( $settings["submitted_email_records_text"] ) )){ ?>  
                                                    <input name="submitted_email_records_text" type="text" class="form-control" value="<?php echo stripslashes($settings["submitted_email_records_text"]); ?>">
                                                    <?php }else{ ?> 
                                                    <input name="submitted_email_records_text" type="text" class="form-control">
                                                    <?php } ?>  
                                                </div>

                                                <div class="form-group">
                                                    <label><strong>CSV Upload Button Name:</strong></label>
                                                    <?php if(esc_html( isset( $settings["csv_upload_btn_name"] ) )){ ?>  
                                                    <input name="csv_upload_btn_name" type="text" class="form-control" value="<?php echo stripslashes($settings["csv_upload_btn_name"]); ?>">
                                                    <?php }else{ ?> 
                                                    <input name="csv_upload_btn_name" type="text" class="form-control">
                                                    <?php } ?>  
                                                </div>

                                                <div class="form-group">
                                                    <label><strong>Email Success Message (<span style="color:#1b0efa;">For Multiple Emails</span>):</strong></label>
                                                    <?php if(esc_html( isset( $settings["email_success_msg"] ) )){ ?>  
                                                    <input name="email_success_msg" type="text" class="form-control" value="<?php echo stripslashes($settings["email_success_msg"]); ?>">
                                                    <?php }else{ ?> 
                                                    <input name="email_success_msg" type="text" class="form-control">
                                                    <?php } ?>  
                                                </div>

                                                <div class="form-group">
                                                    <label><strong>Email Error Message (<span style="color:#1b0efa;">For Multiple Emails</span>):</strong></label>
                                                    <?php if(esc_html( isset( $settings["email_err_msg"] ) )){ ?>  
                                                    <input name="email_err_msg" type="text" class="form-control" value="<?php echo stripslashes($settings["email_err_msg"]); ?>">
                                                    <?php }else{ ?> 
                                                    <input name="email_err_msg" type="text" class="form-control">
                                                    <?php } ?>  
                                                </div>

                                                <div class="form-group">
                                                    <label><strong>Email Success Message (<span style="color:#1b0efa;">For Single Emails</span>):</strong></label>
                                                    <?php if(esc_html( isset( $settings["email_success_msg1"] ) )){ ?>  
                                                    <input name="email_success_msg1" type="text" class="form-control" value="<?php echo stripslashes($settings["email_success_msg1"]); ?>">
                                                    <?php }else{ ?> 
                                                    <input name="email_success_msg1" type="text" class="form-control">
                                                    <?php } ?>  
                                                </div>

                                                <div class="form-group">
                                                    <label><strong>Email Error Message (<span style="color:#1b0efa;">For Single Emails</span>):</strong></label>
                                                    <?php if(esc_html( isset( $settings["email_err_msg1"] ) )){ ?>  
                                                    <input name="email_err_msg1" type="text" class="form-control" value="<?php echo stripslashes($settings["email_err_msg1"]); ?>">
                                                    <?php }else{ ?> 
                                                    <input name="email_err_msg1" type="text" class="form-control">
                                                    <?php } ?>  
                                                </div>

                                            </div>

                                            <p class="submit" style="clear: both;">
                                                <input type="submit" id="UpdateSettings" name="Submit"  class="button-primary bottom-update" value="Update Settings" />
                                                <input type="hidden" name="fu_calculator-settings-submit" value="Y" />
                                            </p>
                                           </div>
                                           </div>
                                           </div> 
                                        
                                </div>

                                
                            </div>
                        </div>
                    </div>        
                 </div>   
                
                <?php 
                break;

                    case 'emaillisting' :

                    if(isset($_POST['submit'])) {
                $fileName = preg_replace('/\s+/', '-', $_FILES["csv_upload"]["name"]);
                    global $wpdb;  
                    $table_name2 = $wpdb->prefix.'dompdf_data';

                    $upload_dir = wp_upload_dir();
                    $upload_url = $upload_dir['basedir'].'/7_minute_budget/PDF/';
                  // removing special character but keep . character because . seprate to extantion of file
                  $fileName = preg_replace('/[^A-Za-z0-9.\-]/', '', $fileName);

                  // rename file using time

                  $fileName = 'example.csv';
                  $month = date('m');
                  $year = date('Y');

                  $file_name = $upload_dir['basedir'].'/'.$year.'/'.$month.'/example.csv'; 

                  unlink($file_name);
           
                  if(wp_upload_bits($fileName, null, file_get_contents($_FILES["csv_upload"]["tmp_name"])))
                          {

                            $file = fopen($file_name, "r");
                            while(($data = fgetcsv($file, 100, ',')) !== FALSE){
                                for($i = 0; $i < count($data); $i++) {
                                
                                $email_address = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table_name2 WHERE email_address='".$data[$i]."' ") );
                                if(isset($email_address->email_address) && !empty($email_address->email_address) && $email_address->status == 'approved') {
                                 
                                  $wpdb->update($table_name2, array('status' => 'no',), array('email' => $data[$i]));
                                  $term_exits[]= $data[$i]; 
                                

                                } else if(isset($email_address->email) && !empty($email_address->email) && $email_address->status == 'no') { 
                                    $term_alreadyuptodate[]= '';
                                } 

                                else {  
                                    if (filter_var($data[$i], FILTER_VALIDATE_EMAIL)) {
                                    $term_notexits[]= $data[$i]; 
                                    }


                                } 
                            }
                        }
                                     fclose($file);

                          }
                          else{
                            echo json_encode(['code'=>404, 'msg'=>'Some thing is wrong! Try again.']);
                          }
                 
             }
                    ?> 
                    <!-- RECORDS SETTINGS START HERE  -->

                <div class="Records-wrap">
                    <h2 align="center">Email Reminder Data</h2><br />
                    <div class="row">
                        
                            <div class="top-badge-head dash-d-flex">
                                <div class="col-md-10">
                                <h2 class="primary-head"><?php echo $settings["submitted_email_records_title"]; ?></h2>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary exampleModalUpload_cst" data-toggle="modal" data-target="#exampleModalUpload"><?php echo $settings["csv_upload_btn_name"]; ?></button>
                                </div>
                                <div class="col-md-12">
                            <p class="para"><?php echo $settings["submitted_email_records_text"]; ?></p>
                        
                            </div>

                        </div>

                    </div>

                    <div class="row custom-height cust-order-in">
                        <div class="col-md-12 pr-0 pos-relative"> 
                            <div class="bg-white br-5 border-1 br-0 def-scroll">
                                <div class="dist-table-wrap">
                                    <div class="wrapper">

                                        <table id="dtSubmittedEmailListing" class="table table-scroll table-bordered table-striped">
                                            <div class="col-md-12">
                                                <div class="csv_upload_section">
                                                    <!-- Button trigger modal -->

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModalUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                          <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                              <div class="modal-header">
                                                                <h2 align="center" class="modal-title" id="exampleModalLabel">CSV Upload</h2>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                              </div>
                                                              <div class="modal-body">
                                                                <form method="POST" id="csv_upload_form2" enctype="multipart/form-data">
                                                                    <div class="alert alert-success" id="alert_success" style="display: none;">
                                                                        <span class="closebtn">&times;</span>
                                                                     </div>
                                                                     <div class="alert alert-danger" id="alert_error" style="display: none;"></div>
                                                                    <div class="form-group fileUpload">
                                                                    <span for="input_csv_upload">CSV Upload:</span>
                                                                    <input accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"  type="file" name="csv_upload" id="input_csv_upload" class="form-control upload"  equired / >
                                                <input id="security" name="security" value="<?php echo wp_create_nonce("uploadingFile"); ?>" type="hidden"> 
                                                <!-- <input name="action" value="upload_file" type="hidden"/> -->

                                                                    </div>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    <button type="submit" name="submit" id="csv_upload_submit2" class="btn btn-default">Submit</button>
                                                                 </form>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>

                                                </div>
                                         </div>  
                                           <div class="cst_filter">   
                                          <div class="row">   
                                            <div class="col-md-12">
                                                <div class="alert alert-success" id="alert_success" style="display: none;">
                                                     <span class="closebtn">&times;</span>
                                                </div>
                                                <div class="alert alert-danger" id="alert_error" style="display: none;"></div>
                                            </div> 

                                                <div class="form-check form-check-inline">
                                                    <label for="select_all"><strong>Email Bulk Option:</strong></label>
                                                    <select name="select_all" id="select_all" class="form-select form-select-lg">
                                                        <option value=""><strong>--Select Option--</strong></option>
                                                        <option value="selectall">Select All</option>
                                                        <option value="unselectall">UnSelect All</option>
                                                    </select>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <label for="select_status"><strong>Email Status:</strong></label>
                                                    <select name="select_status" id="select_status" class="form-select form-select-lg">
                                                        <option value=""><strong>--Select Status--</strong></option>
                                                        <option value="no">N</option>
                                                        <option value="yes">Y</option>
                                                    </select>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                <span id="select_all_status" name="submitbudg" class="btn btn-primary">Submit</span>

                                                </div>
                                        </div>
                                            </div>
                                            <thead>
                                                <div class="alert alert-success" id="alert_success1" style="display: none;"><span class="closebtn">&times;</span></div>
                                                <div class="alert alert-danger" id="alert_error1" style="display: none;"></div>
                                             <?php if(isset($_POST['submit'])) { 

                                            if($term_notexits) {
                                            ?> 

                                                    <div class="alert alert-danger" id="alert_error">
                                                         <a href="#" class="alert-danger_close close" data-dismiss="alert" aria-label="close">&times;</a>
                                                            
                                                        <?php 
                                                        if(count($term_notexits) > 1 ) {
                                                        echo implode(", ",$term_notexits)." ".$settings["email_success_msg"]; 
                                                    } else {
                                                        echo implode("",$term_notexits)." ".$settings["email_success_msg1"]; 
                                                    } ?>
                                                    </div><?php } if($term_exits) { ?>
                                                        <div class="alert alert-success" id="alert_success">
                                                               <a href="#" class="alert-danger_close close" data-dismiss="alert" aria-label="close">&times;</a>
                                                               <?php 
                                                        if(count($term_exits) > 1 ) {
                                                        echo implode(", ",$term_exits)." ".$settings["email_err_msg"]; 
                                                    } else {
                                                        echo implode("",$term_exits)." ".$settings["email_err_msg1"]; 
                                                    } ?>
                                                             </div>
                                                    <?php } ?>
                                                    <?php } ?>

                                                    <?php 
                                                    $print_pdf =  plugin_dir_path( __FILE__ ) . '/assets/images/pdf.png';    
                                                    $resultOfEmailListings = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."dompdf_data  ORDER BY id DESC");
                                                    ?>
                                            <tr>
                                                <th style="width:5%;">#</th>
                                                <th style="width:5%;">Name</th>
                                                <th style="width:3%;">Email</th>
                                                <th style="width:5%;">Date</th>
                                                <th style="width:3%;">Money In</th>
                                                <th style="width:3%;">Money Out</th>
                                                <th style="width:3%;">Digital Envelope</th>
                                                <th style="width:3%;">Emergency Fund</th>
                                                <th style="width:3%;">Freedom Account</th>
                                                <th style="width:3%;">Email Opt-in status (Y/N)</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i=1; foreach ($resultOfEmailListings as $item) { 

                                                $data= json_decode($item->data); 

                                                $Getstatus = $item->status;
                                                    switch ($Getstatus) {
                                                      case "no":
                                                        $status= 'N'; 
                                                        $color='#D30000';
                                                        break;
                                                      case "yes":
                                                        $status= 'Y';
                                                        $color='#0e0e0e'; 
                                                        break;
                                                      default:
                                                        $status= 'N'; 
                                                        $color='#D30000';
                                                    } 

                                                ?>
                                                <script type="text/javascript">
                                                    jQuery(document).ready(function() {
                                                        $(document).on('click', '#button_money<?php echo $item->id; ?>', function() {
                                                        jQuery('#exampleModalIn<?php echo $item->id; ?>').fadeIn(300);
                                                      });

                                                         $(document).on('click', '#button_money_out<?php echo $item->id; ?>', function() {
                                                        jQuery('#exampleModalOut<?php echo $item->id; ?>').fadeIn(300);
                                                      });
                                                         $('#close_In<?php echo $item->id; ?>').click(function() { $('#exampleModalIn<?php echo $item->id; ?>').fadeOut(300); 
                                                        });

                                                         $('#close_out<?php echo $item->id; ?>').click(function() { $('#exampleModalOut<?php echo $item->id; ?>').fadeOut(300); 
                                                        });
                                                         
                                                      });
                                                </script>

                                                <!-- Modal -->
                                                <div class="modal_money money_in" id="exampleModalIn<?php echo $item->id; ?>" style="display: none;">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title md_IN" id="exampleModalLabelIn<?php echo $item->id; ?>">Money In</h5>
                                                        <button type="button" class="close" id="close_In<?php echo $item->id; ?>" >
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <ul>
                                                            <li><span class="title">Jobs: </span> <span class="txt"><?php if(isset($data->youllearn_this_month_fromjob)) { echo '$'.$data->youllearn_this_month_fromjob; } else { echo '-'; } ?></span></li>
                                                            <li><span class="title">Side Hustles: </span> <span class="txt"><?php if(isset($data->earn_side_hustling)) { echo '$'.$data->earn_side_hustling; } else { echo '-'; } ?></span></li>
                                                            <li><span class="title">Gifts: </span> <span class="txt"><?php if(isset($data->receive_from_gifts)) { echo '$'.$data->receive_from_gifts; } else { echo '-'; } ?></span></li>
                                                            <li><span class="title">Savings: </span> <span class="txt"><?php if(isset($data->passive_income_coming)) { echo '$'.$data->passive_income_coming; } else { echo '-'; } ?></span></li>
                                                        </ul>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>

                                                <div class="modal_money money_out" id="exampleModalOut<?php echo $item->id; ?>" style="display: none;">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title md_Out" id="exampleModalLabelOut<?php echo $item->id; ?>">Money Out</h5>
                                                        <button type="button" class="close" id="close_out<?php echo $item->id; ?>">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <ul>
                                                            <li><span class="title">Housing: </span> <span class="txt"><?php if(isset($data->housing)) { echo '$'.$data->housing; } else { echo '-'; } ?></span></li>
                                                            <li><span class="title">School: </span> <span class="txt"><?php if(isset($data->schooling)) { echo '$'.$data->schooling; } else { echo '-'; } ?></span></li>
                                                            <li><span class="title">Transportation: </span> <span class="txt"><?php if(isset($data->transportation)) { echo '$'.$data->transportation; } else { echo '-'; } ?></span></li>
                                                            <li><span class="title">Groceries: </span> <span class="txt"><?php if(isset($data->groceries)) { echo '$'.$data->groceries; } else { echo '-'; } ?></span></li>
                                                            <li><span class="title">Emergency Fund: </span> <span class="txt"><?php if(isset($data->invest_towards_emergency_fund)) { echo '$'.$data->invest_towards_emergency_fund; } else { echo '-'; } ?></span></li>
                                                            <li><span class="title">Phone/Internet: </span> <span class="txt"><?php if(isset($data->passive_income_coming)) { echo '$'.$data->phoneinternetaccess; } else { echo '-'; } ?></span></li>
                                                            <li><span class="title">Debt: </span> <span class="txt"><?php if(isset($data->credit_card_debt)) { echo '$'.$data->credit_card_debt; } else { echo '-'; } ?></span></li>
                                                            <li><span class="title">Guilt-Free Spending: </span> <span class="txt"><?php if(isset($data->guiltfreespending)) { echo '$'.$data->guiltfreespending; } else { echo '-'; } ?></span></li>
                                                            <li><span class="title">Freedom Contribution: </span> <span class="txt"><?php if(isset($data->freedom_contribution)) { echo '$'.$data->freedom_contribution; } else { echo '-'; } ?></span></li>
                                                        </ul>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                            <tr>
                                                <td>
                                                    <div class="form-group">

                                                    <input class="form-control send_email_status" type="checkbox" id="send_email<?php echo $item->id; ?>" name="send_email[]" value="<?php echo $item->id; ?>" />
                                                    <label for="send_email<?php echo $item->id; ?>"><?php echo $i; ?></label>
                                                        </div></td>
                                                <td><?php echo $item->fname.' '. $item->lname; ?></td>
                                                <td><?php echo $item->email_address; ?></td>
                                                <td><?php echo date('F dS, Y h:i:s A', strtotime($item->created_at)); ?></td>
                                                <td><?php if(isset($data->money_in)) { echo '$'.$data->money_in; } else { echo '-'; } ?> <button type="button" class="btn btn-primary button_money" id="button_money<?php echo $item->id; ?>">View</button></td>
                                                <td><?php if(isset($data->money_out)) { echo '$'.$data->money_out; } else { echo '-'; } ?> <button type="button" class="btn btn-primary button_money_out" id="button_money_out<?php echo $item->id; ?>">View</button></td>
                                                <td><?php if(isset($data->digital_envelope)) { echo '$'.$data->digital_envelope; } else { echo '-'; } ?></td>
                                                <td><?php if(isset($data->emergency_fund)) { echo '$'.$data->emergency_fund; } else { echo '-'; } ?></td>
                                                <td><?php if(isset($data->freedom_contribution)) { echo '$'.$data->freedom_contribution; } else { echo '-'; } ?></td>

                                                <td style="color:<?php echo $color;?>;font-weight: 600; font-size: 18px;"><?php echo $status; ?></td>
                                            </tr>
                                            
                                             <?php $i++; } ?>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <?php

                break;

             case 'email_reminder_data' :
             if(isset($_POST['submit'])) {
                $fileName = preg_replace('/\s+/', '-', $_FILES["csv_upload"]["name"]);
                    global $wpdb;  
                    $table_name2 = $wpdb->prefix.'email_reminder_data';

                    $upload_dir = wp_upload_dir();
                    $upload_url = $upload_dir['basedir'].'/7_minute_budget/PDF/';
                  // removing special character but keep . character because . seprate to extantion of file
                  $fileName = preg_replace('/[^A-Za-z0-9.\-]/', '', $fileName);

                  // rename file using time

                  $fileName = 'example.csv';
                  $month = date('m');
                  $year = date('Y');

                  $file_name = $upload_dir['basedir'].'/'.$year.'/'.$month.'/example.csv'; 

                  unlink($file_name);
           
                  if(wp_upload_bits($fileName, null, file_get_contents($_FILES["csv_upload"]["tmp_name"])))
                          {

                            $file = fopen($file_name, "r");
                            while(($data = fgetcsv($file, 100, ',')) !== FALSE){
                                for($i = 0; $i < count($data); $i++) {
                                
                                $email_address = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table_name2 WHERE email='".$data[$i]."' ") );
                                if(isset($email_address->email) && !empty($email_address->email) && $email_address->status == 'approved') {
                                 
                                  $wpdb->update($table_name2, array('status' => 'no_send',), array('email' => $data[$i]));
                                  $term_exits[]= $data[$i]; 
                                

                                } else if(isset($email_address->email) && !empty($email_address->email) && $email_address->status == 'no_send') { 
                                    $term_alreadyuptodate[]= '';
                                } 

                                else {  
                                    if (filter_var($data[$i], FILTER_VALIDATE_EMAIL)) {
                                    $term_notexits[]= $data[$i]; 
                                    }


                                } 
                            }
                        }
                                     fclose($file);

                          }
                          else{
                            echo json_encode(['code'=>404, 'msg'=>'Some thing is wrong! Try again.']);
                          }
                 
             }
                ?> 
                <div class="container">
                <h2 align="center">Email Reminder Data</h2><br />
                <div class="Records-wrap">
                    <div class="row">
                        
                            <div class="top-badge-head dash-d-flex">
                                <div class="col-md-10">
                                <h2 class="primary-head"><?php echo $settings["submitted_email_records_title"]; ?></h2>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary exampleModalUpload_cst" data-toggle="modal" data-target="#exampleModalUpload"><?php echo $settings["csv_upload_btn_name"]; ?></button>
                                </div>
                                <div class="col-md-12">
                            <p class="para"><?php echo $settings["submitted_email_records_text"]; ?></p>
                        
                            </div>

                        </div>

                    </div>

                    <div class="row custom-height">
                        <div class="col-md-12 pr-0 pos-relative cust-order-in "> 
                            <div class="bg-white br-5 border-1 br-0 def-scroll">
                                <div class="dist-table-wrap">
                                    <div class="wrapper">
                                        <table id="dtSubmittedEmailListing22" class="table table-scroll table-bordered table-striped">

                                             <div class="col-md-12">
                                                <div class="csv_upload_section">
                                                    <!-- Button trigger modal -->

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModalUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                          <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                              <div class="modal-header">
                                                                <h2 align="center" class="modal-title" id="exampleModalLabel">CSV Upload</h2>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                              </div>
                                                              <div class="modal-body">
                                                                <form method="POST" id="csv_upload_form2" enctype="multipart/form-data">
                                                                    <div class="alert alert-success" id="alert_success" style="display: none;">
                                                                        <span class="closebtn">&times;</span>
                                                                     </div>
                                                                     <div class="alert alert-danger" id="alert_error" style="display: none;"></div>
                                                                    <div class="form-group fileUpload">
                                                                    <span for="input_csv_upload">CSV Upload:</span>
                                                                    <input accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"  type="file" name="csv_upload" id="input_csv_upload" class="form-control upload"  equired / >
                                                <input id="security" name="security" value="<?php echo wp_create_nonce("uploadingFile"); ?>" type="hidden"> 
                                                <!-- <input name="action" value="upload_file" type="hidden"/> -->

                                                                    </div>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    <button type="submit" name="submit" id="csv_upload_submit2" class="btn btn-default">Submit</button>
                                                                 </form>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>

                                                </div>
                                         </div>   
                                          <?php if(isset($_POST['submit'])) { 

                                            if($term_notexits) {
                                            ?> 

                                                    <div class="alert alert-danger" id="alert_error">
                                                         <a href="#" class="alert-danger_close close" data-dismiss="alert" aria-label="close">&times;</a>
                                                            
                                                        <?php 
                                                        if(count($term_notexits) > 1 ) {
                                                        echo implode(", ",$term_notexits)." ".$settings["email_success_msg"]; 
                                                    } else {
                                                        echo implode("",$term_notexits)." ".$settings["email_success_msg1"]; 
                                                    } ?>
                                                    </div><?php } if($term_exits) { ?>
                                                        <div class="alert alert-success" id="alert_success">
                                                               <a href="#" class="alert-danger_close close" data-dismiss="alert" aria-label="close">&times;</a>
                                                               <?php 
                                                        if(count($term_exits) > 1 ) {
                                                        echo implode(", ",$term_exits)." ".$settings["email_err_msg"]; 
                                                    } else {
                                                        echo implode("",$term_exits)." ".$settings["email_err_msg1"]; 
                                                    } ?>
                                                             </div>
                                                    <?php } ?>
                                                    <?php } ?>
                                            <thead>
                                                    <?php 
                                                    $print_pdf =  plugin_dir_path( __FILE__ ) . '/assets/images/pdf.png';    
                                                    $resultOfEmailListings = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."email_reminder_data  ORDER BY id DESC");
                                                    ?>
                                            <tr>
                                                <th style="width:5%;">#</th>
                                                <th style="width:5%;">Name</th>
                                                <th style="width:3%;">Email</th>
                                                <th style="width:3%;">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i1=1; foreach ($resultOfEmailListings as $item) { 

                                                $data= json_decode($item->data); 

                                                $Getstatus = $item->status;
                                                    switch ($Getstatus) {
                                                      case "no_send":
                                                        $status= 'No Send'; 
                                                        $class= 'no_send';
                                                        break;
                                                      case "approved":
                                                        $status= 'Approved'; 
                                                        $class= 'approved'; 
                                                        break;
                                                      default:
                                                        $status= 'No Send'; 
                                                        $class= 'no_send';
                                                    } 

                                                ?>
                                            <tr>
                                                <td><?php echo $i1; ?></td>
                                                <td><?php echo $item->fname.' '. $item->lname; ?></td>
                                                <td><?php echo $item->email; ?></td>
                                                <td class="status_<?php echo $class; ?>"><?php echo $status; ?></td>
                                            </tr>
                                             <?php $i1++; } ?>
                                             <style>
                                                 .dist-table-wrap table tr td.status_approved { color: green; font-weight: 600; }
                                                 .dist-table-wrap table tr td.status_no_send { color: #D30000; font-weight: 600; }
                                             </style>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                </div>
              
               <?php

             break;
             
                }
            }
        ?>
</form>

<script>
var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
var siteurl = "<?php echo get_site_url(); ?>";
</script>

<script src="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/js/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/js/tether.min.js"></script>
<script src="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>

<script src="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/js/jquery.minicolors.js"></script>

<script type="text/javascript" src="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js"></script>
<script type="text/javascript" src="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/bootstrap-iconpicker/js/iconset/fontawesome5-3-1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>


<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/js/mdb.min.js"></script>

<!-- Your custom scripts (optional) -->
<!-- <script src="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/js/datatables.min.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>


<!-- custom select box with images options -->
<script src="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/js/jquery.ddslick.min.js"></script>

<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

<!-- Loading Editor at Plugin Settings Page -->
<!-- <script src="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/js/editor.js"></script> -->

<script src="<?php echo home_url() . '/wp-content/plugins/7_minute_budget/assets'; ?>/js/custom-backend.js"></script>