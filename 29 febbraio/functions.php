<?php

function handleRegisterFormSubmission($mysqli)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['language'])) {
        //Controlla contenuto del form (Nessun campo vuoto)
        $username = $_POST['username'];
        $password = $_POST['password'];
        $language = $_POST['language'];

        if (!empty($username) && !empty($password)) {
            // Cripta la password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Controlla che il valore inserito non sia vuoto
            $stmt = $mysqli->prepare("INSERT INTO utenti (username, password, language) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $hashedPassword, $language);
            $stmt->execute();
            $stmt->close();

            // Redirezione alla pagina di login dopo la registrazione
            header('Location: login.php');
            exit();
        }
    }
}

function deleteUser($mysqli, $userId)
{
    $deleteSql = "DELETE FROM utenti WHERE id = ?";
    $stmt = $mysqli->prepare($deleteSql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->close();
}

function handleLoginFormSubmission($mysqli)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['loginUsername']) && isset($_POST['loginPassword'])) {
        $username = $_POST['loginUsername'];
        $password = $_POST['loginPassword'];

        $sql = "SELECT * FROM utenti WHERE username = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                // Login successful
                session_start();
                $_SESSION['userLogin'] = $username;
                $_SESSION['userLanguage'] = $row['language'];
                header('Location: index.php');
                exit();
            } else {
                // Incorrect password
                echo "Login failed. Incorrect password.";
            }
        } else {
            // User not found
            echo "Login failed. User not found.";
        }

        $stmt->close();
    }
}

function generateText($textType, $userLanguage, $userName)
{
    $text = "";

    switch ($textType) {
        case 'home':
            if ($userLanguage === 'italian') {
                $text = "Pagina Principale";
            } elseif ($userLanguage === 'french') {
                $text = "Page d'accueil";
            } else {
                $text = "Home Page";
            }
            break;
        case 'greeting':
            if ($userLanguage === 'italian') {
                $text = "Benvenuto, $userName!";
            } elseif ($userLanguage === 'french') {
                $text = "Bienvenue, $userName!";
            } else {
                $text = "Welcome, $userName!";
            }
            break;
        default:
            break;
    }

    return $text;
}
