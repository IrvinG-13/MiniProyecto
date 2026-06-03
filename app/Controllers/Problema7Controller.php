<?php
require_once 'app/Models/NotasEstadistica.php';

class Problema7Controller
{   //metodo HTTP para formulario 
    private const METODO_FORMULARIO = 'POST';

    //controla el flujo 
    public function procesar(): void
    {// datos iniciales utilizados para la vista 
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
    //valida la cantidad de notas que seran ingresadaas
    private function procesarCantidad(array $datos): array
    {
        $crudo   = $_POST['cantidad'] ?? '';
        $limpio  = trim(strip_tags(htmlspecialchars($crudo, ENT_QUOTES, 'UTF-8')));
        //verifica que sea un numero positivo 
        if (!ctype_digit($limpio) || (int) $limpio <= 0) {
            $datos['errores'][] = 'Ingresa un número entero positivo para la cantidad.';
            return $datos;
        }

        // Avanzar al paso 2 con la cantidad validada
        $datos['paso']     = 2;
        $datos['cantidad'] = (int) $limpio;

        return $datos;
    }
    //valida las notas y genera la estadistica 
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
        //Crea el modelo encragdo de los calculos 
        $modelo = new NotasEstadistica($notasValidas);
        //obtiene las estadisticas principales 
        $promedio   = $modelo->calcularPromedio();
        $desviacion = $modelo->calcularDesviacion();
        $minimo     = $modelo->obtenerMinimo();
        $maximo     = $modelo->obtenerMaximo();
        $rendimiento = NotasEstadistica::interpretarRendimiento($promedio);
        //guarda los datos para mostrarlos en pantalla
        $datos['paso']       = 3;
        $datos['notas']      = $notasValidas;
        $datos['resultados'] = compact('promedio', 'desviacion', 'minimo', 'maximo', 'rendimiento');

        return $datos;
    }
    //envia los datos procesados a la vista 
    private function cargarVista(array $datos): void
    {
        extract($datos);
        require_once 'app/Views/problemas/problema7.php';
    }
}