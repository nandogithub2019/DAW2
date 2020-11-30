/*  */

// Array amb les 100 caselles del joc
var taulell = [];
// Array amb les posicions de les 10 mines
var arrayMines = [];
// Assigna un id para cada td
for (let i=0; i<102; i++){
    if(i==0){
        document.getElementsByTagName("td")[i].setAttribute("id", "header");
    }else if (i>=1 && i<=100){
        document.getElementsByTagName("td")[i].setAttribute("id", i);
        document.getElementsByTagName("td")[i].setAttribute("class", "td");
    }else{
        document.getElementsByTagName("td")[i].setAttribute("id", "footer");
        let footer = document.querySelector("#footer");
        let button = document.createElement("button");
        footer.appendChild(button);
        document.querySelector("button").setAttribute("id", "iniciar");
        document.querySelector("button").innerText = "Iniciar";
        
    }
}  
// assigna 10 mines a l'atzar
function colocarMines(){
    var repetit = [];
    for(let i=0; i<10; i++){
        var num = Math.floor(Math.random() * 100) + 1;
        if(repetit.includes(num)){
            i--;
        }else{
            taulell[num] = -1;
            arrayMines.push(num);
            console.log(arrayMines);
        }

    }
    return taulell;
}
//
var assignaMines = colocarMines();
console.log(assignaMines);
//

casella = document.querySelectorAll("td");
// Recorro totes las cel·les y comprovo l'event contextmenu i mouseout
for (i=0; i< casella.length; i++){
        casella[i].addEventListener("contextmenu", function(event){
        event.preventDefault()
        
        event.target.style.background = "red";
        
        
        
        });
        casella[i].addEventListener("mouseout", (event) => {
            var revisaCasella = parseInt(event.target.getAttribute('id'));
            
                
                if(arrayMines.includes(revisaCasella)){
                    event.target.style.background = "green";
                    /* clearInterval(comptador); */
                }else{
                    // evita canviar el color de id "header i footer"
                    if(revisaCasella>0 && revisaCasella<=100){
                        event.target.style.background = "blue";
                    }    
                }
             
        });
}    

/* var segons = 0;
var comptador = setInterval(comptador, 1000); // crida a la funció comptador cada segon fins que s'executa clearInterval(comptador)
var boton = document.querySelector( '#iniciar');
boton.addEventListener("click", comptador);

function comptador() {
  // Selecciona l'element amb id header i printa el valor de la variable segons
    document.getElementById('header').innerHTML = segons;
    segons++;
} */