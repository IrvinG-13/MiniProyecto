<?php

require_once 'app/Models/Estadistica.php';

class EstadisticaController
{
    //Operaciones permitidas 
    private const OPERACIONES_VALIDAS = ['media', 'minimo', 'maximo', 'desviacion'];

    // valida los datos y envia el resultado a la vista 
    public function procesarFormulario(): void
    {
        $resultado  = [];
        $error      = '';
        $numeros    = [];
        $operacion  = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // obtiene la operación seleccionada
            $operacion = $_POST['operacion'] ?? '';

            // recorre y valida los 5 numeros ingresados 
            for ($i = 1; $i <= 5; $i++) {
                $numero = Estadistica::sanitizar($_POST["num$i"] ?? '');

                if (!is_numeric($numero) || (float) $numero <= 0) {
                    $error = 'Todos los números deben ser positivos y mayores que 0.';
                    break;
                }

                $numeros[] = (float) $numero;
            }

            // verifica que la operacion exista 
            if (empty($error) && !in_array($operacion, self::OPERACIONES_VALIDAS, true)) {
                $error = 'Operación no válida.';
            }

            // calcula si no hubo errores
            if (empty($error)) {
                $estadistica = new Estadistica($numeros);
                $resultado = [
                    'operacion' => $operacion,
                    'valor'     => $estadistica->calcularOperacion($operacion),
                ];
            }
        }

        require_once 'app/Views/problemas/problema1.php';
    }
}