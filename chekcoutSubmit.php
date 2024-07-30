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
 

    if(isset($_POST['naslov'], $_POST['posSt'], $_POST['kraj'], $_POST['naslovnik'], $_POST['telefon'], $_POST['tos'])) {
        
        $kupec = 1;
        $vsebina = 'nič';
        $cena = 0;
        $naslov = $_POST['naslov'];
        $posta = $_POST['posSt'];
        $kraj = $_POST['kraj'];
        $naslovnik = $_POST['naslovnik'];
        $telefon = $_POST['telefon'];
        
        $conn = mysqli_connect('localhost', 'root', '123123') or die(mysqli_error($conn));
        mysqli_select_db($conn, 'trgovina');



        $queryForID = "SELECT id FROM user WHERE username = '". $_SESSION['localuser'] ."'";
        $result = mysqli_query($conn, $queryForID);
        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $kupec = $row['id'];
        }
        $query = "INSERT INTO nakup (kupec, vsebina, cena, naslov, posta, kraj, naslovnik, telefon, complete) 
          VALUES ('$kupec', '$vsebina', $cena, '$naslov', '$posta', '$kraj', '$naslovnik', '$telefon',  0)";

         mysqli_query($conn, $query);
            mysqli_close($conn);
    } else {
        echo "Something went wrong";
    }



    echo "
    <div id='telo'>
        <div id='filtri'>
            
        </div>
        
        <div id='main'><h1> Naročilo uspešno oddano!</h1>
            <br>
        
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