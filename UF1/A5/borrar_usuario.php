<?php

# Inicio de sesión para poder trabajar con variables de sesión
session_start();
/*si se pulsa logout se destruye la sesión y las cookies
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
 
    ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Area Privada</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <?php
        require("funcions.php");
    ?>
</head>

<body>
<?php


$usuario = $email = $data = $contrasena = $contrasena1 = $contrasena2 = "";
$errUsu = $erremail = $errCont1 = $errCont2 = $errors = "";


$con = conexion();    
        /* mysqli_query nos permite ejecutar una sentencia sql,dando dos parametros
        la conexión y la sentencia que queremos ejecutar.
        Esto nos da un resultado que lo tenemos que meter en una estructura */
        if(isset($_REQUEST["email"])){
            $sql ="SELECT * FROM usuaris where email ='".$_REQUEST["email"]."'";
            $resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' .mysqli_error($con));
            $registre = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
            $usuario = $registre['nom'];        
            $email = $registre['email'];
            $contrasena1 = $registre['password'];
            $contrasena2 = $registre['password'];
    }    
    //if (isset($_REQUEST['borrar'])){
        
        ?>
    <div class = "container">    
        <div class="modal fade" tabindex="-1" id="ModalUser" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Borrado de usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body">
                    <p>Estás seguro de borrar el ususario <?=$usuario?>?</p>
                </div>
                <div class="modal-footer">
                <form method="post" action="">
                <input type="submit" name="submit" value="Borrar" class="btn btn-primary">                    
                <a class="btn btn-success" href="usuarios.php">Volver</a>

              </form>
                <?php 
                    
                    if (isset($_REQUEST['submit'])){
                        $con = conexion();    
                       /* mysqli_query nos permite ejecutar una sentencia sql,dando dos parametros
                       la conexión y la sentencia que queremos ejecutar.
                       Esto nos da un resultado que lo tenemos que meter en una estructura */
                      
                            
                       $sql ="DELETE FROM usuaris where email ='".$_REQUEST["email"]."'";
                       $resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' .mysqli_error($con)); 
                       header('Location:usuarios.php');
                      
                  
       
                   }
                ?>
                </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        <!--<div class="alert alert-danger">Al pulsar "Borrar usuario", borrarás al usuario
        de la base de datos. 
        </div>-->
    </div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/creative.min.js"></script>
  <script>
$(document).ready(function(){
  
    $("#ModalUser").modal();

    $('.close').on('click', function(){
      var url = "usuarios.php"; 
      $(location).attr('href',url);
        
        
    });
  });

</script>
          
    </body>
</html>
    <?php
}else{
  header('Location:login.php');
}

?>    