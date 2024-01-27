<?php

include 'includes/config.php';
include 'admFetchFunc.php';


header('Content-Type: application/json');

$inputData = json_decode(file_get_contents('php://input'), true);

$admType = $inputData['admType'];
$adm1selectedValue = $inputData['adm1Selected'];
$adm2selectedValue = $inputData['adm2Selected'];
$adm3selectedValue = $inputData['adm3Selected'];

$array1 = array(
    "foo" => "bar",
    "bar" => "foo",
);

$array2 = array(
    "hey" => "whats",
    "up" => "dawg",
);


// $return = ["array1"=>$array1, "array2"=>$array2]; 
// echo json_encode($return);

if ($admType == "adm1") {
    $responseDataAdm2 = fetchAdmData($admType, "phl", $adm1selectedValue, $adm2selectedValue, $adm3selectedValue);
    $responseDataAdm3 = fetchAdmData("adm2", "phl", $adm1selectedValue, $adm2selectedValue, $adm3selectedValue);
    $return = ["array1"=>$responseDataAdm2, "array2"=>$responseDataAdm3]; 
} elseif ($admType == "adm2") {
    $responseDataAdm3 = fetchAdmData("adm2", "phl", $adm1selectedValue, $adm2selectedValue, $adm3selectedValue);
    $return = $responseDataAdm3;
}



// $responseData = [];

// if ($admType === 'adm1') {

//     fetchAdmData($adm1)

// } elseif ($admType === 'adm2') {

// }

echo json_encode($return);

?>
