<?php include 'includes/head.php' ?>

<?php

include 'includes/config.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$countryISO = isset($_GET['country']) ? filter_var($_GET['country'], FILTER_SANITIZE_STRING) : 'defaultCountry';
$countryBasic = $countryISO . "_basic";

include 'admFetchFunc.php';
include 'includes/exploreFuncs.php';

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
</style>


  <body>
    <link rel="stylesheet" href="./style.css" />
    <div>
      <link href="./index.css" rel="stylesheet" />

      <div class="home-container">
        <?php include 'includes/header.php' ?>
        <div class="heroContainer home-hero">
          <div class="home-container02">
            <h1 class="home-hero-heading heading1" id="country-label">LABEL_HERE</h1>
            <span class="home-hero-sub-heading" id="num-schools"></span>
            <div class="home-btn-group">
              <div class="home-container03">

                <label class="home-text">ADM1</label>
                <select class="home-select" id="adm1-select" onchange="updateAll(1, 'adm1')">
                    <option value="*">All</option>
                  <!-- <option value="Option 1">Option 1</option>
                  <option value="Option 2">Option 2</option>
                  <option value="Option 3">Option 3</option> -->
                </select>
              </div>
              <div class="home-container04">
                <label class="home-text01">ADM2</label>
                <select id="adm2-select" onchange="updateAll(1, 'adm2')">
                    <option value="*">All</option>
                  <!-- <option value="Option 1">Option 1</option>
                  <option value="Option 2">Option 2</option>
                  <option value="Option 3">Option 3</option> -->
                </select>
              </div>
              <div class="home-container05">
                <label class="home-text02">ADM3</label>
                <select class="home-select2" id="adm3-select"  onchange="updateTableData()">
                    <option value="*">All</option>
                  <!-- <option value="Bahrain">Bahrain</option>
                  <option value="Bolivia" selected>Bolivia</option>
                  <option value="Nigeria">Nigeria</option>
                  <option value="Peru">Peru</option>
                  <option value="Philippines">Philippines</option>
                  <option value="Tanzania">Tanzania</option> -->
                </select>
              </div>
              <button class="home-text01">Filter</button>


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

            <table id="schools-table"></table>

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



<script src="js/home-menu.js"></script>



