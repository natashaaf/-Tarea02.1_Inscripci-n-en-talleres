<?php
    /**
     * Muestra el precio final que pagará el usuario al multiplicar el precio por tantas sesiones. 
     * @param float $precio valor del precio de la sesión
     * @param int $sesiones numero de sesiones que el usuario ha comprado
     * @return float|int
     */
    function calcularImporte(float $precio, int $sesiones): float{
        $precioFinal = $precio * $sesiones;

        return $precioFinal;
     
    }

   

    /**
     * Calcula el descuento que se aplicará al precio final si el usuario ha comprado 5 o más sesiones.
     * @param float $importe valor del precio final que pagará el usuario
     * @param int $sesiones numero de sesiones compradas por el usuario
     * @return float
     */
    
    const DESCUENTO = 0.10;
    function calcularDescuento(float $importe, int $sesiones): float{
        
       
        if ($sesiones >= 5){
            $precioDescuento = $importe * DESCUENTO;
            return $precioDescuento;
        } else {
            return 0.0;
        }
    
    }
    
    /**
     * Calcula el valor total que pagará el usuario ya con descuento si fuera el caso.
     * @param float $importe valor del precio final que pagará el usuario
     * @param float $descuento valor del descuento que se aplicará al precio final
     * @return float
     */
    function calcularTotal(float $importe, float $descuento): float{
        return $importe - $descuento;

    }
    


?>