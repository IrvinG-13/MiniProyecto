<?php

class SumaNumeros
{
    public static function sumarDelUnoAlMil(): int
    {
        $suma = 0;

        for ($numero = 1; $numero <= 1000; $numero++) {
            $suma += $numero;
        }

        return $suma;
    }
}