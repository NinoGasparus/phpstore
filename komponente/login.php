<?php
    function login(){

        
        $req = $_POST;
        if(isset($req["uname"]) && isset($req["pass"])){          
            if($req['uname'] && $req['pass']){

            }else{
                goto error;
            }

            ini_set('display_errors',1);

            $conn = mysqli_connect('localhost', 'root', '123123') or die(mysqli_error($conn));

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $db_selected = mysqli_select_db($conn, 'trgovina');

            if (!$db_selected) {
                echo strval('Failed to select the database: ' . mysqli_error($conn));
            }

            $query = "SELECT geslo FROM user WHERE email = '" .$req['uname']."' OR username='".$req['uname']."' ";

            $result = mysqli_query($conn, $query);

            if (!$result) {
                die('Error in query: ' . mysqli_error($conn));
            } else {
                if (mysqli_num_rows($result) == 0) {
                    echo "<script>alert('Cannot find user specified')</script>";
                    } else if(mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_array($result);
                        if ($row["geslo"] == $req['pass']){
                            $_SESSION['localuser'] = $req['uname'];
                            echo "<script>alert('login sucessfull')</script>";
                        }else{
                            echo "<script>alert('wrong password')</script>";
                        }
                    }        
            mysqli_close($conn);
            }


        }else if(isset($req["email"]) && isset($req["unamne"]) && isset($req["regpass"]) && isset($req['regpassverify'])){
          
            if($req['email'] && $req['unamne']&& $req['regpass']&& $req['regpassverify']){}else{
                goto error;
            }
            if($req['regpass'] == $req['regpassverify']){
                ini_set('display_errors',1);
                $conn = mysqli_connect('localhost', 'root', '123123') or die(mysqli_error($conn));

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $db_selected = mysqli_select_db($conn, 'trgovina');

                if (!$db_selected) {
                    echo strval('Failed to select the database: ' . mysqli_error($conn));
                }

                $query = "SELECT * FROM user WHERE email = '" .$req['email']."' OR username = '".$req['unamne']."'";

                $result = mysqli_query($conn, $query);

                if (!$result) {
                    die('Error in query: ' . mysqli_error($conn));
                } else {
                    if (mysqli_num_rows($result) == 0) {
                            $query = "INSERT INTO user(username, email, geslo) values('".$req['unamne'] . "' , '". $req['email'] . "','".$req['regpass']."');";
                            mysqli_query($conn, $query);
                            
                        } else {
                            echo "<script> alert('User already exists')</script>";
                        }        
                }
                mysqli_close($conn);

            }else{
                echo "<script>alert('Passwords dont match')</script>";
            }
            
            
            
        }else{
            
        }
        if(false){
            error:
            echo"<script> alert('Please fill out all the fields, and try again') </script>";
        }
        echo "
            <div id='loginPane'>
            <button onClick='pokaziLogin()'> X </button>
                <h3> Prijava</h3>
            <form action='index.php' method = 'POST'>

            <label for='uname'> Uporabniško ime / Epošta </label>
                <input type='text' name='uname' id='loginuname' placeholder='nekdo@email.com / uporabniško ime'>
            <label for='pass'> Geslo </label>
                <input type='password' name='pass' id='loginpass'>
            
                <input type='submit' id='loginsubmit' value='Prijava'>
            </form>

            
            <form action='index.php' method='POST'>
                <h3> Registracija </h3>

            <label for='email'> E-Poštni račun </label>
                <input type='text' name='email' id='regMail' placeholder='epošta'>
            <label for='uname'> Uporabniško ime </label>
                <input type='text' name='unamne' id='regUname' placeholder='vzdevek'>
            <label for = 'regpass'> Geslo </label>
                <input type='password' name='regpass' id='p1'>
            <label for = 'regpassverify'> Ponovi geslo </label>
                <input type='password' name='regpassverify' id='p2'>
                <input type='submit' id='regSubmit' value='Registriraj'>

            </form>

            </div>      
        ";
    }