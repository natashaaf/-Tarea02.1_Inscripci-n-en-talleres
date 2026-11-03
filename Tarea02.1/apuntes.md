require_once - se utiliza para que otro archivo pueda recoger a los datos de otro archivo

require_once "tarifas.php";

if($_SERVER["REQUEST_METHOD"] === "POST"); => se utiliza para comprobar que la petición es de tipo POST

#Validar datos#

trim() => elimina espacios en blanco y comproba que no tiene cadena vacia ""

filter_var($variable, FILTER_VALIDATE_INT) => para validar que el numero sea entero y dentro de un rango

array_key_exists($taller, $tarifas) => para recorrer al array y ver si la opcion elegida hace parte del array

$errores = [] => para los errores