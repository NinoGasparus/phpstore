function pokaziKosarico() {
  let kosarica = document.getElementById("kosarica");
  let dropdown = document.getElementById("kosaraItems");

  let kosara = JSON.parse(localStorage.getItem('kosara'));
  if(!kosara){
    return;
  }
  if (pokazi) {

      while (dropdown.firstChild) {
          dropdown.removeChild(dropdown.firstChild);
      }

      kosarica.style.top = "10vh";

      for (let i = 0; i < kosara.length; i++) {
          let x = document.createElement("div");
          x.className = "basketEntry";
          let y = document.createElement("img");
          let z = document.createElement("p");

          let w = document.createElement("button");
          w.innerText = "X"; 
          w.className = "removeFromBasketButton";
          w.onclick = function() {
            
              purgeBasket(i);
          };
          z.className = "basketEntryTextThingy";
          z.innerText =
              kosara[i].itemTitle +
              " " + kosara[i].cost + "€ x"+
              kosara[i].itmeQuant;
          y.src = kosara[i].link;
          y.className += "miniimg";
          
          x.appendChild(y);
          x.appendChild(z);
          x.appendChild(w);
          dropdown.appendChild(x);
      }

      let cenaT = document.createElement("p");
      let sum = 0;
      for (let i = 0; i < kosara.length; i++) {
          sum += (kosara[i].cost * kosara[i].itmeQuant);
      }
      cenaT.innerText = "Skupaj EUR: " + sum;
      console.log(sum);
      dropdown.appendChild(cenaT);

      pokazi = !pokazi;
  } else {
      kosarica.style.top = "-90vh";
      pokazi = !pokazi;
  }
}
