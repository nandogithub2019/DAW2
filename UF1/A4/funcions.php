<?php
/* Controla el contingut dels camps dels input text */
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
/* Comprova el format correcte del email */
function test_email($email){
  $errorEmail ="";
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errorEmail = "Format no vàlid";
  }
  return $errorEmail;
}
/* Comprova que el camp del password només hi hagin lletres i números */
function test_password($password){
  $errorPassword="";
  if (!preg_match("/^[a-zA-Z0-9-' ]*$/",$password)) {
    $errorPassword = "Ha de contenir lletre o números";
  }
  return $errorPassword;  
}
/* Quan surt de l'àrea privada, elimina la sessió i esborra la cookie de mantenir sessió oberta */
function logout(){
    session_destroy();
    setcookie("mantenirSessio",0,1);
    /* setcookie('mantenirSessio', $pass, time() - 100); */
    header('Location:login.php');
}

?>
