<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>Esercizio attività</h1>
        <ul>
<?php

use Illuminate\Support\Facades\Route;

// Creo un gruppo di rotte separate da quelle in web
Route::get('/', function () {

    for ($i = 1; $i <= 10; $i++) {
        echo "<li>Attività $i</li>";
    }
});

Route::get('/elimina', function () {
    return "Attivita' eliminata!";
});

Route::get('/nuova', function () {
    return "Attivita' creata!";
});

Route::get('/modifica', function () {
    return "Attivita' modificata!";
});

Route::get('/dettagli', function () {
    return "Attivita 1
    <br>Durata 1 ora
    <br>Data 01/01/2022
    <br>Riunione serale alle 21:00";
});