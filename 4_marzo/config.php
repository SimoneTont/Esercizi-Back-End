<?php
$db_name = 'esercizio_4_marzo';
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

$sql = "CREATE DATABASE IF NOT EXISTS $db_name";
if (!$mysqli->query($sql)) {
    die($mysqli->error);
}
$mysqli->query('USE ' . $db_name);

$sql = "CREATE TABLE IF NOT EXISTS libri (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titolo VARCHAR(255) NOT NULL,
    autore VARCHAR(255) NOT NULL,
    anno_pubblicazione INT NOT NULL,
    prestito TINYINT(1) DEFAULT 0
)";
if (!$mysqli->query($sql)) {
    die($mysqli->error);
}

$sql = "CREATE TABLE IF NOT EXISTS dvds (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titolo VARCHAR(255) NOT NULL,
    regista VARCHAR(255) NOT NULL,
    anno_pubblicazione INT NOT NULL,
    prestito TINYINT(1) DEFAULT 0
)";
if (!$mysqli->query($sql)) {
    die($mysqli->error);
}
