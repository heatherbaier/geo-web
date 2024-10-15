<?php include 'includes/config.php' ?>
<?php include 'includes/head.php' ?>

<script src="js/iso_to_name.js"></script>



<link rel="stylesheet" href="./style.css" />
    <div>
      <link href="./team.css" rel="stylesheet" />

      <div class="home-container">
          <?php include 'includes/header.php' ?>
          <div class="heroContainer home-hero">
              <div class="home-container02">
                  <h1 class="home-hero-heading heading1">Meet the Team (Past &amp; Present)</h1>
                  <!--                <h2 class="home-hero-heading heading1" style="font-family: PT Sans; font-weight: lighter; font-size: 24px">An open database of global education data.</h2>-->
                  <span class="home-hero-sub-heading" id="num-countries"></span>
                  <span class="home-hero-sub-heading"></span>
              </div>
          </div>


                  <div class="home-features" style="background-color: #f5f4f4">

                      <div class="home-container02">


                          <?php
                          // Path to your JSON file
                          $json_file = 'team.json';

                          // Read the JSON file
                          $json_data = file_get_contents($json_file);

                          // Decode the JSON data into an associative array
                          $team = json_decode($json_data, true);

                          // Check if decoding was successful
                          if ($team === null) {
                              echo "Error reading team data.";
                              exit;
                          }

                          // Open a section wrapper or container (depends on your original structure)
//                          echo "<div class='team-sections'>";

                          // Counter to keep track of the number of people in the current row
                          $count = 0;

                          foreach ($team as $name => $details) {
                              // Start a new row every 3 people
                              if ($count % 3 === 0) {
                                  if ($count > 0) {
                                      // Close the previous row
                                      echo "</div>";
                                  }
                                  // Open a new row
                                  echo "<div class='home-container03'>";
                              }

                              // Display individual team member's information
                              echo "<div class='home-container04'>";
                              echo "<img src='" . htmlspecialchars($details['imgpath']) . "' alt='$name' class='home-image02'>";
                              echo "<span class='home-text17'> <span class='home-text18'>$name</span> <br /> </span>";
//                              echo "<span class='home-text20'>Pronouns:</strong> " . htmlspecialchars($details['pronouns']) . "</span>";
                              echo "<span class='home-text20'>" . htmlspecialchars($details['bio']) . "</span>";
                              echo "</div>";

                              $count++;
                          }

                          // Close the last row if it was open
                          if ($count % 3 !== 0) {
                              echo "</div>";
                          }

                          // Close the team-sections container
//                          echo "</div>";
                          ?>


