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

  /*Para cargar la nueva publicación y mantener los datos
 comprueba si se accede mediante variables de sesión
 o de cookies */      
 if(isset($_SESSION["nom"])){
  $_nombre=$_SESSION["nom"];
  
 } else{
  $_nombre=$_COOKIE["nomusuari"];
  
}   
  
?>
<!DOCTYPE html>
<html>
<head>
    
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
</head>
<body>
    <?php
    /*Realiza los filtros para los campos del formulario*/ 
        $usuario = $email = $contrasena = $contrasena1 = $contrasena2 = "";
        $errUsu = $erremail = $errCont1 = $errCont2 = $errors = "";
        if (isset($_REQUEST['submit'])){
            if (empty($_REQUEST["usuario"])) {
                $errUsu = "Es obligatorio informar el usuario.";
            }else{
                $usuario = test_input($_REQUEST["usuario"]);
            }
            if (empty($_REQUEST["email"])) {
                $erremail = "Es obligatorio informar el correo.";
            }else{
                $email = test_input($_REQUEST["email"]); 
            }                            
            if (empty($_REQUEST["contrasena1"])) {
                $errCont1 = "Es obligatorio informar la contraseña.";
            }else{
                $contrasena1 = test_input($_REQUEST["contrasena1"]);
            }
            if (empty($_REQUEST["contrasena2"])) {
                $errCont2 = "Es obligatorio informar la contraseña.";
            }else{
                $contrasena2 = test_input($_REQUEST["contrasena2"]);
            }
            
            if (empty($errusuario) && empty($erremail) && empty($errCont1) && empty($errCont2) && empty($errUsu)){
              
                if($contrasena1 != $contrasena2){
                   
                    $errors=$errors."Las contraseñas no coinciden.";
                    
                }else{
                    $errors=valida_contrasena($contrasena1,$errors);
                    $errUsu=valida_nombre($usuario);
                    $erremail=valida_correo($email);

                    if (empty($errors) && !$erremail && !$errUsu){
                    /*Si el usuario ha introducido los datos correctamente
                    se introduce el usuario en la base de datos */// dades de configuració
                    $con = conexion();
    
                        if(isset($_REQUEST["email"])){
                            $clave = $_REQUEST["email"];
                            
                            $sql = 'UPDATE usuaris SET nom ="'.$usuario.'", email ="'.$clave.'", password = "'.$contrasena1.'"
                            WHERE email ="'.$_REQUEST["emailold"].'"';
                        
                            $resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' .mysqli_error($con));
                        }
                        /* mysqli_query nos permite ejecutar una sentencia sql, utilizando dos parametros
                        la conexión y la sentencia que queremos ejecutar.
                        Esto nos da un resultado que lo tenemos que meter en una estructura */
                        
                             
                            if($_nombre=="admin"){
                                
                                header('Location:usuarios.php');
                            }else{
                                header('Location:edicionUsuario.php');
                            }
                                                            
                        
                    }
                
                }    
            
            }
        }
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
       
    
    ?>

    <div class="container">
        <br> 
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                    Editar Usuario
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>

                        <form method="post" action="editar_usuario.php">
                            <div class="form-group">
                            <label for="formControlText">Nombre:</label> 
                            <input class="form-control" type="text" id="formControlText" name="usuario" value="<?=$usuario?>">
                            <span class="error"> <?=$errUsu?></span>
                            </div>
                                               
                           
                            <div class="form-group">
                            <label for="formControlText">Email:</label> 
                            <input class="form-control" type="text" id="formControlText" name="email" value="<?=$email?>" size="20">
                            <input class="form-control" type="hidden" id="formControlText" name="emailold" value="<?=$email?>">

                            <span class="error"> <?=$erremail?></span>
                            </div>
                            

                            <div class="form-group">
                            <label for="formControlText">Contraseña:</label> 
                            <input class="form-control" id="formControlText" type="password" name="contrasena1" value="<?=$contrasena1?>" placeholder="Nand1!">
                            <span class="error"> <?=$errCont1?></span>
                            </div>
                            
                            
                            <div class="form-group">   
                            <label for="formControlText">Repite contraseña:</label> 
                            <input class="form-control" id="formControlText" type="password" name="contrasena2" value="<?=$contrasena2?>" placeholder="Nand1!">
                            <span class="error"> <?=$errCont2?></span>
                            </div>
                            

                            <div class="form-group"> 
                            <input type="submit" class="btn btn-info" name="submit" value="enviar">
                            <?php 
                                if($_nombre=="admin"){
                                ?>
                                <a class="btn btn-success"  href="usuarios.php">Volver</a>
                                </div>
                                <?php 
                                }else{
                                ?>
                                <a class="btn btn-success"  href="edicionUsuario.php">Volver</a>
                                </div>
                                <?php 
                                }
                                ?>
                            </div>
                            
                            <br><br>
                            <div class="alert alert-success"><?=$errors?>
                            </div>
                        
                        </form>
                    </div>
                </div>    
            </div>
        </div>
    </div>    
            
</body>
</html>


<?php
}else{
  header('Location:login.php');
}

?>

 