<?php
error_reporting(0); 
require_once __DIR__ . '/includes/validaciones.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST" && $_SERVER["REQUEST_METHOD"] !== "GET") {
    exit("Acceso denegado");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET") {
    $email = isset($_REQUEST["email"]) ? htmlspecialchars(trim($_REQUEST["email"])) : "";
    $modulo = isset($_REQUEST["modulo"]) ? htmlspecialchars(trim($_REQUEST["modulo"])) : "";
    $asunto = isset($_REQUEST["asunto"]) ? htmlspecialchars(trim($_REQUEST["asunto"])) : "";
    $descripcion = isset($_REQUEST["descripcion"]) ? htmlspecialchars(trim($_REQUEST["descripcion"])) : "";
    $temas = isset($_REQUEST["temas"]) ? array_map('htmlspecialchars', $_REQUEST["temas"]) : array();
    $errores = array();
    $modulos_validos = array("DEW", "DOR", "DPL", "DSW", "SOJ", "CL4", "E1B", "IPW");

    $resultado = validarEmail($email);
    if ($resultado !== true) $errores[] = $resultado;

    $resultado = validarModulo($modulo, $modulos_validos);
    if ($resultado !== true) $errores[] = $resultado;

    $resultado = validarAsunto($asunto);
    if ($resultado !== true) $errores[] = $resultado;

    $resultado = validarDescripcion($descripcion);
    if ($resultado !== true) $errores[] = $resultado;

    $resultado = validarTemas($temas);
    if($resultado !== true) $errores[] = $resultado;

    if (count($errores) > 0) {
        echo "<html>
        <head>
            <title>Resultado</title>
        </head>
        <body>
            <h2>Duda no registrada</h2>
            <ul>";
        foreach($errores as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>
            <a href='formulario.php'>Enviar otra duda</a>
        </body>
        </html>";
    } else {
        $temas_string = implode(", ", $temas);
        $linea = "\"$email\";\"$modulo\";\"$asunto\";\"$descripcion\";\"$temas_string\"\n";
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