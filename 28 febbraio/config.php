<?php

$config = [
    'mysql_host' => 'localhost',
    'mysql_user' => 'root',
    'mysql_password' => ''
];

$mysqli = new mysqli(
    $config['mysql_host'],
    $config['mysql_user'],
    $config['mysql_password']
);

if ($mysqli->connect_error) {
    die($mysqli->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS esercizio_28_feb";
if (!$mysqli->query($sql)) {
    die($mysqli->error);
}
$mysqli->query('USE esercizio_28_feb;');

$sql = "CREATE TABLE IF NOT EXISTS utenti(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        nome VARCHAR(255) NOT NULL,
        cognome VARCHAR(255) NOT NULL
    )"; 
if (!$mysqli->query($sql)) {
    die($mysqli->error);
}

?>
