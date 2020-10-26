<?php
/* Inici de sessió i crida al fitxer que conté les funcions*/
session_start();

require_once 'funcions.php';
/* inicialització de variables que informaran dels possibles errors */
$errorEmail = $errorPassword = $errorAcces = "";
/* Variables que contindran les credencials d'accés */
$password = $email = "";
/* Comprova si la política de cookies està acceptada i 
redirecciona a la pàgina de politica de cookies en cas negatiu*/ 
if (!$_COOKIE["politicacookies"]==1){
    header('Location:politicaCookies.php');
}
/* Comprova l'existencia de la cookie per mantenir sessió oberta i que el seu valor sigui correcte. Si es compreix aquesta condició redirigeix a l'àrea privada */
if (isset($_COOKIE["mantenirSessio"]) && $_COOKIE["mantenirSessio"] == "dce0b27ba675df41e9cc07af80ec59c475810824"){
    header('Location:areaPrivada.php');
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
        $errorEmail = test_email($email);
    }
    if (empty($_POST["password"])){
        $errorPassword = "El password és obligatori";
    }else{
        $password = test_input($_POST["password"]);
        // check if name only contains letters and whitespace
        $errorPassword = test_password($password);
    }
    /* Si els camps estan omplerts i no hi han errors de format,
    comprova que siguin els correctes. En cas afirmatiu crea una variable de sessió ($_SESSION["sesioActiva"] = true) per controlar l'accés al àrea privada*/        
    if (!$errorEmail && !$errorPassword){
        $emailCorrecto = "email@email.com";   // email d'accés
        $pass =sha1(md5("pass"));  // password xifrat
        if ($_REQUEST["email"] == $emailCorrecto && sha1(md5($_REQUEST["password"])) == $pass){
        $_SESSION["sesioActiva"] = true; 
    /* Comprova si està marcat el checkbox de mantenir sessió, en cas afirmatiu crea una cookie per mantenir la sessió oberta amb el valor del password xifrat */
            if (isset($_REQUEST["checkbox"])){
                    
                setcookie('mantenirSessio', $pass, time() + 365 * 24 * 60 * 60);
                header('Location:areaPrivada.php');
            }else{
                header('Location:areaPrivada.php');
            }
        }else{
            $errorAcces = "Usuari o password incorrecte";
        }
            
    }
    
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
            </form>
        </div>
    </body>
</html>

