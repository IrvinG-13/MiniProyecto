<?php
require_once 'app/Models/NotasEstadistica.php';
/**
 * Controlador Problema7Controller
 *
 * Gestiona el flujo en dos pasos:
 * Paso 1 → el usuario indica cuántas notas quiere ingresar.
 * Paso 2 → el usuario ingresa las notas y se calculan estadísticas.
 *
 * @package App\Controllers
 */
class Problema7Controller
{
    /** @var string Método HTTP del formulario */
    private const METODO_FORMULARIO = 'POST';

    /** @return void */
    public function procesar(): void
    {
        $datos = [
            'paso'        => 1,
            'cantidad'    => null,
            'resultados'  => null,
            'notas'       => [],
            'errores'     => [],
        ];

        if ($_SERVER['REQUEST_METHOD'] === self::METODO_FORMULARIO) {

            // Paso 1: el usuario envió la cantidad de notas
            if (isset($_POST['cantidad'])) {
                $datos = $this->procesarCantidad($datos);

            // Paso 2: el usuario envió las notas
            } elseif (isset($_POST['notas'])) {
                $datos = $this->procesarNotas($datos);
            }
        }

        $this->cargarVista($datos);
    }

    /**
     * Procesa el paso 1: valida la cantidad de notas.
     *
     * @param  array $datos Estructura base
     * @return array        Datos actualizados
     */
    private function procesarCantidad(array $datos): array
    {
        $crudo   = $_POST['cantidad'] ?? '';
        $limpio  = trim(strip_tags(htmlspecialchars($crudo, ENT_QUOTES, 'UTF-8')));

        if (!ctype_digit($limpio) || (int) $limpio <= 0) {
            $datos['errores'][] = 'Ingresa un número entero positivo para la cantidad.';
            return $datos;
        }

        // Avanzar al paso 2 con la cantidad validada
        $datos['paso']     = 2;
        $datos['cantidad'] = (int) $limpio;

        return $datos;
    }

    /**
     * Procesa el paso 2: valida las notas y calcula estadísticas.
     *
     * @param  array $datos Estructura base
     * @return array        Datos actualizados
     */
    private function procesarNotas(array $datos): array
    {
        $cantidad = (int) ($_POST['cantidad_hidden'] ?? 0);
        $entrada  = $_POST['notas'] ?? [];

        // Filtrar notas válidas (0-100)
        $notasValidas = NotasEstadistica::filtrarNotas($entrada);

        if (count($notasValidas) < $cantidad) {
            $datos['paso']      = 2;
            $datos['cantidad']  = $cantidad;
            $datos['errores'][] = 'Algunas notas no son válidas. Deben ser números entre 0 y 100.';
            return $datos;
        }

        $modelo = new NotasEstadistica($notasValidas);

        $promedio   = $modelo->calcularPromedio();
        $desviacion = $modelo->calcularDesviacion();
        $minimo     = $modelo->obtenerMinimo();
        $maximo     = $modelo->obtenerMaximo();
        $rendimiento = NotasEstadistica::interpretarRendimiento($promedio);

        $datos['paso']       = 3;
        $datos['notas']      = $notasValidas;
        $datos['resultados'] = compact('promedio', 'desviacion', 'minimo', 'maximo', 'rendimiento');

        return $datos;
    }

    /**
     * @param  array $datos Variables para la vista
     * @return void
     */
    private function cargarVista(array $datos): void
    {
        extract($datos);
        require_once 'app/Views/problemas/problema7.php';
    }
}