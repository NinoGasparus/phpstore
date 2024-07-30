<?php
function glava(){
    session_start();

    $currentPage = basename($_SERVER['PHP_SELF']);
    $hideKosaricaButton = ($currentPage !== 'index.php');

    $req  = $_POST;
    if(isset($req['logout'])){
        unset($_SESSION['localuser']); 
    }
    $admins = array();
    
    ini_set('display_errors',1);
    $conn = mysqli_connect('localhost', 'root', '123123') or die(mysqli_error($conn));
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $db_selected = mysqli_select_db($conn, 'trgovina');
    if (!$db_selected) {
        goto skip;
    }
    $query = "SELECT username FROM user WHERE isAdmin = 1";
    if(mysqli_query($conn, $query)){
    }else{
    goto skip;
    }

    $result = mysqli_query($conn, $query);
    if (!$result) {
        goto skip;
    } else {
    }
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            array_push($admins, $row['username']);
        }
    } else {
        goto skip;
    }
    skip:
    mysqli_close($conn);
//       <input type='text' id='searchbar' placeholder='vnesi izraz'>
    echo "
        <div id='glava'>
            <p id='naslov'>
                <a href='http://127.0.0.1/trgovina/index.php'>Cvetličarna Celjeaaa</a>
            </p>
            <p id='iskanje'>
         
            </p>
            <div id='headButtons'>
                <p id='kosaraButton' style='display: " . ($hideKosaricaButton ? 'none' : 'block') . "'>
                    <button onClick='pokaziKosarico()'>Kosarica</button>
                </p>
            
                ";
                if(!isset($_SESSION['localuser'])){
                    echo"   <p id='loginButton'> <button onClick='pokaziLogin()'>Prijava</button></p>";
                }else{
                    if(in_array($_SESSION['localuser'], $admins)){
                        echo "<form action='admin.php' method='POST'>  <p id='loginButton'> <input type='submit'  value='Admin Pane'></p></form>";
                    }
                    echo" <form action='index.php' method='POST'>  <p id='loginButton'> <input type='submit' name='logout' value='Odjavi se'></p></form>";
                }
                echo "
                
            </div>
        </div>
    ";
}

