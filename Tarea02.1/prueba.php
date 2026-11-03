<?php

require_once "tarifas.php";
require_once "funciones.php";

if ($_SERVER["REQUEST_METHOD"] === "POST");

$nombreRecibido = "   ";
$errores = [];
$nombre = trim($nombreRecibido);
    if ($nombre === "") {
        $errores[] = "El nombre está vacío";
    }

$sesionesInput = "3a";
$sesiones = filter_var($sesionesInput, FILTER_VALIDATE_INT);
if ($sesiones === false || $sesiones < 1 || $sesiones > 10) {

}