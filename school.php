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


<style>
    #schoolMap {
        width: 26vw; /* Full width of the container */
        height: 26vw;
        max-width: 360px;
        min-width: 200px;
        min-height: 360px;
    ;}
</style>

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
                <div class="home-container05">
                    <label class="home-text02">YEAR</label>
                    <select class="home-select2" id="year-select" onchange="updateYear(this.value)">
                    </select>
                </div>
            </div>

        </div>

<!--        <div class="heroContainer home-hero">-->
<!--            <div class="home-container02">-->
<!--                <h1 class="home-hero-heading heading1" id="country-label"></h1>-->
<!--                <span class="home-hero-sub-heading" id="num-schools"></span>-->
<!--                <div class="home-btn-group">-->
<!--                    <div class="home-container05">-->
<!--                        <label class="home-text02">COUNTRY</label>-->
<!--                        <select class="home-select2" id="country-select" onchange="updateCountry(this.value)">-->
<!--                        </select>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->



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


                <div class="basicSchoolCard home-pricing-card">
                    <div class="home-container10">
                        <span class="home-text28 heading3">Basic</span>
                        <span class="bodySmall" id="basicInfo"></span>
                    </div>
                    <div class="home-container11"></div>
                </div>



                <div class="schoolMapCard home-pricing-card1">
                    <div class="home-container17">
                        <span class="home-text36 heading3">School Map</span>
                        <span class="bodySmall">
                            <div id="schoolMap"></div>
                        </span>
                    </div>
                </div>



                <div class="basicSchoolCard home-pricing-card2">
                    <div class="home-container25">
                <span class="home-text47 heading3">
                  <span>Personnel</span>
                  <br />
                </span>
                        <span class="bodySmall" id="personnelInfo">
                </span>
                    </div>

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
<script src="js/school-map.js"></script>


<script>
    function populateYearDropdown(iso) {

        console.log("IN HERE YO DAWG");

        var yearSelect = document.getElementById("year-select");
        yearSelect.innerHTML = '';

        <?php
            global $con;
            $iso = substr($_SERVER['REQUEST_URI'], -10, 3);
            $query = "SELECT DISTINCT year FROM " . $iso . "_personnel"; // Replace with your actual query
            $result = pg_query($con, $query);
            $data = pg_fetch_all($result);
            echo $data;
        ?>

        <?php foreach ($data as $year): ?>
            var option = document.createElement("option");
            option.value = "<?= $year["year"] ?>";
            option.text = "<?= $year["year"] ?>";
            yearSelect.appendChild(option);
        <?php endforeach; ?>
    }

    var iso = window.location.href.substr(-10, 3).toLowerCase();
    console.log("ISO IS: " + iso)

    populateYearDropdown();

</script>


<script src="js/personnel-data.js"></script>

<script>populate_personel_data();</script>

<script src="js/school-text-updates.js"></script>


</html>