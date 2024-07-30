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
    <script>
        let dataFromStorage = localStorage.getItem('kosara');
        if(dataFromStorage){
            let data = JSON.parse(dataFromStorage);
            if(data){
                //ok
            }else{
                localStorage.setItem('kosara',JSON.stringify([]));    
            }
        }else{
            localStorage.setItem('kosara',JSON.stringify([]));
        }
    </script>
    <?php 
    session_start();
    ?>
    <?php
    include "./komponente/glava.php";
    glava();
    ?>

    <?php
    include "./komponente/telo.php";
    include "./komponente/artikel.php";
    telo(30);
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