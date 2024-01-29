<?php include 'includes/config.php' ?>
<?php include 'includes/head.php' ?>


<?php

include 'includes/homeFuncs.php';

$isoList = getISOlist();


?>

<script src="js/iso_to_name.js"></script>





  <body>
    <link rel="stylesheet" href="./style.css" />
    <div>
      <link href="./index.css" rel="stylesheet" />

      <div class="home-container">
        <?php include 'includes/header.php' ?>
        <div class="heroContainer home-hero">
          <div class="home-container02">
            <h1 class="home-hero-heading heading1">Global Education Observatory</h1>
              <span class="home-hero-sub-heading" id="num-countries"></span>
            <span class="home-hero-sub-heading"></span>
<!--            <div class="home-btn-group">-->
<!--              <div class="home-container03">-->
<!--                <label class="home-text">INDICATOR</label>-->
<!--                <select class="home-select" id="indicator-select"></select>-->
<!--              </div>-->
<!--              <div class="home-container04">-->
<!--                <label class="home-text01">YEAR</label>-->
<!--                <select>-->
<!--                  <option value="Option 1">Option 1</option>-->
<!--                  <option value="Option 2">Option 2</option>-->
<!--                  <option value="Option 3">Option 3</option>-->
<!--                </select>-->
<!--              </div>-->
<!--              <div class="home-container05">-->
<!--                <label class="home-text02">COUNTRY</label>-->
<!--                <select class="home-select2" id="country-select" onchange="updateCountry(this.value)">-->
<!--                </select>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
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
			<div id="map" &#x3c;="" div=""></div>
            <script src="homeMap.js"</script>
        </div>
        <div class="pricingContainer">
          <div class="home-container09">
            <div class="freePricingCard home-pricing-card">
              <div class="home-container10">
                <span class="home-text28 heading3">Data</span>
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
                <span class="home-text36 heading3">BASIC</span>
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
                  <span>PRO</span>
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
        <div class="bannerContainer home-banner">
          <h1 class="home-banner-heading heading2">
            Unlock the Power of Data Visualization
          </h1>
          <span class="home-banner-sub-heading bodySmall">
            <span>
              <span>
                <span>
                  Our dashboard provides a comprehensive view of your data,
                  allowing you to analyze trends, identify patterns, and gain
                  valuable insights. With intuitive charts, graphs, and maps,
                  you can easily navigate through your data and make data-driven
                  decisions.
                </span>
                <span></span>
              </span>
              <span>
                <span></span>
                <span></span>
              </span>
            </span>
            <span>
              <span>
                <span></span>
                <span></span>
              </span>
              <span>
                <span></span>
                <span></span>
              </span>
            </span>
          </span>
          <button class="buttonFilled">Learn More</button>
        </div>
        <div class="home-faq">
          <div class="home-container33">
            <span class="overline">
              <span>FAQ</span>
              <br />
            </span>
            <h2 class="home-text77 heading2">Common questions</h2>
            <span class="home-text78 bodyLarge">
              <span>
                Here are some of the most common questions that we get.
              </span>
              <br />
            </span>
          </div>
          <div class="home-container34">
            <div class="question1-container">
              <span class="question1-text heading3">
                <span>How do I navigate the map?</span>
              </span>
              <span class="bodySmall">
                <span>
                  To navigate the map, simply use your mouse or trackpad to drag
                  and move the map around. You can also use the zoom controls on
                  the map to zoom in and out.
                </span>
              </span>
            </div>
            <div class="question1-container">
              <span class="question1-text heading3">
                <span>How do I select indicators?</span>
              </span>
              <span class="bodySmall">
                <span>
                  To select indicators, use the dropdown menus on the side of
                  the map. Choose the desired indicator from each dropdown to
                  update the map and view the corresponding data.
                </span>
              </span>
            </div>
            <div class="question1-container">
              <span class="question1-text heading3">
                <span>Can I customize the charts and graphs?</span>
              </span>
              <span class="bodySmall">
                <span>
                  Yes, you can customize the charts and graphs below the map.
                  Use the available options to adjust the display, select
                  different data sets, and apply filters to visualize the
                  information according to your preferences.
                </span>
              </span>
            </div>
            <div class="question1-container">
              <span class="question1-text heading3">
                <span>How often is the data updated?</span>
              </span>
              <span class="bodySmall">
                <span>
                  The data on the dashboard is regularly updated based on the
                  latest available information. The frequency of updates may
                  vary depending on the specific data source and indicator.
                </span>
              </span>
            </div>
            <div class="question1-container">
              <span class="question1-text heading3">
                <span>Is there a legend for the map indicators?</span>
              </span>
              <span class="bodySmall">
                <span>
                  Yes, there is a legend provided for each indicator on the map.
                  The legend helps you understand the color coding or symbol
                  representation used to depict different values or categories
                  of data.
                </span>
              </span>
            </div>
          </div>
        </div>
        <div class="home-hero1"></div>
        <div class="home-features1">
          <div class="home-features-container featuresContainer"></div>
        </div>
        <div class="home-pricing1"></div>
        <div class="home-banner1"></div>
        <div class="home-footer"></div>
        <div data-thq="thq-dropdown" class="home-thq-dropdown1 list-item">
          <div data-thq="thq-dropdown-toggle" class="home-dropdown-toggle3">
            <div
              data-thq="thq-dropdown-arrow"
              class="home-dropdown-arrow"
            ></div>
          </div>
          <ul data-thq="thq-dropdown-list" class="home-dropdown-list1">
            <li data-thq="thq-dropdown" class="home-dropdown3 list-item">
              <div data-thq="thq-dropdown-toggle" class="home-dropdown-toggle4">
                <span class="home-text81">Sub-menu Item</span>
              </div>
            </li>
            <li data-thq="thq-dropdown" class="home-dropdown4 list-item">
              <div data-thq="thq-dropdown-toggle" class="home-dropdown-toggle5">
                <span class="home-text82">Sub-menu Item</span>
              </div>
            </li>
            <li data-thq="thq-dropdown" class="home-dropdown5 list-item">
              <div data-thq="thq-dropdown-toggle" class="home-dropdown-toggle6">
                <span class="home-text83">Sub-menu Item</span>
              </div>
            </li>
          </ul>
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

<!--<script src="js/country_centroids.js"></script>-->
<!--<script src="js/iso_map.js"></script>-->
<!--<script src="js/text-updates.js"></script>-->

<script src="js/homMap2.js"></script>



<script src="js/home-menu.js"></script>


<?php //include "homeMap.js" ?>
