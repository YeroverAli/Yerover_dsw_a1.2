<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $modulo = isset($_POST["modulo"]) ? trim($_POST["modulo"]) : "";
    $asunto = trim($_POST["asunto"]);
    $descripcion = trim($_POST["descripcion"]);
    $temas = isset($_POST["temas"]) ? $_POST["temas"] : array();
    $errores = array();
    $modulos_validos = array("DEW", "DOR", "DPL", "DSW", "SOJ", "CL4", "E1B", "IPW");

    function validarEmail($correo) {
        if ($correo == "") return "No se ha escrito ningún email.";
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) return "El email '$correo' no es válido.";
        return true;
    }

    function validarModulo($modulo, $modulos_validos) {
        if ($modulo == "") return "No se ha seleccionado ningún módulo.";
        if (!in_array($modulo, $modulos_validos)) return "El módulo '$modulo' no es correcto.";
        return true;
    }

    function validarAsunto($asunto) {
        if ($asunto == "") return "No se ha escrito ningún asunto.";
        if (strlen($asunto) > 50) return "El asunto supera la cantidad máxima de caracteres (50).";
        if (!ctype_alpha(str_replace(' ', '', $asunto))) return "El asunto contiene caracteres no válidos (solo letras y espacios permitidos).";
        return true;
    }

    function validarDescripcion($descripcion) {
        if ($descripcion == "") return "No se ha escrito ninguna descripción.";
        if (strlen($descripcion) > 300) return "La descripción supera el límite de caracteres (300).";
        return true;
    }

    function validarTemas($temas) {
        $num = count($temas);
        if ($num < 1) return "Debe seleccionar al menos un tema relacionado.";
        if ($num > 3) return "No puede seleccionar más de 3 temas relacionados.";
        return true;
    }

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
            echo "<li>$error</li>";
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