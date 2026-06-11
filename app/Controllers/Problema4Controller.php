<?php
// Problema4Controller.php
// Controlador encargado de manejar la lógica del problema 4:
// Sumar los números pares e impares del 1 al 200 y pasar el resultado a la vista correspondiente.

require_once 'app/Models/SumaParImpar.php'; // Importa el modelo que calcula la suma de pares e impares

class Problema4Controller
{
    // Función principal que procesa la acción del problema 4
    public function procesar()
    {
        // Llama al método estático de la clase SumaParImpar para calcular las sumas
        $resultado = SumaParImpar::calcular();

        // Carga la vista correspondiente y le pasa el resultado
        require_once 'app/Views/problemas/problema4.php';
    }
}