<?php

require_once 'app/Models/SumaParImpar.php';

class Problema4Controller
{
    public function procesar()
    {
        $resultado = SumaParImpar::calcular();
        require_once 'app/Views/problemas/problema4.php';
    }
}