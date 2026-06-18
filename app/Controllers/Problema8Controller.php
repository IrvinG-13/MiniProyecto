<?php
// Problema8Controller.php
// Controlador encargado de manejar la lógica del problema 8:
// Determinar la estación del año según la fecha ingresada por el usuario.

require_once 'app/Models/EstacionAnio.php'; // Modelo que determina la estación
require_once 'app/Models/Utilidades.php';    // Clase de utilidades para sanitizar y validar

class Problema8Controller
{
    // Función principal que procesa la solicitud
    public function procesar()
    {
        $resultado = null; // Variable que contendrá los resultados
        $error = null;     // Variable para mensajes de error

        // Verifica si se envió un POST con fecha
        if (Utilidades::esPost() && !empty($_POST['fecha'])) {
            // Sanitiza la fecha ingresada
            $fecha = Utilidades::sanitizar($_POST['fecha']);

            // Validar que la fecha no esté vacía y sea válida
            if (empty($fecha)) {
                $error = "Por favor ingresa una fecha válida.";
            } else {
                $resultado = EstacionAnio::determinar($fecha);
            }
        }

        // Carga la vista y pasa resultado y error
        require_once 'app/Views/problemas/problema8.php';
    }
}