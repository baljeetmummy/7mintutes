<?php

   /*
   Template Name: AfterCaclulationPage
   */

   if(isset($_GET)){

    $getkey = $_GET['skey'];

   }
   
   global $wpdb;

   $getOutputs = "SELECT * from ".$wpdb->prefix."fu_submissions WHERE key_s='".$getkey."'";
         
   $resultsgetOutputs = $wpdb->get_results($getOutputs);
   
   
   if($resultsgetOutputs){
   
       $arrayresultsgetOutputs = json_decode(json_encode($resultsgetOutputs), true);
   
   }   

?>

<html>

   <head>
      <meta charset="utf-8">
      <meta name="description" content=""/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Results After Caclulation </title>
      <?php include("template-widgets/HeaderWidget.php"); ?>
   </head>

   <body>
   
   <section id="AfterMainCalculation">
    <?php

        // BLOCK 1 BACKGROUND COLOR //
    
        if( (esc_html( isset( $settings["block1bg"] ) )) && (esc_html( isset( $settings["block1bg-opacity"] ) )) ){ 

            list($r, $g, $b) = sscanf($settings['block1bg'], "#%02x%02x%02x");
            
            $block1bg_r = $r;        
            $block1bg_g = $g;
            $block1bg_b = $b;
            $block1bg_opacity = $settings['block1bg-opacity'];

        }else{
            $block1bg_r = 43;
            $block1bg_g = 112;
            $block1bg_b = 228;
            $block1bg_opacity = 1;
        }  

        // BLOCK 1 LABELS COLOR //

        if( (esc_html( isset( $settings["block1text"] ) )) && (esc_html( isset( $settings["block1text-opacity"] ) )) ){ 

                list($r, $g, $b) = sscanf($settings['block1text'], "#%02x%02x%02x");
                
                $block1text_r = $r;
                $block1text_g = $g;
                $block1text_b = $b;
                $block1text_opacity = $settings['block1text-opacity'];
                
        }else{ 
                $block1text_r = 43;
                $block1text_g = 112;
                $block1text_b = 228;
                $block1text_opacity = 1;      
        }  
                
        

    ?>
        <section class="section-calculate section-calculate-blue" style='background: <?php echo "rgba($block1bg_r,$block1bg_g,$block1bg_b,$block1bg_opacity)" ?>;  color: <?php echo "rgba($block1text_r,$block1text_g,$block1text_b,$block1text_opacity)" ?>;'>
                <div class="container">
                    <div class="calculate-from-wrap">
                        <div class="cl-calculate-data">
                            <div class="cl-badge-group">
                                <div class="cl-badge">

                                    <?php  if(esc_html( isset( $settings["fileupload5"] ) )){   ?>		
                                        <img src="<?php echo home_url() . '/wp-content/uploads/fu_calculator/'.$settings["fileupload5"]; ?>" class="cl-badge-img" />
                                    <?php   }else{  ?>		
                                        <img src="<?php echo home_url() . '/wp-content/plugins/fu_calculator/assets/images/badge.svg'; ?>" class="cl-badge-img">
                                    <?php   }    ?>
                                 
                                    <?php  if(esc_html( isset( $settings["fileupload4"] ) )){   ?>		
                                        <img src="<?php echo home_url() . '/wp-content/uploads/fu_calculator/'.$settings["fileupload4"]; ?>" class="cl-badge-img-craker cl-badge-img-left" />
                                    <?php   }else{  ?>		
                                        <img src="<?php echo home_url() . '/wp-content/plugins/fu_calculator/assets/images/craker.webp'; ?>" class="cl-badge-img-craker cl-badge-img-left">
                                    <?php   }    ?>

                                    <?php  if(esc_html( isset( $settings["fileupload4"] ) )){   ?>		
                                        <img src="<?php echo home_url() . '/wp-content/uploads/fu_calculator/'.$settings["fileupload4"]; ?>" class="cl-badge-img-craker cl-badge-img-right" />
                                    <?php   }else{  ?>		
                                        <img src="<?php echo home_url() . '/wp-content/plugins/fu_calculator/assets/images/craker.webp'; ?>" class="cl-badge-img-craker cl-badge-img-right">
                                    <?php   }    ?>

                                    <span class="cl-badge-title">Your FU#</span>
                                    <?php

                                        // FREE BY 40 COLOR //

                                        if( (esc_html( isset( $settings["badgetotal"] ) )) && (esc_html( isset( $settings["badgetotal-opacity"] ) )) ){ 

                                            list($r, $g, $b) = sscanf($settings['badgetotal'], "#%02x%02x%02x");
                                            
                                            $badgetotal_r = $r;
                                            $badgetotal_g = $g;
                                            $badgetotal_b = $b;
                                            $badgetotal_opacity = $settings['badgetotal-opacity'];
                                            // echo "rgba($badgetotal_r,$badgetotal_g,$badgetotal_b,$badgetotal_opacity)"."<br/>";
                                            
                                            }else{
                                            
                                            $badgetotal_r = 0;
                                            $badgetotal_g = 0;
                                            $badgetotal_b = 0;
                                            $badgetotal_opacity = 1;
                                            
                                            }  

                                    ?>
                                    <span class="cl-badge-total" style='color: <?php echo "rgba($badgetotal_r,$badgetotal_g,$badgetotal_b,$badgetotal_opacity)" ?>;'>
                                    <?php
                                        
                                        if(isset($arrayresultsgetOutputs)){
                                         
                                            if(round($arrayresultsgetOutputs[0]['free_by_40'] , 0) < 0){
                                                echo "$0";
                                            }else{
                                                echo "$".number_format(round($arrayresultsgetOutputs[0]['free_by_40'] , 0));
                                            }

                                        }

                                    ?>
                                    </span>
                                </div>
                                <div class="cl-badge">
                                    <div class="cl-badge-price-wrap cl-arrow-group" id="monthly-income-output">
                                        <?php

                                            // MONTHLY CONTRIBUTION COLOR //

                                            if( (esc_html( isset( $settings["monthlycontributtoncol"] ) )) && (esc_html( isset( $settings["monthlycontributtoncol-opacity"] ) )) ){ 

                                                list($r, $g, $b) = sscanf($settings['monthlycontributtoncol'], "#%02x%02x%02x");
                                                
                                                $monthlycontributtoncol_r = $r;
                                                $monthlycontributtoncol_g = $g;
                                                $monthlycontributtoncol_b = $b;
                                                $monthlycontributtoncol_opacity = $settings['monthlycontributtoncol-opacity'];
                                                
                                            }else{
                                                $monthlycontributtoncol_r = 252;
                                                $monthlycontributtoncol_g = 217;
                                                $monthlycontributtoncol_b = 40;
                                                $monthlycontributtoncol_opacity = 1;
                                            }  

                                            // LEFT RESULTS COLOR //

                                            if( (esc_html( isset( $settings["leftresultscol"] ) )) && (esc_html( isset( $settings["leftresultscol-opacity"] ) )) ){ 

                                                list($r, $g, $b) = sscanf($settings['leftresultscol'], "#%02x%02x%02x");
                                                
                                                $leftresultscol_r = $r;
                                                $leftresultscol_g = $g;
                                                $leftresultscol_b = $b;
                                                $leftresultscol_opacity = $settings['leftresultscol-opacity'];
                                                
                                            }else{
                                                $leftresultscol_r = 252;
                                                $leftresultscol_g = 217;
                                                $leftresultscol_b = 40;
                                                $leftresultscol_opacity = 1;
                                            }  
                                              
                                            // RIGHT RESULTS COLOR //

                                            if( (esc_html( isset( $settings["rightresultscol"] ) )) && (esc_html( isset( $settings["rightresultscol-opacity"] ) )) ){ 

                                                list($r, $g, $b) = sscanf($settings['rightresultscol'], "#%02x%02x%02x");
                                                
                                                $rightresultscol_r = $r;
                                                $rightresultscol_g = $g;
                                                $rightresultscol_b = $b;
                                                $rightresultscol_opacity = $settings['rightresultscol-opacity'];
                                                
                                            }else{
                                                $rightresultscol_r = 61;
                                                $rightresultscol_g = 184;
                                                $rightresultscol_b = 110;
                                                $rightresultscol_opacity = 1;
                                            }  
                                            
                                        ?>

                                        <?php 
                                            if($arrayresultsgetOutputs[0]['adults'] == 2){
                                        ?>

                                        <span class="cl-badge-label">Total Monthly Freedom Contribution Needed</span>
                                        <span class="cl-badge-label">For You AND Your Partner:</span>

                                        <?php
                                            }else{
                                        ?>
                                        
                                        <span class="cl-badge-label">Total Monthly Freedom Contribution Needed:</span>
                                        
                                        <?php
                                            }                                        
                                        ?>

                                        <span class="cl-badge-price" style='color: <?php echo "rgba($monthlycontributtoncol_r,$monthlycontributtoncol_g,$monthlycontributtoncol_b,$monthlycontributtoncol_opacity)" ?>;'>
                                        <?php

                                            if(isset($arrayresultsgetOutputs)){
                                         
                                                if(round($arrayresultsgetOutputs[0]['monthly_contribution'] , 0) < 0){
                                                    echo "$0";
                                                }else{
                                                    echo "$".number_format(round($arrayresultsgetOutputs[0]['monthly_contribution'] , 0));
                                                }
    
                                            }

                                        ?>
                                        </span>

                                    </div>
                                </div>						
                            </div>
                        </div>


                    </div>
                </div>
        </section>

        <section class="last-section-calculate">
            <div class="container">
                <div class="calculate-from-wrap-last">
                <?php

                if(esc_html( isset( $settings["ResultsBlock4content"] ) )){ 

                    echo stripslashes($settings["ResultsBlock4content"]);

                }else{ ?>

                        <div class="text-center">
                            <a href="#" class="cl-button">Lets Go!</a>
                        </div>

                <?php } ?>
                </div>
            </div>
        </section>


        <?php   

        // BLOCK 2 Background Color //

        if( (esc_html( isset( $settings["block2contentcol"] ) )) && (esc_html( isset( $settings["block2contentcol-opacity"] ) )) ){ 

            list($r, $g, $b) = sscanf($settings['block2contentcol'], "#%02x%02x%02x");
            
            $block2contentcol_r = $r;
            $block2contentcol_g = $g;
            $block2contentcol_b = $b;
            $block2contentcol_opacity = $settings['block2contentcol-opacity'];
            // echo "rgba($block2contentcol_r,$block2contentcol_g,$block2contentcol_b,$block2contentcol_opacity)"."<br/>";
            
        }else{
            $block2contentcol_r = 255;
            $block2contentcol_g = 255;
            $block2contentcol_b = 255;
            $block2contentcol_opacity = 1;
        }  
 

        ?>
        <section class="section-info" style='background: <?php echo "rgba($block2contentcol_r,$block2contentcol_g,$block2contentcol_b,$block2contentcol_opacity)" ?>;'>
            <div class="container">
                <div class="info-content-wrap">

                    <div class="text-center">

                    <?php

                    if($arrayresultsgetOutputs[0]['adults'] == 2){

                        if(esc_html( isset( $settings["ResultsBlock2content2"] ) )){ 
					
                            echo stripslashes($settings["ResultsBlock2content2"]);
					
                        }else{ ?>

                            <p style="font-weight: 400; line-height: 20px;">Your <span style="text-decoration: underline; font-weight: 800;">FU#</span> is the total amount that you and your partner need invested to both become </br> financially Free By 40.</p>
                            <p style="font-weight: 400; line-height: 20px;">Your <span style="text-decoration: underline; font-weight: 800;">Freedom Contribution</span> is the monthly number you and your partner need to invest <span style="text-decoration: underline;">combined</span> to both </br> become financially Free By 40.</p>
                            <p style="font-weight: 400; line-height: 20px;">This means enough <span style="text-decoration: underline; font-weight: 800;">Passive Income</span> coming in (no work!) from your investments to support the lifestyle </br> that you selected for you and your partner!</p>	

                    <?php } }else{ 

                        if(esc_html( isset( $settings["ResultsBlock2content"] ) )){ 
					
                        echo stripslashes($settings["ResultsBlock2content"]);
                
                     }else{ ?>

                            <p style="font-weight: 400; line-height: 20px;">Your <span style="text-decoration: underline; font-weight: 800;">FU#</span> is the total amount that you need invested to become financially Free By 40.</p>
                            <p style="font-weight: 400;    line-height: 20px;">Your <span style="text-decoration: underline; font-weight: 800;">Freedom Contribution</span> is the monthly number you need to invest to become </br>Free By 40.</p>
                            <p style="font-weight: 400;     line-height: 20px;">This means enough <span style="text-decoration: underline; font-weight: 800;">Passive Income</span> coming in (no work!) from your investments to support the lifestyle that you selected!</p>

                    <?php } } ?>    

                    </div>
                    <div class="cl-form-action">
                             <?php

                                // BUTTON COLOR //
                                        
                                if( (esc_html( isset( $settings["blockbuttoncol"] ) )) && (esc_html( isset( $settings["blockbuttoncol-opacity"] ) )) ){ 

                                    list($r, $g, $b) = sscanf($settings['blockbuttoncol'], "#%02x%02x%02x");
                                    
                                    $blockbuttoncol_r = $r;
                                    $blockbuttoncol_g = $g;
                                    $blockbuttoncol_b = $b;
                                    $blockbuttoncol_opacity = $settings['blockbuttoncol-opacity'];
                                    
                                }else{
                                    $blockbuttoncol_r = 61;
                                    $blockbuttoncol_g = 184;
                                    $blockbuttoncol_b = 110;
                                    $blockbuttoncol_opacity = 1;
                                }  

                                // BUTTON TEXT COLOR // 

                                if( (esc_html( isset( $settings["badgebuttontextcol"] ) )) && (esc_html( isset( $settings["badgebuttontextcol-opacity"] ) )) ){ 

                                    list($r, $g, $b) = sscanf($settings['badgebuttontextcol'], "#%02x%02x%02x");
                                    
                                    $badgebuttontextcol_r = $r;
                                    $badgebuttontextcol_g = $g;
                                    $badgebuttontextcol_b = $b;
                                    $badgebuttontextcol_opacity = $settings['badgebuttontextcol-opacity'];
                                    
                                }else{
                                    $badgebuttontextcol_r = 255;
                                    $badgebuttontextcol_g = 255;
                                    $badgebuttontextcol_b = 255;
                                    $badgebuttontextcol_opacity = 1;
                                }  
                                
                                // BUTTON TEXT //

                                if(esc_html( isset( $settings["buttonbadgecontent"] ) )){ 
                                    $buttonbadgecontent = $settings["buttonbadgecontent"];	
                                }else{
                                    $buttonbadgecontent = "Re-Calculate My FU Number";	
                                }

                             ?>           
                            <a href="<?php echo get_site_url()."/FUcalculator/?skey=".$_GET['skey']; ?>" class="cl-button cl-button-green" style='background: <?php echo "rgba($blockbuttoncol_r,$blockbuttoncol_g,$blockbuttoncol_b,$blockbuttoncol_opacity)" ?>; color: <?php echo "rgba($badgebuttontextcol_r,$badgebuttontextcol_g,$badgebuttontextcol_b,$badgebuttontextcol_opacity)" ?>;'>
                            <?php echo $buttonbadgecontent; ?>
                            </a>
                            
                        </div>
                </div>
            </div>
        </section>

    </section>

    <!--scripts loaded here-->
    <?php include("template-widgets/FooterWidget.php"); ?>
    
   </body>

</html>   