/* Funcions per crear i llegir cookies */

function setCookie(camp, valor, dies) {
    var d = new Date();
    d.setTime(d.getTime() + (dies*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = camp + "=" + valor + ";" + expires; 
}


function getCookie(nom) {
    var name = nom + "=";
    var ca = document.cookie.split( ';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt( 0)==' ') {
            
        c = c.substring( 1);
        }
    if (c.indexOf(name) == 0) {
        return c.substring(name.length,c.length);
        }
    }
    return "";
}


var valor = 1;   // valor inicial de la cookie
var cookie =  parseInt(getCookie('contador'));   /* Llegeix la cookie, la converteix a int
i la guarda en una variable */
if (getCookie('contador')==""){ /* En la primera visita crea la cookie amb valor "1" i la mostra*/
    setCookie("contador", valor, 100);
    document.getElementById('cont').innerHTML= "Benvingut, aquesta és la visita " + valor;
}else{
/* En les següents visites crea la mateixa cookie "contador" amb el valor incrementast en 1 */    
    setCookie("contador", cookie+1 , 100);
    document.getElementById('cont').innerHTML= "Benvingut, aquesta és la visita " + getCookie('contador');
}


