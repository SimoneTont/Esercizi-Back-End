<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    setlocale(LC_TIME, "it_IT");
    echo '<p>' . "Today is " . date("l, d F Y") . '</p>';
    ?>
    <?php

    $arr1 = array('https://archives.bulbagarden.net/media/upload/d/d0/0144Articuno.png', 'https://archives.bulbagarden.net/media/upload/c/c6/0145Zapdos.png', 'https://archives.bulbagarden.net/media/upload/2/21/0146Moltres.png');
    $arr2 = array('https://archives.bulbagarden.net/media/upload/d/dc/0245Suicune.png', 'https://archives.bulbagarden.net/media/upload/4/48/0243Raikou.png', 'https://archives.bulbagarden.net/media/upload/2/2b/0244Entei.png');
    $arr3 = array('https://archives.bulbagarden.net/media/upload/2/28/0383Groudon.png', 'https://archives.bulbagarden.net/media/upload/5/51/0382Kyogre.png', 'https://archives.bulbagarden.net/media/upload/8/80/0384Rayquaza.png');
    $arr4 = array('https://archives.bulbagarden.net/media/upload/4/43/0483Dialga.png', 'https://archives.bulbagarden.net/media/upload/b/b7/0484Palkia.png', 'https://archives.bulbagarden.net/media/upload/8/81/0487Giratina.png');
    $arr5 = array('https://archives.bulbagarden.net/media/upload/2/24/0481Mesprit.png', 'https://archives.bulbagarden.net/media/upload/1/18/0480Uxie.png', 'https://archives.bulbagarden.net/media/upload/a/ac/0482Azelf.png');

    echo '<p class="h2 text-center ">' . 'Birds' . '</p>';
    echo '<div class="d-flex justify-content-center">';
    echo '<div class="m-5 d-flex">';
    foreach ($arr1 as $key => $value) {
        echo '<p><img class="myImg" src="' . $value . '"/></p>';
    }
    echo '</div>';
    echo '</div>';

    echo '<p class="h2 text-center ">' . 'Dogs' . '</p>';
    echo '<div class="d-flex justify-content-center">';
    echo '<div class="m-5 d-flex">';
    foreach ($arr2 as $key => $value) {
        echo '<p><img class="myImg" src="' . $value . '"/></p>';
    }
    echo '</div>';
    echo '</div>';

    echo '<p class="h2 text-center ">' . 'Meteo' . '</p>';
    echo '<div class="d-flex justify-content-center">';
    echo '<div class="m-5 d-flex">';
    foreach ($arr3 as $key => $value) {
        echo '<p><img class="myImg" src="' . $value . '"/></p>';
    }
    echo '</div>';
    echo '</div>';

    echo '<p class="h2 text-center ">' . 'Creation' . '</p>';
    echo '<div class="d-flex justify-content-center">';
    echo '<div class="m-5 d-flex">';
    foreach ($arr4 as $key => $value) {
        echo '<p><img class="myImg" src="' . $value . '"/></p>';
    }
    echo '</div>';
    echo '</div>';

    echo '<p class="h2 text-center ">' . 'Lake Guardians' . '</p>';
    echo '<div class="d-flex justify-content-center">';
    echo '<div class="m-5 d-flex">';
    foreach ($arr5 as $key => $value) {
        echo '<p><img class="myImg" src="' . $value . '"/></p>';
    }
    echo '</div>';
    echo '</div>';

    $bigArr =(array_merge($arr1,$arr2,$arr3,$arr4,$arr5));

    $randomMatch=array_rand($bigArr, 2);

    echo '<p class="h2 text-center">' . 'Random match' . '</p>';
    echo '<div class="m-5 d-flex justify-content-center align-items-center">';
    
    echo '<img class="myImg" src="' . $bigArr[$randomMatch[0]] . '"/>';
    echo '<p class ="h1"> VS </p>';
    echo '<img class="myImg" src="' . $bigArr[$randomMatch[1]] . '"/>';
    echo '</div>';
    ?>

    <?php
        
    ?>
</body>

</html>