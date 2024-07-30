<?php 
    function narocilaTab(){
        
        if($_GET){
            $req = $_GET;
            ini_set('display_errors',1);
            $conn = mysqli_connect('localhost', 'root', '123123') or die(mysqli_error($conn));
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $db_selected = mysqli_select_db($conn, 'trgovina');
            if (!$db_selected) {
                echo strval('Neuspeh pri vstavljanju : ' . mysqli_error($conn));
            }
            $query = "";
            if(isset($req['complete'])) {
                 $query = "UPDATE nakup SET complete = 1 WHERE id =" .$req['complete'];
            }else{
                goto endN;
            }
            

            if(mysqli_query($conn, $query)){
            }else{
                echo "failed to delete value ";
            }
            mysqli_close($conn);
    
        }
        endN:

        if($_POST){            
            $req = $_POST;
            ini_set('display_errors',1);
            $conn = mysqli_connect('localhost', 'root', '123123') or die(mysqli_error($conn));
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $db_selected = mysqli_select_db($conn, 'trgovina');
            if (!$db_selected) {
                echo strval('Neuspeh pri vstavljanju : ' . mysqli_error($conn));
            }
            if($req['itemId']) {
                $query = "INSERT INTO roza (id, cena, sezona, zaloga, barva, ime, slika) VALUES (" . intval($req['itemId']) . ", '" . $req['itemPrice'] . "', '" . $req['itemSeason'] . "', " . intval($req['itemStock']) . ", '" . $req['itemColor'] . "', '" . $req['itemName'] . "', '" . $req['slikaUrl'] . "')";
            } else {
                $query = "INSERT INTO roza (cena, sezona, zaloga, barva, ime, slika) VALUES ('" . $req['itemPrice'] . "', '" . $req['itemSeason'] . "', " . intval($req['itemStock']) . ", '" . $req['itemColor'] . "', '" . $req['itemName'] . "', '" . $req['slikaUrl'] . "')";
            }
            
            
            


            if(mysqli_query($conn, $query)){
            }else{
                echo "failed to make user ";
            }
            mysqli_close($conn);
    
        }



        ini_set('display_errors',1);
        
        $conn = mysqli_connect('localhost', 'root', '123123') or die(mysqli_error($conn));

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }


        $db_selected = mysqli_select_db($conn, 'trgovina');

        if (!$db_selected) {
            echo strval('Failed to acquire database : ' . mysqli_error($conn));
        }

        $query = "SELECT * FROM nakup ORDER BY complete, datum ASC ";
        $resoult = mysqli_query($conn, $query);
        if($resoult && mysqli_num_rows($resoult) > 0){
        
            echo "
            <table>
                <tr>
                    <th class='narociloCell'> ID </th>
                    <th class='narociloCell'> Kupec ID</th>
                    <th class='narociloCell'> Vsebina  </th>
                    <th class='narociloCell'> Vrednost </th>
                    <th class='narociloCell'> Naslov </th>
                    <th class='narociloCell'> Poštna ŠT </th>
                    <th class='narociloCell'> Kraj </th>
                    <th class='narociloCell'> Kupec </th>
                    <th class='narociloCell'> Telefon </th>
                    <th class='narociloCell'> Datum </th>
                    <th class='narociloCell'> Končano </th>
                    <th class='narociloCell'> Uredi </th>
                </tr>";


            while($row = mysqli_fetch_assoc($resoult)){
                echo "<tr>";
                echo '<td class="narociloCell">' . $row['id'] . "</td>";
                echo '<td class="narociloCell">' . $row['kupec'] . "</td>";
                echo '<td class="narociloCell">' . $row['vsebina'] . '</td>';
                echo '<td class="narociloCell">'. $row['cena'] . '</td>';
                echo '<td class="narociloCell">'. $row['naslov'] . '</td>';
                echo '<td class="narociloCell">'. $row['posta'] . '</td>';
                echo '<td class="narociloCell">'. $row['kraj'] . '</td>';
                echo '<td class="narociloCell">'. $row['naslovnik'] . '</td>';
                echo '<td class="narociloCell">'. $row['telefon'] . '</td>';
                echo '<td class="narociloCell">'. $row['datum'] . '</td>';
                if($row['complete']){
                    echo '<td style="color: green" class="narociloCell"> Uspešno končano</td>';
                }else{
                    echo '<td style="color: red" class="narociloCell"> Naročilo odprto </td>';   
                }
                echo '<td><form action="admin.php" method="GET" class="narociloCell"> <input type="submit" name="complete" value="'.$row['id'].'"></td>';
                echo "</tr>";
              
            }

            echo "</table>";
        }else{
            echo "Something went wrong: ". mysqli_error($conn);
        }

        mysqli_close($conn);
        
        
        
        
        
        
        
        
    }