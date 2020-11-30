<?php
session_start();
/* Inici de sessió i crida al fitxer que conté les funcions*/
require_once 'funcions.php';

if(isset($_SESSION["nom"]) && isset($_SESSION['email'])){
    $_nombre=$_SESSION["nom"];
    $_email = $_SESSION['email'];
  } else{
    $_nombre=$_COOKIE["nom"];
    $_email = $_COOKIE['email'];
  }   
/* Si la variable de sessió activa és correcte o la cookie de mantenir sessió oberta és correcte, s'accedeix a l'àrea privada. Si cap de les condicions es compleix, redirigeix a login */
if (( isset($_SESSION["validacioncorrecta"]) && $_SESSION["validacioncorrecta"] == true) ||  isset($_COOKIE["password"]) ){


    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_REQUEST['logout'])){
            logout();    
        }
        if (isset($_REQUEST['usuaris']) && isAdmin($_email)){ // rol_id = 1
            header('Location:usuaris.php');    
        }else{  // rol_id = 2
            header('Location:usuari.php');
        }
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Área privada</title>
    </head>
    <body>
        <div style="margin: 30px 10%;">
            <h3>Area privada</h3>
            <h4><?php print_r($_nombre) ?></h4>
            <form action="" method="post" id="form" name="form">
                <input type="submit" id="logout" name="logout" value="Logout">
                <input type="submit" value="Listar usuaris" name="usuaris" id="usuaris">
            </form>
        </div>
    </body>
</html>

<?php
}else{
    header('Location:login.php');
}
?>