<?php
session_start();
require_once 'functions.php';
require_once 'config.php';
require_once 'form.php';

// Carica le informazioni dell'utente
if(isset($_SESSION['userLogin']) && isset($_SESSION['userLanguage'])) {
    $userLanguage = $_SESSION['userLanguage'];
    $userName = $_SESSION['userLogin'];

    // Genera il testo in base alla lingua
    $pageTitle = generateText('home', $userLanguage, $userName);
    $greeting = generateText('greeting', $userLanguage, $userName);
} else {
    // Reindirizza al login se non è stato effettuato l'accesso
    header('Location: http://localhost/1_marzo/login.php');
    exit();
}

// Crea un'istanza della classe Form
$form = new Form("", "", "", $mysqli, $userLanguage);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar w/ text</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.html"><?php echo $pageTitle; ?></a>
              </li>
            </ul>
            <span class="navbar-text">
                <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
            </span>
          </div>
        </div>
    </nav>
    <div class="container">
        <h1 class="text-center"><?php echo $greeting; ?></h1>
        
        <?php echo $form->render($userLanguage); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
