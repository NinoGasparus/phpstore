<?php 
function telo($totalitems) {
    $req = $_GET;

    $sezona = $req["sezona"] ?? null;
    $zaloga = $req["zaloga"] ?? null;
    $maxCena = $req["cena"] ?? null;
    $barva = $req['barva'] ?? null;
    $order = $req['order'] ?? null;

    echo "
    <div id='telo'>
        <div id='filtri'>
            <form action='index.php' method='GET'>
                <label for='sezona'> Sezona </label>
                <select id='seasonSelect' name='sezona'>
                    <option value='vseSezone'> Vse </option>
                    <option value='pomlad' " . (($sezona == 'pomlad') ? 'selected' : '') . "> Pomlad</option>
                    <option value='poletje' " . (($sezona == 'poletje') ? 'selected' : '') . "> Poletje</option>
                    <option value='jesen' " . (($sezona == 'jesen') ? 'selected' : '') . "> Jesen </option>
                    <option value='zima' " . (($sezona == 'zima') ? 'selected' : '') . "> Zima </option>
                </select>
                <br>
                
                <label for='zaloga'> Zaloga več kot: </label>
                <input type='number' name='zaloga' value='" . $zaloga . "'>
                <br>

                <label for='cena'> Max cena: </label>
                <input type='number' name='cena' value='" . $maxCena . "'>
                <br>

                <label for='barva'>Barva:</label>
                <select id='barvaSelect' name='barva'>
                    <option value='vseBarve'> Vse </option>
                    <option value='rdeča' " . (($barva == 'rdeča') ? 'selected' : '') . ">Rdeča</option>
                    <option value='roza' " . (($barva == 'roza') ? 'selected' : '') . ">Roza</option>
                    <option value='bela' " . (($barva == 'bela') ? 'selected' : '') . ">Bela</option>
                    <option value='rumena' " . (($barva == 'rumena') ? 'selected' : '') . ">Rumena</option>
                    <option value='oranžna' " . (($barva == 'oranžna') ? 'selected' : '') . ">Oranžna</option>
                    <option value='vijolična' " . (($barva == 'vijolična') ? 'selected' : '') . ">Vijolična</option>
                    <option value='modra' " . (($barva == 'modra') ? 'selected' : '') . ">Modra</option>
                    <option value='zelena' " . (($barva == 'zelena') ? 'selected' : '') . ">Zelena</option>
                </select>
                <br>
            
                <label for='sort'> Razvrsti po:  </label>
                <select id='sort' name='order'>
                    <option value='def' " . (($order == 'def') ? 'selected' : '') . "> Default </option>
                    <option value='priceAsc' " . (($order == 'priceAsc') ? 'selected' : '') . "> ceni naraščujoče </option>
                    <option value='priceDesc' " . (($order == 'priceDesc') ? 'selected' : '') . "> ceni upadajoče </option>
                    <option value='nameAsc' " . (($order == 'nameAsc') ? 'selected' : '') . "> imenu naraščujoče </option>
                    <option value='nameDesc' " . (($order == 'nameDesc') ? 'selected' : '') . "> imenu padajoče </option>
                </select>
                <input type='submit' value='Potrdi filtre'>
            </form>
        </div>
        
        <div id='main'>";
            artikelGen($totalitems, $sezona, $zaloga, $maxCena, $barva, $order);
    echo "</div>

        <div id='add'>
            <a href='https://raidshadowlegends.com/' id='oglas'><img  src='./slike/raid.png'></a>
        </div>
    </div>";
}

