<?php include 'includes/head.php' ?>

<?php

include 'includes/config.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$countryISO = isset($_GET['country']) ? filter_var($_GET['country'], FILTER_SANITIZE_STRING) : 'defaultCountry';
$countryBasic = $countryISO . "_geo";

include 'admFetchFunc.php';
include 'includes/exportFuncs.php';

?>



<script src="js/iso_to_name.js"></script>


<style>
    #schools-table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        /*width: 100%;*/
        /*border-radius: 5px;*/
        margin-top: 50px;
    }
    #schools-table td, #schools-table th {
        border: 1px solid #ddd;
        padding: 8px;
    }
    #schools-table tr:nth-child(even){background-color: #f2f2f2;}

    #schools-table tr:hover {background-color: #ddd;}

    #schools-table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: darkgray;
        color: white;
    }
    .table-container {
        overflow-x: auto; /* Enables horizontal scrolling */
        margin-top: 50px;
    }

    /*#schools-table {*/
    /*    font-family: Arial, Helvetica, sans-serif;*/
    /*    border-collapse: collapse;*/
    /*}*/

    @media screen and (max-width: 768px) { /* Adjust this value based on your needs */
        .table-container {
            width: 100%;
        }
    }
</style>


<body>
<link rel="stylesheet" href="./style.css" />
<div>
    <link href="./index.css" rel="stylesheet" />

    <div class="home-container">
        <?php include 'includes/header.php' ?>
        <div class="heroContainer home-hero">
            <div class="home-container02">
                <h1 class="home-hero-heading heading1">Data Export Tool</h1>
                <span class="home-hero-sub-heading" id="num-schools"></span>


                <div class="home-btn-group">

                    <div class="home-container04">
                        <label class="home-text01">Country</label>
                        <select id="export-country-select" onchange="updateAll(1, 'adm1')" multiple>

                            <option value="Bahrain">Bahrain</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Israel">Israel</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Tanzania">Tanzania</option>
                            <option value="Tunisia">Tunisia</option>

                        </select>
                    </div>

                </div>

                <div class="home-btn-group">

                    <div class="home-container04">
                        <label class="home-text">Indicator</label>
                        <select id="export-ind-select" onchange="updateAll(1, 'adm1')" multiple>
                            <option value="*">None (just basic geospatial data)</option>
                            <option value="personnel">Personnel</option>
                        </select>
                    </div>

<!--                    <button class="home-text01">Filter</button>-->

                </div>

                <div class="home-btn-group">

                    <div class="home-container04">
                        <label class="home-text">Year</label>
                        <select id="export-year-select" onchange="updateAll(1, 'adm1')">
                            <option value="*">All</option>
                        </select>
                    </div>

                </div>


                <div class="home-btn-group">
                    <button class="home-text01" id='exportData'>Filter</button>
                </div>


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
        <div class="home-features">

            <!-- <div id="map" &#x3c;="" div=""></div> -->

            <div class="table-container">

                <table id="schools-table"></table>

            </div>

            <div class="pagination" id="pagination"></div>




        </div>


        <?php include 'includes/footer.php' ?>

    </div>
</div>
<script
    data-section-id="navbar"
    src="https://unpkg.com/@teleporthq/teleport-custom-scripts"
></script>
</body>

<script src="js/iso_map.js"></script>

<script>
    document.getElementById('exportData').addEventListener('click', function() {
        var iso = 'bhr'; // Example value, replace with actual
        var indicator = '*'; // Example value, replace with actual

        var countries = document.getElementById("export-country-select");
        console.log(countries);

        var values = $('#export-country-select').val();
        var inds = $('#export-ind-select').val();
        console.log(values);
        console.log(inds);

        let iso_list = values.map(item => isos[item] || item);

        // window.location.href = 'start_export.php?iso=' + encodeURIComponent(values) + '&indicator=' + encodeURIComponent(indicator);

        // Create an AJAX request to fetch updated data
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'start_export.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                console.log("MADE IT BACK HERE TO JA BOOTY");
                // var response = JSON.parse(this.responseText)

            }
        };

        // xhr.send(JSON.stringify(data));
        var params = "isos=" + encodeURIComponent(iso_list) + "&indicators=" + encodeURIComponent(inds);
        console.log(params);
        xhr.send(params);


    });
</script>

<script src="js/home-menu.js"></script>



