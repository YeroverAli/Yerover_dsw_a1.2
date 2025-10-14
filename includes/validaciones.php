<?php
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
?>