<?php
$db_name = 'esercizio_1_marzo';
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

$sql = "CREATE TABLE IF NOT EXISTS utenti(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        language VARCHAR(255) NOT NULL 
    )"; 
if (!$mysqli->query($sql)) {
    die($mysqli->error);
}

$sql = "CREATE TABLE IF NOT EXISTS Form_Data(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        age INT,
        description VARCHAR(255) NOT NULL,
        like_website ENUM('yes', 'no')
    )"; 
if (!$mysqli->query($sql)) {
    die($mysqli->error);
}

?>
