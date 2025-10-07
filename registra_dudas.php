<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $modulo = trim($_POST["modulo"]);
    $asunto = trim($_POST["asunto"]);
    $descripcion = trim($_POST["descripcion"]);
    $errores = null;
    $modulos_validos = array("DEW", "DOR", "DPL", "DSW", "SOJ", "CL4", "E1B", "IPW");
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        $errores = "El email '$email' no es valido. \n";

    if(!in_array($modulo, $modulos_validos))
        $errores = $errores . "El modulo '$modulo' no es correcto. \n";

    if(strlen($asunto)>50 && ctype_alpha($asunto))
        $errores = $errores . "El asunto supera la cantidad máxima de caracteres (50). \n";

    if(strlen($descripcion) > 300)
        $errores = $errores . "La descripción supera el límite de caracteres 300. \n";

    if($errores!=null)
        echo "$errores
        <html>
        <head>
            <title>Resultado</title>
        </head>
        <body>
            <br>
            <a href='formulario.php'>Enviar otra duda</a>
        </body>
        </html>";
    
    else{
    

        $linea = "\"$email\";\"$modulo\";\"$asunto\";\"$descripcion\"\n";
        $ruta = __DIR__. "/data/dudas.csv";
        file_put_contents($ruta, $linea, FILE_APPEND | LOCK_EX);

        echo "Duda registrada correctamente.
        <html>
        <head>
            <title>Resultado</title>
        </head>
        <body>
            <br>
            <a href='formulario.php'>Enviar otra duda</a>
        </body>
        </html>";
    }
}
?>