<?php

include 'includes/config.php';
include 'admFetchFunc.php';


header('Content-Type: application/json');

$inputData = json_decode(file_get_contents('php://input'), true);

$admType = $inputData['admType'];
$adm1selectedValue = $inputData['adm1Selected'];
$adm2selectedValue = $inputData['adm2Selected'];
$adm3selectedValue = $inputData['adm3Selected'];
$iso = $inputData['iso'];

if ($admType == "***") {
    $responseDataAdm1 = fetchAdmData('adm1', $iso, $adm1selectedValue, $adm2selectedValue, $adm3selectedValue);
    $responseDataAdm2 = fetchAdmData('adm2', $iso, $adm1selectedValue, $adm2selectedValue, $adm3selectedValue);
    $responseDataAdm3 = fetchAdmData('adm3', $iso, $adm1selectedValue, $adm2selectedValue, $adm3selectedValue);
    $return = ["array1"=>$responseDataAdm1, "array2"=>$responseDataAdm2, "array3"=>$responseDataAdm3];
}
if ($admType == "adm1") {
    $responseDataAdm2 = fetchAdmData($admType, $iso, $adm1selectedValue, $adm2selectedValue, $adm3selectedValue);
    $responseDataAdm3 = fetchAdmData("adm2", $iso, $adm1selectedValue, $adm2selectedValue, $adm3selectedValue);
    $return = ["array1"=>$responseDataAdm2, "array2"=>$responseDataAdm3]; 
} elseif ($admType == "adm2") {
    $responseDataAdm3 = fetchAdmData("adm2", $iso, $adm1selectedValue, $adm2selectedValue, $adm3selectedValue);
    $return = $responseDataAdm3;
}

echo json_encode($return);

?>
