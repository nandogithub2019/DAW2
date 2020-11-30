<?php

/* Dades de connexió */
$ip = 'localhost';
$usuari = 'fcarrillo';
$password = 'fcarrillo';
$db_name = 'fcarrillo_A5';
/* Controla el contingut dels camps dels input text */
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
/* Comprova el format correcte del email */
function test_email($email, $errorEmail){
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errorEmail = "Format no vàlid";
  }
  return $errorEmail;
}
/* Comprova que el camp del password només hi hagin lletres i números */
function test_password($password, $errorPassword){
  if (!preg_match("/^[a-zA-Z0-9-' ]*$/",$password)) {
    $errorPassword = "Ha de contenir lletre o números";
  }
  return $errorPassword;  
}
/* Quan surt de l'àrea privada, elimina la sessió i esborra la cookie de mantenir sessió oberta */
function logout(){
    session_destroy();
    setcookie("mantenirSessio",0,1);
    setcookie("password",0,1);
    setcookie("email",0,1);
    /* setcookie('mantenirSessio', $pass, time() - 100); */
    header('Location:login.php');
}
/* Connexio amb la base de dades */
/* function conexio($ip,$usuari,$password,$db_name){
    
    $conn = new mysqli($ip,$usuari,$password,$db_name);
    if (!$conn->connect_error)  {
        die("Connection failed: ". $conn->connect_error);
    }
    return($conn);
} */

function addUser($nom, $email, $password, $rol_id){

  $conn = connectDB('localhost', 'fcarrillo', 'fcarrillo', 'fcarrillo_A5');
  $sql = "insert into usuaris (nom, email, password, rol_id) values ('$nom','$email',md5('$password'), $rol_id)";
  if(!$conn->query($sql)){
    die("Connexió fallida!". $conn->error);
  }
  return true;
}

function updateUser($nom, $email, $oldemail, $password, $rol_id){
  $password = md5($password);
  $conn = connectDB('localhost', 'fcarrillo', 'fcarrillo', 'fcarrillo_A5');

  $sql = "UPDATE usuaris SET nom ='$nom', email ='$email', password = '$password', rol_id = $rol_id
  WHERE email ='$oldemail'";
  if(!$conn->query($sql)){
    die("Connexió fallida!". $conn->error);
  }
  return true;
}


function connectDB($server, $user, $pass, $db){
  $conn = new mysqli($server, $user, $pass, $db);
  
  if($conn->connect_error){
    die("Connexió fallida!". $conn->connect_error);
  }
  return $conn;
}

/* retorna true si existeix el email
  retorna false si no existeix
*/
function checkEmailExist($email){

  $result = false;
  $conn = connectDB('localhost', 'fcarrillo', 'fcarrillo', 'fcarrillo_A5');
  $sql = "select * from usuaris where email = '$email'";
  if (!$resultat = $conn->query($sql)){
    die("Connexió fallida!". $conn->error);
  }
  if ($resultat->num_rows == 1){
    $result = true;

  }
  return $result;
}

function checkPasswordExist($password){
  $resultat="";
  $result = false;
  $conn = connectDB('localhost', 'fcarrillo', 'fcarrillo', 'fcarrillo_A5');
  $sql = "select * from usuaris where password = '$password'";
  if (!$resultat = $conn->query($sql)){
    die("Connexió fallida!". $conn->error);
  }
  if ($resultat->num_rows >= 1){
    $result = true;

  }
  return $result;
}

function isAdmin($email){

  $admin = false;
  $conn = connectDB('localhost', 'fcarrillo', 'fcarrillo', 'fcarrillo_A5');
  $sql = "select * from usuaris where email = '$email' and rol_id =1 ";
  if (!$resultat = $conn->query($sql)){
    die("Connexió fallida!". $conn->error);
  }
  if ($resultat->num_rows >= 1){
    $admin = true;

  }
  return $admin;

}
function getUserId($email){

  $usuari['id']=0;
  $conn = connectDB('localhost', 'fcarrillo', 'fcarrillo', 'fcarrillo_A5');
  $sql = "select * from usuaris where email = '$email'";
  if (!$resultat = $conn->query($sql)){
    die("Connexió fallida!". $conn->error);
  }
  if ($resultat->num_rows >= 1){
    $usuari = $resultat->fetch_assoc();

  }
  return $usuari['id'];

}

function getUserName($email){

  $usuari['nom']="";
  $conn = connectDB('localhost', 'fcarrillo', 'fcarrillo', 'fcarrillo_A5');
  $sql = "select * from usuaris where email = '$email'";
  if (!$resultat = $conn->query($sql)){
    die("Connexió fallida!". $conn->error);
  }
  if ($resultat->num_rows >= 1){
    $usuari = $resultat->fetch_assoc();

  }
  return $usuari['nom'];

}

function getUser($email){

  $email1 = $email;
  $usuari ="";
  $conn = connectDB('localhost', 'fcarrillo', 'fcarrillo', 'fcarrillo_A5');
  $sql = "select * from usuaris where email = '$email1'";
  if (!$resultat = $conn->query($sql)){
    die("Connexió fallida!". $conn->error);
  }
  if ($resultat->num_rows >= 1){
    $usuari = $resultat->fetch_assoc();

  }
  return $usuari;

}

function deleteUser($email){
  
  $conn = connectDB('localhost', 'fcarrillo', 'fcarrillo', 'fcarrillo_A5');

  $sql = "DELETE FROM usuaris where email ='$email'";
  if(!$conn->query($sql)){
    die("Connexió fallida!". $conn->error);
  }
  return true;
}


function listUsers(){

  $conn = connectDB('localhost', 'fcarrillo', 'fcarrillo', 'fcarrillo_A5');
  $sql = "select * from usuaris";
  if (!$resultat = $conn->query($sql)){
    die("Connexió fallida!". $conn->error);
  }
  if ($resultat->num_rows >=0 ){
    
    while ($usuari = $resultat->fetch_assoc()) {
      echo $usuari['id']." -- ".$usuari['nom']." -- ".$usuari['email']." -- ".$usuari['password']." -- ".$usuari['rol_id']."<a href=edicioUsuari.php?email=".$usuari['email'].">[Edicio]</a><a href=esborrarUsuaris.php?email=".$usuari['email'].">[Esborrar]</a><br>";
    }
  }


}

function listUser($email){

  /* $usuari['nom']=""; */
  $conn = connectDB('localhost', 'fcarrillo', 'fcarrillo', 'fcarrillo_A5');
  $sql = "select * from usuaris where email = '$email'";
  if (!$resultat = $conn->query($sql)){
    die("Connexió fallida!". $conn->error);
  }
  if ($resultat->num_rows >= 1){

    $usuari = $resultat->fetch_assoc();
    echo"<br>";
    echo $usuari['id']." -- ".$usuari['nom']." -- ".$usuari['email']." -- ".$usuari['password']." -- ".$usuari['rol_id']."<a href='edicioUsuari.php'>[Edicio]</a><a href='esborrarUsuari.php'>[Esborrar]</a><br>";
    
  }


}

function random_password()  
{  
  $longitud = 8; // longitud del password  
  $pass = substr(md5(rand()),0,$longitud);  
  return($pass); // devuelve el password   
}  

?>
