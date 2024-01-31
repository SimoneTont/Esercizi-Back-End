<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <?php
    setlocale(LC_TIME, "it_IT");
    echo '<p>' . "Today is " . date("l, d F Y") . '<br></p>';
    ?>
    <?php
    $arr1 = [];
    $arr2 = [];
    $arr3 = [];
    $arr4 = [];
    $arr5 = [];

    $arr1 = array('Articuno', 'Zapdos', 'Moltres');
    $arr2 = array('Suicune', 'Raikou', 'Entei');
    $arr3 = array('Groudon', 'Kyogre', 'Rayquaza');
    $arr4 = array('Dialga', 'Palkia', 'Giratina');
    $arr5 = array('Mesprit', 'Uxie', 'Azelf');

    echo '<div class="m-5">';
    echo '<p class="h2">' . 'Birds' . '<br></p>';
    foreach ($arr1 as $key => $value) {
        echo '<p>' . $value . '<br></p>';
    }
    echo '</div>';
    echo '<div class="m-5">';
    echo '<p class="h2">' . 'Dogs' . '<br></p>';
    foreach ($arr2 as $key => $value) {
        echo '<p>' . $value . '<br></p>';
    }
    echo '</div>';
    echo '<div class="m-5">';
    echo '<p class="h2">' . 'Meteo' . '<br></p>';
    foreach ($arr3 as $key => $value) {
        echo '<p>' . $value . '<br></p>';
    }
    echo '</div>';
    echo '<div class="m-5">';
    echo '<p class="h2">' . 'Creation' . '<br></p>';
    foreach ($arr4 as $key => $value) {
        echo '<p>' . $value . '<br></p>';
    }
    echo '</div>';
    echo '<div class="m-5">';
    echo '<p class="h2">' . 'Lake Guardians' . '<br></p>';
    foreach ($arr5 as $key => $value) {
        echo '<p>' . $value . '<br></p>';
    }
    echo '</div>';

    $bigArr =(array_merge($arr1,$arr2,$arr3,$arr4,$arr5));

    /* echo '<div class="m-5">';
    echo '<p class="h2">' . 'bigArr' . '<br></p>';
    foreach ($bigArr as $key => $value) {
        echo '<p>' . $value . '<br></p>';
    }
    echo '</div>'; */

    $randomMatch=array_rand($bigArr, 2);

    echo '<div class="m-5">';
    echo '<p class="h2">' . 'Random match' . '<br></p>';
    echo '<p>' . $bigArr[$randomMatch[0]] . ' vs ' . $bigArr[$randomMatch[1]] . '<br></p>';
    echo '</div>';
    ?>

    <?php
        
    ?>
</body>

</html>