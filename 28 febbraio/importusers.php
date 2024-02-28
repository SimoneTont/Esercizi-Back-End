<?php
// Include the database configuration
require_once "config.php";

// Function to import data from CSV file
function importDataFromCSV($mysqli, $csvFile) {
    // Open the CSV file for reading
    $fp = fopen($csvFile, 'r');

    // Ignore the header row
    fgetcsv($fp);

    // Prepare the SQL statement for inserting data
    $stmt = $mysqli->prepare("INSERT INTO utenti (id, nome, cognome) VALUES (?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("iss", $id, $nome, $cognome);

    // Read data from CSV and insert into database
    while (($data = fgetcsv($fp)) !== false) {
        list($id, $nome, $cognome) = $data;
        
        // Check if record with the same primary key already exists
        $check_sql = "SELECT id FROM utenti WHERE id = ?";
        $check_stmt = $mysqli->prepare($check_sql);
        $check_stmt->bind_param("i", $id);
        $check_stmt->execute();
        $check_stmt->store_result();
        
        if ($check_stmt->num_rows == 0) {
            // Insert the record if it doesn't already exist
            $stmt->execute();
        } else {
            echo "Skipping duplicate entry for ID: $id<br>";
        }
        
        // Close the check statement
        $check_stmt->close();
    }

    // Close the CSV file and prepared statement
    fclose($fp);
    $stmt->close();

    echo "Data imported from CSV successfully.";
}

// Import data from CSV file
importDataFromCSV($mysqli, 'utenti.csv');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>User List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Cognome</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM utenti";
                $result = $mysqli->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['nome']}</td>";
                    echo "<td>{$row['cognome']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
