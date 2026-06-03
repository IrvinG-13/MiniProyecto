<?php

class NotasEstadistica
{
    private array $notas;
    // recibe las notas que seran procesadas 
    public function __construct(array $notas)
    {
        $this->notas = $notas;
    }
    //calcula el promedio de las notas 
    public function calcularPromedio(): float
    {
        $suma = 0.0;
        foreach ($this->notas as $nota) {
            $suma += $nota;
        }
        return $suma / count($this->notas);
    }
    //Desviación estándar muestral (n-1)
    public function calcularDesviacion(): float
    {
    $promedio        = $this->calcularPromedio();
    $sumaDiferencias = 0.0;

    foreach ($this->notas as $nota) {
        //calcula la difreencia con respecto al promedio 
        $diferencia       = $nota - $promedio;
        $sumaDiferencias += $diferencia * $diferencia;
    }

    // n-1 por tratarse de una muestra 
    return sqrt($sumaDiferencias / (count($this->notas) - 1));
}
    //obtiene la nota mas baja 
    public function obtenerMinimo(): float
    {
        return min($this->notas);
    }

    //obtiene la nota mas alta
    public function obtenerMaximo(): float
    {
        return max($this->notas);
    }
    //switch para describir el rendimiento academico 
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
    //sanitiza, filtra y valida las notas recibidas del formulario 
    public static function filtrarNotas(array $entrada): array
    {
        $validas = [];

        foreach ($entrada as $valor) {
            //elimina espacios y etiquetas HTML
            $limpio = strip_tags(trim($valor));
            if (is_numeric($limpio)) {
                $numero = (float) $limpio;
                //solo acepta numeros entre 0 y 100 
                if ($numero >= 0 && $numero <= 100) {
                    $validas[] = $numero;
                }
            }
        }

        return $validas;
    }
}