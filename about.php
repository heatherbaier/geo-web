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
                <h1 class="home-hero-heading heading1">About the Global Education Observatory</h1>
<!--                <h2 class="home-hero-heading heading1" style="font-family: PT Sans; font-weight: lighter; font-size: 24px">An open database of global education data.</h2>-->
                <span class="home-hero-sub-heading" id="num-countries"></span>
                <span class="home-hero-sub-heading"></span>
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
<!--            <div id="map" &#x3c;="" div=""></div>-->
<!--            <script src="homeMap.js"></script>-->

            <div id="about-text">

            Founded in 2018 at the William & Mary geoLab, the Global Education Observatory's (GEO) mission
                is to consolidate and enrich global educational data,
                transforming it into actionable insights and tools for educators, policymakers, and researchers worldwide.

            <br><br><h2>A Singular Repository of Diverse Educational Data</h2>

            At GEO, we recognize the power of information in shaping the future of education. Our primary endeavor is to
                amalgamate data from open government databases and other authoritative sources into a single, comprehensive
                repository. This unique collection not only offers a panoramic view of global education but also serves as
                a valuable resource for comparative analysis and trend identification.

            <br><br><h2>Student-Led</h2>

            Our team comprises dedicated graduate and undergraduate students from the geoLab, bringing together diverse skills
                and perspectives. This vibrant academic environment fosters innovation and creativity, allowing us to approach
                challenges with fresh ideas.

            <br><br><h2>Innovating with Machine Learning</h2>

            We employ advanced machine learning techniques to unearth patterns and fill gaps in educational data. Our most recent work
                demonstrates our capability to estimate school test scores using publicly available imagery. By employing convolutional
                neural networks (CNN) and multi-source ensembles, we have achieved predictive accuracies of 76% to 80% for individual
                schools in countries like the Philippines and Brazil.

            This approach underscores our commitment to leveraging technology for educational insights. Our research not only adds to the
                academic discourse but also paves the way for operational applications of CNN-based methodologies in educational assessment.

<!--            Join Us in Shaping a Data-Driven Educational Future-->

