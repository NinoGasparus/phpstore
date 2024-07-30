function addToBasket(title, item, kolicina, cena, url ) {


    console.log(title);
    console.log(item);
    console.log(kolicina);
    console.log(cena);
    console.log(url)
    kolicina = parseInt(kolicina);

    if (isNaN(kolicina) || kolicina < 1) {
        alert("Neveljavna količina");
        return;
    }
    
    let kosara = JSON.parse(localStorage.getItem('kosara'));
    kosara.push({itemTitle: title, itemID: item, itmeQuant: kolicina, cost: cena, link : url});
    localStorage.setItem('kosara', JSON.stringify(kosara));

    console.log(cena);


    pokaziKosarico();
    pokaziKosarico();
}
