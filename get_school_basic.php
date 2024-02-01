<?php

include 'includes/config.php';

$schoolID = $_POST['id'];
$iso = $_POST['iso'];

global $con;

$query = "SELECT * FROM " . $iso . " WHERE geo_id='" . $schoolID . "'";
$result = pg_query($con, $query);
$result = pg_fetch_row($result, 0);





// Return both parts as a JSON object
$response = array(
"schoolID" => $schoolID,
"ISO" => $iso,
"query" => $result
);

echo json_encode($response);