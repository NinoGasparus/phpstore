<?php 
function artikliTab(){
    
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
        if(isset($req['delete'])) {
            $query = "DELETE FROM roza WHERE id =" .$req['delete'];
        } else{
            goto endA;
        }
        if(mysqli_query($conn, $query)){
            // No need to delete duplicates here
        }else{
            echo "failed to delete value ";
        }
        mysqli_close($conn);

    }
    endA:

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
        
        try{
            if(mysqli_query($conn, $query)){
                // If insertion is successful, remove duplicates
                $duplicatePurgeQuery = "DELETE FROM roza WHERE id NOT IN (SELECT id FROM ( SELECT MIN(id) AS id FROM roza GROUP BY cena, sezona, zaloga, barva, ime, slika ) AS temp );";
                if(mysqli_query($conn, $duplicatePurgeQuery)){
                }else{
                    echo "failed to purge duplicates ";
                }
            }else{
                echo "failed to insert values ";
            }
        }catch(Exception $e){
            echo "There was an error. Make sure all values are valid";
        }
        mysqli_close($conn);

    }


    echo "
    <form action='admin.php' method='POST'>
    <div id='createItemBar'>
       
    <div id='fields'>
        <input type='text'      name='slikaUrl'>
        <input type='number'    name='itemId'>
        <input type='text'      name='itemName'  required>
        <input type='number'    name='itemStock' required>
        <input type='number'    name='itemPrice' required>
        <input type='text'      name='itemSeason'>
        <input type='text'      name='itemColor'>
        <input type='submit' value='Dodaj artikel' style='margin-left:auto'>
    </div>
        
    </div>
    </form>
    ";

    ini_set('display_errors',1);
    
    $conn = mysqli_connect('localhost', 'root', '123123') or die(mysqli_error($conn));

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


    $db_selected = mysqli_select_db($conn, 'trgovina');

    if (!$db_selected) {
        echo strval('Failed to acquire database : ' . mysqli_error($conn));
    }

    $query = "SELECT * FROM roza ORDER BY zaloga ";
    $resoult = mysqli_query($conn, $query);
    if($resoult && mysqli_num_rows($resoult) > 0){
    
        echo "
        <table>
            <tr>
                <th> </th>
                <th> ID </th>
                <th> Naziv </th>
                <th> Zaloga kos</th>
                <th> Cena € </th>
                <th> Sezona </th>
                <th> Barva </th>
                <th> Izbriši artikel ID</th>
            </tr>";


            while($row = mysqli_fetch_assoc($resoult)){
                echo "<tr>";
                echo "<td><img class='itemIcon' alt='Slika ni na voljo' src='" . $row['slika'] . "'></td>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['ime'] . "</td>";
                if($row['zaloga'] >= 10){
                    echo "<td>" . $row['zaloga'] . "</td>";
                }else{
                    echo "<td style='color: red; font-weight: bold'>" . $row['zaloga'] . "</td>";
                }
                echo "<td>" . $row['cena'] . '</td>';
                echo '<td>'. $row['sezona'] . '</td>';
                echo '<td>'. $row['barva'] . '</td>';
                echo '<td><form action="admin.php" method="GET"><input type="submit" name="delete" value="'.$row['id'].'"></form></td>';
                echo "</tr>";
            }
            

        echo "</table>";
    }else{
        echo "Something went wrong: ". mysqli_error($conn);
    }

    mysqli_close($conn);
}
