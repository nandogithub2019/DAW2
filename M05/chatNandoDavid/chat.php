



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="contenidor">        
        <div class="formulari">
            <form action="chat.php" method="post"><br>
                <fieldset>
                <legend>Chat</legend>
                <label for="texto">introduce el texto a enviar</label> <br>   
                <input type="text" name="texto" id="texto">    
                <input type="submit" value="Enviar">
                
                </fieldset>
            </form>
        </div>
        <div class="chat"></div>
    </div>
</body>
</html>