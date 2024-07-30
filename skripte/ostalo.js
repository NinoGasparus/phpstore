let pokazi = true;
let pokazLogin = false;


function pokaziLogin(){
    let login = document.getElementById('loginPane');
    if(!pokazLogin){
        login.style.top = '15%';
        pokazLogin = !pokazLogin;
    }else{
        login.style.top = '-150%';
        pokazLogin = !pokazLogin;
    }

}


function gotocheckout(){
    window.location.href = "./checkout.php";
}


function purgeBasket(index) {
    let kosara = JSON.parse(localStorage.getItem('kosara'));
    kosara.splice(index, 1);
    localStorage.setItem('kosara', JSON.stringify(kosara));

    console.log("ok");

    pokaziKosarico();
    pokaziKosarico();
}
