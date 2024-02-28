<?php
// Include the database configuration
require_once "config.php";

// Query to select all records from the table utenti
$sql = "SELECT * FROM utenti";
$result = $mysqli->query($sql);

// Define the CSV file name
$csv_file = 'utenti.csv';

// Open the CSV file for writing
$fp = fopen($csv_file, 'w');

// Write the header row to the CSV file
$fields = ['id', 'nome', 'cognome'];
fputcsv($fp, $fields);

// Write data rows to the CSV file
while ($row = $result->fetch_assoc()) {
    fputcsv($fp, $row);
}

// Close the CSV file
fclose($fp);

echo "Table exported to CSV successfully.";
?>