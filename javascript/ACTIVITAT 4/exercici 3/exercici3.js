/* Dissenya un carrussel d'imatges com el següent (és una única taula amb tres cel·les, no tres taules com sembla per les següents imatges):

Tindrem emmagatzemades un total de 10 imatges, que representin els números del 0 al 9. Els botons + i – faran avançar o retrocedir el carrussel d'imatges.

    • Si el carrussel ha arribat a la imatge número 10 i l'usuari prem el botó d'avançar, tornarà a començar des de la imatge 1.
 	 	
    • Si el carrussel ha arribat a la primera imatge i l'usuari prem el botó de retrocedir, es situarà a la imatge 10. */

var num = 0;
var i = "";
var str = "";
const funcMes = () => {
        
    if (num != 9){
        num++;
        i = document.querySelector('img');
        str = "numeros_exercici3/"+num+".png";
    }else{
        num = 0;  
        str = "numeros_exercici3/"+num+".png";  
    }
    i.setAttribute("src", str);
    
}
const funcMenys = () => {
    
    if (num != 0){
        num--;
        i = document.querySelector('img');
        str = "numeros_exercici3/"+num+".png";
    }else{
        num = 9;
        str = "numeros_exercici3/"+num+".png";
    }    
    i.setAttribute("src", str);
}

let botoMes = document.getElementById("mes");
let botoMenys = document.getElementById("menys");

botoMes.addEventListener("click", function(event) {funcMes();});
botoMenys.addEventListener("click", function(event) {funcMenys();});







     
   



    

