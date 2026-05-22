<?php

require_once 'app/Models/EstacionAnio.php';

class Problema8Controller
{
    public function procesar()
    {
        $resultado = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['fecha'])) {
            $fecha = $_POST['fecha'];
            $resultado = EstacionAnio::determinar($fecha);
        }

        require_once 'app/Views/problemas/problema8.php';
    }
}