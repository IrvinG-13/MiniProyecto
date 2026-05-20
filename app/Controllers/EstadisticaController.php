<?php

require_once 'app/Models/Estadistica.php';

class EstadisticaController
{
    public function procesarFormulario(): void
    {
        $resultado = [];
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recoge y valida los 5 números
            $numeros = [];

            for ($i = 1; $i <= 5; $i++) {

                $numero = Estadistica::sanitizar($_POST["num$i"]);

                if (!is_numeric($numero) || $numero <= 0) {
                    $error = 'Todos los números deben ser positivos';
                    break;
                }

                $numeros[] = (float) $numero;
            }

            //Operaciones que son validas
            $operacionesValidas = ['media', 'minimo', 'maximo', 'desviacion'];

            // Leemos lo que el usuario eligió en el dropdown.
            $operacion = $_POST['operacion'] ?? '';

            // Verificamos que la operación sea una de las permitidas
            if (!in_array($operacion, $operacionesValidas)) {
                $error = 'Operación no válida';
            }
            // Solo calcula si no hubo errores
            if (empty($error)) {
                $estadistica = new Estadistica($numeros);
                // Calcula solo la operación elegida
                $resultado = [
                    'operacion' => $operacion,     
                    'valor'     => $estadistica->calcularOperacion($operacion) 
                ];
            }
        }
        require_once 'app/Views/problemas/problema1.php';
    }
}