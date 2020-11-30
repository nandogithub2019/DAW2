/* Comptador de visites amb localStorage */

var valor = 1;   // valor inicial de la cookie
var ls =  parseInt(localStorage.getItem("contador"));   /* Llegeix localStorage, la converteix a int
i la guarda en una variable */

if (localStorage.getItem("contador")==undefined){ /* En la primera visita, localStorage no està definida, aleshores, la crea i li assigna el valor de 1, la converteix a int donat que per defecte és un string*/
    ls = parseInt(localStorage.setItem("contador",valor));
    
    document.getElementById('cont').innerHTML= "Benvingut, aquesta és la visita " + localStorage.getItem("contador",valor);
}else{
/* En les següents visites crea una localStorage "contador" amb el valor de la localStorage anterior incrementada en 1 */    
    localStorage.setItem("contador",ls+1);
    document.getElementById('cont').innerHTML= "Benvingut, aquesta és la visita " +localStorage.getItem("contador",valor);
}


