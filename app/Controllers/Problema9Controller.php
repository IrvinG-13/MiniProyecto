<?php

require_once 'app/Models/Potencia.php';

class Problema9Controller
{
    public function procesar()
    {
        $resultado = null;
        $numero = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['numero'])) {
            $numero = (int) $_POST['numero'];
            if ($numero >= 1 && $numero <= 9) {
                $resultado = Potencia::calcular($numero, 15);
            }
        }

        require_once 'app/Views/problemas/problema9.php';
    }
}