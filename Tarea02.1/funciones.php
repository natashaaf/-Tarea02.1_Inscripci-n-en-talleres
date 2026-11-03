<?php
    /**
     * Muestra el precio final que pagará el usuario al multiplicar el precio por tantas sesiones. 
     * @param float $precio 
     * @param int $sesiones
     * @return float|int
     */
    function calcularImporte(float $precio, int $sesiones): float{
        $precioFinal = $precio * $sesiones;

        return $precioFinal;
    }

    /**
     * Summary of calcularDescuento
     * @param float $importe
     * @param int $sesiones
     * @return void
     */
    function calcularDescuento(float $importe, int $sesiones): float{
        if ($sesiones >= 5){
            $precioDescuento = calcularImporte() - 0.10;
            
        }
    }

    function calcularTotal(float $importe, float $descuento): float{
        
    }

?>