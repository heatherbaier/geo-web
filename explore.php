<?php include 'includes/config.php' ?>
<?php include 'includes/head.php' ?>

<script src="js/school_redirect.js"></script>

<style>
    .page-layout {
        display: flex;
        flex-wrap: nowrap;
        justify-content: space-between;
        padding: 20px;
    }

    .filter-bar {
        flex: 0 0 30%; /* Filter bar takes up 30% of the page width */
        margin-right: 20px;
        border: 1px solid #ddd;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 5px;
    }

    .data-display {
        flex: 1; /* Data list takes up the remaining space */
    }

    .data-card {
        border: 1px solid #ddd;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 5px;
        background-color: #fff;
    }

    .data-card h4 {
        color: #6495ED;
    }

    .data-card p {
        margin: 0;
        padding: 10px 0;
    }

    .btn-primary {
        /*border-color: #6495ED;*/
        /*border-width: 10px;*/
        /*background-color: #900D13;*/
        color: #0047AB;
        border: none;
    }
    .pagination {
        display: flex;
        justify-content: center; /* Center the pagination */
        margin-top: 20px;
    }

    .pagination li {
        display: inline-block;
        padding: 10px
    }

    .page-item.active .page-link {
        background-color: #900D13;
        border-color: #900D13;
    }



</style>

<?php
// Get the country code from the URL, e.g., bgd for Bangladesh
$country = isset($_GET['country']) ? pg_escape_string($con, $_GET['country']) : '';

// Get filter values from URL parameters
$adm1 = isset($_GET['adm1']) ? pg_escape_string($con, $_GET['adm1']) : '';
$adm2 = isset($_GET['adm2']) ? pg_escape_string($con, $_GET['adm2']) : '';
$adm3 = isset($_GET['adm3']) ? pg_escape_string($con, $_GET['adm3']) : '';

// Get the current page number from URL, default to page 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 10; // Number of results per page
$offset = ($page - 1) * $perPage;

// If no country is provided, display an error
if (empty($country)) {
    echo "<p>Error: No country specified.</p>";
    exit;
}

// Dynamically determine the table name based on the country code
$table_name = strtolower($country); // Assuming table names are lowercase ISO codes

// Check if the table for the country exists
$check_table_query = "SELECT to_regclass('public.$table_name')";
$table_exists = pg_fetch_result(pg_query($con, $check_table_query), 0, 0);

if (!$table_exists) {
    echo "<p>Error: No data available for the selected country.</p>";
    exit;
}

// Query to get unique non-empty values for adm1, adm2, and adm3, alphabetically sorted
$unique_adm1_query = "SELECT DISTINCT adm1 FROM $table_name WHERE adm1 IS NOT NULL AND TRIM(adm1) != '' ORDER BY adm1 ASC";
$unique_adm2_query = "SELECT DISTINCT adm2 FROM $table_name WHERE adm2 IS NOT NULL AND TRIM(adm2) != '' ORDER BY adm2 ASC";
$unique_adm3_query = "SELECT DISTINCT adm3 FROM $table_name WHERE adm3 IS NOT NULL AND TRIM(adm3) != '' ORDER BY adm3 ASC";

$adm1_options = pg_query($con, $unique_adm1_query);
$adm2_options = pg_query($con, $unique_adm2_query);
$adm3_options = pg_query($con, $unique_adm3_query);

// Construct the base query for filters
$query = "SELECT * FROM $table_name WHERE 1=1";

// Add filters to the query if they are set
if (!empty($adm1)) {
    $query .= " AND adm1 = '$adm1'";
}
if (!empty($adm2)) {
    $query .= " AND adm2 = '$adm2'";
}
if (!empty($adm3)) {
    $query .= " AND adm3 = '$adm3'";
}

// Query to get the total number of records (for pagination)
$totalQuery = pg_query($con, str_replace("*", "COUNT(*) as total", $query));
$totalResults = pg_fetch_assoc($totalQuery)['total'];
$totalPages = ceil($totalResults / $perPage);

// Sort the results alphabetically by `school_name`
$query .= " ORDER BY school_name ASC";

// Add pagination (LIMIT and OFFSET) to the query
$query .= " LIMIT $perPage OFFSET $offset";

// Execute the paginated query
$result = pg_query($con, $query);

// If the query fails, display an error
if (!$result) {
    echo "<p>Error: Failed to retrieve data for $country.</p>";
    exit;
}
?>

<body>
    <link rel="stylesheet" href="./style.css" />
    <link href="./index.css" rel="stylesheet" />
    <?php include 'includes/header.php' ?>

