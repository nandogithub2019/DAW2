/* Dissenya un document que mostri una taula, amb tres files i tres cel.les per fila, com la que es mostra a la imatge. Quan l'usuari fiqui el ratolí damunt d'una de les cel.les, el seu color de fons es fixarà a un color aleatori, d'entre 10 possibles. Quan retiri el ratolí, el fons de la cel.la perdrà novament el seu color. */

// array con 10 colores CSS
var colores = ["red","blue","green","yellow","grey","brown","black","darkgrey","orange","purple"];
// Selecciono todos los elementos td
enlace = document.querySelectorAll("td");
// Recorro todas las celdas y compruebo si pasa el mouse por encima
for (i=0; i< enlace.length; i++){
    enlace[i].addEventListener("mouseover", (event) => {
// Hago un random del array colores y selecciono uno para el background        
    var color =Math.floor(Math.random() * 10);
    color = colores[color];
    event.target.style.background = color;
});
// Cuando el mouse sale de la celda, el background vuelve a ser blanco
enlace[i].addEventListener("mouseout", (event) => {
 event.target.style.background = "white";

 });
}
    

