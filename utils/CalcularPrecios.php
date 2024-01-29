<?php
class CalcularPrecios{
    
    public static function calculdorPrecioPedido($pedidos){
        $preciototal = 0;

        foreach ($pedidos as $pedido){
            $preciototal += $pedido->devuelvePrecio();
        }

        return $preciototal;
    }

    public static function calcularPuntosPedido($preciototal){
        $puntos = 0;

        // Cada 10 € equivaldran a 100 punts
        $puntos += floor($preciototal / 10) * 100;

        return $puntos;
    }
}
?>