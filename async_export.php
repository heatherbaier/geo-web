<?php

include 'includes/config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$data = unserialize($argv[1]);
$userEmail = $data['email'];
$filters = $data['filters'];


$message = "test";

global $con;

$countries = ['tan', 'bhr']; // Example array of selected countries

// Step 2: Check for Table Existence
$existingPersonnelTables = [];
foreach ($countries as $country) {
    $tableName = $country . '_personnel';
    // Query to check if table exists
    $query = "SELECT to_regclass('public." . $tableName . "')";
    $result = pg_query($con, $query);
    if ($result && pg_fetch_result($result, 0, 0)) {
        $existingPersonnelTables[] = $tableName;
    }
}


$queries = [];
foreach ($countries as $country) {
    $basicTable = $country . "_geo";
    $personnelTable = $country . "_personnel";

    if (in_array($personnelTable, $existingPersonnelTables)) {
        // If personnel table exists, perform a LEFT JOIN
        $queries[] = "SELECT b.*, p.* FROM " . $basicTable . " b LEFT JOIN " . $personnelTable . " p ON b.geo_id = p.geo_id";
    } else {
        // If no personnel table, just select from the basic table
        $queries[] = "SELECT * FROM " . $basicTable;
    }
}


// METHOD TO ATTEMPT TO SAVE MEMORY
$csvFilename = 'data.csv';
$fp = fopen($csvFilename, 'w');
// Optional: Write headers to the CSV file
//fputcsv($fp, ['Column1', 'Column2', ...]); // Adjust the headers according to your data

$chunkSize = 1000; // Define the number of rows to process at a time

foreach ($queries as $baseQuery) {
    $offset = 0;

    while (true) {
        // Append LIMIT and OFFSET to the base query
        $queryWithLimit = $baseQuery . " LIMIT $chunkSize OFFSET $offset";
        $result = pg_query($con, $queryWithLimit);

        $rowCount = 0;
        while ($row = pg_fetch_assoc($result)) {
            fputcsv($fp, $row); // Write each row directly to the CSV file
            $rowCount++;
        }

        if ($rowCount < $chunkSize) {
            // Break out of the loop if the number of rows fetched is less than the chunk size
            break;
        }

        $offset += $chunkSize; // Increase the offset for the next chunk
    }
}

fclose($fp);

$metadataFilename = 'metadata.txt';
file_put_contents($metadataFilename, "Your metadata here");


$zipFilename = 'export.zip';
$zip = new ZipArchive();
if ($zip->open($zipFilename, ZipArchive::CREATE) === TRUE) {
    // Add CSV, metadata, and shapefile to the zip
    $zip->addFile($csvFilename);
    $zip->addFile($metadataFilename);
    // Close and save the archive
    $zip->close();
} else {
    $message = "Failed!";
}





require 'vendor/autoload.php';
$mail = new PHPMailer(true);
try {

    // Server settings
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";

    $mail->SMTPDebug  = 1;
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = "globaledobservatory@gmail.com";
    $mail->Password   = "gmlm kkez vupo bjhy";

    // Recipients
    $mail->setFrom('globaledobservatory@gmail.com', 'Mailer'); // Sender's email address
    $mail->addAddress('hbaier20@gmail.com', 'Recipient Name'); // Recipient's email address

    // Attachments
    $mail->addAttachment($zipFilename); // Attach the ZIP file

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

    $mail->send();
    echo 'Message has been sent';

} catch (Exception $e) {

    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}
