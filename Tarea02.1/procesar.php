// ==============================================
//  5.4. Inclusión de archivos 
// ==============================================

<?php
require_once "tarifas.php";
/**@var array $tarifas */

require_once "funciones.php"; 


// ==============================================
// 5.1. Recuperación y validación de los datos
// 5.2. Acumulación y visualización de errores
// ==============================================

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

    // ===============================================
    // 5.2. Acumulación y visualización de errores
    // 5.3. Cálculo y presentación de los resultados
    // ===============================================
    
    // Visualización de errores con htmlspecialchars (forma segura)
    if (!empty($errores)) {
        echo "<h2>Se han encontrado errores:</h2>";
        echo "<ul>";
        foreach ($errores as $error) {
            echo "<li>" . htmlspecialchars($error, ENT_QUOTES, "UTF-8") . "</li>";
        }
        echo "</ul>";
    } else {
        // ==========================================
        // 5.3. CÁLCULO Y PRESENTACIÓN DE RESULTADOS
        // ==========================================

        // 1. Obtén el precio por sesión a partir del array $tarifas
        $precio = $tarifas[$taller];

        // 2. Calcula el importe inicial, el descuento y el total mediante las funciones de funciones.php
        $importe = calcularImporte($precio, $sesiones);
        $descuento = calcularDescuento($importe, $sesiones);
        $total = calcularTotal($importe, $descuento);

        // 3. Mostrar los 7 datos requeridos con formato decimales y el símbolo del euro utilizando htmlspecialchars para evitar problemas de seguridad (inyección de código)
        echo "<h2>Resultado</h2>";
        echo "<p>Nombre: " . htmlspecialchars($nombre, ENT_QUOTES, "UTF-8") . "</p>";
        echo "<p>Taller seleccionado: " . htmlspecialchars($taller, ENT_QUOTES, "UTF-8") . "</p>";
        echo "<p>Número de sesiones: " . htmlspecialchars((string)$sesiones, ENT_QUOTES, "UTF-8") . "</p>";
        echo "<p>Precio por sesión: " . number_format($precio, 2, ",", ".") . " €</p>";
        echo "<p>Importe inicial: " . number_format($importe, 2, ",", ".") . " €</p>";
        echo "<p>Descuento aplicado: " . number_format($descuento, 2, ",", ".") . " €</p>";
        echo "<p>Importe total: " . number_format($total, 2, ",", ".") . " €</p>";
    }


}
