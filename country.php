<?php include 'includes/config.php' ?>
<?php include 'includes/head.php' ?>

<script src="js/iso_to_name.js"></script>





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

//						echo "<script>console.log('Debug Objects: " . $result . "' );</script>";

						foreach ($arr as &$value) {
							$value = $value * 2;
						}

						// Fetch the table names and extract ISO part
						$tables = [];
						while ($row = pg_fetch_assoc($result)) {
							if ($row['table_name'] !== 'spatial_ref_sys' && strpos($row['table_name'], 'Resource id #5') === false) {
//							echo "<script>console.log('Debug Objects: " . $row['table_name'] . "' );</script>";
							// CODE TO EXTRACT JUST THE ISO FROM THE <ISO_YEAR>
							// if (preg_match('/^(\w+)_\d{4}$/', $row['table_name'], $matches)) {
							// 	$tables[] = $matches[1]; // Assuming format <ISO_YEAR>
							$tables[] = $row['table_name'];
							}
						}
					}
				// pg_close($con);
                asort($tables);
				?>
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
                <span class="home-text28 heading3">School Level Data</span>
                <span class="bodySmall" id="searchText">
<!--                    Explore data on resources, personnel, assessments and more at the school level for XX.-->
                </span>
              </div>
<!--              <div class="home-container11">-->
<!--              </div>-->
<!--              <button class="home-button buttonOutline" id="exploreSchools">-->
<!--                Explore-->
<!--              </button>-->
                <button class="home-button1 buttonFilledSecondary" id="exploreSchools">
                    Search Schools
                </button>
            </div>


<!--            <div class="basicPricingCard home-pricing-card1">-->
<!--              <div class="home-container17">-->
<!--                <span class="home-text36 heading3">References & Data Sources</span>-->
<!--                <span class="bodySmall">-->
<!--                  Data for XX originates from the following sources:-->
<!--                </span>-->
<!--              </div>-->
<!--            </div>-->





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

<script src="js/country_centroids.js"></script>
<script src="js/iso_map.js"></script>
<script src="js/text-updates.js"></script>
<script src="citations.js"></script>



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

    function populateInitialText() {

            var displayElement = document.getElementById("country-label");
            var txt = document.getElementById("searchText");

            txt.innerHTML = "Explore data on resources, personnel, assessments and more at the school level for " + displayElement.innerHTML + ".";

    }


	// window.onload = function() {
	// 	populateCountryDropdown();
	// 	displayFirstDropdownItem();
	// };
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

<script>
    populateCountryDropdown();
    displayFirstDropdownItem();
    populateInitialText();
</script>

<script src="js/home-menu.js"></script>
<script src="map.js"></script>
