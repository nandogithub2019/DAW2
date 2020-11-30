<!--Extructura HTML usando Bootstrap -->
<!DOCTYPE html>
<html>
<head>
    
    <title>Alta de usuarios</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    <script src="lib/js/jquery-3.3.1.min.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
    <?php
        
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        require 'PHPMailer-master/src/Exception.php';
        require 'PHPMailer-master/src/PHPMailer.php';
        require 'PHPMailer-master/src/SMTP.php';
       
        require("funcions.php");
    ?>
</head>
<body>
    <?php
    /* Realiza los filtros para los campos del formulario */ 
        $email = $erremail ="";

        if (isset($_REQUEST['submit'])){
           
            if (empty($_REQUEST["email"])) {
                $erremail = "Es obligatorio informar el correo.";
            }else{
                $email = test_input($_REQUEST["email"]); 
                $erremail=valida_correo($email);    
            }                            
            
            if (!$erremail){
                /*Si el usuario ha introducido los datos correctamente
                  se introduce el usuario en la base de datos */
                    // Se establece la conexión
                    $con = conexion();
                    //Consultes a la base de dades (SELECT)
  
                    $sql = "select email from t_crud where email='".$email."'";

                   
                     $resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
                    //convertim a array associatiu
                    //print_r($resultat);
                    if($resultat->num_rows==1){
                        $resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' .mysqli_error($con));
                    }
                    /* mysqli_query nos permite ejecutar una sentencia sql, utilizando dos parametros
                    la conexión y la sentencia que queremos ejecutar.
                    Esto nos da un resultado que lo tenemos que meter en una estructura */
                    
                    /* Genera password para enviar por correo */ 
                    $pass = random_password();
                    
                    /* Guardo el pass en la base de datos */
                  
                    $sql = 'UPDATE t_crud SET contrasenya = "'.$pass.'"
                        WHERE email ="'.$_REQUEST["email"].'"';
                    $resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
                    /* Envía correo de recuperación */
                    

                    // Instantiation and passing `true` enables exceptions
                    $mail = new PHPMailer(true);

                    try {
                        //Server settings
                        $mail->SMTPDebug = 0;
                        $mail->SMTPOptions = array(
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                            )
                        );                                       // Enable verbose debug output
                        $mail->isSMTP();     
                        $mail->Host       = "smtp.gmail.com";  // Specify main and backup SMTP servers
                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                        $mail->Username   = 'nandocorreo@gmail.com';                     // SMTP username
                        $mail->Password   = 'ohmfmxinvntvcalu';                               // SMTP password
                        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                        $mail->Port       = 587;    
                                                        // TCP port to connect to

                        //Recipients
                        $mail->setFrom('nandocorreo@gmail.com', 'info');
                        $mail->addAddress($_REQUEST["email"], 'Nan');     // Add a recipient
                        

                        

                        // Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'Recuperar pass';
                        $mail->Body    = 'el pass es:'.$pass;
                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                        $mail->send();
                        ?>
                        <div class="container">
                        <br><br>
                        <div class="alert alert-success">El mensaje se ha enviado correctamente, 
                        tu nuevo pass se encuentra disponible en el correo indicado</div>
                        
                        <P><a href="login.php" class="btn btn-success">Volver</a></p>
                        </div>
                        <?php 
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }                                
                                                
                    
            }
                
        }else{ 
    ?>
    <div class="container">
        <br><br>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="panel panel-success">
                <div class="panel panel-heading">
                  <h3 class="panel-title">Recuperación de contraseña</h3>
                </div>
                <div class="panel panel-body"> 
                    <form method="post" action="recuperar_pass.php">
                    
                        <div class="form-group">
                        <label class="control-label" class="has-success">Introduce tu Email:</label> 
                        <input class="form-control" type="text" name="email" value="<?=$email?>" size="20">
                        <input class="form-control" type="hidden" name="emailold" value="<?=$email?>">

                        <span class="error"> <?=$erremail?></span>
                        </div>
                    
                        <div class="form-group"> 
                        <input type="submit" name="submit" value="enviar" class="btn btn-success">
                        </div>
                        <?php
                        echo "$erremail";
                        ?>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>    
            
</body>
</html>


<?php
}
?>