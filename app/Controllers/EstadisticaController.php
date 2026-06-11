<?php

require_once 'app/Models/Utilidades.php';
require_once 'app/Models/Estadistica.php';

class EstadisticaController
{
    public function procesarFormulario(): void
    {
        $resultado = [];
        $error     = '';
        $numeros   = [];
        $operacion = '';

        if (Utilidades::esPost()) {
        // Sanitiza y valida los 5 números (OWASP XSS + whitelist)
            for ($i = 1; $i <= 5; $i++) {
                $valor = Utilidades::sanitizar($_POST["num$i"] ?? '');

                if (!Utilidades::esNumeroPositivo($valor)) {
                    $error = 'Todos los números deben ser positivos y mayores que 0.';
                    break;
                }

                $numeros[] = (float) $valor;
            }

            // Valida la operación contra lista blanca (OWASP A03:2021 – whitelist)
            if (empty($error)) {
                $operacion = Utilidades::sanitizar($_POST['operacion'] ?? '');

                if (!Utilidades::esOpcionValida($operacion, Estadistica::OPERACIONES_VALIDAS)) {
                    $error = 'Operación no válida.';
                }
            }

            // Si no hubo errores da el calculo
            if (empty($error)) {
                $estadistica = new Estadistica($numeros);
                $resultado   = [
                    'operacion' => $operacion,
                    'valor'     => $estadistica->calcularOperacion($operacion),
                ];
            }
        }

        require_once 'app/Views/problemas/problema1.php';
    }
}