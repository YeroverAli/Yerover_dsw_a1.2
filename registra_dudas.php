<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $modulo = trim($_POST["modulo"]);
    $asunto = trim($_POST["asunto"]);
    $descripcion = trim($_POST["descripcion"]);

    $linea = "\"$email\";\"$modulo\";\"$asunto\";\"$descripcion\"\n";
    $ruta = __DIR__. "/data/dudas.csv";
    file_put_contents($ruta, $linea, FILE_APPEND | LOCK_EX);

    echo "Duda registrada correctamente.
    <html><head><title>Resultado</title></head><body><br><a href='formulario.php'>Enviar otra duda</a></body></html>";
}
else{
    echo "Acceso no permitido.
    <html><head><title>Resultado</title></head><body><br><a href='formulario.php'>Enviar otra duda</a></body></html>";
}

?>