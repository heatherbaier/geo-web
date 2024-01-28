<?php

include 'includes/config.php';


$admType = 'adm1';
$adm1selectedValue = $_POST['adm1'];
$adm2selectedValue = $_POST['adm2'];
$adm3selectedValue = $_POST['adm3'];
$iso = 'phl';
$countryBasic = $iso . "_basic";


$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$rowsPerPage = 10; // Set the number of rows per page
$offset = ($page - 1) * $rowsPerPage;


$firstCheck = $adm1selectedValue . $adm2selectedValue . $adm3selectedValue;


// Define the query based on the ADM level
//if ($admType === 'adm1') {

if ($firstCheck == "***") {
    $query = "SELECT " . $iso . ".*, " . $countryBasic . ".*
              FROM " . $iso .
        " INNER JOIN " . $countryBasic . " ON " . $iso . ".geo_id = " . $countryBasic . ".geo_id
              LIMIT $rowsPerPage OFFSET $offset";
    $totalRowsQuery = "SELECT COUNT(*) 
                   FROM " . $iso . " 
                   INNER JOIN " . $countryBasic . " ON " . $iso . ".geo_id = " . $countryBasic . ".geo_id";
}

elseif ($adm2selectedValue == '*' & $adm1selectedValue != '*' & $adm3selectedValue == '*') {
    $query = "SELECT " . $iso . ".*, " . $countryBasic . ".* 
              FROM " . $iso .
             " INNER JOIN " . $countryBasic . " ON " . $iso . ".geo_id = " . $countryBasic . ".geo_id
               WHERE adm1='" . $adm1selectedValue . "' LIMIT $rowsPerPage OFFSET $offset";
    $totalRowsQuery = "SELECT COUNT(*) 
                       FROM " . $iso . " 
                       INNER JOIN " . $countryBasic . " ON " . $iso . ".geo_id = " . $countryBasic . ".geo_id
                        WHERE adm1='" . $adm1selectedValue . "'";
}

elseif ($adm2selectedValue != '*' & $adm1selectedValue != '*' & $adm3selectedValue == '*') {
    $query = "SELECT " . $iso . ".*, " . $countryBasic . ".* 
              FROM " . $iso .
        " INNER JOIN " . $countryBasic . " ON " . $iso . ".geo_id = " . $countryBasic . ".geo_id
               WHERE adm1='" . $adm1selectedValue . "' AND adm2='" . $adm2selectedValue . "' LIMIT $rowsPerPage OFFSET $offset";
    $totalRowsQuery = "SELECT COUNT(*) FROM " . $iso . " INNER JOIN " .
                        $countryBasic . " ON " . $iso . ".geo_id = " . $countryBasic . ".geo_id
                        WHERE adm1='" . $adm1selectedValue . "' AND adm2='" . $adm2selectedValue . "'";


}

elseif ($adm3selectedValue != '*' & $adm1selectedValue == '*' & $adm2selectedValue == '*') {
    $query = "SELECT " . $iso . ".*, " . $countryBasic . ".* 
              FROM " . $iso .
        " INNER JOIN " . $countryBasic . " ON " . $iso . ".geo_id = " . $countryBasic . ".geo_id
               WHERE adm3='" . $adm3selectedValue . "' LIMIT $rowsPerPage OFFSET $offset";
    $totalRowsQuery = "SELECT COUNT(*) 
                       FROM " . $iso . " 
                       INNER JOIN " . $countryBasic . " ON " . $iso . ".geo_id = " . $countryBasic . ".geo_id
                        WHERE adm3='" . $adm3selectedValue . "'";

}

elseif ($adm3selectedValue != '*' & $adm1selectedValue != "*" & $adm2selectedValue == "*") {
    $query = "SELECT " . $iso . ".*, " . $countryBasic . ".* 
              FROM " . $iso .
        " INNER JOIN " . $countryBasic . " ON " . $iso . ".geo_id = " . $countryBasic . ".geo_id
               WHERE adm1='" . $adm1selectedValue . "' AND adm3='" . $adm3selectedValue . "' LIMIT $rowsPerPage OFFSET $offset";
    $totalRowsQuery = "SELECT COUNT(*) FROM " . $iso . " INNER JOIN " .
        $countryBasic . " ON " . $iso . ".geo_id = " . $countryBasic . ".geo_id
                        WHERE adm1='" . $adm1selectedValue . "' AND adm3='" . $adm3selectedValue . "'";
}

