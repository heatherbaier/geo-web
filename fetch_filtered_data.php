<?php

include 'includes/config.php';


$admType = 'adm1';
$adm1selectedValue = $_POST['adm1'];
$adm2selectedValue = $_POST['adm2'];
$adm3selectedValue = $_POST['adm3'];
$iso = $_POST['iso'];
$countryBasic = $iso;// . "_geo";
$page = $_POST['page'];

if ($page == "") {
    $page = 1;
}


$rowsPerPage = 10; // Set the number of rows per page
$offset = ($page - 1) * $rowsPerPage;




$message = "<script>console.log('ADM! IN PHP FETCH FILE FIRST CHECK: " . $page . "')";



$firstCheck = $adm1selectedValue . $adm2selectedValue . $adm3selectedValue;


// Define the query based on the ADM level
//if ($admType === 'adm1') {

if ($firstCheck == "***") {
    $query = "SELECT * FROM " . $countryBasic . " LIMIT $rowsPerPage OFFSET $offset";
    $totalRowsQuery = "SELECT COUNT(*) FROM " . $countryBasic;
}

elseif ($adm2selectedValue == '*' & $adm1selectedValue != '*' & $adm3selectedValue == '*') {
    $query = "SELECT * FROM " . $countryBasic . " WHERE adm1='" . $adm1selectedValue . "' LIMIT $rowsPerPage OFFSET $offset";
    $totalRowsQuery = "SELECT COUNT(*) FROM " . $countryBasic . " WHERE adm1='" . $adm1selectedValue . "'";
}

elseif ($adm2selectedValue != '*' & $adm1selectedValue != '*' & $adm3selectedValue == '*') {
    $query = "SELECT * FROM " . $countryBasic . " WHERE adm1='" . $adm1selectedValue . "' AND adm2='" . $adm2selectedValue . "' LIMIT $rowsPerPage OFFSET $offset";
    $totalRowsQuery = "SELECT COUNT(*) FROM " . $countryBasic . " WHERE adm1='" . $adm1selectedValue . "' AND adm2='" . $adm2selectedValue . "'";


}

elseif ($adm3selectedValue != '*' & $adm1selectedValue == '*' & $adm2selectedValue == '*') {
    $query = "SELECT * FROM " . $countryBasic . " WHERE adm3='" . $adm3selectedValue . "' LIMIT $rowsPerPage OFFSET $offset";
    $totalRowsQuery = "SELECT COUNT(*) FROM " . $countryBasic . " WHERE adm3='" . $adm3selectedValue . "'";

}

elseif ($adm3selectedValue != '*' & $adm1selectedValue != "*" & $adm2selectedValue == "*") {
    $query = "SELECT * FROM " . $countryBasic . " WHERE adm1='" . $adm1selectedValue . "' AND adm3='" . $adm3selectedValue . "' LIMIT $rowsPerPage OFFSET $offset";
    $totalRowsQuery = "SELECT COUNT(*) FROM " . $countryBasic . " WHERE adm1='" . $adm1selectedValue . "' AND adm3='" . $adm3selectedValue . "'";
}

elseif ($adm3selectedValue != '*' & $adm1selectedValue != "*" & $adm2selectedValue != "*") {
    $query = "SELECT * FROM " . $countryBasic . " WHERE adm1='" . $adm1selectedValue . "' AND adm3='" . $adm3selectedValue . "' AND adm2='" . $adm2selectedValue . "' LIMIT $rowsPerPage OFFSET $offset";
    $totalRowsQuery = "SELECT COUNT(*) FROM " . $countryBasic . " WHERE adm1='" . $adm1selectedValue . "' AND adm3='" . $adm3selectedValue . "' AND adm2='" . $adm2selectedValue . "'";
}

elseif ($adm2selectedValue != '*' & $adm1selectedValue == "*" & $adm3selectedValue == "*") {
    $query = "SELECT * FROM " . $countryBasic . " WHERE adm2='" . $adm2selectedValue . "' LIMIT $rowsPerPage OFFSET $offset";
    $totalRowsQuery = "SELECT COUNT(*) FROM " . $countryBasic . " WHERE adm2='" . $adm2selectedValue . "'";
}

$result = pg_query($con, $query);


$tableData = "";


$tableData .= "<thead>
    <tr>
        <th>Geo ID</th>
        <th>School Name</th>
        <th>Address</th>
        <th>ADM1</th>
        <th>ADM2</th>
        <th>ADM3</th>
    </tr>
</thead>
<tbody>";

/*onclick="redirectToSchool('<?= htmlspecialchars($row['geo_id']) ?>'*/

while ($row = pg_fetch_assoc($result)) {
    $tableData .= "<tr>";
    $tableData .= "<td onclick='redirectToSchool(\"" . htmlspecialchars($row['geo_id']) . "\")'>" . htmlspecialchars($row['geo_id']) . "</td>";
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


$range = 5;  // Number of pages to show before and after the current page
$start = max(1, $page - $range);
$end = min($totalPages, $page + $range);

$pagem1 = $page - 1;
$pagep1 = $page + 1;

// Generate pagination links and store in a variable
$paginationLinks = "";
if ($page > 1) {
    $paginationLinks .= "<button onclick='setFiltersAndRefreshTable(" . $pagem1 . ")'>&laquo</button>";
}
for ($i = $start; $i <= $end; $i++) {
    if ($i == $page) {
        $paginationLinks .= "<button style='font-weight: bold' onclick='setFiltersAndRefreshTable(" . $i . ")'>" . $i . "</button> ";
    } else {
        $paginationLinks .= "<button onclick='setFiltersAndRefreshTable(" . $i . ")'>" . $i . "</button> ";
    }
}
if ($page < $totalPages) {
    $paginationLinks .= "<button onclick='setFiltersAndRefreshTable(" . $pagep1 . ")'>&raquo</button>";
}







// Return both parts as a JSON object
$response = array(
    "message" => $message,
    "table" => $tableData,
    "pagination" => $paginationLinks
);

echo json_encode($response);

// Close the database conne
