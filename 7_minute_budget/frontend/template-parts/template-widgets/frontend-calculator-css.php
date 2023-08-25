<?php 

/* CSS FOR FRONTEND ONLY */

// Money Out Calculator Section BG // 
if( (esc_html( isset( $settings["calculatorbg"] ) )) && (esc_html( isset( $settings["calculatorbg-opacity"] ) )) ){ 
    list($r, $g, $b) = sscanf($settings['calculatorbg'], "#%02x%02x%02x");
    $moneyoutcalculatorbg_r = $r;
    $moneyoutcalculatorbg_g = $g;
    $moneyoutcalculatorbg_b = $b;
    $moneyoutcalculatorbg_opacity = $settings['calculatorbg-opacity'];
    // echo "rgba($calculatorbg_r,$calculatorbg_g,$calculatorbg_b,$calculatorbg_opacity)"."<br/>";
}else{
    $moneyoutcalculatorbg_r = 221;
    $moneyoutcalculatorbg_g = 221;
    $moneyoutcalculatorbg_b = 220;
    $moneyoutcalculatorbg_opacity = 1;
}  

// Money Out Calculator Section - TEXT COLOR //
if( (esc_html( isset( $settings["caltextcolor"] ) )) && (esc_html( isset( $settings["caltextcolor-opacity"] ) )) ){ 
    list($r, $g, $b) = sscanf($settings['caltextcolor'], "#%02x%02x%02x");
    $moneyoutcaltextcolor_r = $r;
    $moneyoutcaltextcolor_g = $g;
    $moneyoutcaltextcolor_b = $b;
    $moneyoutcaltextcolor_opacity = $settings['caltextcolor-opacity'];
    // echo "rgba($caltextcolor_r,$caltextcolor_g,$caltextcolor_b,$caltextcolor_opacity)"."<br/>";
}else{
    $moneyoutcaltextcolor_r = 0;
    $moneyoutcaltextcolor_g = 0;
    $moneyoutcaltextcolor_b = 0;
    $moneyoutcaltextcolor_opacity = 1;
}  



// CALCULATOR BUTTON COLOR //
if( (esc_html( isset( $settings["calbutcolor"] ) )) && (esc_html( isset( $settings["calbutcolor-opacity"] ) )) ){ 
    list($r, $g, $b) = sscanf($settings['calbutcolor'], "#%02x%02x%02x");
    $calbutcolor_r = $r;
    $calbutcolor_g = $g;
    $calbutcolor_b = $b;
    $calbutcolor_opacity = $settings['calbutcolor-opacity'];
    // echo "rgba($calbutcolor_r,$calbutcolor_g,$calbutcolor_b,$calbutcolor_opacity)"."<br/>";
}else{
    $calbutcolor_r = 0;
    $calbutcolor_g = 116;
    $calbutcolor_b = 199;
    $calbutcolor_opacity = 1;
}  

// CALCULATOR BUTTON TEXT //
if( (esc_html( isset( $settings["calbuttext"] ) )) && (esc_html( isset( $settings["calbuttext-opacity"] ) )) ){ 
    list($r, $g, $b) = sscanf($settings['calbuttext'], "#%02x%02x%02x");
    $calbuttext_r = $r;
    $calbuttext_g = $g;
    $calbuttext_b = $b;
    $calbuttext_opacity = $settings['calbuttext-opacity'];
    // echo "rgba($calbuttext_r,$calbuttext_g,$calbuttext_b,$calbuttext_opacity)"."<br/>";
}else{
    $calbuttext_r = 255;
    $calbuttext_g = 255;
    $calbuttext_b = 255;
    $calbuttext_opacity = 1;
}  


// Meter Settings - Page's Results Block I //
// Meter Settings - Page's Results Block I - BG //
if( (esc_html( isset( $settings["block1bg"] ) )) && (esc_html( isset( $settings["block1bg-opacity"] ) )) ){ 
    list($r, $g, $b) = sscanf($settings['block1bg'], "#%02x%02x%02x");
    $graphmetersectionbg_r = $r;
    $graphmetersectionbg_g = $g;
    $graphmetersectionbg_b = $b;
    $graphmetersectionbg_opacity = $settings['block1bg-opacity'];
    // echo "rgba($footerbackground_r,$footerbackground_g,$footerbackground_b,$footerbackground_opacity)"."<br/>";
}else{
    $graphmetersectionbg_r = 43;
    $graphmetersectionbg_g = 112;
    $graphmetersectionbg_b = 228;
    $graphmetersectionbg_opacity = 1;
}  


