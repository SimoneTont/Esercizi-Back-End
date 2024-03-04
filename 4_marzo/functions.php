<?php
// Tutti i Dvd
$result = $mysqli->query("SELECT COUNT(*) AS total FROM dvds");
$row = $result->fetch_assoc();
$dvdTotali = $row['total'];
// Tutti i Libri
$result = $mysqli->query("SELECT COUNT(*) AS total FROM libri");
$row = $result->fetch_assoc();
$libriTotali = $row['total'];
// Dvd prestati
$result = $mysqli->query("SELECT COUNT(*) AS prestati FROM dvds WHERE prestito = 1");
$row = $result->fetch_assoc();
$dvdPrestati = $row['prestati'];
// Libri prestati
$result = $mysqli->query("SELECT COUNT(*) AS prestati FROM libri WHERE prestito = 1");
$row = $result->fetch_assoc();
$libriPrestati = $row['prestati'];
// Nuovo libro
if (isset($_POST['aggiungiLibro'])) {
    $titolo = $_POST['titoloLibro'];
    $autore = $_POST['autoreLibro'];
    $annoPubblicazione = $_POST['annoPubblicazioneLibro'];
    $sql = "INSERT INTO libri (titolo, autore, anno_pubblicazione) VALUES ('$titolo', '$autore', $annoPubblicazione)";
    if (!$mysqli->query($sql)) {
        die($mysqli->error);
    }
    echo "<p>Nuovo libro aggiunto: $titolo</p>";
    $libriTotali++;
}
// Nuovo dvd
if (isset($_POST['aggiungiDvd'])) {
    $titolo = $_POST['titoloDvd'];
    $regista = $_POST['registaDvd'];
    $annoPubblicazione = $_POST['annoPubblicazioneDvd'];
    $sql = "INSERT INTO dvds (titolo, regista, anno_pubblicazione) VALUES ('$titolo', '$regista', $annoPubblicazione)";
    if (!$mysqli->query($sql)) {
        die($mysqli->error);
    }
    echo "<p>Nuovo DVD aggiunto: $titolo</p>";

    $dvdTotali++;
}

$totali = $libriTotali + $dvdTotali;
$prestati = $dvdPrestati + $libriPrestati;
$attuali = $totali - $prestati;
