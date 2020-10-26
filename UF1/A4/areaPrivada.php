<?php
session_start();
/* Inici de sessió i crida al fitxer que conté les funcions*/
require_once 'funcions.php';

/* Si la variable de sessió activa és correcte o la cookie de mantenir sessió oberta és correcte, s'accedeix a l'àrea privada. Si cap de les condicions es compleix, redirigeix a login */
if (( isset($_SESSION["sesioActiva"]) && $_SESSION["sesioActiva"] == true) || ( $_COOKIE["mantenirSessio"] == "dce0b27ba675df41e9cc07af80ec59c475810824")){

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        logout();    
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
            <form action="" method="post" id="form" name="form">
                <input type="submit" value="Logout">
            </form>
        </div>
    </body>
</html>

<?php
}else{
    header('Location:login.php');
}
?>