<!--            At the Global Education Observatory, we are more than data analysts; we are catalysts for change. By bridging data gaps and harnessing the power of machine learning, we aim to illuminate the path to educational improvement and equity. We invite you to explore our findings, utilize our resources, and join us in this exciting journey towards a better understanding of global education.-->

            </div>


        </div>


        <div class="pricingContainer">
            <div class="home-container09">

                <div class="freePricingCard home-pricing-card">
                    <div class="home-container10">
                        <span class="home-text28 heading3">School Level Data</span>
                        <span class="bodySmall">
                  Explore data on resources, personnel, assessments and more at the school level.
                </span>
                    </div>
                    <button class="home-button buttonFilledSecondary" id="exploreCountries">
                        Explore
                    </button>
                </div>

                <div class="basicPricingCard home-pricing-card1">
                    <div class="home-container17">
                        <span class="home-text36 heading3">API</span>
                        <span class="bodySmall">
                  Download any of the data we publish through our API.
                </span>
                    </div>
                    <button class="home-button1 buttonFilledSecondary">
                        API Documentation
                    </button>
                </div>

                <div class="proPricingCard home-pricing-card2">
                    <div class="home-container25">
                        <span class="home-text47 heading3">Machine Learning</span>
                        <span class="bodySmall">
                  Out team trains a suite of machine learning models to fill in gaps in education data globally. Get the resources for those models on GitHub below.
                </span>
                    </div>
                    <button class="home-button2 buttonFilledSecondary"  onclick="location.href = 'https://github.com/heatherbaier/torchGlobalEdu';" >
                        Go to GitHub
                    </button>
                </div>

            </div>
        </div>

        <!--        <div class="bannerContainer home-banner">-->
        <!--          <h1 class="home-banner-heading heading2">-->
        <!--            Unlock the Power of Data Visualization-->
        <!--          </h1>-->
        <!--          <span class="home-banner-sub-heading bodySmall">-->
        <!--            <span>-->
        <!--              <span>-->
        <!--                <span>-->
        <!--                  Our dashboard provides a comprehensive view of your data,-->
        <!--                  allowing you to analyze trends, identify patterns, and gain-->
        <!--                  valuable insights. With intuitive charts, graphs, and maps,-->
        <!--                  you can easily navigate through your data and make data-driven-->
        <!--                  decisions.-->
        <!--                </span>-->
        <!--                <span></span>-->
        <!--              </span>-->
        <!--              <span>-->
        <!--                <span></span>-->
        <!--                <span></span>-->
        <!--              </span>-->
        <!--            </span>-->
        <!--            <span>-->
        <!--              <span>-->
        <!--                <span></span>-->
        <!--                <span></span>-->
        <!--              </span>-->
        <!--              <span>-->
        <!--                <span></span>-->
        <!--                <span></span>-->
        <!--              </span>-->
        <!--            </span>-->
        <!--          </span>-->
        <!--          <button class="buttonFilled">Learn More</button>-->
        <!--        </div>-->
        <!--        <div class="home-faq">-->
        <!--          <div class="home-container33">-->
        <!--            <span class="overline">-->
        <!--              <span>FAQ</span>-->
        <!--              <br />-->
        <!--            </span>-->
        <!--            <h2 class="home-text77 heading2">Common questions</h2>-->
        <!--            <span class="home-text78 bodyLarge">-->
        <!--              <span>-->
        <!--                Here are some of the most common questions that we get.-->
        <!--              </span>-->
        <!--              <br />-->
        <!--            </span>-->
        <!--          </div>-->
        <!--          <div class="home-container34">-->
        <!--            <div class="question1-container">-->
        <!--              <span class="question1-text heading3">-->
        <!--                <span>How do I navigate the map?</span>-->
        <!--              </span>-->
        <!--              <span class="bodySmall">-->
        <!--                <span>-->
        <!--                  To navigate the map, simply use your mouse or trackpad to drag-->
        <!--                  and move the map around. You can also use the zoom controls on-->
        <!--                  the map to zoom in and out.-->
        <!--                </span>-->
        <!--              </span>-->
        <!--            </div>-->
        <!--            <div class="question1-container">-->
        <!--              <span class="question1-text heading3">-->
        <!--                <span>How do I select indicators?</span>-->
        <!--              </span>-->
        <!--              <span class="bodySmall">-->
        <!--                <span>-->
        <!--                  To select indicators, use the dropdown menus on the side of-->
        <!--                  the map. Choose the desired indicator from each dropdown to-->
        <!--                  update the map and view the corresponding data.-->
        <!--                </span>-->
        <!--              </span>-->
        <!--            </div>-->
        <!--            <div class="question1-container">-->
        <!--              <span class="question1-text heading3">-->
        <!--                <span>Can I customize the charts and graphs?</span>-->
        <!--              </span>-->
        <!--              <span class="bodySmall">-->
        <!--                <span>-->
        <!--                  Yes, you can customize the charts and graphs below the map.-->
        <!--                  Use the available options to adjust the display, select-->
        <!--                  different data sets, and apply filters to visualize the-->
        <!--                  information according to your preferences.-->
        <!--                </span>-->
        <!--              </span>-->
        <!--            </div>-->
        <!--            <div class="question1-container">-->
        <!--              <span class="question1-text heading3">-->
        <!--                <span>How often is the data updated?</span>-->
        <!--              </span>-->
        <!--              <span class="bodySmall">-->
        <!--                <span>-->
        <!--                  The data on the dashboard is regularly updated based on the-->
        <!--                  latest available information. The frequency of updates may-->
        <!--                  vary depending on the specific data source and indicator.-->
        <!--                </span>-->
        <!--              </span>-->
        <!--            </div>-->
        <!--            <div class="question1-container">-->
        <!--              <span class="question1-text heading3">-->
        <!--                <span>Is there a legend for the map indicators?</span>-->
        <!--              </span>-->
        <!--              <span class="bodySmall">-->
        <!--                <span>-->
        <!--                  Yes, there is a legend provided for each indicator on the map.-->
        <!--                  The legend helps you understand the color coding or symbol-->
        <!--                  representation used to depict different values or categories-->
        <!--                  of data.-->
        <!--                </span>-->
        <!--              </span>-->
        <!--            </div>-->
        <!--          </div>-->
        <!--        </div>-->
        <!--        <div class="home-hero1"></div>-->
        <!--        <div class="home-features1">-->
        <!--          <div class="home-features-container featuresContainer"></div>-->
        <!--        </div>-->
        <!--        <div class="home-pricing1"></div>-->
        <!--        <div class="home-banner1"></div>-->
        <!--        <div class="home-footer"></div>-->
        <!--        <div data-thq="thq-dropdown" class="home-thq-dropdown1 list-item">-->
        <!--          <div data-thq="thq-dropdown-toggle" class="home-dropdown-toggle3">-->
        <!--            <div-->
        <!--              data-thq="thq-dropdown-arrow"-->
        <!--              class="home-dropdown-arrow"-->
        <!--            ></div>-->
        <!--          </div>-->
        <!--          <ul data-thq="thq-dropdown-list" class="home-dropdown-list1">-->
        <!--            <li data-thq="thq-dropdown" class="home-dropdown3 list-item">-->
        <!--              <div data-thq="thq-dropdown-toggle" class="home-dropdown-toggle4">-->
        <!--                <span class="home-text81">Sub-menu Item</span>-->
        <!--              </div>-->
        <!--            </li>-->
        <!--            <li data-thq="thq-dropdown" class="home-dropdown4 list-item">-->
        <!--              <div data-thq="thq-dropdown-toggle" class="home-dropdown-toggle5">-->
        <!--                <span class="home-text82">Sub-menu Item</span>-->
        <!--              </div>-->
        <!--            </li>-->
        <!--            <li data-thq="thq-dropdown" class="home-dropdown5 list-item">-->
        <!--              <div data-thq="thq-dropdown-toggle" class="home-dropdown-toggle6">-->
        <!--                <span class="home-text83">Sub-menu Item</span>-->
        <!--              </div>-->
        <!--            </li>-->
        <!--          </ul>-->
        <!--        </div>-->
        <?php include 'includes/footer.php' ?>
    </div>
</div>
<script data-section-id="navbar" src="https://unpkg.com/@teleporthq/teleport-custom-scripts"></script>
</body>


<script src="js/home-menu.js"></script>
<?php //include "homeMap.js" ?>
