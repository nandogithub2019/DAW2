<?php
session_start();

include('funcions.php');

if($_SERVER['REQUEST_METHOD']=='POST'){

    if($_REQUEST['password1']==$_REQUEST['password2']){
        if(!checkEmailExist($_REQUEST['email'])){
            
            if(addUser($_REQUEST['nom'], $_REQUEST['email'], $_REQUEST['password1'], $_REQUEST['rol_id'])){
                echo "Usuari creat correctament, pots ingresar en aquest enllaç <a href=login.php>aquí</a>";
            }

        }else{
            echo "El email ja existeix...<br>";
        }

    }else{
        echo "Els passwords no coincideixen...<br>";
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
    <form action="altausuari.php" method="POST">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom"><br><br>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email"><br><br>
        <label for="password1">Password 1:</label>
        <input type="password" name="password1" id="password1"><br><br>
        <label for="password2">Password 2:</label>
        <input type="password" name="password2" id="password2"><br><br>
        <input type="hidden" name="rol_id" id="rol_id" value=2>
        <input type="submit" value="Afegir">
    </form>
</body>
</html>