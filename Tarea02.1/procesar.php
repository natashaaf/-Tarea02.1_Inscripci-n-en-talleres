<?php
require_once "tarifas.php";
/**@var array $tarifas */

require_once "funciones.php";


/**
 * 5.1. Recuperación y validación de los datos
 * 5.2. Acumulación y visualización de errores
 */

// comproba que la peticion es de tipo post
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $errores = []; // inicializa el array por seguridad

    //0. Para recuperar los datos enviados mediante POST
    $nombreRecibido = $_POST["nombre"] ?? "";
    $taller = $_POST["taller"] ?? "";
    $sesionesRecibidas = $_POST["sesiones"] ?? "";

    //1. Se ha proporcionado un nombre que no esté vacío ni contenga únicamente espacios. (0,5pts)

    $nombre = trim($nombreRecibido);
    if ($nombre === "") {
        $errores[] = "El nombre es obligatorio";
    }

    //2. El número de sesiones es un número entero comprendido entre 1 y 10, ambos incluidos. (0,5pts)
    $sesiones = filter_var($sesionesRecibidas, FILTER_VALIDATE_INT);
    if ($sesiones >= 1 || $sesiones <= 10) {
        $errores[] = "El número de sesiones debe ser un entero entre 1 y 10";
    }

    //3. El taller seleccionado existe entre las claves del array $tarifas. (0,5pts)
    if (!array_key_exists($taller, $tarifas)) { // array_key_exists evita que nos envíen talleres falsos manipulando el HTML
        $errores[] = "El taller seleccionado no existe";
    }

    if (!empty($errores)) {
    echo "<ul>";
    
    foreach ($errores as $e) {
        echo "<li>" . htmlspecialchars($e, ENT_QUOTES, "UTF-8") . "</li>";
    }
    echo "</ul>";
        } else {
    // Aquí van tus cálculos (porque no hay errores)
    }

}
