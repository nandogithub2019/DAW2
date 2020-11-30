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
/********************** * Part principal *************************/
window.addEventListener("load",()=> {
    let docu = document.querySelector("#submit");
    let docuimg = document.querySelector("#submit1");
    let color = getCookie('color');
    /* let bora = document.querySelector("#tamany"); */
    let cookieborder = getCookie('tamany');

    if (cookieborder == undefined){
        
        document.querySelector('#imatge1').style.border = "40px solid black"; 
        document.querySelector('#imatge2').style.border = "40px solid black"; 
    }else{                                      
        
        document.querySelector('#imatge1').style.border = cookieborder + "px solid black";
        document.querySelector('#imatge2').style.border = cookieborder + "px solid black";
    }
    
    if (color == null){
        document.querySelector("#color").value = '';
    }else{
        document.getElementById('colorFons').style.background='#'+color;
    }

    docu.addEventListener("click",()=>{
        console.log("Botó premut!!");
        let color = document.querySelector("#color").value;

        setCookie("color", color, 100);
        document.getElementById('colorFons').style.background='#'+color;

        

    });
    docuimg.addEventListener("click",()=>{
        let bora = document.getElementById('tamany').value;
        setCookie("tamany", bora, 100);
        document.getElementById('imatge1').style.borderImageWidth = bora + "px solid black";
        document.getElementById('imatge2').style.borderImageWidth = bora + "px solid black";

        /* document.querySelector('#imatge1').style.borderImageWidth = bora + "px solid black";
        document.querySelector('#imatge2').style.borderImageWidth = bora + "px solid black"; */
    });
});    
