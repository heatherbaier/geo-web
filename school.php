<?php include 'includes/head.php' ?>


<?php

include 'includes/config.php';


// Retrieve and sanitize the parameters
$countryISO = isset($_GET['country']) ? filter_var($_GET['country'], FILTER_SANITIZE_STRING) : '';
$schoolID = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_SANITIZE_STRING) : '';
$countryBasic = $countryISO . "_geo";

include 'includes/schoolFuncs.php';

$schoolName = getSchoolName($countryBasic, $schoolID);  // Replace with your actual data retrieval logic


?>

<html>


<body>
<link rel="stylesheet" href="./style.css" />
<div>
    <link href="./index.css" rel="stylesheet" />

    <div class="home-container">
        <?php include 'includes/header.php' ?>
        <div class="heroContainer home-hero">
            <div class="home-container02">
                <h1 class="home-hero-heading heading1" id="school-name"><?= $schoolName ?></h1>
                <span class="home-hero-sub-heading" id="num-schools"></span>
            </div>
        </div>
        <div data-thq="thq-dropdown" class="home-thq-dropdown list-item">
            <ul data-thq="thq-dropdown-list" class="home-dropdown-list">
                <li data-thq="thq-dropdown" class="home-dropdown list-item">
                    <div data-thq="thq-dropdown-toggle" class="home-dropdown-toggle">
                        <span class="home-text03">Sub-menu Item</span>
                    </div>
                </li>
                <li data-thq="thq-dropdown" class="home-dropdown1 list-item">
                    <div data-thq="thq-dropdown-toggle" class="home-dropdown-toggle1">
                        <span class="home-text04">Sub-menu Item</span>
                    </div>
                </li>
                <li data-thq="thq-dropdown" class="home-dropdown2 list-item">
                    <div data-thq="thq-dropdown-toggle" class="home-dropdown-toggle2">
                        <span class="home-text05">Sub-menu Item</span>
                    </div>
                </li>
            </ul>
        </div>
        <div class="pricingContainer">
            <div class="home-container09">
                <div class="freePricingCard home-pricing-card">
                    <div class="home-container10">
                        <span class="home-text28 heading3">Basic</span>
                        <span class="bodySmall">
                  Explore school level data for COUNTRY XX
                </span>
                    </div>
                    <div class="home-container11">
                    </div>
                    <button class="home-button buttonOutline" id="exploreSchools">
                        Explore
                    </button>
                </div>
                <div class="basicPricingCard home-pricing-card1">
                    <div class="home-container17">
                        <span class="home-text36 heading3">Personnel</span>
                        <span class="bodySmall">
                  A short description for the Basic plan
                </span>
                    </div>
                    <div class="home-container18">
                <span class="home-text37">
                  <span>$</span>
                  <span></span>
                </span>
                        <span class="home-basic-plan-pricing">20</span>
                        <span class="home-text40">/ month</span>
                    </div>
                    <div class="home-container19">
                        <div class="home-container20">
                            <span class="home-text41">✔</span>
                            <span class="bodySmall">All features of FREE plan</span>
                        </div>
                        <div class="home-container21">
                            <span class="home-text43">✔</span>
                            <span class="bodySmall">Feature 1 of the Basic plan</span>
                        </div>
                        <div class="home-container22">
                            <span class="home-text44">✔</span>
                            <span class="bodySmall">Feature 2 of the Basic plan</span>
                        </div>
                        <div class="home-container23">
                            <span class="home-text45">✔</span>
                            <span class="bodySmall">Feature 3 of the Basic plan</span>
                        </div>
                        <div class="home-container24">
                            <span class="home-text46">✔</span>
                            <span class="bodySmall">Feature 4 of the Basic plan</span>
                        </div>
                    </div>
                    <button class="home-button1 buttonFilledSecondary">
                        Try the Basic plan
                    </button>
                </div>
                <div class="proPricingCard home-pricing-card2">
                    <div class="home-container25">
                <span class="home-text47 heading3">
                  <span>Testing</span>
                  <br />
                </span>
                        <span class="bodySmall">
                  A short description for the Pro plan
                </span>
                    </div>
                    <div class="home-container26">
                <span class="home-text50">
                  <span>$</span>
                  <span></span>
                </span>
                        <span class="home-pro-plan-pricing">50</span>
                        <span class="home-text53">/ month</span>
                    </div>
                    <div class="home-container27">
                        <div class="home-container28">
                            <span class="home-text54">✔</span>
                            <span class="bodySmall">
                    &nbsp;All features of BASIC plan
                  </span>
                        </div>
                        <div class="home-container29">
                            <span class="home-text56">✔</span>
                            <span class="bodySmall">Feature 1 of the Pro plan</span>
                        </div>
                        <div class="home-container30">
                            <span class="home-text57">✔</span>
                            <span class="bodySmall">Feature 2 of the Pro plan</span>
                        </div>
                        <div class="home-container31">
                            <span class="home-text58">✔</span>
                            <span class="bodySmall">Feature 3 of the Pro plan</span>
                        </div>
                        <div class="home-container32">
                            <span class="home-text59">✔</span>
                            <span class="bodySmall">Feature 4 of the Pro plan</span>
                        </div>
                    </div>
                    <button class="home-button2 buttonFilledSecondary">
                        Try the PRO plan
                    </button>
                </div>
            </div>
        </div>


        <?php include 'includes/footer.php' ?>

    </div>
</div>
<script
        data-section-id="navbar"
        src="https://unpkg.com/@teleporthq/teleport-custom-scripts"
></script>
</body>

<script src="js/schoolFuncs.js"></script>
<script src="js/home-menu.js"></script>


</html>