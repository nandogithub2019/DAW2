/* Plants & Zombies. En una taula amb quatre cel·les mostrarem aleatòriament una de les imatges mostrades. Quan una mateixa imatge aparegui dues o més vegades s’incrementarà el comptador de sota. */

var str = "";   // string amb la ruta de la imatge
var imatges = ["planta1.jpg","planta2.jpg", "planta3.jpg","zombie1.jpg", "zombie2.jpg", "zombie3.jpg"]; ;  // Array amb el nom de les imatges
var comptador = 0;   // mostra si hi ha carta repetida


const aleatoria = () => {
    var num = 0;   // variable que conté el valor aleatori
    var numeros = [];   // array amb els numeros aleatoris
    imgs = document.querySelectorAll('img');// array de totes les etiquetes <img>
    /* Para cada <img>, construye la ruta de la imagen (str) a partir de
    un número aleatorio y la asigna mediante setAttribute. Guarda el número aleatorio en un array para posteriormente buscar coincidencias */   
    for (i= 0; i < imgs.length; i++){
        num = Math.floor(Math.random() * 6);
        numeros.push(num);   
        str = "zombies/"+imatges[num];
        imgs[i].setAttribute("src", str);
    }
    /* recorre el array de números aleatorios buscando coincidencias. Cuando encuentra una muestra el contador de coincidencias y fuerza la
    salida de los bucles */
    for (i= 0; i < numeros.length; i++){
        for (j=i+1; j < numeros.length; j++){
            if (numeros[i] == numeros[j]){
                comptador++;
                document.getElementById('resultat').innerHTML= "Hi ha "+comptador+" coincidències";
                i = numeros.length;
                j = numeros.length;
            }
        }
        
    }
  
}

/* Obtiene el objeto a escuchar, en este caso es un boton con id = "iniciar. Cuando detecta el evento onClick para el boton asignado, llama a la funcion" */
let boton = document.getElementById("iniciar");
boton.addEventListener("click", function(event) {aleatoria();});







     
   



    