// Meter Settings - Page's Results Block I - Content  Color //

if( (esc_html( isset( $settings["block2contentxtcol"] ) )) && (esc_html( isset( $settings["block2contentxtcol-opacity"] ) )) ){ 
    list($r, $g, $b) = sscanf($settings['block2contentxtcol'], "#%02x%02x%02x");
    $graphmetersectiontxtcol_r = $r;
    $graphmetersectiontxtcol_g = $g;
    $graphmetersectiontxtcol_b = $b;
    $graphmetersectiontxtcol_opacity = $settings['block2contentxtcol-opacity'];
    // echo "rgba($block2contentxtcol_r,$block2contentxtcol_g,$block2contentxtcol_b,$block2contentxtcol_opacity)"."<br/>";
    
}else{
    $graphmetersectiontxtcol_r = 255;
    $graphmetersectiontxtcol_g = 255;
    $graphmetersectiontxtcol_b = 255;
    $graphmetersectiontxtcol_opacity = 1;
} 




// Realtime Results - Page's Results Block II - Background Color //
if( (esc_html( isset( $settings["realtimebg_color"] ) )) && (esc_html( isset( $settings["realtimebg_color-opacity"] ) )) ){ 
    list($r, $g, $b) = sscanf($settings['realtimebg_color'], "#%02x%02x%02x");
    $realtimesectionbackground_r = $r;
    $realtimesectionbackground_g = $g;
    $realtimesectionbackground_b = $b;
    $realtimesectionbackground_opacity = $settings['realtimebg_color-opacity'];
    // echo "rgba($realtimesectionbackground_r,$realtimesectionbackground_g,$realtimesectionbackground_b,$realtimesectionbackground_opacity)"."<br/>";
}else{
    $realtimesectionbackground_r = 255;
    $realtimesectionbackground_g = 222;
    $realtimesectionbackground_b = 89;
    $realtimesectionbackground_opacity = 1;
}  
// Realtime Results - Page's Results Block II - //
if( (esc_html( isset( $settings["realtimetext"] ) )) && (esc_html( isset( $settings["realtimetext-opacity"] ) )) ){ 
    list($r, $g, $b) = sscanf($settings['realtimetext'], "#%02x%02x%02x");
    $realtimesectiontext_r = $r;
    $realtimesectiontext_g = $g;
    $realtimesectiontext_b = $b;
    $realtimesectiontext_opacity = $settings['realtimetext-opacity'];
    
}else{
    $realtimesectiontext_r = 0;
    $realtimesectiontext_g = 0;
    $realtimesectiontext_b = 0;
    $realtimesectiontext_opacity = 1;
}  





// Realtime Results - Action BG Color - //
if( (esc_html( isset( $settings["realtimebutttonbackground"] ) )) && (esc_html( isset( $settings["realtimebutttonbackground-opacity"] ) )) ){ 
    list($r, $g, $b) = sscanf($settings['realtimebutttonbackground'], "#%02x%02x%02x");
    $realtimebutttonbackground_r = $r;
    $realtimebutttonbackground_g = $g;
    $realtimebutttonbackground_b = $b;
    $realtimebutttonbackground_opacity = $settings['realtimebutttonbackground-opacity'];
    
}else{
    $realtimebutttonbackground_r = 43;
    $realtimebutttonbackground_g = 112;
    $realtimebutttonbackground_b = 228;
    $realtimebutttonbackground_opacity = 1;
}

// Realtime Results - Action Text Color - //

if( (esc_html( isset( $settings["realtimebutttontext"] ) )) && (esc_html( isset( $settings["realtimebutttontext-opacity"] ) )) ){ 
    list($r, $g, $b) = sscanf($settings['realtimebutttontext'], "#%02x%02x%02x");
    $realtimebutttontext_r = $r;
    $realtimebutttontext_g = $g;
    $realtimebutttontext_b = $b;
    $realtimebutttontext_opacity = $settings['realtimebutttontext-opacity'];
    
}else{
    $realtimebutttontext_r = 255;
    $realtimebutttontext_g = 255;
    $realtimebutttontext_b = 255;
    $realtimebutttontext_opacity = 1;
}  


?>

<style>

