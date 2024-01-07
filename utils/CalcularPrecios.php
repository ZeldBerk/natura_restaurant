<?php
class CalcularPrecios{
    
    public static function calculdorPrecioPedido($pedidos){
        $preciototal = 0;

        foreach ($pedidos as $pedido){
            $preciototal += $pedido->devuelvePrecio();
        }

        return $preciototal;
    }
}
?>