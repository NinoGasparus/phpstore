<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cvetiličarna Celeja</title>
    <link rel="stylesheet" href="./css/styles.css">

    <script src="./skripte/pokaziKosarico.js"></script>
    <script src="./skripte/addToBasket.js"></script>
    <script src="./skripte/ostalo.js"></script>
</head>

<body>
   
    <?php
    include "./komponente/glava.php";
    glava();
    ?>

    <?php
    $req = $_POST;
    echo "
    <div id='telo'>
        <div id='filtri'>
            
        </div>
        
        <div id='main'><h1> Naročilo uspešno oddano!</h1>
            <br>
            <h3> Ogledate si ga lahko v zgodovini naročil.</h3>
        </div>

        <div id='add'>
            <a href='https://raidshadowlegends.com/' id='oglas'><img  src='./slike/raid.png'></a>
        </div>
    </div>";
    ?>


    <?php
    include "./komponente/noga.php";
    noga();
    ?>

    <?php
    include "./komponente/kosarica.php";
    kosara();   
    ?>  

    <?php
    include "./komponente/login.php";
    login();
    ?>

</body>

</html>