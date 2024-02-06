<?php
// start_export.php


$isos = $_POST['isos'];
$indicators = $_POST['indicators'];


//$countryISO = isset($_GET['iso']) ? filter_var($_GET['iso'], FILTER_SANITIZE_STRING) : '';

echo "COUNTRIES ARE: " . $isos;
echo "TYPE IS :" . gettype($isos);


// Collect necessary data, like user email, filter criteria, etc.
$userEmail = 'hmbaier@wm.edu'; // User's email to send notification
$filters = ['isos' => $isos, 'indicators' => $indicators]; // Example filters

// Serialize data to pass to the background script
$serializedData = escapeshellarg(serialize(['email' => $userEmail, 'filters' => $filters]));

// Start the export process in the background
$command = "php exportData.php $serializedData > /dev/null 2>&1 &";
exec($command);

echo "Export started. You will be notified by email once it is complete.";
