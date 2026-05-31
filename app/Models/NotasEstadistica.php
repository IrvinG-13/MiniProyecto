<?php

/**
 * Clase NotasEstadistica
 *
 * Calcula estadísticas sobre un conjunto de notas:
 * promedio, desviación estándar, mínimo y máximo.
 *
 * @package App\Models
 */
class NotasEstadistica
{
    /** @var float[] Arreglo de notas ingresadas */
    private array $notas;

    /** @param float[] $notas Notas a procesar */
    public function __construct(array $notas)
    {
        $this->notas = $notas;
    }

    /** @return float Promedio de las notas */
    public function calcularPromedio(): float
    {
        $suma = 0.0;
        foreach ($this->notas as $nota) {
            $suma += $nota;
        }
        return $suma / count($this->notas);
    }

    /** @return float Desviación estándar poblacional */
    public function calcularDesviacion(): float
    {
        $promedio = $this->calcularPromedio();
        $sumaDiferencias = 0.0;

        foreach ($this->notas as $nota) {
            $diferencia       = $nota - $promedio;
            $sumaDiferencias += $diferencia * $diferencia;
        }

        return sqrt($sumaDiferencias / count($this->notas));
    }

    /** @return float Nota mínima */
    public function obtenerMinimo(): float
    {
        return min($this->notas);
    }

    /** @return float Nota máxima */
    public function obtenerMaximo(): float
    {
        return max($this->notas);
    }

    /**
     * Interpreta el promedio obtenido usando switch.
     *
     * @param  float  $promedio Promedio calculado
     * @return string           Descripción del rendimiento
     */
    public static function interpretarRendimiento(float $promedio): string
    {
        switch (true) {
            case $promedio >= 90:
                $descripcion = 'Excelente rendimiento.';
                break;
            case $promedio >= 70:
                $descripcion = 'Buen rendimiento.';
                break;
            case $promedio >= 50:
                $descripcion = 'Rendimiento regular, puede mejorar.';
                break;
            default:
                $descripcion = 'Rendimiento bajo, se recomienda refuerzo.';
                break;
        }

        return $descripcion;
    }

    /**
     * Sanitiza y filtra un arreglo de notas crudas.
     * Solo acepta números entre 0 y 100.
     *
     * @param  array    $entrada Valores crudos del formulario
     * @return float[]           Notas válidas
     */
    public static function filtrarNotas(array $entrada): array
    {
        $validas = [];

        foreach ($entrada as $valor) {
            $limpio = strip_tags(trim($valor));
            if (is_numeric($limpio)) {
                $numero = (float) $limpio;
                if ($numero >= 0 && $numero <= 100) {
                    $validas[] = $numero;
                }
            }
        }

        return $validas;
    }
}