elseif ($adm2selectedValue != '*' & $adm1selectedValue == "*" & $adm3selectedValue == "*") {
    $query = "SELECT " . $iso . ".*, " . $countryBasic . ".* 
              FROM " . $iso .
        " INNER JOIN " . $countryBasic . " ON " . $iso . ".geo_id = " . $countryBasic . ".geo_id
               WHERE adm2='" . $adm2selectedValue . "' LIMIT $rowsPerPage OFFSET $offset";
    $totalRowsQuery = "SELECT COUNT(*) 
                       FROM " . $iso . " 
                       INNER JOIN " . $countryBasic . " ON " . $iso . ".geo_id = " . $countryBasic . ".geo_id
                        WHERE adm2='" . $adm2selectedValue . "'";
};

//}

$message = "<script>console.log('ADM! IN PHP FETCH FILE FIRST CHECK: " . $query . "')";





//echo "<script>console.log(" . $query . ")</script>";


//elseif ($admLevel === 'adm2') {
//    if ($adm1Sel === '*' & $adm2Sel === '*') {
//        $query = "SELECT DISTINCT adm2 FROM " . $iso . "_basic"; // Replace with your actual query
//    } elseif ($adm1Sel != '*' & $adm2Sel === '*') {
//        $query = "SELECT DISTINCT adm3 FROM " . $iso . "_basic WHERE adm1='" . $adm1Sel . "'"; // Replace with your actual query
//    } elseif ($adm1Sel != '*' & $adm2Sel != '*') {
//        $query = "SELECT DISTINCT adm3 FROM " . $iso . "_basic WHERE adm1='" . $adm1Sel . "' AND adm2='" . $adm2Sel . "'"; // Replace with your actual query
//    }
//} elseif ($admLevel === 'adm3') {
//    $query = "SELECT DISTINCT adm3 FROM " . $iso . "_basic"; // Replace with your actual query
//} else {
//    return []; // Return an empty array if the ADM level is not recognized
//}



// Construct and execute query based on the filters
//$query = "SELECT * FROM your_table WHERE adm1_column = '$adm1' AND adm2_column = '$adm2' AND adm3_column = '$adm3'";
// Note: Ensure to use prepared statements or parameterized queries to prevent SQL injection

$result = pg_query($con, $query);

//// Generate and echo table HTML based on the result
//while ($row = pg_fetch_assoc($result)) {
//    echo "<tr>";
//        echo "<td>" . htmlspecialchars($row['geo_id']) . "</td>";
//        echo "<td>" . htmlspecialchars($row['school_name']) . "</td>";
//        echo "<td>" . htmlspecialchars($row['address']) . "</td>";
//        echo "<td>" . htmlspecialchars($row['adm1']) . "</td>";
//        echo "<td>" . htmlspecialchars($row['adm2']) . "</td>";
//        echo "<td>" . htmlspecialchars($row['adm3']) . "</td>";
//    echo "</tr>";
//}

$tableData = "";
while ($row = pg_fetch_assoc($result)) {
    $tableData .= "<tr>";
    $tableData .= "<td>" . htmlspecialchars($row['geo_id']) . "</td>";
    $tableData .= "<td>" . htmlspecialchars($row['school_name']) . "</td>";
    $tableData .= "<td>" . htmlspecialchars($row['address']) . "</td>";
    $tableData .= "<td>" . htmlspecialchars($row['adm1']) . "</td>";
    $tableData .= "<td>" . htmlspecialchars($row['adm2']) . "</td>";
    $tableData .= "<td>" . htmlspecialchars($row['adm3']) . "</td>";
    $tableData .= "</tr>";
}

// Additionally, fetch the total number of rows to calculate total pages
//$totalRowsQuery = "SELECT COUNT(*) FROM your_table WHERE adm1_column = '$adm1' AND adm2_column = '$adm2' AND adm3_column = '$adm3'";



$totalRowsResult = pg_query($con, $totalRowsQuery);
$totalRows = pg_fetch_result($totalRowsResult, 0, 0);
$totalRows = pg_fetch_result($totalRowsResult, 0, 0);
$totalRows = pg_fetch_result($totalRowsResult, 0, 0);
$totalPages = ceil($totalRows / $rowsPerPage);

// Generate pagination links and store in a variable
$paginationLinks = "";
for ($i = 1; $i <= $totalPages; $i++) {
    $paginationLinks .= "<a href='?country=" . urlencode($iso) . "&page=" . $i . "' onclick='setFiltersAndRefreshTable(" . $i . ")'>" . $i . "</a> ";
}

// Return both parts as a JSON object
$response = array(
    "message" => $message,
    "table" => $tableData,
    "pagination" => $paginationLinks
);

echo json_encode($response);

// Close the database conne