* {
    -webkit-box-sizing: border-box;
            box-sizing: border-box;
}
body {
    margin: 0;
    font-family: sans-serif;
}
.calculator-container {
    max-width: 1000px;
    width: 100%;
    margin-left: auto;
    margin-right: auto;
}
img {
    max-width: 100%;
    height: auto;
}
.calculator-section {
    padding: 20px;
}
.calculator-money-out {
background-color: <?php echo "rgba($moneyoutcalculatorbg_r,$moneyoutcalculatorbg_g,$moneyoutcalculatorbg_b,$moneyoutcalculatorbg_opacity)" ?>;
    color: <?php echo "rgba($moneyoutcaltextcolor_r,$moneyoutcaltextcolor_g,$moneyoutcaltextcolor_b,$moneyoutcaltextcolor_opacity)" ?>;
    padding: 40px 30px;
    border-radius: 6px 6px 0 0;
}
.calculator-head {
    text-align: center;
    margin-bottom: 40px;
}
.calculator-title {
    margin: 0 0 20px;
    position: relative;
    display: inline-block;
    padding-bottom: 16px;
}
.calculator-title::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    margin: 0 auto;
    width: 40px;
    height: 5px;
    background: rgb(43, 112, 228);
    border-radius: 20px;
}
.calculator-subtitle {
    margin: 0;
    font-size: 14px;
    line-height: 1.5;
}
.error {
    border: 1px solid red !important;
}
.calculator-label {
    font-size: 12px;
    line-height: 1.5;
    margin-bottom: 8px;
    display: block;
}
.calculator-label b {
    font-size: 14px;
}
.calculator-input-group {
    position: relative;
    margin-bottom: 8px;
}
img.meter-progress-niddle.niddle-yellow {
    left: 41.5%;
    bottom: 76px;
}
img.meter-progress-niddle.niddle-green {
    left: 37.5%;
}
.meter-progress-niddle {
    bottom: 76px;
}
.calculator-input {
    width: 100%;
    height: 40px;
    border: 1px solid #fff;
    border-radius: 6px;
    padding: 8px 16px 8px 32px;
    font-size: 16px;
    line-height: 1.5;
    background: #fff;
    color: #000;
}
.dollor-sign {
    position: absolute;
    top: 8px;
    left: 16px;
    font-size: 16px;
    line-height: 1.5;
}
.calculator-input-helper {
    font-size: 12px;
    line-height: 1.5;
    color: #777;
}
.calculator-group {
    margin-bottom: 1rem;
}
.calculator-grid {
    display: -ms-grid;
    display: grid;
    -ms-grid-columns: 1fr 2rem 1fr;
    grid-template-columns: 1fr 1fr;
    gap: 0.5rem 2rem;
}
.calculator-money-in {
background-color: <?php echo "rgba($moneyoutcalculatorbg_r,$moneyoutcalculatorbg_g,$moneyoutcalculatorbg_b,$moneyoutcalculatorbg_opacity)" ?>;
    color: <?php echo "rgba($moneyoutcaltextcolor_r,$moneyoutcaltextcolor_g,$moneyoutcaltextcolor_b,$moneyoutcaltextcolor_opacity)" ?>;
    padding: 40px 30px;
    border-top: 1px solid rgba(0, 0, 0,  0.12);
}
.calculator-graph {
    background-color: #2b70e4;
    padding: 50px 30px;
}
.calculator-meter {
    max-width: 200px;
    width: 100%;
    margin: 0 auto;
}
.meter-progress {
    width: 210px;
    height: 200px;
    position: relative;
    background: #fff;
    padding: 5px;
    border-radius: 50%;
}
.meter-progress-bg {
    position: relative;
    z-index: 1;
}
.calculator-grid input[type=text] {
    padding-left: 30px !important;
    color: #000000 !important;
}
#calculator-graph--above .meter-progress:after {
    background: #0a58de;
    left: 0;
    right: 0;
    content: '';
    position: absolute;
    height: 100%;
    border-radius: 100%;
    top: 0;
    bottom: 0;
    width: 100%;
    margin: 0 auto;
    border-color: unset;
}
#calculator-graph--above .meter-progress {
    background: unset;
}
#calculator-graph--above.calculator-graph {
    padding: 50px 30px 50px;
}
.calculator .calculator-money-out {
    border-radius: 5px;
    margin-top: -8px;
    position: relative;
    z-index: 9;
}
.calculator-total-amount-abs {
    position: absolute;
    z-index: 99;
    left: 0;
    right: 0;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    bottom: 10px;
    font-weight: 800;
    color: #ffffff;
    letter-spacing: 3px;
    font-size: 2.9rem;
    font-family: inherit;
}
/*.meter-progress::after {
    content: "";
    position: absolute;
    bottom: 70px;
    left: 0;
    right: 0;
    width: 40px;
    height: 40px;
    background: #2d3f57;
    margin-left: auto;
    margin-right: auto;
    border-radius: 40px;
    z-index: 3;
}*/
/*.meter-progress-niddle {
    width: 45px;
    position: absolute;
    bottom: 70px;
    left: 0;
    right: 0;
    z-index: 2;
    -webkit-transition: all 2s cubic-bezier(1, 1, 0, -0.01);
    -o-transition: all 2s cubic-bezier(1, 1, 0, -0.01);
    transition: all 2s cubic-bezier(1, 1, 0, -0.01);
    margin-left: auto;
    margin-right: auto;
}*/


