<?php
function artikelGen($totalitems,$sezona ,$zaloga,$maxCena,$barva,$order)
{
    ini_set('display_errors',1);
    
    $conn = mysqli_connect('localhost', 'root', '123123') or die(mysqli_error($conn));

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $db_selected = mysqli_select_db($conn, 'trgovina');

    if (!$db_selected) {
        echo strval('database seleciton failed: ' . mysqli_error($conn));
    }

    $query = "SELECT * FROM roza";

    
    if($sezona && $sezona !== "Vse") {
        $query .= " WHERE sezona = '$sezona'";
    }
    

    if($zaloga) {
        if(strpos($query, 'WHERE') === false) {
            $query .= " WHERE";
        } else {
            $query .= " AND";
        }
        $query .= " zaloga >= '$zaloga'";
    }
    
    
    if($maxCena) {
        if(strpos($query, 'WHERE') === false) {
            $query .= " WHERE";
        } else {
            $query .= " AND";
        }
        $query .= " cena <= '$maxCena'";
    }
    
    
    if($barva && $barva !== "vseBarve") {
        if(strpos($query, 'WHERE') === false) {
            $query .= " WHERE";
        } else {
            $query .= " AND";
        }
        $query .= " barva = '$barva'";
    }
    
    $order = isset($order) ? $order : 'def';
    switch ($order) {
        case 'priceAsc':
            $query .= " ORDER BY cena ASC";
            break;
        case 'priceDesc':
            $query .= " ORDER BY cena DESC";
            break;
        case 'nameAsc':
            $query .= " ORDER BY ime ASC";
            break;
        case 'nameDesc':
            $query .= " ORDER BY ime DESC";
            break;
        default:
            
    }
    
    $query .= " LIMIT $totalitems";
    
    $result = mysqli_query($conn, $query);
    

    if (!$result) {
        die('Error : ' . mysqli_error($conn));
    } else {

    }

    if (mysqli_num_rows($result) > 0) {
        $rowCount = (int)($totalitems/3);
        for($i =0; $i < $rowCount+1; $i++) {
            echo "<div class='row'>";
            for($j =0; $j < 3 && $i*3 +$j < $totalitems; $j++){
            $row = mysqli_fetch_array($result);
            if(!$row){
                continue;
            }
            $uuid = $row['id'];
            $imgid = "slika" . $uuid; 
            $itemid = "itemTitle" . $uuid;
            $itemTitle = $row['ime'];
            $cena = $row['cena']; 
            $itemQuant =  "kolicina" . $uuid;
            

            $imagePath = !is_null($row['slika']) ? $row['slika'] : './slike/notFound.png';

            echo "
                <div class='item'>
                    <img id='$imgid' class='itemImage' src=' " .$imagePath. " ' />
                    <p id='$itemid' class='itemTitle'>
                    $itemTitle
                    </p>
                    <p class='itemDesc'> 
                    Zaloga: ". $row['zaloga']." kos  <br>
                    Sezona: ". $row['sezona']." <br>
                    Barva: ". $row['barva']. " <br> 
                    </p>
                    <p class='cena' > $cena  € / šopek 5 kos</p>
                    <p class='vm'>
                    <input type='number' value='1' min=1  class='itemCount' id='$itemQuant'/>
                    <button onClick='addToBasket(\"$itemTitle\",$uuid, document.getElementById(\"$itemQuant\").value, $cena,\"$imagePath\")'> Dodaj v košarico </button>

                    </p>
                </div>";
          
            }
            echo "</div>";
        }
    } else {
        echo " Ni artiklov, ki ustrezajo nastavljenim filtrom";
    }




mysqli_close($conn);
}
