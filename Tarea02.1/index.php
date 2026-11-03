<?php
    require_once "tarifas.php";
    /** @var array $tarifas */
    
    require_once "procesar.php";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
    <label>Nombre:
        <input type="text" name="nombre" required>
    </label>

    <label>Taller:
        <select name="taller">
            <?php foreach ($tarifas as $key => $value): ?> 
                <option value="<?=  $key ?>">
                    <?= $key ?> - <?=  number_format($value,2,".","") ?> €/sesión
                </option>
            <?php endforeach; ?>
        </select>
    </label>

    <label>Número de sesiones:
        <input type="number" name="sesiones"
               min="1" max="10" required>
    </label>

    <button type="submit">Calcular importe</button>
</form>

    <?php
        require_once "funciones.php";

        if (isset($_POST[""])) {
    
    ?>
    
</body>
</html>