.calculator-total__maintop {
    top: 0;
    position: absolute;
    bottom: 0;
    margin: auto;
    left: 0;
    right: 0;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
}

#calculator-graph--above.calculator-graph {
    position: relative;
}

.calculator-total__maintop div {
    width: 100%;
}

.calculator-total__maintop .calculator-money-inout-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 0;
}

.calculator-total__maintop .calculator-money-inout-grid .money-outputs-box {
    width: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    max-width: 160px;
    margin:  0 auto;
    flex-wrap: wrap;
    text-align: center;
}

.calculator-total__maintop .calculator-money-inout-grid .money-outputs-box p, .calculator-total__maintop .calculator-money-inout-grid .money-outputs-box h4 {
    width: 100%;
}

.calculator-total__maintop .calculator-money-inout-grid .money-outputs-box  p {
    font-size: 22px;
    color: #000;
}

.calculator-subtitle-error.alert--error {
    color: red;
    font-size: 12px;
    padding: 10px 0 0 0;
}

.meter-progress-niddle {
    width: 36px;
    position: absolute;
    bottom: 82px;
    left: 46.5%;
    z-index: 2;
    -webkit-transition: all 2s cubic-bezier(1, 1, 0, -0.01);
    -o-transition: all 2s cubic-bezier(1, 1, 0, -0.01);
    transition: all 2s cubic-bezier(1, 1, 0, -0.01);
    margin-left: auto;
    margin-right: auto;
    z-index: 9;
}
.niddle-green {
    -webkit-transform: rotateZ(62deg) translateX(31px) translateY(-20px);
        -ms-transform: rotate(62deg) translateX(31px) translateY(-20px);
            transform: rotateZ(62deg) translateX(31px) translateY(-20px);
}
.niddle-red {
    -webkit-transform: rotateZ(-62deg) translateX(-34px) translateY(-21px);
        -ms-transform: rotate(-62deg) translateX(-34px) translateY(-21px);
            transform: rotateZ(-62deg) translateX(-34px) translateY(-21px);
}

.calculator-total {
background: <?php echo "rgba($realtimesectionbackground_r,$realtimesectionbackground_g,$realtimesectionbackground_b,$realtimesectionbackground_opacity)" ?>;
color: <?php echo "rgba($realtimesectiontext_r,$realtimesectiontext_g,$realtimesectiontext_b,$realtimesectiontext_opacity)" ?>;    padding: 40px 30px;
    margin-top: -135px;
    position: relative;
    z-index: 2;
    border-radius: 20px 20px 0 0;
}
.calculator-total-amount {
    margin: 0 0 1rem;
    text-align: center;
    font-size: 32px;
    line-height: 1.2;
}
.calculator-total-container {
    max-width: 620px;
    width: 100%;
    margin: 0 auto;
}
.realtimeDescription ul {
    text-align: left;
    list-style-type: none;
    padding: 0;
}
.calculator-total-container .realtimeDescription h2 {
    font-size: 22px;
    text-align: left;
    font-weight: 700;
}
#AboveZeroEntry .realtimeDescription h2 {
    text-align: center;
    margin: 15px 0;
}
h2#calculator-total-amount {
    font-size: 40px;
    font-weight: 700;
    line-height: 1;
}
#calculatorSectionOutMain.sticky #calculator-graph--above {
    position: fixed;
    z-index: 999999999;
    width: 100%;
    left: 0;
    right: 0;
    max-width: 1000px;
    margin: auto;
    top: 0;
    padding: 10px;
    transition: all 0.4s ease-in-out;
}
#calculatorSectionOutMain.sticky #calculator-graph--above {
  position: sticky;
  top: 0;
}

