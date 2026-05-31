<?php

class Multiplos4
{
    /** @var int Valor de N ingresado por el usuario */
    private int $n;

    /** @var int Base del múltiplo (siempre 4) */
    private const BASE = 4;

    /** @param int $n Cantidad de múltiplos a generar */
    public function __construct(int $n)
    {
        $this->n = $n;
    }

    /** @return array Arreglo con los resultados y metadatos de cada múltiplo */
    public function generarMultiplos(): array
    {
        $resultados = [];

        for ($i = 1; $i <= $this->n; $i++) {
            $desbordado = $this->detectarDesbordamiento($i);

            $valor = $desbordado
                ? 'DESBORDAMIENTO (4 × ' . $i . ' > PHP_INT_MAX)'
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

    /**
     * @param  int  $indice Iteración actual del bucle
     * @return bool True si hay desbordamiento, false en caso contrario
     */
    public static function detectarDesbordamiento(int $indice): bool
    {
        return $indice > intdiv(PHP_INT_MAX, self::BASE);
    }

    /** @return int Índice máximo seguro antes de desbordamiento */
    public static function limiteSeguro(): int
    {
        return intdiv(PHP_INT_MAX, 4);
    }

    /**
     * @param  int    $n Valor ingresado
     * @return string    Descripción de la magnitud
     */
    public static function interpretarMagnitud(int $n): string
    {
        switch (true) {
            case $n <= 0:
                $descripcion = 'Valor inválido: N debe ser mayor que 0.';
                break;
            case $n <= 10:
                $descripcion = 'Rango pequeño: se generarán pocos múltiplos.';
                break;
            case $n <= 1000:
                $descripcion = 'Rango moderado: cálculo rápido y seguro.';
                break;
            case $n <= 1000000:
                $descripcion = 'Rango grande: puede tardar un momento en mostrar.';
                break;
            default:
                $descripcion = 'Rango muy grande: riesgo de desbordamiento o lentitud.';
                break;
        }

        return $descripcion;
    }
}