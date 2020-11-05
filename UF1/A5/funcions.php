<?php
# Funciones para validar formulario de alta

function valida_contrasena($contrasena1,$errors){
    if(strlen($contrasena1) < 6 || strlen($contrasena1) > 8){
        $errors = $errors . "La contraseña debe tener entre 6 y 8 caracteres. ";
    }
    if (!preg_match('/[a-z]/',$contrasena1)){
        $errors = $errors . "La contraseña debe tener al menos una letra minúscula. ";
    }
    if (!preg_match('/[A-Z]/',$contrasena1)){
        $errors = $errors . "La contraseña debe tener al menos una letra mayúscula. ";
    }
    if (!preg_match('/[0-9]/',$contrasena1)){
        $errors = $errors . "La contraseña debe tener al menos un caracter numérico. ";
    }
    if (!preg_match('/[#~$%!]/',$contrasena1)){
        $errors = $errors . "La contraseña debe tener al menos un caracter de estos '#~$%!'. ";
    }
return $errors;
}

function valida_nombre($usuario){
    $errors ="";
    if (preg_match('/[0-9#~$%!]/',$usuario)){
        $errors = "El campo nombre debe contener texto";
    }
return $errors;
}

function valida_correo($email){
    $errors = "";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors = "Esta dirección de correo no es válida.";
    }
return $errors;
}


# Final funciones formulario de alta

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

# Generador de password

function random_password()  
{  
  $longitud = 8; // longitud del password  
  $pass = substr(md5(rand()),0,$longitud);  
  return($pass); // devuelve el password   
}  

#Conexión base de datos
function conexion()
{
    $ip = 'localhost';
    $usuari = 'fcarrillo';
    $password = 'fcarrillo';
    $db_name = 'fcarrillo_A5';


    $con = mysqli_connect($ip,$usuari,$password,$db_name);
    if (!$con)  {
            echo "Ha fallat la connexió a MySQL: " . mysqli_connect_errno();
        echo "Ha fallat la connexió a MySQL: " . mysqli_connect_error();
    }
    return($con);
}


?>        