#calculatorSectionOutMain #calculator-graph--above {
    transition: all 0.4s ease-in-out;
}
#OnlyZeroEntry .realtimeDescription {
    background: #3db86e;
    font-size: 28px;
    font-weight: 700;
    color: #ffffff;
    padding: 10px;
    border-radius: 12px;
    margin: 3rem 0 1rem;
}
.calculator-total {
    text-align: center;
}
.calculator-total p {
    font-size: 12px;
    line-height: 1.5;
}
.calculator-money-inout-grid {
    display: -ms-grid;
    display: grid;
    -ms-grid-columns: 1fr 1rem auto 1rem 1fr;
    grid-template-columns: 1fr auto 1fr;
    gap: 1rem;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
}
.money-outputs-arrow {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
        -ms-flex-direction: column;
            flex-direction: column;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    gap: 0.25rem;
}
.calculator-money-outputs-grid {
    display: -ms-grid;
    display: grid;
    -ms-grid-columns: 1fr 1rem 1fr 1rem 1fr 1rem 1fr;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    gap: 1rem;
}

.money-outputs-box {
    background: #dddddc;
    border-radius: 6px;
    height: 100%;
    padding: 16px 20px 20px;
}

.money-outputs-label {
    margin: 0;
    font-size: 14px;
    line-height: 1.5;
}
.money-outputs-value {
    margin: 10px 0 0;
    font-size: 20px;
    line-height: 1.2;
    font-weight: bold;
}

.money-outputs-arrow-img {
    display: block;
    width: 32px;
}
.arrow-left {
    -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
            transform: rotate(180deg);
}
.calculator-total-top {
    margin-bottom: 4rem;
}
.calculator-total-bot {
    margin-bottom: 4rem;
}

.calculator-button {
    display: inline-block;
    padding: 8px 30px;
background:<?php echo "rgba($realtimebutttonbackground_r,$realtimebutttonbackground_g,$realtimebutttonbackground_b,$realtimebutttonbackground_opacity)" ?>;
    color: <?php echo "rgba($realtimebutttontext_r,$realtimebutttontext_g,$realtimebutttontext_b,$realtimebutttontext_opacity)" ?>;
    border: 1px solid <?php echo "rgba($realtimebutttonbackground_r,$realtimebutttonbackground_g,$realtimebutttonbackground_b,$realtimebutttonbackground_opacity)" ?>;
    border-radius: 40px;
    height: 70px;
    font-size: 16px;
    line-height: 1.5;
    font-weight: bold;
    cursor: pointer;
}

.calculator-button:hover {
    background: <?php echo "rgba($realtimebutttonbackground_r,$realtimebutttonbackground_g,$realtimebutttonbackground_b,$realtimebutttonbackground_opacity)" ?>;
    color: <?php echo "rgba($realtimebutttontext_r,$realtimebutttontext_g,$realtimebutttontext_b,$realtimebutttontext_opacity)" ?>;
    border-color: <?php echo "rgba($realtimebutttonbackground_r,$realtimebutttonbackground_g,$realtimebutttonbackground_b,$realtimebutttonbackground_opacity)" ?>;
}
.red {
    color: rgb(232, 71, 46);
}
.green {
    color: rgb(61, 184, 110);
}
.calculator-graph {
    background: <?php echo "rgba($graphmetersectionbg_r,$graphmetersectionbg_g,$graphmetersectionbg_b,$graphmetersectionbg_opacity)" ?> !important;
    border-top: <?php echo "rgba($graphmetersectionbg_r,$graphmetersectionbg_g,$graphmetersectionbg_b,$graphmetersectionbg_opacity)" ?>;
    color: <?php echo "rgba($graphmetersectiontxtcol_r,$graphmetersectiontxtcol_g,$graphmetersectiontxtcol_b,$graphmetersectiontxtcol_opacity)" ?>;
}








