/* Amb el temporitzador farem tres versions del joc següent

    a)  Versió amb una sola carta. Les cartes apareixeran de forma aleatòria. El botó “Esborra” tornarà a la carta revers
    b) Versió amb cinc cartes. Es poden repetir, es a dir, en un moment donat poden apareixer dues o més cartes idèntiques
    c) (AVANÇAT) Versió amb cinc cartes, però evitant repetir les cartes ; és a dir, en un moment donat no poden haver dues p més cartes iguals */

var nom = "";   // string amb el nom de la imatge
var cartes = []; ;  // Array amb el nom de les cartes
var pals = ["cors", "diamants", "picas", "trevol"];
/* Genera l'array cartes[] amb las 13 cartes dels 4 pals  */
for (i=1; i <= 13; i++){
    for (j=0; j < pals.length; j++){
        if(i<=9){
            nom = "0"+i+pals[j]+".png";
            
        }else{
            nom = i+pals[j]+".png";
        }
    cartes.push(nom);    
    }
console.log(cartes);    
}

/* Funció que genera cartes aleatories */

const aleatoria = () => {
    var num = 0;   // variable que conté el valor aleatori
    var imgs = document.querySelector('img');// array de totes les etiquetes <img>
    /* Para cada <img>, construye la ruta de la imagen (str) a partir de
    un número aleatorio y la asigna mediante setAttribute. Guarda el número aleatorio en un array para posteriormente buscar coincidencias */   
    
    num = Math.floor(Math.random() * 52); 
        
    str = "poker/"+cartes[num];
    imgs.setAttribute("src", str);
        
} 

/* document.getElementById('iniciar').innerHTML = "Aturar";
    document.getElementById('iniciar').setAttribute("id", "aturar"); */
const esborrar = () => {
    clearInterval(temps);
    var imgs = document.querySelector('img');
    str = "poker/revers.png";
    imgs.setAttribute("src", str);
}
/* Obtiene el objeto a escuchar, en este caso es un boton con id = "iniciar" y "esborrar". Cuando detecta el evento onClick para el boton asignado, llama a la función.  */

var botonIniciar = document.getElementById("iniciar");
botonIniciar.addEventListener("click", function(event) {temps = setInterval( () => {aleatoria();} ,600);});

let botonEsborrar = document.getElementById("esborrar");
botonEsborrar.addEventListener("click", function(event) {esborrar();});



     
   



    

