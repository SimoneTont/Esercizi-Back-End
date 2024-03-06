<?php

//use Materiale\MaterialeBibliotecario;

require_once 'classes/materiale.php';
require_once 'config.php';
require_once 'functions.php';
interface Prestito
{
    public function presta();
    public function restituisci();
}

class Dvd implements Prestito
{
    public function presta()
    {
        global $mysqli;
        $result = $mysqli->query("SELECT id FROM dvds WHERE prestito = 0 LIMIT 1");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id = $row['id'];
            $sql = "UPDATE dvds SET prestito = 1 WHERE id = $id";
            if (!$mysqli->query($sql)) {
                return 'Errore durante il prestito del DVD.';
            }
            else
            {
                return 'DVD prestato.';
            }
        } else {
            return 'Non ci sono DVD disponibili per il prestito.';
        }
    }

    public function restituisci()
    {
        global $mysqli;
        $result = $mysqli->query("SELECT id FROM dvds WHERE prestito = 1 LIMIT 1");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id = $row['id'];
            $sql = "UPDATE dvds SET prestito = 0 WHERE id = $id";
            if (!$mysqli->query($sql)) {
                return 'Errore durante la restituzione del DVD.';
            }
            return 'DVD restituito.';
        } else {
            return 'Non ci sono DVD da restituire.';
        }
    }
}

class Libro implements Prestito
{
    public function presta()
    {
        global $mysqli;
        $result = $mysqli->query("SELECT id FROM libri WHERE prestito = 0 LIMIT 1");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id = $row['id'];
            $sql = "UPDATE libri SET prestito = 1 WHERE id = $id";
            return 'Libro prestato.';
        } else {
            return 'Non ci sono libri disponibili per il prestito.';
        }
    }

    public function restituisci()
    {
        global $mysqli;
        $result = $mysqli->query("SELECT id FROM libri WHERE prestito = 1 LIMIT 1");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id = $row['id'];
            $sql = "UPDATE libri SET prestito = 0 WHERE id = $id";
            return 'Libro restituito.';
        } else {
            return 'Non ci sono libri da restituire.';
        }
    }
}

if (isset($_POST['prestaDvd'])) {
    $Dvd = new Dvd();
    echo $Dvd->presta();
    $dvdPrestati++;
}
if (isset($_POST['restituisciDvd'])) {
    $Dvd = new Dvd();
    echo $Dvd->restituisci();
    $dvdPrestati--;
    if ($dvdPrestati < 0) {
        $dvdPrestati = 0;
    }
}
if (isset($_POST['prestaLibro'])) {
    $Libro = new Libro();
    echo $Libro->presta();
    $libriPrestati++;
}
if (isset($_POST['restituisciLibro'])) {
    $Libro = new Libro();
    echo $Libro->restituisci();
    $libriPrestati--;
    if ($libriPrestati < 0) {
        $libriPrestati = 0;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="http://localhost/4_marzo/" method="get">
        <button type="submit">Ricarica</button>
    </form>

    <h1>Biblioteca</h1>

    <h2>Aggiungi un nuovo libro</h2>
    <form action="" method="post">
        <label for="titoloLibro">Titolo:</label>
        <input type="text" id="titoloLibro" name="titoloLibro">
        <label for="autoreLibro">Autore:</label>
        <input type="text" id="autoreLibro" name="autoreLibro">
        <label for="annoPubblicazioneLibro">Anno Pubblicazione:</label>
        <input type="number" id="annoPubblicazioneLibro" name="annoPubblicazioneLibro">
        <button type="submit" name="aggiungiLibro">Aggiungi Libro</button>
    </form>

    <h2>Aggiungi un nuovo DVD</h2>
    <form action="" method="post">
        <label for="titoloDvd">Titolo:</label>
        <input type="text" id="titoloDvd" name="titoloDvd">
        <label for="registaDvd">Regista:</label>
        <input type="text" id="registaDvd" name="registaDvd">
        <label for="annoPubblicazioneDvd">Anno Pubblicazione:</label>
        <input type="number" id="annoPubblicazioneDvd" name="annoPubblicazioneDvd">
        <button type="submit" name="aggiungiDvd">Aggiungi DVD</button>
    </form>

    <form action="" method="post">
        <button type="submit" name="prestaDvd">Chiedi in prestito un Dvd</button>
        <button type="submit" name="restituisciDvd">Restituisci un Dvd</button>
    </form>
    <form action="" method="post">
        <button type="submit" name="prestaLibro">Chiedi in prestito un libro</button>
        <button type="submit" name="restituisciLibro">Restituisci un libro</button>
    </form>

    <?php
    echo '<p>Materiale totale: ' . $totali . '</p>';
    echo '<p>Dvd totali: ' . $dvdTotali . '</p>';
    echo '<p>Libri totali: ' . $libriTotali . '</p>';
    echo '<p>Dvd Prestati: ' . $dvdPrestati . '</p>';
    echo '<p>Libri Prestati: ' . $libriPrestati . '</p>';
    echo '<p>Attualmente in biblioteca: ' . $attuali . '</p>';
    echo '<p>Prestiti totali: ' . $prestati . '</p>';
    //echo '<p> UserCount: '. MaterialeBibliotecario::contatoreMateriali() .'</p>';
    ?>
</body>

</html>