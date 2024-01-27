<?php

function fetchAdmData($admLevel, $iso, $adm1Sel, $adm2Sel, $adm3Sel) {
    
    include 'includes/config.php';



    // Define the query based on the ADM level
    if ($admLevel === 'adm1') {
        if ($adm1Sel === '*') {
            $query = "SELECT DISTINCT adm1 FROM " . $iso . "_basic"; // Replace with your actual query        
        } else {
            $query = "SELECT DISTINCT adm2 FROM " . $iso . "_basic WHERE adm1='" . $adm1Sel . "'"; // Replace with your actual query  
        }
    } elseif ($admLevel === 'adm2') {
        if ($adm1Sel === '*' & $adm2Sel === '*') {
            $query = "SELECT DISTINCT adm2 FROM " . $iso . "_basic"; // Replace with your actual query        
        } elseif ($adm1Sel != '*' & $adm2Sel === '*') {
            $query = "SELECT DISTINCT adm3 FROM " . $iso . "_basic WHERE adm1='" . $adm1Sel . "'"; // Replace with your actual query  
        } elseif ($adm1Sel != '*' & $adm2Sel != '*') {
            $query = "SELECT DISTINCT adm3 FROM " . $iso . "_basic WHERE adm1='" . $adm1Sel . "' AND adm2='" . $adm2Sel . "'"; // Replace with your actual query  
        }
    } elseif ($admLevel === 'adm3') {
        $query = "SELECT DISTINCT adm3 FROM " . $iso . "_basic"; // Replace with your actual query
    } else {
        return []; // Return an empty array if the ADM level is not recognized
    }

    $result = pg_query($con, $query);
    $data = pg_fetch_all($result);

    return $data ? $data : [];

}


// SELECT DISTINCT adm3 FROM phl_basic WHERE adm1='Region I' AND adm2='Batac City';

?>