<?php

class EstacionAnio
{
    public static function determinar($fecha): array
    {
        $timestamp = strtotime($fecha);
        $mes = (int)date('m', $timestamp);
        $dia = (int)date('d', $timestamp);

        // Determinar estación
        if (($mes == 12 && $dia >= 21) || ($mes <= 3 && $dia <= 20)) {
            $estacion = 'Verano';
            $imagen = 'Public/Assets/verano.jpg';
        } elseif (($mes == 3 && $dia >= 21) || ($mes <= 6 && $dia <= 21)) {
            $estacion = 'Otoño';
            $imagen = 'Public/Assets/otono.jfif';
        } elseif (($mes == 6 && $dia >= 22) || ($mes <= 9 && $dia <= 22)) {
            $estacion = 'Invierno';
            $imagen = 'Public/Assets/invierno.jpg';
        } else {
            $estacion = 'Primavera';
            $imagen = 'Public/Assets/primavera.jpeg';
        }

        return [
            'estacion' => $estacion,
            'imagen' => $imagen,
            'fecha' => date('d-m-Y', $timestamp)
        ];
    }
}