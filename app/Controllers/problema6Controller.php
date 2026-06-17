<?php
require_once 'app/Models/PresupuestoHospital.php';
require_once 'app/Utils/Utilidades.php'; // Importa la clase de helpers

class Problema6Controller
{
    public function procesar()
    {
        $resultado = null; // Inicializamos la variable para resultados
        $error = null;     // Variable para errores de validación

        // Revisar si se envió el formulario
        if (Utilidades::esPost() && isset($_POST['presupuesto'])) {
            // Sanitizar el input del usuario
            $input = Utilidades::sanitizar($_POST['presupuesto']);

            // Validar que sea un número positivo
            if (!Utilidades::esNumeroPositivo($input)) {
                $error = "Por favor, ingresa un número válido mayor que 0.";
            } else {
                $presupuestoTotal = (float)$input;
                $hospital = new PresupuestoHospital($presupuestoTotal);
                $resultado = $hospital->calcular();
            }
        }

        // Cargar la vista y pasar resultado y error
        require_once 'app/Views/problemas/problema6.php';
    }
}