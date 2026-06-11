<?php
// Problema9Controller.php
// Controlador encargado de manejar la lógica del problema 9:
// Calcular las primeras 15 potencias de un número ingresado por el usuario.

require_once 'app/Models/Potencia.php'; // Importa el modelo que realiza los cálculos de potencias

class Problema9Controller
{
    public function procesar()
    {
        $resultado = null; // Inicializamos el arreglo que contendrá las potencias
        $numero = null;    // Inicializamos la variable para el número ingresado

        // Validamos si se envió el formulario y el número no está vacío
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['numero'])) {
            $numero = (int) $_POST['numero']; // Convertimos el input a entero
            // Verificamos que el número esté dentro del rango permitido (1-9)
            if ($numero >= 1 && $numero <= 9) {
                // Llamamos al método del modelo para calcular las primeras 15 potencias
                $resultado = Potencia::calcular($numero, 15);
            }
        }

        // Cargamos la vista y le pasamos $resultado y $numero
        require_once 'app/Views/problemas/problema9.php';
    }
}