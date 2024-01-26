<?php include 'includes/config.php' ?>
<?php include 'includes/head.php' ?>

<script src="iso_to_name.js"></script>





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

				<?php

					if (!$con) {
						echo "Error: Unable to open database\n";

					} else {
						// Query to fetch table names
						$result = pg_query($con, "SELECT table_name FROM information_schema.tables WHERE table_schema='public' AND table_type='BASE TABLE'");

						if (!$result) {
							echo "An error occurred.\n";
							exit;
						}

						echo "<script>console.log('Debug Objects: " . $result . "' );</script>";

						foreach ($arr as &$value) {
							$value = $value * 2;
						}

						// Fetch the table names and extract ISO part
						$tables = [];
						while ($row = pg_fetch_assoc($result)) {
							if ($row['table_name'] !== 'spatial_ref_sys' && strpos($row['table_name'], 'Resource id #5') === false) {
							echo "<script>console.log('Debug Objects: " . $row['table_name'] . "' );</script>";
							// CODE TO EXTRACT JUST THE ISO FROM THE <ISO_YEAR>
							// if (preg_match('/^(\w+)_\d{4}$/', $row['table_name'], $matches)) {
							// 	$tables[] = $matches[1]; // Assuming format <ISO_YEAR>
							$tables[] = $row['table_name'];
							}
						}
					}
				// pg_close($con);
				?>

                <label class="home-text">INDICATOR</label>
                <select class="home-select" id="indicator-select">
                  <!-- <option value="Option 1">Option 1</option>
                  <option value="Option 2">Option 2</option>
                  <option value="Option 3">Option 3</option> -->
                </select>
              </div>
              <div class="home-container04">
                <label class="home-text01">YEAR</label>
                <select>
                  <option value="Option 1">Option 1</option>
                  <option value="Option 2">Option 2</option>
                  <option value="Option 3">Option 3</option>
                </select>
              </div>
              <div class="home-container05">
                <label class="home-text02">COUNTRY</label>
                <select class="home-select2" id="country-select" onchange="updateCountry(this.value)">
                  <!-- <option value="Bahrain">Bahrain</option>
                  <option value="Bolivia" selected>Bolivia</option>
                  <option value="Nigeria">Nigeria</option>
                  <option value="Peru">Peru</option>
                  <option value="Philippines">Philippines</option>
                  <option value="Tanzania">Tanzania</option> -->
                </select>
              </div>
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
			<div id="map" &#x3c;="" div=""></div>
          <!-- <div class="home-container06">
            <span class="overline">
              <span>features</span>
              <br />
            </span>
            <h2 class="home-features-heading heading2">
              Explore Data Like Never Before
            </h2>
            <span class="home-features-sub-heading bodyLarge">
              <span>
                <span>
                  <span>
                    Discover insights and make informed decisions with our
                    powerful dashboard features
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
          </div>
          <div class="home-container07">
            <div class="featuresCard feature-card-feature-card">
              <svg viewBox="0 0 1024 1024" class="featuresIcon">
                <path
                  d="M809.003 291.328l-297.003 171.819-297.003-171.819 275.456-157.397c4.779-2.731 9.899-4.48 15.147-5.333 9.301-1.451 18.987 0.128 27.904 5.291zM491.776 979.669c6.016 3.243 12.928 5.077 20.224 5.077 7.381 0 14.336-1.877 20.395-5.163 15.189-2.475 29.909-7.68 43.392-15.36l298.709-170.709c26.368-15.232 45.269-38.315 55.424-64.597 5.675-14.592 8.619-30.165 8.747-46.251v-341.333c0-20.395-4.821-39.723-13.397-56.917-0.939-3.029-2.219-5.973-3.883-8.832-1.963-3.371-4.267-6.357-6.912-8.96-1.323-1.835-2.731-3.669-4.139-5.419-9.813-12.203-21.845-22.528-35.456-30.507l-299.051-170.88c-26.027-15.019-55.467-19.84-83.328-15.531-15.531 2.432-30.507 7.637-44.288 15.488l-298.709 170.709c-16.341 9.429-29.824 21.888-40.149 36.267-2.56 2.56-4.864 5.547-6.784 8.832-1.664 2.901-2.987 5.888-3.925 8.96-1.707 3.456-3.243 6.955-4.608 10.496-5.632 14.635-8.576 30.208-8.704 45.995v341.632c0.043 30.293 10.581 58.197 28.331 80.128 9.813 12.203 21.845 22.528 35.456 30.507l299.051 170.88c13.824 7.979 28.587 13.099 43.605 15.445zM469.333 537.045v340.949l-277.12-158.336c-4.736-2.773-8.832-6.315-12.16-10.411-5.931-7.381-9.387-16.512-9.387-26.581v-318.379zM554.667 877.995v-340.949l298.667-172.757v318.379c-0.043 5.163-1.067 10.496-2.987 15.445-3.413 8.789-9.6 16.384-18.176 21.333z"
                ></path>
              </svg>
              <div class="feature-card-container">
                <h3 class="feature-card-text heading3">
                  <span>Interactive Map</span>
                </h3>
                <span class="bodySmall">
                  <span>
                    Easily navigate and explore data with a large, interactive
                    map at the center of the dashboard
                  </span>
                </span>
              </div>
            </div>
            <div class="featuresCard feature-card-feature-card">
              <svg viewBox="0 0 1024 1024" class="featuresIcon">
                <path
                  d="M809.003 291.328l-297.003 171.819-297.003-171.819 275.456-157.397c4.779-2.731 9.899-4.48 15.147-5.333 9.301-1.451 18.987 0.128 27.904 5.291zM491.776 979.669c6.016 3.243 12.928 5.077 20.224 5.077 7.381 0 14.336-1.877 20.395-5.163 15.189-2.475 29.909-7.68 43.392-15.36l298.709-170.709c26.368-15.232 45.269-38.315 55.424-64.597 5.675-14.592 8.619-30.165 8.747-46.251v-341.333c0-20.395-4.821-39.723-13.397-56.917-0.939-3.029-2.219-5.973-3.883-8.832-1.963-3.371-4.267-6.357-6.912-8.96-1.323-1.835-2.731-3.669-4.139-5.419-9.813-12.203-21.845-22.528-35.456-30.507l-299.051-170.88c-26.027-15.019-55.467-19.84-83.328-15.531-15.531 2.432-30.507 7.637-44.288 15.488l-298.709 170.709c-16.341 9.429-29.824 21.888-40.149 36.267-2.56 2.56-4.864 5.547-6.784 8.832-1.664 2.901-2.987 5.888-3.925 8.96-1.707 3.456-3.243 6.955-4.608 10.496-5.632 14.635-8.576 30.208-8.704 45.995v341.632c0.043 30.293 10.581 58.197 28.331 80.128 9.813 12.203 21.845 22.528 35.456 30.507l299.051 170.88c13.824 7.979 28.587 13.099 43.605 15.445zM469.333 537.045v340.949l-277.12-158.336c-4.736-2.773-8.832-6.315-12.16-10.411-5.931-7.381-9.387-16.512-9.387-26.581v-318.379zM554.667 877.995v-340.949l298.667-172.757v318.379c-0.043 5.163-1.067 10.496-2.987 15.445-3.413 8.789-9.6 16.384-18.176 21.333z"
                ></path>
              </svg>
              <div class="feature-card-container">
                <h3 class="feature-card-text heading3">
                  <span>Indicator Dropdowns</span>
                </h3>
                <span class="bodySmall">
                  <span>
                    Select specific indicators from the dropdown menus on the
                    side of the map to customize your data view
                  </span>
                </span>
              </div>
            </div>
            <div class="featuresCard feature-card-feature-card">
              <svg viewBox="0 0 1024 1024" class="featuresIcon">
                <path
                  d="M809.003 291.328l-297.003 171.819-297.003-171.819 275.456-157.397c4.779-2.731 9.899-4.48 15.147-5.333 9.301-1.451 18.987 0.128 27.904 5.291zM491.776 979.669c6.016 3.243 12.928 5.077 20.224 5.077 7.381 0 14.336-1.877 20.395-5.163 15.189-2.475 29.909-7.68 43.392-15.36l298.709-170.709c26.368-15.232 45.269-38.315 55.424-64.597 5.675-14.592 8.619-30.165 8.747-46.251v-341.333c0-20.395-4.821-39.723-13.397-56.917-0.939-3.029-2.219-5.973-3.883-8.832-1.963-3.371-4.267-6.357-6.912-8.96-1.323-1.835-2.731-3.669-4.139-5.419-9.813-12.203-21.845-22.528-35.456-30.507l-299.051-170.88c-26.027-15.019-55.467-19.84-83.328-15.531-15.531 2.432-30.507 7.637-44.288 15.488l-298.709 170.709c-16.341 9.429-29.824 21.888-40.149 36.267-2.56 2.56-4.864 5.547-6.784 8.832-1.664 2.901-2.987 5.888-3.925 8.96-1.707 3.456-3.243 6.955-4.608 10.496-5.632 14.635-8.576 30.208-8.704 45.995v341.632c0.043 30.293 10.581 58.197 28.331 80.128 9.813 12.203 21.845 22.528 35.456 30.507l299.051 170.88c13.824 7.979 28.587 13.099 43.605 15.445zM469.333 537.045v340.949l-277.12-158.336c-4.736-2.773-8.832-6.315-12.16-10.411-5.931-7.381-9.387-16.512-9.387-26.581v-318.379zM554.667 877.995v-340.949l298.667-172.757v318.379c-0.043 5.163-1.067 10.496-2.987 15.445-3.413 8.789-9.6 16.384-18.176 21.333z"
                ></path>
              </svg>
              <div class="feature-card-container">
                <h3 class="feature-card-text heading3">
                  <span>Charts &amp; Graphs</span>
                </h3>
                <span class="bodySmall">
                  <span>
                    Visualize data trends and patterns with a variety of charts
                    and graphs displayed below the map
                  </span>
                </span>
              </div>
            </div>
            <div class="featuresCard feature-card-feature-card">
              <svg viewBox="0 0 1024 1024" class="featuresIcon">
                <path
                  d="M809.003 291.328l-297.003 171.819-297.003-171.819 275.456-157.397c4.779-2.731 9.899-4.48 15.147-5.333 9.301-1.451 18.987 0.128 27.904 5.291zM491.776 979.669c6.016 3.243 12.928 5.077 20.224 5.077 7.381 0 14.336-1.877 20.395-5.163 15.189-2.475 29.909-7.68 43.392-15.36l298.709-170.709c26.368-15.232 45.269-38.315 55.424-64.597 5.675-14.592 8.619-30.165 8.747-46.251v-341.333c0-20.395-4.821-39.723-13.397-56.917-0.939-3.029-2.219-5.973-3.883-8.832-1.963-3.371-4.267-6.357-6.912-8.96-1.323-1.835-2.731-3.669-4.139-5.419-9.813-12.203-21.845-22.528-35.456-30.507l-299.051-170.88c-26.027-15.019-55.467-19.84-83.328-15.531-15.531 2.432-30.507 7.637-44.288 15.488l-298.709 170.709c-16.341 9.429-29.824 21.888-40.149 36.267-2.56 2.56-4.864 5.547-6.784 8.832-1.664 2.901-2.987 5.888-3.925 8.96-1.707 3.456-3.243 6.955-4.608 10.496-5.632 14.635-8.576 30.208-8.704 45.995v341.632c0.043 30.293 10.581 58.197 28.331 80.128 9.813 12.203 21.845 22.528 35.456 30.507l299.051 170.88c13.824 7.979 28.587 13.099 43.605 15.445zM469.333 537.045v340.949l-277.12-158.336c-4.736-2.773-8.832-6.315-12.16-10.411-5.931-7.381-9.387-16.512-9.387-26.581v-318.379zM554.667 877.995v-340.949l298.667-172.757v318.379c-0.043 5.163-1.067 10.496-2.987 15.445-3.413 8.789-9.6 16.384-18.176 21.333z"
                ></path>
              </svg>
              <div class="feature-card-container">
                <h3 class="feature-card-text heading3">
                  <span>Data Export</span>
                </h3>
                <span class="bodySmall">
                  <span>
                    Download data in JSON format for further analysis or
                    integration with other systems
                  </span>
                </span>
              </div>
            </div>
          </div> -->
        </div>
        <div class="pricingContainer">
          <!-- <div class="home-container08"> -->
            <!-- <span class="overline">
              <span>Pricing</span>
              <br />
            </span> -->
            <!-- <h2 class="heading2">Choose Your Plan</h2> -->
            <!-- <span class="home-pricing-sub-heading bodyLarge">
              <span><span>Select the perfect plan for your needs</span></span>
            </span> -->
          <!-- </div> -->
          <div class="home-container09">
            <div class="freePricingCard home-pricing-card">
              <div class="home-container10">
                <span class="home-text28 heading3">Data</span>
                <span class="bodySmall">
                  Explore school level data for COUNTRY XX
                </span>
              </div>
              <div class="home-container11">
                <!-- <span class="home-text29"> -->
                  <!-- <span>$</span>
                  <span></span> -->
                <!-- </span> -->
                <!-- <span class="home-free-plan-price">0</span> -->
              </div>
              <!-- <div class="home-container12">
                <div class="home-container13">
                  <span class="home-text32">✔</span>
                  <span class="bodySmall">Feature 1 of the Free plan</span>
                </div>
                <div class="home-container14">
                  <span class="home-text33">✔</span>
                  <span class="bodySmall">Feature 2 of the Free plan</span>
                </div>
                <div class="home-container15">
                  <span class="home-text34">✔</span>
                  <span class="bodySmall">Feature 3 of the Free plan</span>
                </div>
                <div class="home-container16">
                  <span class="home-text35">✔</span>
                  <span class="bodySmall">Feature 4 of the Free plan</span>
                </div>
              </div> -->
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

