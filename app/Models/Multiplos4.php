<?php

class Multiplos4
{
    private int $n;
    private const BASE = 4;
    //limite maximo permitido antes del desbordamiento 
    private const LIMITE_MAXIMO = 20;

    //recibe la cantidad de multiplos que se generara 
    public function __construct(int $n)
    {
        $this->n = $n;
    }

    public function generarMultiplos(): array
    {
        $resultados = [];

        for ($i = 1; $i <= $this->n; $i++) {

            // determina si se supera el limite establecido
            $desbordado = $i > self::LIMITE_MAXIMO;

            $valor = $desbordado
                ? 'DESBORDAMIENTO: 4 × ' . $i . ' supera el límite permitido'
                : self::BASE * $i;
            //Guarda la informacion de cada fila 
            $resultados[] = [
                'indice'     => $i,
                'valor'      => $valor,
                'desbordado' => $desbordado,
            ];
            //Detiene el proceso al detectar desbordamiento 
            if ($desbordado) {
                break;
            }
        }

        return $resultados;
    }
    //indica si la iteracion supera el limite permitido 
    public static function detectarDesbordamiento(int $indice): bool
    {
        return $indice > self::LIMITE_MAXIMO;
    }

    public static function limiteMaximo(): int
    {
        return self::LIMITE_MAXIMO;
    }
    
    //Mensajes de acuerdo al valor ingresado 
    public static function interpretarMagnitud(int $n): string
    {
        switch (true) {
            case $n <= 0:
                $descripcion = 'Valor inválido: N debe ser mayor que 0.';
                break;
            case $n <= 10:
                $descripcion = 'Rango pequeño: se generarán pocos múltiplos.';
                break;
            case $n <= 20:
                $descripcion = 'Rango completo: se mostrarán todos los múltiplos.';
                break;
            default:
                $descripcion = 'Rango superior al límite: se detectará desbordamiento.';
                break;
        }

        return $descripcion;
    }
}