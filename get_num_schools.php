<?php 



// ini_set('display_errors', 1); 
// error_reporting(E_ALL);

if(isset($_GET['country'])) {
    getNumSchools($_GET['country']);
}

function getNumSchools($country){

    include 'includes/config.php';

    if (!$con) {
        echo "Error: Unable to open database\n";

    } else {

        $result = pg_query($con, "SELECT count(*) FROM " . $country);

        $row = pg_fetch_result($result, 0);

        echo $row;//. " SCHOOLS MAPPED";
        
        // echo pg_num_rows($result) . " SCHOOLS MAPPED";

    }

    // 


    // return 'HOLY HECKIN HECK';
  // do your calculation...
}

?>