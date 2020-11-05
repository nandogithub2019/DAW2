<?php
session_start();
/* Inicio de sesión para poder trabajar con variables de sesión
si se pulsa logout se destruye la sesión y las cookies
y reirige a la pagina de inicio*/

if(isset($_REQUEST["logout"])){
  session_destroy(); 
  setcookie("password",0,1);
  setcookie("nomusuari",0,1);
  header('Location:login.php'); 
}

/* Comprueba si se han creado variables de sesión o de
cookies, comprueba que sean correctas.
Por último, crea una variable con el nombre del 
usuario tanto si accedes variables de sesión o de
cookie. sino se han creados variables de sesión o de cookies
se redirige a la página de login */

if(isset($_SESSION["validacioncorrecta"])&& $_SESSION["validacioncorrecta"]==true || isset($_COOKIE["password"])){

 /*Para mantener los datos
 comprueba si se accede mediante variables de sesión
 o de cookies */      
  if(isset($_SESSION["nom"])){
    $_nombre=$_SESSION["nom"];
    
  } else{
    $_nombre=$_COOKIE["nomusuari"];
    
  }   

?>
<!--Estructura mediante Bootstrap -->
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Area privada</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    <script src="lib/js/jquery-3.3.1.min.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
    <?php
        require("funcions.php");
    ?>
  </head>
  <body>
    <div class="container">
      <nav class="navbar navbar-primary" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
   para mostrarlos mejor en los dispositivos móviles -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
        data-target=".navbar-ex1-collapse">
        <span class="sr-only">Desplegar navegación</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
      <a class="navbar-brand" href="#">Area Privada</a>
      </div>

  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
   otro elemento que se pueda ocultar al minimizar la barra -->
   <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li><a href="privada.php">Area Privada</a></li>
      
        <?php 
          if($_nombre=="admin"){
        ?>
        <li><a href="usuarios.php">Gestión de usuarios</a></li>
        <?php 
          }else{
        ?>
        <li><a href="edicionUsuario.php">Edición de Usuario</a></li>
        <?php 
          }
        ?>
  
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><?php  print_r($_nombre)?></a></li>
      <li><a href="privada.php?logout">Logout</a></li>
    </ul>
  
</ul>
</div>
</nav>
</div>
<div class="container">
    <div class="panel panel-primary">
      <div class="panel-footer">
        <label class="control-label" class="has-success">
        <p class="text-muted small">Area privada
        <br> 
        
        </p>
        </label> 
      </div>
    </div>
  </div>
        
</body>
<footer>
  
</footer>  
</html>
<?php
}else{
  header('Location:login.php');
}

?>