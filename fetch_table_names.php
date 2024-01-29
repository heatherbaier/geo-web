<?php

include 'includes/config.php';
include 'admFetchFunc.php';


header('Content-Type: application/json');

$inputData = json_decode(file_get_contents('php://input'), true);

include 'includes/homeFuncs.php';

$isoList = getISOlist();



$return = $isoList;

echo json_encode($return);



