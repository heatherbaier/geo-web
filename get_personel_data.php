<?php

include 'includes/config.php';

$schoolID = $_POST['id'];
$iso = $_POST['iso'];
$year = $_POST['year'];


global $con;

$query = "SELECT * FROM " . $iso . "_personnel WHERE geo_id='" . $schoolID . "' AND year='" . $year . "'";
$result = pg_query($con, $query);
$result = pg_fetch_row($result, 0);



// Return both parts as a JSON object
$response = array(
    "schoolID" => $schoolID,
    "ISO" => $iso,
    "year" => $year,
    "query" => $result
);

echo json_encode($response);