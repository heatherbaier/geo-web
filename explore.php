<?php include 'includes/head.php' ?>

<?php



include 'includes/config.php';
include 'admFetchFunc.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

include 'includes/exploreFuncs.php';

$countryISO = isset($_GET['country']) ? filter_var($_GET['country'], FILTER_SANITIZE_STRING) : 'defaultCountry';
$countryBasic = $countryISO . "_basic";

?>



<script src="iso_to_name.js"></script>


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

            <table id="schools-table">
            <thead>
                <tr>
                    <th>Geo ID</th>
                    <th>School Name</th>
                    <th>Address</th>
                    <th>ADM1</th>
                    <th>ADM2</th>
                    <th>ADM3</th>
                    <!-- Other headers... -->
                </tr>
            </thead>
                <?php while ($row = pg_fetch_assoc($result)): ?>
                    <tbody>
                    <tr>
                        <td onclick="redirectToSchool('<?= htmlspecialchars($row['geo_id']) ?>', '<?= htmlspecialchars($countryISO) ?>')">
                            <?= htmlspecialchars($row['geo_id']) ?>
                        </td>
                        <td> <?= htmlspecialchars($row['school_name']) ?> </td>
                        <td> <?= htmlspecialchars($row['address']) ?> </td>
                        <td> <?= htmlspecialchars($row['adm1']) ?> </td>
                        <td> <?= htmlspecialchars($row['adm2']) ?> </td>
                        <td> <?= htmlspecialchars($row['adm3']) ?> </td>
                        <!-- Other columns... -->
                    </tr>
                </tbody>
                <?php endwhile; ?>
            </table>

            <div class="pagination" id="pagination"></div>




        </div>


        <footer class="home-footer1">
          <img
            alt="logo"
            src="https://presentation-website-assets.teleporthq.io/logos/logo.png"
            class="home-image2"
          />
          <span class="home-text84">
            © 2021 teleportHQ, All Rights Reserved.
          </span>
          <div class="home-icon-group1">
            <svg viewBox="0 0 950.8571428571428 1024" class="home-icon10">
              <path
                d="M925.714 233.143c-25.143 36.571-56.571 69.143-92.571 95.429 0.571 8 0.571 16 0.571 24 0 244-185.714 525.143-525.143 525.143-104.571 0-201.714-30.286-283.429-82.857 14.857 1.714 29.143 2.286 44.571 2.286 86.286 0 165.714-29.143 229.143-78.857-81.143-1.714-149.143-54.857-172.571-128 11.429 1.714 22.857 2.857 34.857 2.857 16.571 0 33.143-2.286 48.571-6.286-84.571-17.143-148-91.429-148-181.143v-2.286c24.571 13.714 53.143 22.286 83.429 23.429-49.714-33.143-82.286-89.714-82.286-153.714 0-34.286 9.143-65.714 25.143-93.143 90.857 112 227.429 185.143 380.571 193.143-2.857-13.714-4.571-28-4.571-42.286 0-101.714 82.286-184.571 184.571-184.571 53.143 0 101.143 22.286 134.857 58.286 41.714-8 81.714-23.429 117.143-44.571-13.714 42.857-42.857 78.857-81.143 101.714 37.143-4 73.143-14.286 106.286-28.571z"
              ></path></svg
            ><svg viewBox="0 0 877.7142857142857 1024" class="home-icon12">
              <path
                d="M585.143 512c0-80.571-65.714-146.286-146.286-146.286s-146.286 65.714-146.286 146.286 65.714 146.286 146.286 146.286 146.286-65.714 146.286-146.286zM664 512c0 124.571-100.571 225.143-225.143 225.143s-225.143-100.571-225.143-225.143 100.571-225.143 225.143-225.143 225.143 100.571 225.143 225.143zM725.714 277.714c0 29.143-23.429 52.571-52.571 52.571s-52.571-23.429-52.571-52.571 23.429-52.571 52.571-52.571 52.571 23.429 52.571 52.571zM438.857 152c-64 0-201.143-5.143-258.857 17.714-20 8-34.857 17.714-50.286 33.143s-25.143 30.286-33.143 50.286c-22.857 57.714-17.714 194.857-17.714 258.857s-5.143 201.143 17.714 258.857c8 20 17.714 34.857 33.143 50.286s30.286 25.143 50.286 33.143c57.714 22.857 194.857 17.714 258.857 17.714s201.143 5.143 258.857-17.714c20-8 34.857-17.714 50.286-33.143s25.143-30.286 33.143-50.286c22.857-57.714 17.714-194.857 17.714-258.857s5.143-201.143-17.714-258.857c-8-20-17.714-34.857-33.143-50.286s-30.286-25.143-50.286-33.143c-57.714-22.857-194.857-17.714-258.857-17.714zM877.714 512c0 60.571 0.571 120.571-2.857 181.143-3.429 70.286-19.429 132.571-70.857 184s-113.714 67.429-184 70.857c-60.571 3.429-120.571 2.857-181.143 2.857s-120.571 0.571-181.143-2.857c-70.286-3.429-132.571-19.429-184-70.857s-67.429-113.714-70.857-184c-3.429-60.571-2.857-120.571-2.857-181.143s-0.571-120.571 2.857-181.143c3.429-70.286 19.429-132.571 70.857-184s113.714-67.429 184-70.857c60.571-3.429 120.571-2.857 181.143-2.857s120.571-0.571 181.143 2.857c70.286 3.429 132.571 19.429 184 70.857s67.429 113.714 70.857 184c3.429 60.571 2.857 120.571 2.857 181.143z"
              ></path></svg
            ><svg viewBox="0 0 602.2582857142856 1024" class="home-icon14">
              <path
                d="M548 6.857v150.857h-89.714c-70.286 0-83.429 33.714-83.429 82.286v108h167.429l-22.286 169.143h-145.143v433.714h-174.857v-433.714h-145.714v-169.143h145.714v-124.571c0-144.571 88.571-223.429 217.714-223.429 61.714 0 114.857 4.571 130.286 6.857z"
              ></path>
            </svg>
          </div>
        </footer>
      </div>
    </div>
    <script
      data-section-id="navbar"
      src="https://unpkg.com/@teleporthq/teleport-custom-scripts"
    ></script>
  </body>

<?php include 'includes/exploreFuncs.php' ?>;

