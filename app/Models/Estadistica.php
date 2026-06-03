<?php

class Estadistica
{   //Arreglo que almacena los numeros ingresados 
    private array $numeros;

    public function __construct(array $numeros)
    {
        $this->numeros = $numeros;
    }
    // switch para ejecutar la operación seleccionada 
    public function calcularOperacion(string $operacion): ?float
    {
        switch ($operacion) {
            case 'media':
                return $this->calcularMedia();
            case 'minimo':
                return $this->calcularMinimo();
            case 'maximo':
                return $this->calcularMaximo();
            case 'desviacion':
                return $this->calcularDesviacion();
            default:
                return null;
        }
    }

    //calcula la media aritmética
    public function calcularMedia(): float
    {
        return array_sum($this->numeros) / count($this->numeros);
    }

    //obtiene el valor minimo 
    public function calcularMinimo(): float
    {
        return min($this->numeros);
    }

    //obtiene el valor maximo 
    public function calcularMaximo(): float
    {
        return max($this->numeros);
    }

    //calcula la desviación estandar 
    public function calcularDesviacion(): float
    {
        $media = $this->calcularMedia();
        $suma  = 0.0;

        foreach ($this->numeros as $numero) {
            $suma += pow($numero - $media, 2);
        }

        // n-1 porque es desviación muestral
        return sqrt($suma / (count($this->numeros) - 1));
    }

    //limpia los datos recibidos del usuario 
    public static function sanitizar(string $valor): string
    {
        return htmlspecialchars(trim(strip_tags($valor)), ENT_QUOTES, 'UTF-8');
    }
}