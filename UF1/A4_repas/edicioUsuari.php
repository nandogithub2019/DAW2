<?php
session_start();

include('funcions.php');

$nom = $email = $password = $usuari = $clave = "";

if(isset($_SESSION["nom"]) && isset($_SESSION["email"])){
    $_nombre=$_SESSION["nom"];
    $_email = $_SESSION["email"];
  } else{
    $_nombre=$_COOKIE["nom"];
    $_email = $_COOKIE["email"];
  }

if (( isset($_SESSION["validacioncorrecta"]) && $_SESSION["validacioncorrecta"] == true) ||  isset($_COOKIE["password"])){  



if($_SERVER['REQUEST_METHOD']=='POST'){

    if($_REQUEST['password1']==$_REQUEST['password2']){
        
            $clave = $_REQUEST['email'];
            if(updateUser($_REQUEST['nom'], $clave, $_REQUEST['emailold'], $_REQUEST['password1'], $_REQUEST['rol_id'])){
                if(!isAdmin($_email)){
                    echo "Usuari modificat correctament, tornar <a href=usuari.php>aquí</a>";
                header('Location:usuari.php');
                }else{
                    echo "Usuari modificat correctament, tornar <a href=usuaris.php>aquí</a>"; 
                    header('Location:usuaris.php');
                }
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

<?php
/* $email = $_REQUEST['email']; */
$usuari = getUser($_GET['email']); // obte les dades amb l'email

$nom = $usuari['nom'];
$email = $usuari['email'];
/* $email = $_REQUEST['email']; */
$rol_id = $usuari['rol_id'];
$password = "";

?>

    <form action="edicioUsuari.php" method="POST">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" value="<?=$nom?>"><br><br>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value="<?=$email?>"><br><br>
        <input type="hidden" id="emailold" name="emailold" value="<?=$email?>">
        <label for="password1">Password 1:</label>
        <input type="password" name="password1" id="password1" value="<?=$password?>"><br><br>
        <label for="password2">Password 2:</label>
        <input type="password" name="password2" id="password2" value="<?=$password?>"><br><br>
        <input type="hidden" name="rol_id" id="rol_id" value="<?=$rol_id?>">
        <input type="submit" value="Actualitzar">
    </form>
</body>
</html>

<?php
}else{
    header('Location:login.php');
}
?>