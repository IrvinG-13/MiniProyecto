<?php

require_once 'app/Models/PresupuestoHospital.php';

class Problema6Controller
{
    public function procesar()
    {
        $presupuestoTotal = 20000; // puedes cambiarlo o tomarlo de un formulario
        $hospital = new PresupuestoHospital($presupuestoTotal);
        $resultado = $hospital->calcular();

        require_once 'app/Views/problemas/problema6.php';
    }
}