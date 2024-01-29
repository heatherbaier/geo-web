<?php include 'includes/config.php' ?>
<?php include 'includes/head.php' ?>

<script src="js/iso_to_name.js"></script>





  <div>
    <link rel="stylesheet" href="./style.css" />
    <div>
      <link href="./index.css" rel="stylesheet" />

      <div class="home-container">
        <?php include 'includes/header.php' ?>
        <div class="heroContainer home-hero">
          <div class="home-container02">
            <h1 class="home-hero-heading heading1" id="country-label"></h1>
            <span class="home-hero-sub-heading" id="num-schools"></span>
            <div class="home-btn-group">
<!--              <div class="home-container03">-->

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
              <div class="home-container05">
                <label class="home-text02">COUNTRY</label>
                <select class="home-select2" id="country-select" onchange="updateCountry(this.value)">
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
        <?php include 'includes/footer.php' ?>
      </div>
    </div>
    <script
      data-section-id="navbar"
      src="https://unpkg.com/@teleporthq/teleport-custom-scripts"
    ></script>
  </body>

<script src="js/country_centroids.js"></script>
<script src="js/iso_map.js"></script>
<script src="js/text-updates.js"></script>


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
        var url = address + 'explore.php?country=' + encodeURIComponent(selectedCountry);

        // Navigate to the new page
        window.location.href = window.location.protocol + "//" + url;

    });

</script>


<script src="js/map.js"></script>
<script src="js/home-menu.js"></script>
