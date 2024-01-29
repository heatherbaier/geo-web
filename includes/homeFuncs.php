<?php
function getISOlist() {
    global $con; // Declare $con as a global variable
    $result = pg_query($con, "SELECT table_name FROM information_schema.tables WHERE table_schema='public' AND table_type='BASE TABLE'");
//    $result = pg_fetch_array($result);
//    echo $result;
    // Fetch the table names and extract ISO part
//    global $tables;
    $tables = [];
    while ($row = pg_fetch_assoc($result)) {
//        if ($row['table_name'] !== 'spatial_ref_sys' && strpos($row['table_name'], 'Resource id #5') === false) {
//            echo "<script>console.log('Debug Objects: " . $row['table_name'] . "' );</script>";
            $tables[] = $row['table_name'];
        }
//    }
    return $tables;
}

