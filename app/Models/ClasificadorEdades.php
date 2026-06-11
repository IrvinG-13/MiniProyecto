<?php

require_once 'app/Models/Utilidades.php';

class ClasificadorEdades
{
    // Almacena las edades ingresadas
    private array $edades;
    // Cantidad de personas requeridas por el problema
    private const TOTAL_PERSONAS = 5;

    public function __construct(array $edades)
    {
        $this->edades = $edades;
    }

    public static function clasificarEdad(int $edad): string
    {
        switch (true) {
            case $edad >= 0 && $edad <= 12:
                return 'Niño';
            case $edad >= 13 && $edad <= 17:
                return 'Adolescente';
            case $edad >= 18 && $edad <= 64:
                return 'Adulto';
            case $edad >= 65:
                return 'Adulto Mayor';
            default:
                // Caso de seguridad para vaolores duera del rango esperado
                return 'Inválido';
        }
    }


    //Genera la clasificación de cada persona con su edad y categoría
    public function generarClasificaciones(): array
    {
        $clasificaciones = [];

        foreach ($this->edades as $indice => $edad) {
            $clasificaciones[] = [
                'persona'   => $indice + 1,
                'edad'      => $edad,
                'categoria' => self::clasificarEdad($edad),
            ];
        }

        return $clasificaciones;
    }
    // Cuenta cuántas personas pertenecen a cada categoría
    public function contarPorCategoria(): array
    {
        $conteo = [
            'Niño'        => 0,
            'Adolescente' => 0,
            'Adulto'      => 0,
            'Adulto Mayor'=> 0,
        ];

        foreach ($this->edades as $edad) {
            $categoria = self::clasificarEdad($edad);
            if (isset($conteo[$categoria])) {
                $conteo[$categoria]++;
            }
        }

        return $conteo;
    }
    // Identifica edades que aparecen más de una vez
    public function detectarRepeticiones(): array
    {
        $frecuencias = array_count_values($this->edades);
        $repetidas   = [];

        foreach ($frecuencias as $edad => $cantidad) {
            if ($cantidad > 1) {
                $repetidas[$edad] = $cantidad;
            }
        }

        return $repetidas;
    }

    public static function totalPersonas(): int
    {
        return self::TOTAL_PERSONAS;
    }
/**
 * Sanitiza y valida las edades recibidas desde el formulario.
 * Solo acepta valores enteros entre 0 y 120 años.
 */
    public static function filtrarEdades(array $entrada): array
    {
        $validas = [];

        foreach ($entrada as $valor) {

            $limpio = Utilidades::sanitizar((string) $valor);

            if (ctype_digit($limpio) && (int) $limpio >= 0 && (int) $limpio <= 120) {
                $validas[] = (int) $limpio;
            }
        }

        return $validas;
    }
}