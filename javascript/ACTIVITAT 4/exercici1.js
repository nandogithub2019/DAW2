/* Dissenya un script que mostri un menú com el de la imatge, format per quatre enllaços (que han de funcionar) a diferents llocs web:


En ficar el ratolí sobre un enllaç determinat, aquest tindrà el següent estil:	
    • Color de la font blanc
    • Fons de la font: vermell
    • Lletres en majúscules

En treure el ratolí d'un enllaç, aquest recuperarà el seu estil inicial:
    • Color 	de la font: vermell
    • Color de fons: blanc 	
    • Lletres en minúscula, tret de la 	primera
(Per a això, et cal buscar una mica per internet, o pensar la solució 	Explica el que trobis o el que tu hagis creat, en comentaris dins el codi) */



enlace = document.querySelectorAll("a");

for (i=0; i< enlace.length; i++){
        enlace[i].addEventListener("mouseover", (event) => {
        event.target.style.background = "red";
        event.target.style.color = "white";
        event.target.textContent= event.target.textContent.toUpperCase();
    });

    enlace[i].addEventListener("mouseout", (event) => {
        event.target.style.background = "white";
        event.target.style.color = "red";
        event.target.textContent= event.target.textContent.charAt(0).toUpperCase()+ event.target.textContent.slice(1).toLowerCase();
    });
}
    

