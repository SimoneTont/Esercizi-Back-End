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

    <div class="h3 d-flex justify-content-center mt-3">
        <?php
        setlocale(LC_TIME, "it_IT");
        echo '<p>' . "Today is " . date("l, d F Y") . '</p>';
        ?>
    </div>
    <p class="h2 text-center ">Birds</p>';
    <div class="d-flex justify-content-center">';
        <div class="m-5 d-flex">';
            <?php
            $arr = [[], [], [], [], []];
            $arr = array('Birds' => ['https://archives.bulbagarden.net/media/upload/d/d0/0144Articuno.png', 'https://archives.bulbagarden.net/media/upload/c/c6/0145Zapdos.png', 'https://archives.bulbagarden.net/media/upload/2/21/0146Moltres.png'], 
            'Dogs' => ['https://archives.bulbagarden.net/media/upload/d/dc/0245Suicune.png', 'https://archives.bulbagarden.net/media/upload/4/48/0243Raikou.png', 'https://archives.bulbagarden.net/media/upload/2/2b/0244Entei.png'],
            'Meteo' => ['https://archives.bulbagarden.net/media/upload/2/28/0383Groudon.png', 'https://archives.bulbagarden.net/media/upload/5/51/0382Kyogre.png', 'https://archives.bulbagarden.net/media/upload/8/80/0384Rayquaza.png'],
            'Creation' => ['https://archives.bulbagarden.net/media/upload/4/43/0483Dialga.png', 'https://archives.bulbagarden.net/media/upload/b/b7/0484Palkia.png', 'https://archives.bulbagarden.net/media/upload/8/81/0487Giratina.png'],
            'Lake Guardians' => ['https://archives.bulbagarden.net/media/upload/2/24/0481Mesprit.png', 'https://archives.bulbagarden.net/media/upload/1/18/0480Uxie.png', 'https://archives.bulbagarden.net/media/upload/a/ac/0482Azelf.png']);


            foreach ($arr['Birds'] as $key => $value) {
                echo '<p><img class="myImg" src="' . $value . '"/></p>';
            }
            ?>
        </div>';
    </div>';

    <p class="h2 text-center ">Dogs</p>';
    <div class="d-flex justify-content-center">';
        <div class="m-5 d-flex">';
            <?php
            foreach ($arr['Dogs'] as $key => $value) {
                echo '<p><img class="myImg" src="' . $value . '"/></p>';
            }
            ?>
        </div>';
    </div>';

    <p class="h2 text-center ">Meteo</p>';
    <div class="d-flex justify-content-center">';
        <div class="m-5 d-flex">';
            <?php
            foreach ($arr['Meteo'] as $key => $value) {
                echo '<p><img class="myImg" src="' . $value . '"/></p>';
            }
            ?>
        </div>';
    </div>';

    <p class="h2 text-center ">Creation</p>';
    <div class="d-flex justify-content-center">';
        <div class="m-5 d-flex">';
            <?php
            foreach ($arr['Creation'] as $key => $value) {
                echo '<p><img class="myImg" src="' . $value . '"/></p>';
            }
            ?>
        </div>';
    </div>';

    <p class="h2 text-center ">Lake Guardians</p>';
    <div class="d-flex justify-content-center">';
        <div class="m-5 d-flex">';
            <?php
            foreach ($arr['Lake Guardians'] as $key => $value) {
                echo '<p><img class="myImg" src="' . $value . '"/></p>';
            }
            
            ?>
        </div>';
    </div>';

    <p class="h2 text-center">Random match</p>';
    <div class="m-5 d-flex justify-content-center align-items-center">';
        <?php
        $randomGroup = array_rand($arr, 2);
        $randomSelector = rand(0,2);
        echo '<img class="myImg" src="' . $arr[$randomGroup[0]][$randomSelector] . '"/>';
        $randomSelector = rand(0,2);
        echo '<p class ="h1"> VS </p>';
        echo '<img class="myImg" src="' . $arr[$randomGroup[1]][$randomSelector] . '"/>';
        ?>
    </div>
</body>

</html>