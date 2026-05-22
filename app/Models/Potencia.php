<?php

class Potencia
{
    public static function calcular($numero, $cantidad = 15): array
    {
        $resultado = [];
        for ($i = 1; $i <= $cantidad; $i++) {
            $resultado[] = pow($numero, $i);
        }
        return $resultado;
    }
}