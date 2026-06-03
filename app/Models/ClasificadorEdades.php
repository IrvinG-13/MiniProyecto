<?php

class ClasificadorEdades
{
    private array $edades;
    //cantidad de personas a procesar
    private const TOTAL_PERSONAS = 5;
    //Recibe las edades ingresadas 
    public function __construct(array $edades)
    {
        $this->edades = $edades;
    }
    
    // clasificacion de acuerdo a la edad 
    public static function clasificarEdad(int $edad): string
    {
        switch (true) {
            case $edad >= 0 && $edad <= 12:
                $categoria = 'Niño';
                break;
            case $edad >= 13 && $edad <= 17:
                $categoria = 'Adolescente';
                break;
            case $edad >= 18 && $edad <= 64:
                $categoria = 'Adulto';
                break;
            case $edad >= 65:
                $categoria = 'Adulto Mayor';
                break;
            default:
                $categoria = 'Inválido';
                break;
        }

        return $categoria;
    }
    // genera la clasificacion de cada persona 
    public function generarClasificaciones(): array
    {
        $clasificaciones = [];
        foreach ($this->edades as $indice => $edad) {
            //Guarda la edda y categoria de cada persona
            $clasificaciones[] = [
                'persona'   => $indice + 1,
                'edad'      => $edad,
                'categoria' => self::clasificarEdad($edad),
            ];
        }

        return $clasificaciones;
    }
    //Cuenta cuantas personas hay por categoria
    public function contarPorCategoria(): array
    {
        $conteo = [
            'Niño'         => 0,
            'Adolescente'  => 0,
            'Adulto'       => 0,
            'Adulto Mayor' => 0,
        ];

        foreach ($this->edades as $edad) {
            $categoria = self::clasificarEdad($edad);
            if (isset($conteo[$categoria])) {
                $conteo[$categoria]++;
            }
        }

        return $conteo;
    }
    //detecta edades repetidas dentro del grupo
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
    //filtra y valida las edades recibidas del formulario
    public static function totalPersonas(): int
    {
        return self::TOTAL_PERSONAS;
    }
    //filtra y valida las edades recibidas del formulario
    public static function filtrarEdades(array $entrada): array
    {
        $validas = [];

        foreach ($entrada as $valor) {
            //limpia espacios 
            $limpio = trim(strip_tags($valor));
            //solo acepta numeros enteros positivos
            if (ctype_digit($limpio)) {
                $validas[] = (int) $limpio;
            }
        }

        return $validas;
    }
}