/**====================== 19/02/2023=======================*/
.calculator-head .calculator-title {
    font-weight: 600;
}
.calculator-money-outputs-grid-outer {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-around;
}
.calculator-money-outputs-grid-outer .calculator-money-outputs-grid-left, 
.calculator-money-outputs-grid-outer .calculator-money-outputs-grid-right {
    width: 50%;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 0;
    row-gap: 15px;
}
.calculator-money-outputs-grid-outer  .calculator-money-outputs-grid-left .JobsSideHustlesGiftsSavings--outer {
    max-width: 250px;
}
.JobsSideHustlesGiftsSavings--outer p:first-child {
    font-size: 21px;
    margin: 0;
}
.JobsSideHustlesGiftsSavings--outer .JobsSideHustlesGiftsSavings_Price {
    font-size: 36px;
    margin: 0;
    font-weight: 600;
}
.calculator-money-outputs-grid-right .money-outputs-box {
    max-width: 48%;
    width: 100%;
}
.calculator-money-outputs-grid-right .money-outputs-box .money-outputs-label {
    font-size: 18px;
}
.calculator-money-outputs-grid-right .money-outputs-box h4 {
    font-size: 36px;
    line-height: 1;
}
.calculator-money-outputs-grid-left:before {
    position: absolute;
    content: ' ';
    background-image: url('https://7minutebudget.urtestsite.com/wp-content/uploads/2023/02/yellow-bg.png');
    height: 100%;
    width: 100%;
    background-repeat: no-repeat;
    height: 170px;
    background-size: contain;
    right: 50px;
    width: 110px;
}

.calculator-money-outputs-grid-left {
    position: relative;
}
.MoneyInOut_Container {
    display: flex;
    align-items: center;
    justify-content: space-around;
}
.MoneyInOut_Container .MoneyInOut_Container_Inner p {
    font-size: 20px;
    font-weight: 700;
}
div#OnlyZeroEntry .realtimeDescription {
    margin-top: 20px;
}
/**====================== 19/02/2023=======================*/
@media(min-width: 768px) {
    .MoneyInOut_Container .MoneyInOut_Container_Inner:first-child p {
        position: relative;
        margin-left: -250%;
    }
    .MoneyInOut_Container {
        margin-bottom: 20px;
    }
    div#calculator-graph--above {
        position: fixed !important;
        z-index: 999999999;
        width: 100%;
        left: 0;
        right: 0;
        max-width: 1000px;
        margin: auto;
        top: 0;
        padding: 10px !important;
        transition: all 0.1s ease-in-out !important;
        top: 80px;
    }
    div#calculatorSectionOutMain .calculator-container .calculator {
        padding-top: 207px;
        position: relative;
    }
 }
