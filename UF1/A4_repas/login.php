<?php
/* Inici de sessió i crida al fitxer que conté les funcions*/
session_start();

require_once 'funcions.php';
/* inicialització de variables que informaran dels possibles errors */
$errorEmail = $errorPassword = $errorAcces = "";
/* Variables que contindran les credencials d'accés */
$password = $email = $conn = $result = $usuari = $id ="";
/* Comprova si la política de cookies està acceptada i 
redirecciona a la pàgina de politica de cookies en cas negatiu*/ 
if (!$_COOKIE["politicacookies"]==1){
    header('Location:politicaCookies.php');
}
/* Comprova l'existencia de la cookie password i que el seu valor sigui correcte. Si es compleix aquesta condició redirigeix a l'àrea privada */
if(isset($_COOKIE["password"])){    
    // connectem amb la db
    $conn = connectDB('localhost', 'fcarrillo', 'fcarrillo', 'fcarrillo_A5');
    
    // si existeix el email i el password en la base de dades accedeix al area privada
    if(checkPasswordExist($_COOKIE["password"])){
  
    /* $resultat = mysqli_quer($conn,$sql) or die('Consulta fallida: ' . mysqli_error($conn)); */
    //convertim a array associatiu
    
        $_SESSION["validacioncorrecta"]=true;
        $_SESSION["nom"]=($_COOKIE['email']);
        $_SESSION["id"]=getUserId($_REQUEST['email']);
        // $_SESSION["pass"]=md5(sha1($_REQUEST["password"]));
  
        header('Location:areaPrivada.php');      
                
    }else{
        setcookie("password",0,1);
        setcookie("email",0,1);
        $error="Usuario o contraseña incorrecta.";
    }
  
} 

// Comprova si es fa enviament per post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
/* Comprova que els camps no estiguin vuits,
sino estan vuits, la funcio test_input comprova que no hi hagin espais vuits ni caràcters especials per tal d'evitar atacs contra la base de dades. La funció test_email comprova que es format sigui correcte, el mateix que test_password */
    if (empty($_POST["email"])){
        
        $errorEmail = "L'email és obligatori";
    }else{    
        
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        $errorEmail = test_email($email, $errorEmail);
    }
    if (empty($_POST["password"])){
        $errorPassword = "El password és obligatori";
    }else{
        $password = test_input($_POST["password"]);
        // check if name only contains letters and whitespace
        $errorPassword = test_password($password, $errorPassword);
    }
    /* Si els camps estan omplerts i no hi han errors de format,
    comprova que siguin els correctes. En cas afirmatiu crea una variable de sessió ($_SESSION["sesioActiva"] = true) per controlar l'accés al àrea privada*/        
    if (!$errorEmail && !$errorPassword){
        
        $conn = connectDB('localhost', 'fcarrillo', 'fcarrillo', 'fcarrillo_A5');
        
        // si existeix el email i el password en la base de dades accedeix al area privada
        $pass = md5($_REQUEST['password']);
        if(checkEmailExist($_REQUEST['email']) && checkPasswordExist($pass)){

            $usuari = getUserName($_REQUEST['email']);
            $id= getUserId($_REQUEST['email']);

            if(isset($_REQUEST['checkbox']) && $_REQUEST['checkbox']==1){
                
                setcookie("password",md5($_REQUEST['password']),time()+365*24*60*60);
                setcookie("email",$_REQUEST["email"],time()+365*24*60*60); 
                setcookie("nom",$usuari,time()+365*24*60*60); 
                  /* $_SESSION["nom"]=$_COOKIE["email"]; */
                  $_SESSION["nom"]=$usuari;
                  $_SESSION["id"]=$id;
                  $_SESSION["email"] = $_REQUEST['email'];

            }else{
            // Crea variables de sessió si el checkbox no està marcat
            /* $_SESSION["nom"] = $_REQUEST["email"]; */
            $_SESSION["nom"] = $usuari;
            $_SESSION["validacioncorrecta"]=true;
            $_SESSION["email"] = $_REQUEST['email'];
            $_SESSION["id"]=$id;
            }
            
            header('Location:areaPrivada.php');
        }
             
                 
    }
      # Redirige al formulario de alta si se pulsa dicho boton
      
    if(isset($_REQUEST["alta"])){
        header('Location:altausuari.php');
    }
    /* die("antes html!"); */
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Formulari Accés</title>
    <style>.error {color: red;margin-left:5px;}</style>
    </head>
    <body>
        <div style="margin: 30px 10%;">
            <h3>Formulari Accés</h3>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="myform" name="myform">
                <label for="email"></label>
                <input type="text" name="email"><span class="error"><?php echo $errorEmail;?></span><br>
                <label for="password"></label>
                <input type="text" name="password"><span class="error"><?php echo $errorPassword;?></span><br>

                <p class="error"><?php echo $errorAcces;?></p>

                <input type="checkbox" name="checkbox" value="1" /> Mantenir sessió<br /><br />
                    
                <button id="mysubmit" type="submit">Submit</button><br /><br />
                <br><br>
                <a id ="alta" href="altausuari.php">Alta Usuari</a>
                <a href="recuperar_pass.php">¿Has olvidado la contraseña?</a>
            </form>
        </div>
    </body>
</html>

