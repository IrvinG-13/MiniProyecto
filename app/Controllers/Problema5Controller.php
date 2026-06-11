<?php

require_once 'app/Models/Utilidades.php';
require_once 'app/Models/ClasificadorEdades.php';

class Problema5Controller
{
    public function procesar(): void
    {
        $datos = [
            'clasificaciones' => [],
            'conteo'          => [],
            'repeticiones'    => [],
            'errores'         => [],
            'procesado'       => false,
        ];

        // Verifica si el formulario fue enviado mediante POST
        if (Utilidades::esPost()) {
            $datos = $this->procesarFormulario($datos);
        }

        extract($datos);
        require_once 'app/Views/problemas/problema5.php';
    }
    // Valida y procesa las edades ingresadas por el usuario
    private function procesarFormulario(array $datos): array
    {   // Obtiene las edades enviadas desde el formulario
        $entrada   = $_POST['edades'] ?? [];
        $requeridas = ClasificadorEdades::totalPersonas();

        // Verifica que se hayan ingresado todas las edades requeridas
        if (count($entrada) === 0) {
            $datos['errores'][] = 'Debes ingresar las ' . $requeridas . ' edades.';
            return $datos;
        }

        $edadesValidas = ClasificadorEdades::filtrarEdades($entrada);

        if (count($edadesValidas) < $requeridas) {
            $datos['errores'][] = 'Todas las edades deben ser números enteros válidos (0–120).';
            return $datos;
        }
        
        // Genera las clasificaciones y estadísticas solicitadas
        $modelo = new ClasificadorEdades($edadesValidas);

        $datos['clasificaciones'] = $modelo->generarClasificaciones();
        $datos['conteo']          = $modelo->contarPorCategoria();
        $datos['repeticiones']    = $modelo->detectarRepeticiones();
        $datos['procesado']       = true;

        return $datos;
    }
}