<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $modulo = isset($_POST["modulo"]) ? trim($_POST["modulo"]) : "";
    $asunto = trim($_POST["asunto"]);
    $descripcion = trim($_POST["descripcion"]);
    $errores = array();
    $modulos_validos = array("DEW", "DOR", "DPL", "DSW", "SOJ", "CL4", "E1B", "IPW");
    
    function comprobarEmail($correo){
    global $errores;
    if($correo == "")
        $errores[] = "No se ha escrito ningún email.";
    else (!filter_var($correo, FILTER_VALIDATE_EMAIL))
        $errores[] = "El email '$correo' no es válido.";
    }


    if($modulo == "")
        $errores[] = "No se ha seleccionado ningún módulo.";
    else if(!in_array($modulo, $modulos_validos))
        $errores[] = "El módulo '$modulo' no es correcto.";

    if(strlen($asunto) > 50 || ctype_alpha($asunto))
        $errores[] = "El asunto tiene valores numericos o supera la cantidad máxima de caracteres (50).";

    if(strlen($descripcion) > 300)
        $errores[] = "La descripción supera el límite de caracteres (300).";

    if(count($errores) > 0) {
        echo "<html>
        <head>
            <title>Resultado</title>
        </head>
        <body>
            <h2>Duda no registrada</h2>
            <ul>";
        foreach($errores as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>
            <a href='formulario.php'>Enviar otra duda</a>
        </body>
        </html>";
    } else 
    {
        $linea = "\"$email\";\"$modulo\";\"$asunto\";\"$descripcion\"\n";
        $ruta = __DIR__. "/data/dudas.csv";
        file_put_contents($ruta, $linea, FILE_APPEND | LOCK_EX);

        echo 
        "<html>
        <head>
            <title>Resultado</title>
        </head>
        <body>
            <h2>Duda registrada</h2>
            <a href='formulario.php'>Enviar otra duda</a>
        </body>
        </html>";
    }
}
?>