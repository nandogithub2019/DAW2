<?php
session_start();

include('funcions.php');

$usuari ="";
if(isset($_SESSION["nom"]) && isset($_SESSION["email"])){
    $_nombre=$_SESSION["nom"];
    $_email = $_SESSION["email"];
  } else{
    $_nombre=$_COOKIE["nom"];
    $_email = $_COOKIE["email"];
  } 
  // noméaa admin te accés a alta de usuaris
if(!isAdmin($_email)){
    header('Location:login.php');
}    


if($_SERVER['REQUEST_METHOD']=='POST'){
   
    
    if(deleteUser($_REQUEST['email'])){
        header('Location:usuaris.php');
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
    $usuari = getUser($_GET['email']); // obte les dades amb 
    $email = $usuari['email'];
    
?>
    <form action="esborrarUsuaris.php" method="POST">
        
        <input type="submit" value="Esborrar">
        <input type="hidden" name="email" value="<?=$email?>">
    </form>
</body>
</html>

