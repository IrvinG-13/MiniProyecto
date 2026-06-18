<?php
// Problema4Controller.php
// Controlador encargado de manejar la lógica del problema 4:
// Sumar los números pares e impares del 1 al 200 y pasar el resultado a la vista correspondiente.

// Importamos el modelo que realiza el cálculo de pares e impares.
require_once __DIR__ . '/../Models/SumaParImpar.php';


class Problema4Controller
{
    public function procesar()
    {
        // Llamamos al modelo que realiza los cálculos.
        $resultado = SumaParImpar::calcular();

        // Cargamos la vista y le pasamos el resultado.
        require_once __DIR__ . '/../Views/problemas/problema4.php';
    }
}