</div>
                      </div>
                  </div>



          <?php include 'includes/footer.php' ?>
      </div>
    </div>












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
<!--                <span class="home-text89">Sub-menu Item</span>-->
<!--              </div>-->
<!--            </li>-->
<!--            <li data-thq="thq-dropdown" class="home-dropdown4 list-item">-->
<!--              <div data-thq="thq-dropdown-toggle" class="home-dropdown-toggle5">-->
<!--                <span class="home-text90">Sub-menu Item</span>-->
<!--              </div>-->
<!--            </li>-->
<!--            <li data-thq="thq-dropdown" class="home-dropdown5 list-item">-->
<!--              <div data-thq="thq-dropdown-toggle" class="home-dropdown-toggle6">-->
<!--                <span class="home-text91">Sub-menu Item</span>-->
<!--              </div>-->
<!--            </li>-->
<!--          </ul>-->
<!--        </div>-->
<!--        <footer class="home-footer1">-->
<!--          <img-->
<!--            alt="logo"-->
<!--            src="https://presentation-website-assets.teleporthq.io/logos/logo.png"-->
<!--            class="home-image14"-->
<!--          />-->
<!--          <span class="home-text92">-->
<!--            © 2021 teleportHQ, All Rights Reserved.-->
<!--          </span>-->
<!--          <div class="home-icon-group1">-->
<!--            <svg viewBox="0 0 950.8571428571428 1024" class="home-icon10">-->
<!--              <path-->
<!--                d="M925.714 233.143c-25.143 36.571-56.571 69.143-92.571 95.429 0.571 8 0.571 16 0.571 24 0 244-185.714 525.143-525.143 525.143-104.571 0-201.714-30.286-283.429-82.857 14.857 1.714 29.143 2.286 44.571 2.286 86.286 0 165.714-29.143 229.143-78.857-81.143-1.714-149.143-54.857-172.571-128 11.429 1.714 22.857 2.857 34.857 2.857 16.571 0 33.143-2.286 48.571-6.286-84.571-17.143-148-91.429-148-181.143v-2.286c24.571 13.714 53.143 22.286 83.429 23.429-49.714-33.143-82.286-89.714-82.286-153.714 0-34.286 9.143-65.714 25.143-93.143 90.857 112 227.429 185.143 380.571 193.143-2.857-13.714-4.571-28-4.571-42.286 0-101.714 82.286-184.571 184.571-184.571 53.143 0 101.143 22.286 134.857 58.286 41.714-8 81.714-23.429 117.143-44.571-13.714 42.857-42.857 78.857-81.143 101.714 37.143-4 73.143-14.286 106.286-28.571z"-->
<!--              ></path></svg-->
<!--            ><svg viewBox="0 0 877.7142857142857 1024" class="home-icon12">-->
<!--              <path-->
<!--                d="M585.143 512c0-80.571-65.714-146.286-146.286-146.286s-146.286 65.714-146.286 146.286 65.714 146.286 146.286 146.286 146.286-65.714 146.286-146.286zM664 512c0 124.571-100.571 225.143-225.143 225.143s-225.143-100.571-225.143-225.143 100.571-225.143 225.143-225.143 225.143 100.571 225.143 225.143zM725.714 277.714c0 29.143-23.429 52.571-52.571 52.571s-52.571-23.429-52.571-52.571 23.429-52.571 52.571-52.571 52.571 23.429 52.571 52.571zM438.857 152c-64 0-201.143-5.143-258.857 17.714-20 8-34.857 17.714-50.286 33.143s-25.143 30.286-33.143 50.286c-22.857 57.714-17.714 194.857-17.714 258.857s-5.143 201.143 17.714 258.857c8 20 17.714 34.857 33.143 50.286s30.286 25.143 50.286 33.143c57.714 22.857 194.857 17.714 258.857 17.714s201.143 5.143 258.857-17.714c20-8 34.857-17.714 50.286-33.143s25.143-30.286 33.143-50.286c22.857-57.714 17.714-194.857 17.714-258.857s5.143-201.143-17.714-258.857c-8-20-17.714-34.857-33.143-50.286s-30.286-25.143-50.286-33.143c-57.714-22.857-194.857-17.714-258.857-17.714zM877.714 512c0 60.571 0.571 120.571-2.857 181.143-3.429 70.286-19.429 132.571-70.857 184s-113.714 67.429-184 70.857c-60.571 3.429-120.571 2.857-181.143 2.857s-120.571 0.571-181.143-2.857c-70.286-3.429-132.571-19.429-184-70.857s-67.429-113.714-70.857-184c-3.429-60.571-2.857-120.571-2.857-181.143s-0.571-120.571 2.857-181.143c3.429-70.286 19.429-132.571 70.857-184s113.714-67.429 184-70.857c60.571-3.429 120.571-2.857 181.143-2.857s120.571-0.571 181.143 2.857c70.286 3.429 132.571 19.429 184 70.857s67.429 113.714 70.857 184c3.429 60.571 2.857 120.571 2.857 181.143z"-->
<!--              ></path></svg-->
<!--            ><svg viewBox="0 0 602.2582857142856 1024" class="home-icon14">-->
<!--              <path-->
<!--                d="M548 6.857v150.857h-89.714c-70.286 0-83.429 33.714-83.429 82.286v108h167.429l-22.286 169.143h-145.143v433.714h-174.857v-433.714h-145.714v-169.143h145.714v-124.571c0-144.571 88.571-223.429 217.714-223.429 61.714 0 114.857 4.571 130.286 6.857z"-->
<!--              ></path>-->
<!--            </svg>-->
<!--          </div>-->
<!--        </footer>-->
<!--      </div>-->
<!--    </div>-->
<!--    <script-->
<!--      data-section-id="navbar"-->
<!--      src="https://unpkg.com/@teleporthq/teleport-custom-scripts"-->
<!--    ></script>-->
<!--  </body>-->
<!--</html>-->
