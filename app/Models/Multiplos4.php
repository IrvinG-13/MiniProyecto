<?php

require_once 'app/Models/Utilidades.php';

class Multiplos4
{
    private int $n;

    private const BASE          = 4;
    private const LIMITE_MAXIMO = 20;

    public function __construct(int $n)
    {
        $this->n = $n;
    }
    // Genera los N primeros múltiplos de 4 y detecta desbordamiento
    public function generarMultiplos(): array
    {
        $resultados = [];

        for ($i = 1; $i <= $this->n; $i++) {

            $desbordado = $i > self::LIMITE_MAXIMO;

            $valor = $desbordado
                ? 'DESBORDAMIENTO: 4 × ' . $i . ' supera el límite permitido'
                : self::BASE * $i;

            $resultados[] = [
                'indice'     => $i,
                'valor'      => $valor,
                'desbordado' => $desbordado,
            ];

            if ($desbordado) {
                break;
            }
        }

        return $resultados;
    }
     // Determina si el valor de N supera el límite establecido
    public static function detectarDesbordamiento(int $n): bool
    {
        return $n > self::LIMITE_MAXIMO;
    }

    // Devuelve el límite máximo permitido para los cálculos
    public static function limiteMaximo(): int
    {
        return self::LIMITE_MAXIMO;
    }
    // Interpreta el tamaño del valor ingresado por el usuario
    public static function interpretarMagnitud(int $n): string
    {
        switch (true) {
            case $n <= 0:
                return 'Valor inválido: N debe ser mayor que 0.';
            case $n <= 10:
                return 'Rango pequeño: se generarán pocos múltiplos.';
            case $n <= 20:
                return 'Rango completo: se mostrarán todos los múltiplos.';
            default:
                return 'Rango superior al límite: se detectará desbordamiento.';
        }
    }
}