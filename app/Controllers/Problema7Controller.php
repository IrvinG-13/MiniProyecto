<?php

require_once 'app/Models/Utilidades.php';
require_once 'app/Models/NotasEstadistica.php';

class Problema7Controller
{
    public function procesar(): void
    {
        $datos = [
            'paso'       => 1,
            'cantidad'   => null,
            'resultados' => null,
            'notas'      => [],
            'errores'    => [],
        ];

        // Verifica si el formulario fue enviado mediante POST
        if (Utilidades::esPost()) {

            // Procesa la cantidad de notas a ingresar
            if (isset($_POST['cantidad'])) {
                $datos = $this->procesarCantidad($datos);
            // Procesa las notas ingresadas por el usuario
            } elseif (isset($_POST['notas'])) {
                $datos = $this->procesarNotas($datos);
            }
        }

        extract($datos);
        require_once 'app/Views/problemas/problema7.php';
    }

    private function procesarCantidad(array $datos): array
    {   // Limpia y valida la cantidad ingresada
        $limpio = Utilidades::sanitizar($_POST['cantidad'] ?? '');

        if (!Utilidades::esEnteroPositivo($limpio)) {
            $datos['errores'][] = 'Ingresa un número entero positivo para la cantidad.';
            return $datos;
        }

        $datos['paso']     = 2;
        $datos['cantidad'] = (int) $limpio;

        return $datos;
    }
    private function procesarNotas(array $datos): array
    {
        // Verifica que todas las notas ingresadas sean válidas
        $cantidadLimpia = Utilidades::sanitizar($_POST['cantidad_hidden'] ?? '');
        $cantidad       = Utilidades::esEnteroPositivo($cantidadLimpia)
            ? (int) $cantidadLimpia
            : 0;

        $entrada      = $_POST['notas'] ?? [];
        $notasValidas = NotasEstadistica::filtrarNotas($entrada);
        // Verifica que todas las notas ingresadas sean válidas
        if (count($notasValidas) < $cantidad) {
            $datos['paso']      = 2;
            $datos['cantidad']  = $cantidad;
            $datos['errores'][] = 'Algunas notas no son válidas. Deben ser números entre 0 y 100.';
            return $datos;
        }

        $modelo = new NotasEstadistica($notasValidas);

        // Obtiene las estadísticas solicitadas
        $promedio    = $modelo->calcularPromedio();
        $desviacion  = $modelo->calcularDesviacion();
        $minimo      = $modelo->obtenerMinimo();
        $maximo      = $modelo->obtenerMaximo();
        $rendimiento = NotasEstadistica::interpretarRendimiento($promedio);

        $datos['paso']       = 3;
        $datos['notas']      = $notasValidas;
        $datos['resultados'] = compact('promedio', 'desviacion', 'minimo', 'maximo', 'rendimiento');

        return $datos;
    }
}