<?php
    function placeOrder(){
       echo "
        <div id='orderpage'>
            <div id='placeholder1'>
            ";




            echo"
            </div>
            
            <div id='placeholder2'>
            <h1> Pregled naročila</h1>
            <div id='checkoutItemContainer'>
            
            </div>
            <div id='dataField'>
            <h3> Podatki za dostavo </h3>
            <form action='chekcoutSubmit.php' method ='POST'>
            <label for='naslov'> Naslov </label>
            <input required type='text' name='naslov' placeholder='Ulica in hišna številka'>
            
            <label for='posSt' > Poštna številka </label>
            <input required type='number' name='posSt' placeholder='Poštna št'>
            
            <label for='kraj'  > Mesto / Kraj </label>
            <input required type='text' name='kraj' placeholder ='Mesto'>
            
            <label for='naslovnik'> Ime in priimek naslovnika </label>
            <input required type='text' name='naslovnik' placeholder='Ime in priimek naslovnika'>
            
            <label for='telefon' > Telefonska številka </label>
            <input required type='number' name='telefon' placeholder='tel. številka'>
            
            <p><label for='tos'> Strinjam se z pogoji poslovanja </label>
                <input required type='checkbox' name='tos'> </p>
                ";
                
                if(isset($_SESSION['localuser'])){
                    echo "<input type='submit' value ='Oddaj naročilo'>";
                }else{
                    echo "<input type='submit' disabled value ='Prosimo prijavite se v uporabniški račun'>";
                }
                
                
                echo"
            </form>
            </div>
            </div>


            <div id='placeholder3'>
                <div id='add'>
                    <a href='https://raidshadowlegends.com/' id='oglas'><img  src='./slike/raid.png'></a>
                </div>
            </div>
        </div>   
       ";
    }