<?php
// SumaParImpar.php
// Modelo encargado de calcular la suma de números pares e impares del 1 al 200.

class SumaParImpar
{
    // Método que calcula la suma de los números pares e impares entre 1 y 200.
    public static function calcular(): array
    {
        // Variable donde se acumulan los números pares.
        $sumaPares = 0;

        // Variable donde se acumulan los números impares.
        $sumaImpares = 0;

        // Recorrido desde 1 hasta 200.
        for ($i = 1; $i <= 200; $i++) {
            // Si el número es divisible entre 2, se considera par.
            if ($i % 2 === 0) {
                $sumaPares += $i;
            } else {
                // Si no es divisible entre 2, se considera impar.
                $sumaImpares += $i;
            }
        }

        // Se devuelve un arreglo con ambas sumas.
        return [
            'pares' => $sumaPares,
            'impares' => $sumaImpares
        ];
    }
}