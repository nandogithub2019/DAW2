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

var valor = 0;
var cookie =  getCookie('contador');
if (getCookie('contador')==""){
    setCookie("contador", valor, 100);
    document.getElementById('cont').innerHTML= "Visita num: "+contador;
}else{

}

/* document.getElementById('cont').innerHTML= "Visita num: "+contador; */