<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/styles.css">

    <script src="./skripte/pokaziKosarico.js"></script>
    <script src="./skripte/ostalo.js"></script>


</head>

<body>
    <?php
    include "./komponente/glava.php";
    glava();
    ?>

    <?php 
    include "./komponente/placeorder.php";
    placeOrder();
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




<script>
        let data = JSON.parse(localStorage.getItem('kosara'));
        let x = document.getElementById("checkoutItemContainer");
        
        if(data){
            console.log(data);
            let sumtotal = 0;
            for(let i  = 0; i < data.length; i++){
                sumtotal +=data[i].cost * data[i].itmeQuant;
                
                let y =document.createElement("div");
                y.className = "checkoutItem";
                
                let slika =document.createElement("img");
                slika.src = data[i].link;
                slika.className = "midImg";
                let ime =document.createElement("p");
                ime.innerText =data[i].itemTitle;
                ime.className = "checkoutItemIme";
                let stevilo=document.createElement("p");
                stevilo.innerText = data[i].itmeQuant + " kos"
                stevilo.className = "checkoutStevilo";
                let kos =document.createElement("p");
                kos.innerText = data[i].cost+ "€ / kos (5 rož)"
                kos.className = "checkoutKos";
                let total =   document.createElement("p");
                total.innerText ="Skupaj: " + parseFloat(data[i].cost * data[i].itmeQuant) + " EUR";
                total.className = "checkoutTotalAmount";
                let remBut = document.createElement("button");
                remBut.className = "remButtonCheckout";
                remBut.onclick = function(){
                    location.reload();
                    purgeBasket(i);
                };
                remBut.textContent=  "Odstrani "
                //y.innerText = data[i].cost + "€  " + data[i].itemID + "ID  "+ data[i].itmeQuant + "x";
                y.appendChild(slika);
                y.appendChild(ime);
                y.appendChild(stevilo);
                y.appendChild(kos);
                y.appendChild(total);
                y.appendChild(remBut);
                
                
                x.appendChild(y);
            }
            let y =document.createElement ("div");
            let z =document.createElement("p");
            z.innerText =sumtotal + " EUR";
            y.innerText = "Skupaj EUR";
            y.className = "checkoutItem";
            
            
            y.appendChild(z)
            y.id = "checkoutSUMTOTAL"
            x.appendChild (y);

        }else{
            let x =document.getElementById("checkoutItemContainer");
            x.innerText = "Prišlo je do napake, prosimo osvežite stran in poskusite ponovno. Če se problem ne razreši nas kontaktirajte na info@cc.si";
        }
        console.log(data);

</script>

</body>

</html>