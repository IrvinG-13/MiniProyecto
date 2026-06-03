<?php
require_once 'app/Models/ClasificadorEdades.php';

class Problema5Controller
{
   //metodo HTTP para el fomrualrio 
    private const METODO_FORMULARIO = 'POST';

    public function procesar(): void
    {   //datos utilizados para la vista 
        $datos = [
            'clasificaciones' => [],
            'conteo'          => [],
            'repeticiones'    => [],
            'errores'         => [],
            'procesado'       => false,
        ];
        // Procesa los datos cuando el formulario fue enviado 
        if ($_SERVER['REQUEST_METHOD'] === self::METODO_FORMULARIO) {
            $datos = $this->procesarFormulario($datos);
        }

        $this->cargarVista($datos);
    }
    //sanitiza,valida y clasifica las edades
    private function procesarFormulario(array $datos): array
    {
        $entrada = $_POST['edades'] ?? [];

        // fila unicamente edades validas 
        $edadesValidas = ClasificadorEdades::filtrarEdades($entrada);
        $errores = $this->validarEdades($edadesValidas, count($entrada));
        // si existen errores se envian a la vista 
        if (!empty($errores)) {
            $datos['errores'] = $errores;
            return $datos;
        }
        //modelo encragado de las clasificaciones
        $modelo = new ClasificadorEdades($edadesValidas);
        //Guarda los resultados generados 
        $datos['clasificaciones'] = $modelo->generarClasificaciones();
        $datos['conteo']          = $modelo->contarPorCategoria();
        $datos['repeticiones']    = $modelo->detectarRepeticiones();
        $datos['procesado']       = true;

        return $datos;
    }
    //Verfiica que las edades sean numeros validos
    private function validarEdades(array $validas, int $total): array
    {
        $errores   = [];
        $requeridas = ClasificadorEdades::totalPersonas();
        //verifica que se hayan enviado datos 
        if ($total === 0) {
            $errores[] = 'Debes ingresar las ' . $requeridas . ' edades.';
            return $errores;
        }
        //verifica que las edades sean numeros validos 
        if (count($validas) < $requeridas) {
            $errores[] = 'Todas las edades deben ser números enteros positivos.';
        }

        return $errores;
    }
    //envia datos a la vista 
    private function cargarVista(array $datos): void
    {
        extract($datos);
        require_once 'app/Views/problemas/problema5.php';
    }
}