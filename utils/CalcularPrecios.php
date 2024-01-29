<?php
class CalcularPrecios{
    
    public static function calculdorPrecioPedido($pedidos){
        $preciototal = 0;

        foreach ($pedidos as $pedido){
            $preciototal += $pedido->devuelvePrecio();
        }

        return $preciototal;
    }

    public static function calcularPuntosPedido($precioTotal){
        $puntos = 0;

        // Cada euro gastat equivale a un punto
        $puntos += floor($precioTotal);

        return $puntos;
    }
}
?>