<div class="page-layout">
    <!-- Filter Bar -->
    <div class="filter-bar">
        <h4>Filter Schools</h4>
        <form action="explore.php" method="get">
            <!-- Keep the country in the URL -->
            <input type="hidden" name="country" value="<?php echo htmlspecialchars($country); ?>">

            <!-- adm1 Filter -->
            <div class="form-group">
                <label for="adm1">Admin Level 1</label>
                <select name="adm1" id="adm1" class="form-control">
                    <option value="">All</option> <!-- Default "All" option at the top -->
                    <?php while ($row = pg_fetch_assoc($adm1_options)) { ?>
                        <option value="<?php echo htmlspecialchars($row['adm1']); ?>" <?php if ($adm1 == $row['adm1']) echo 'selected'; ?>>
                            <?php echo htmlspecialchars($row['adm1']); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <!-- adm2 Filter -->
            <div class="form-group">
                <label for="adm2">Admin Level 2</label>
                <select name="adm2" id="adm2" class="form-control">
                    <option value="">All</option> <!-- Default "All" option at the top -->
                    <?php while ($row = pg_fetch_assoc($adm2_options)) { ?>
                        <option value="<?php echo htmlspecialchars($row['adm2']); ?>" <?php if ($adm2 == $row['adm2']) echo 'selected'; ?>>
                            <?php echo htmlspecialchars($row['adm2']); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <!-- adm3 Filter -->
            <div class="form-group">
                <label for="adm3">Admin Level 3</label>
                <select name="adm3" id="adm3" class="form-control">
                    <option value="">All</option> <!-- Default "All" option at the top -->
                    <?php while ($row = pg_fetch_assoc($adm3_options)) { ?>
                        <option value="<?php echo htmlspecialchars($row['adm3']); ?>" <?php if ($adm3 == $row['adm3']) echo 'selected'; ?>>
                            <?php echo htmlspecialchars($row['adm3']); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <!-- Filter Button -->
            <button type="submit" class="btn btn-primary">Apply Filters</button>
        </form>
    </div>

    <!-- Data Display -->
    <div class="data-display">
        <div class="row">
            <?php while ($row = pg_fetch_assoc($result)) { ?>
                <div class="col-md-6 col-lg-4">
                    <div class="data-card">
                        <h4><?php echo htmlspecialchars($row['school_name']); ?></h4>
                        <div class="row">
                            <div class="col-12">
                                <p><strong>Admin 1:</strong> <?php echo htmlspecialchars($row['adm1']); ?> |
                                    <strong>Admin 2:</strong> <?php echo htmlspecialchars($row['adm2']); ?> |
                                    <strong>Admin 3:</strong> <?php echo htmlspecialchars($row['adm3']); ?></p>
                            </div>
                        </div>

<!--                        $tableData .= "<td onclick='redirectToSchool(\"" . htmlspecialchars($row['geo_id']) . "\")'>" . htmlspecialchars($row['geo_id']) . "</td>";-->

<!--                        onclick = redirectToSchool(\"" . htmlspecialchars($row['geo_id']) . "\")'-->

                            <a href="#" onclick="redirectToSchool('<?php echo htmlspecialchars($row['geo_id']); ?>', '<?php echo htmlspecialchars($country); ?>')" class="btn btn-primary">View School Profile</a>

<!--                        <a href="school_profile.php?id=--><?php //echo htmlspecialchars($row['id']); ?><!--" class="btn btn-primary">View School Profile</a>-->
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- Pagination Section -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php
                // Determine the range of pages to show
                $maxVisiblePages = 8; // Maximum number of pages to show
                $startPage = max(1, $page - floor($maxVisiblePages / 2));
                $endPage = min($totalPages, $startPage + $maxVisiblePages - 1);

                // Adjust startPage if we're close to the end of the page range
                if ($endPage - $startPage + 1 < $maxVisiblePages) {
                    $startPage = max(1, $endPage - $maxVisiblePages + 1);
                }

                // Show previous arrow
                if ($page > 1) { ?>
                    <li class="page-item">
                        <a class="page-link" href="?country=<?php echo $country; ?>&page=<?php echo $page - 1; ?>&adm1=<?php echo $adm1; ?>&adm2=<?php echo $adm2; ?>&adm3=<?php echo $adm3; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php } ?>

                <!-- Display page links in the defined range -->
                <?php for ($i = $startPage; $i <= $endPage; $i++) { ?>
                    <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                        <a class="page-link" href="?country=<?php echo $country; ?>&page=<?php echo $i; ?>&adm1=<?php echo $adm1; ?>&adm2=<?php echo $adm2; ?>&adm3=<?php echo $adm3; ?>"><?php echo $i; ?></a>
                    </li>
                <?php } ?>

                <!-- Show next arrow -->
                <?php if ($page < $totalPages) { ?>
                    <li class="page-item">
                        <a class="page-link" href="?country=<?php echo $country; ?>&page=<?php echo $page + 1; ?>&adm1=<?php echo $adm1; ?>&adm2=<?php echo $adm2; ?>&adm3=<?php echo $adm3; ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</div>


</body>

<?php
// Include your footer file if needed
include('footer.php');
?>