<script src="country_centroids.js"></script>
<script src="iso_map.js"></script>
<script src="text-updates.js"></script>


<script>
	function populateCountryDropdown() {
		console.log("IN HERE YO DAWG");
		var countrySelect = document.getElementById("country-select");
		countrySelect.innerHTML = '';
		<?php foreach ($tables as $iso): ?>
			if (isoToCountryMap.hasOwnProperty("<?= $iso ?>")) {
				var option = document.createElement("option");
				option.value = isoToCountryMap["<?= $iso ?>"];
				
				option.text = isoToCountryMap["<?= $iso ?>"];
				countrySelect.appendChild(option);
			}
		<?php endforeach; ?>
	}

	function displayFirstDropdownItem() {
		var dropdown = document.getElementById("country-select");
		var displayElement = document.getElementById("country-label");

		if (dropdown.options.length > 0) {
			var firstItem = dropdown.options[0].text; // or .value, depending on what you want to display
			displayElement.innerHTML = firstItem;
		} else {
			displayElement.innerHTML = "No options available";
		}

		// Update the number of schools under the country name
    	getNumSchools(firstItem)

	}

	window.onload = function() {
		populateCountryDropdown();
		displayFirstDropdownItem()
	};
</script>


<script>

    document.getElementById('exploreSchools').addEventListener('click', function() {

        var countrySelect = document.getElementById('country-select');
        var selectedCountry = countrySelect.value;
        selectedCountry = isos[selectedCountry]

        // Construct the URL with the selected country's ISO code
        var url = 'localhost:8888/geoweb/explore.php?country=' + encodeURIComponent(selectedCountry);

        // Navigate to the new page
        window.location.href = window.location.protocol + "//" + url;

    });

</script>


<script src="map.js"></script>
