<?php
// Problema9Controller.php
// Controlador encargado de manejar la lógica del problema 9:
// Calcular las primeras 15 potencias de un número ingresado por el usuario.

require_once 'app/Models/Potencia.php';       // Modelo que calcula las potencias
require_once 'app/Utils/Utilidades.php';      // Clase de helpers para validación y sanitización

class Problema9Controller
{
    public function procesar()
    {
        $resultado = null; // Contendrá las 15 potencias
        $numero = null;    // Número ingresado por el usuario
        $error = null;     // Mensaje de error

        // Validamos que se envió POST y hay número
        if (Utilidades::esPost() && !empty($_POST['numero'])) {
            // Sanitizamos el input
            $input = Utilidades::sanitizar($_POST['numero']);

            // Validamos que sea un entero positivo entre 1 y 9
            if (!Utilidades::esEnteroPositivo($input) || $input < 1 || $input > 9) {
                $error = "Ingrese un número válido entre 1 y 9.";
            } else {
                $numero = (int)$input;
                $resultado = Potencia::calcular($numero, 15);
            }
        }

        // Cargamos la vista, pasando $resultado, $numero y $error
        require_once 'app/Views/problemas/problema9.php';
    }
}