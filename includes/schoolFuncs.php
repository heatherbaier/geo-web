

<?php

include 'includes/config.php';

function getSchoolName($countryBasic, $schoolID) {
    global $con; // Declare $con as a global variable
    $query = "SELECT school_name FROM " . $countryBasic . " WHERE geo_id = '" . $schoolID . "'";
    $result = pg_query($con, $query);
    $schoolName = pg_fetch_result($result, 0);
    return $schoolName;
}

?>


