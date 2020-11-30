<?php

# Inicio de sesión para poder trabajar con variables de sesión
session_start();
/*si se pulsa logout se destruye la sesión y las cookies
y reirige a la pagina de inicio*/
if(isset($_REQUEST["logout"])){
  session_destroy(); 
  setcookie("password",0,1);
  setcookie("email",0,1);
  header('Location:login.php'); 
}

/* Comprueba si se han creado variables de sesión o de
cookies, comprueba que sean correctas.
Por último, crea una variable con el nombre del 
usuario tanto si accedes variables de sesión o de
cookie. sino se han creados variables de sesión o de cookies
se redirige a la página de login */
if(isset($_SESSION["validacioncorrecta"])&& $_SESSION["validacioncorrecta"]==true || isset($_COOKIE["password"])){

  
 
/*Para cargar la nueva publicación y mantener los datos
 comprueba si se accede mediante variables de sesión
 o de cookies */      
 if(isset($_SESSION["nom"])){
  $_nombre=$_SESSION["nom"];
  
} else{
  $_nombre=$_COOKIE["email"];
  
}   

?>

<!--Extructura HTML usando Bootstrap -->

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
          <a class="navbar-brand" href="#"></a>
        </div>

        <!-- Agrupar los enlaces de navegación, los formularios y cualquier
        otro elemento que se pueda ocultar al minimizar la barra -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <li><a href="privada.php">Area Privada</a></li>
            
            <?php 
              if($_nombre=="admin@admin.com"){
              ?>
              <li><a href="usuarios.php">Gestión de usuarios</a></li>
              
            <?php 
            }
            ?>
            

          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><?php  print_r($_nombre)?></a></li>
            <li><a href="usuarios.php?logout">Logout</a></li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="container"> 
      <div class="panel panel-primary">
      <!-- Default panel contents -->
          <div class="panel-heading">Gestión de Usuarios</div>

          <!-- Table -->
          <table class="table table-responsive table-striped table-hover">
      <thead>
          <tr>
              <th>Id</th>
              <th>nombre</th>
              <th>Email</th>
              <th>Contraseña</th>
              <th>Rol</th>
              <th>Añadir</th>
              <th>Modificar</th>
              <th>Borrar</th>
          </tr>
      </thead>
      <tbody>
          <?php    
          $con = conexion();
          $sql = 'SELECT * FROM usuaris';
          /* mysqli_query nos permite ejecutar una sentencia sql,dando dos parametros
          la conexión y la sentencia que queremos ejecutar.
          Esto nos da un resultado que lo tenemos que meter en una estructura */
          
          $resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' .mysqli_error($con));
          //convertim a array associatiu   
        
          
          while ($registre = mysqli_fetch_array($resultat, MYSQLI_ASSOC)){
              echo "<tr>";
              
              foreach ($registre as $key=>$col_value) {
                  echo "<td>$col_value</td>";
                  
              }
              echo"<td>";
                  echo'<a href="alta.php?email='.$registre['email'].'"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>';
              echo"</td>";
              echo"<td>";
                  echo'<a href="editar_usuario.php?email='.$registre['email'].'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
              echo"</td>";
            
              echo"<td>";
              echo'<a href="borrar_usuario.php?email='.$registre['email'].'"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>';
              echo"</td>";
              echo "</tr>";
          }
          echo "<tbody>";
          echo "</table>";
          
          ?>
          
          
      </div>
    </div> <!--Final container de la tabla-->
          
          

  </body>
  <footer>
    
  </footer>  
</html>

<?php
}else{
  header('Location:login.php');
}

?>