@media (max-width: 800px) {
    .calculator-money-outputs-grid {
        -ms-grid-columns: 1fr 1fr;
        grid-template-columns: 1fr 1fr;
    }
}
@media(max-width: 767px) {
    .MoneyInOut_Container .MoneyInOut_Container_Inner:last-child {
        display: none;
    }
    .money-outputs-box-money__out {
        display: block !important;
        width: 100%;
        font-size: 20px;
        font-weight: 700;
    }
     .calculator-total__maintop {
        position: unset;
    }

    .calculator-money-outputs-grid-outer .calculator-money-outputs-grid-left, .calculator-money-outputs-grid-outer .calculator-money-outputs-grid-right {
        width: 100%;
    }

    .calculator-money-outputs-grid-outer {
        row-gap: 20px;
    }

    .calculator-money-outputs-grid-outer .calculator-money-outputs-grid-left .JobsSideHustlesGiftsSavings--outer {
        width: 100%;
        max-width: 100%;
        margin-bottom: 150px;
    }

    .calculator-money-outputs-grid-left:before {
        transform: rotate(89deg);
        top: 50%;
        left: 0;
        right: 0;
        margin: auto;
    }
    #calculator-graph--above .meter-progress {
        transform: scale(0.7);
        max-width: 190px;
        left: 0;
        right: 0;
        margin: auto;
    }
    
    .calculator-meter {
        max-width: 150px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 150px;
        position: relative;
        z-index: 999999999;
    }
    
    .meter-progress-niddle {
        width: 18px;
        bottom: 127px !important;
        left: 89px !important;
    }
    
    img.meter-progress-niddle.niddle-yellow {
        bottom: 115px !important;
        left: 66px !important;
    }
    
    img.meter-progress-niddle.niddle-green {
        bottom: 126px !important;
        left: 45.5px !important;
    }
    
    .calculator-total-amount-abs {
        bottom: 40px;
    }
    
    .calculator-total__maintop {
        position: relative;
        z-index: 999999999;
    }
    .calculator .calculator-total {
        /*z-index: 1000000000000000000;*/
        z-index: 999999999;
    }
    .calculator .calculator-money-in + .calculator-graph .calculator-meter {
        max-width: 150px;
    }
    
    .calculator-total__maintop .calculator-money-inout-grid .money-outputs-box {
        padding: 5px;
    }
    .calculator-total__maintop .calculator-money-inout-grid {
        position: absolute;
        top: 0;
        left: 0;
        display: flex;
        gap: unset;
        flex-wrap: wrap;
        justify-content: space-between;
        bottom: 0;
        align-items: center;
        right: 0;
        margin: auto;
        row-gap: 0;
        padding: 0;
    }
    .calculator-graph .calculator-total__maintop {
        position: unset;
    }
    #calculatorSectionOutMain .calculator-total__maintop .money-outputs-box {
        margin: unset;
        height: 70px;
        max-width: 32%;
    }
    .calculator-total__maintop .calculator-money-inout-grid .money-outputs-box p {
        font-size: 18px;
    }
    .calculator-total__maintop .calculator-money-inout-grid .money-outputs-box h4 {
        margin: 0;
    }
    #calculatorSectionOutMain .calculator-total__maintop .calculator-money-inout-grid .money-outputs-box:first-child {
        margin-left: 10px;
    }
    #calculatorSectionOutMain .calculator-total__maintop .calculator-money-inout-grid .money-outputs-box:last-child {
        margin-right: 10px;
    }
    #calculatorSectionOutMain  #calculator-graph--above {
        overflow: hidden;
    }
    .calculator-meter {
        max-height: 140px;
    }
    .MoneyInOut_Container {
        display: flex;
        align-items: center;
        justify-content: space-around;
    }
    .MoneyInOut_Container p {
        font-size: 20px !important;
    }
    .calculator .calculator-money-in + .calculator-graph .calculator-meter .meter-progress {
        min-width: 160px;
        min-height: 160px;
        max-height: 160px;
        margin-bottom: 56px;
    }
    .calculator .calculator-money-in + .calculator-graph .calculator-meter .meter-progress img.meter-progress-niddle.niddle-yellow {
        bottom: 66px !important;
        left: 66px !important;
        width: 27px;
        position: absolute;
    }
    .calculator .calculator-money-in + .calculator-graph .calculator-meter .meter-progress img.meter-progress-niddle.niddle-red {
        width: 27px;
        bottom: 76px !important;
        left: 84px !important;
    }
    .calculator .calculator-money-in + .calculator-graph .calculator-meter .meter-progress img.meter-progress-niddle.niddle-green {
        width: 27px;
        bottom: 74px !important;
        left: 52px !important;
    }
    .calculator-money-outputs-grid-right .money-outputs-box {
        padding: 10% 0 !important;
    }
    .MoneyInOut_Container_Inner {
        margin-bottom: 10px;
    }
    img.meter-progress-niddle.niddle-green.niddle-yellow {
        transform: unset !important;
        left: 44% !important;
        bottom: 115px !important;
    }
    img.meter-progress-niddle.niddle-green.niddle-red {
        left: 59% !important;
        bottom: 129px !important;
    }
    img.meter-progress-niddle.niddle-green {
        bottom: 126px !important;
        left: 45.5px !important;
    }
    .calculator .calculator-graph .calculator-meter .meter-progress img.meter-progress-niddle.niddle-green.niddle-red {
        left: 53% !important;
        bottom: 75px !important;
    }
    .calculator .calculator-graph .calculator-meter .meter-progress img.meter-progress-niddle.niddle-green.niddle-yellow {
        bottom: 66px !important;
        left: 66px !important;
        width: 27px;
        position: absolute;
    }
}
@media (max-width: 480px) {
    .calculator-money-outputs-grid {
        -ms-grid-columns: 1fr;
        grid-template-columns: 1fr;
    }
    .calculator-grid {
        -ms-grid-columns: 1fr;
        grid-template-columns: 1fr;
    }
    .calculator-money-inout-grid {
        -ms-grid-columns: 1fr;
        grid-template-columns: 1fr;
    }
    .money-outputs-arrow {
        -webkit-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
                transform: rotate(90deg);
    }
    .calculator-section {
        padding: 0px;
    }
    .calculator-money-out {
        border-radius: 0;
    }
}
</style>

