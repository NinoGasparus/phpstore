<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cvetiličarna Celeja</title>
    <link rel="stylesheet" href="./css/styles.css">
    
    <script src="./skripte/adminPanelSwiper.js"></script>
</head>

<body>
    <?php
    include "./komponente/glava.php";
    glava();
    ?>

    
    

    <div id="adminpane">
       <div>
        <button onclick="showNarocila()"> Naročila </button>
        <button onclick="showArtikli()">   Artikli </button>
       </div>

       <div id="tabcontainer">
            <div id="artikliTab" > 
                <?php 
                include "./komponente/adminPane/artikliTab.php";
                artikliTab();
                 ?>
            </div>

            <div id="narocilaTab" > 
                <?php 
                include "./komponente/adminPane/narocilaTab.php";
                narocilaTab();
                 ?>
            </div>
            
       </div>
    </div>



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