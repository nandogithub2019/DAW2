<?php
session_start();

/* Quan hi hagi un enviament per post, comprova si s'ha acceptat la política de cookies i crea una cookie en cas afirmatiu. Si no s'accepta, redirigeix a google */
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (isset($_REQUEST["acceptar"])){
        setcookie('politicacookies', 1, time() + 365 * 24 * 60 * 60);
        header('Location:login.php');
    }else{
        header('location:http://www.google.es');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form action="politicaCookies.php" method="post" id="form" name="form">
            <h1>política de cookies</h1><br><br>
            <input type="submit" value="acceptar" name="acceptar"><br>
            <input type="submit" value="rebutjar">
            
        </form>
    </body>
</html>