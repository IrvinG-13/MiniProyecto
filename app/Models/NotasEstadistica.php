<?php

require_once 'app/Models/Utilidades.php';

class NotasEstadistica
{
    private array $notas;

    public function __construct(array $notas)
    {
        $this->notas = $notas;
    }
    // Calcula el promedio de las notas
    public function calcularPromedio(): float
    {
        return Utilidades::promedio($this->notas);
    }
    // Calcula la desviación estándar de las notas
    public function calcularDesviacion(): float
    {
        return Utilidades::desviacionEstandar($this->notas);
    }
    // Obtiene la nota más baja
    public function obtenerMinimo(): float
    {
        return Utilidades::minimo($this->notas);
    }
    // Obtiene la nota más alta
    public function obtenerMaximo(): float
    {
        return Utilidades::maximo($this->notas);
    }
    // Menssaje según el promedio obtenido
    public static function interpretarRendimiento(float $promedio): string
    {
        switch (true) {
            case $promedio >= 90:
                return 'Excelente rendimiento.';
            case $promedio >= 70:
                return 'Buen rendimiento.';
            case $promedio >= 50:
                return 'Rendimiento regular, puede mejorar.';
            default:
                // Caso bajo rendimiento
                return 'Rendimiento bajo, se recomienda refuerzo.';
        }
    }

    public static function filtrarNotas(array $entrada): array
    {
        $validas = [];

        foreach ($entrada as $valor) {
            // Limpia la entrada antes de validarla
            $limpio = Utilidades::sanitizar((string) $valor);

            if (is_numeric($limpio)) {
                $numero = (float) $limpio;
               // Verifica que la nota esté dentro del rango permitido
                if ($numero >= 0.0 && $numero <= 100.0) {
                    $validas[] = $numero;
                }
            }
        }

        return $validas;
    }
}