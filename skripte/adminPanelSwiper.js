

function showNarocila(){
    let x = document.getElementById("narocilaTab");
    let y = document.getElementById("artikliTab");
    x.style.display = "flex";
    y.style.display = "none";
    if(testX){
        console.log("test succeded)");
    }
}

function showArtikli(){
    let x = document.getElementById("narocilaTab");
    let y = document.getElementById("artikliTab");
    x.style.display = "none";
    y.style.display = "flex";
}
