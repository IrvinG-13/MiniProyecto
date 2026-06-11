<?php
// Problema2Controller.php

require_once 'app/Models/SumaNumeros.php'; // Importa la clase modelo que contiene la función de suma

class Problema2Controller
{
    // Función principal que procesa la acción del problema 2
    public function procesar()
    {
        // Llama al método estático de la clase SumaNumeros para obtener la suma del 1 al 1000
        $resultado = SumaNumeros::sumarDelUnoAlMil();

        // Carga la vista correspondiente y le pasa el resultado para mostrarlo
        require_once 'app/Views/problemas/problema2.php';
    }
}