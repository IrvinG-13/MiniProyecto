<?php
// Problema8Controller.php
// Controlador encargado de manejar la lógica del problema 8:
// Determinar la estación del año según la fecha ingresada por el usuario.

require_once 'app/Models/EstacionAnio.php'; // Importa el modelo que contiene la lógica de cálculo

class Problema8Controller
{
    // Función principal que procesa la solicitud del usuario
    public function procesar()
    {
        $resultado = null; // Inicializamos la variable que guardará los resultados

        // Verificamos que el formulario fue enviado mediante POST y que se ingresó una fecha
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['fecha'])) {
            $fecha = $_POST['fecha']; // Obtenemos la fecha enviada por el usuario
            $resultado = EstacionAnio::determinar($fecha); // Llamamos al modelo para determinar la estación
        }

        // Cargamos la vista correspondiente, pasando los resultados calculados
        require_once 'app/Views/problemas/problema8.php';
    }
}