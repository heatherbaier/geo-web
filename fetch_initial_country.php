<?php

global $con;

    // Query to fetch table names
//    echo "Hey!";
    $result = pg_query($con, "SELECT table_name FROM information_schema.tables WHERE table_schema='public' AND table_type='BASE TABLE'");

    // Fetch the table names and extract ISO part

    $tables = pg_fetch_array($result, 0);

//    $tables = [];
//    while ($row = pg_fetch_assoc($result)) {
//        if ($row['table_name'] !== 'spatial_ref_sys' && strpos($row['table_name'], 'Resource id #5') === false) {
//            echo "<script>console.log('Debug Objects: " . $row['table_name'] . "' );</script>";
//            // CODE TO EXTRACT JUST THE ISO FROM THE <ISO_YEAR>
//            // if (preg_match('/^(\w+)_\d{4}$/', $row['table_name'], $matches)) {
//            // 	$tables[] = $matches[1]; // Assuming format <ISO_YEAR>
//            $tables[] = $row['table_name'];
//        }
//    }
//
//// Return both parts as a JSON object
$response = array(
    "country" => $tables
);
//
echo json_encode($response);

// pg_close($con);
?>