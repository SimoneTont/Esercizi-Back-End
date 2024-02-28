<?php
require_once "config.php";

function handleFormSubmission($mysqli) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $cognome = isset($_POST['cognome']) ? $_POST['cognome'] : '';

        $stmt = $mysqli->prepare("INSERT INTO utenti (nome, cognome) VALUES (?, ?)");
        $stmt->bind_param("ss", $nome, $cognome);
        if ($stmt->execute()) {
            echo "Data inserted successfully.";
        } else {
            echo "Error inserting data: " . $stmt->error;
        }
    }
}

require_once "config.php";

function showUsers($mysqli) {
    $sql = "SELECT * FROM utenti";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table'>";
        echo "<thead><tr><th>ID</th><th>Nome</th><th>Cognome</th></tr></thead>";
        echo "<tbody>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['id']}</td><td>{$row['nome']}</td><td>{$row['cognome']}</td></tr>";
        }
        
        echo "</tbody></table>";
    } else {
        echo "No users found.";
    }
}

?>
