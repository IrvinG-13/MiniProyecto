<?php

require_once 'app/Models/Utilidades.php';

class Estadistica
{
    private array $numeros;

    //operaciones disponibles
    public const OPERACIONES_VALIDAS = ['media', 'minimo', 'maximo', 'desviacion'];

    public function __construct(array $numeros)
    {
        $this->numeros = $numeros;
    }
//ejecuta la operacion con switch y delega el calculo a Utileria
    public function calcularOperacion(string $operacion): ?float
    {
        switch ($operacion) {
            case 'media':
                return Utilidades::promedio($this->numeros);

            case 'minimo':
                return Utilidades::minimo($this->numeros);

            case 'maximo':
                return Utilidades::maximo($this->numeros);

            case 'desviacion':
                return Utilidades::desviacionEstandar($this->numeros);

            default:
                return null;
        }
    }
}