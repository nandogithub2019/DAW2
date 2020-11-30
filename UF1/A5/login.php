<?php

session_start();
require("funcions.php");
$error="";
$pass ="";


/* si existe la cookie del password comprueba 
que sean correctas para mantener la sesión 
aún cerrando el navegador*/
if(isset($_COOKIE["password"])){    

  $con = conexion();
  // connectem amb la db
  

  
  //Consultes a la base de dades (SELECT)
  $sql = "select password from usuaris where nom='".$_COOKIE["nomusuari"]."' and password='".$_COOKIE["password"]."' ";


  $resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
  //convertim a array associatiu
  
          if($resultat->num_rows==1){
            
             
          
            $_SESSION["validacioncorrecta"]=true;
            $_SESSION["nom"]=$_COOKIE["nomusuari"];
            // $_SESSION["pass"]=md5(sha1($_REQUEST["password"]));

              header('Location:privada.php');      
              
          }else{
            setcookie("password",0,1);
            setcookie("nomusuari",0,1);
              $error="Usuario o contraseña incorrecta.";
          }



}         
/*Al hacer submit crea variables de sesión cifrando el pass
comprueba que coincidan con el cifrado. De esta manera
las variables de sesión creadas se pueden utilizar en las
diferentes páginas mientras no se cierre sesión.
Si marcamos el check recordar, se crean variables de cookie
para mantener la sesión abierta */
if(isset($_REQUEST["submit"])){

        
  $con = conexion();

  $pass = md5($_REQUEST['password']);
  //Consultes a la base de dades (SELECT)
  $sql = "select password from usuaris where email='".$_REQUEST["email"]."' and password='"."$pass"."' ";

/* mysqli_query nos permite ejecutar una sentencia sql,dando dos parametros
la conexión y la sentencia que queremos ejecutar.
Esto nos da un resultado que lo tenemos que meter en una estructura
*/ 
  $resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
  //convertim a array associatiu
  
          if($resultat->num_rows==1){

              if(isset($_REQUEST["recordar"]) && $_REQUEST["recordar"]==1){
                  setcookie("password",md5($_REQUEST['password']),time()+365*24*60*60);
                  setcookie("nomusuari",$_REQUEST["email"],time()+365*24*60*60); 
                  $_SESSION["nom"]=$_COOKIE["email"];
                  
              }
          
            $_SESSION["validacioncorrecta"]=true;
            $_SESSION["nom"]=$_REQUEST["email"];
            $_SESSION["password"]=$pass;
            // $_SESSION["pass"]=md5(sha1($_REQUEST["password"]));

              header('Location:privada.php');      
          }else{
              $error="Usuario o contraseña incorrecta.";
          }
}
# Redirige al formulario de alta si se pulsa dicho boton
if(isset($_REQUEST["alta"])){
    header('Location:alta.php');
}
?>

<!--Estructura HTML usando Bootstrap -->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title></title>


  <!-- Font Awesome Icons -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="css/creative.min.css" rel="stylesheet">
  
</head>
<body>
  
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form method="post" class="form-signin">
              <div class="form-label-group">
                <input type="text" id="" name="email" class="form-control" placeholder="Email">
                <label for="inputName"></label>
              </div>

              <div class="form-label-group">
                <input type="password" id="" name="password" class="form-control" placeholder="Password">
                <label for="inputPassword"></label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" name="recordar" value="1" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <input type="submit" name="submit" value="Enviar" class="btn btn-lg btn-success btn-block text-uppercase">
              <br>
              <input type="submit" name="alta" value="Alta" class="btn btn-lg btn-info btn-block text-uppercase">
              <hr class="my-4">
              <a href="recuperar_pass.php">¿Has olvidado la contraseña?</a>
            </form>
          </div>
          <div><?=$error?></div> 
        </div>
      </div>
    </div>
  </div>
  
  
</body>


</html>
