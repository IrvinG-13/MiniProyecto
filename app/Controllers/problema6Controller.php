<?php
require_once 'app/Models/PresupuestoHospital.php';

class Problema6Controller
{
    public function procesar()
    {
        $resultado = null;

        // Revisar si se envió el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['presupuesto'])) {
            $presupuestoTotal = floatval($_POST['presupuesto']);
            $hospital = new PresupuestoHospital($presupuestoTotal);
            $resultado = $hospital->calcular();
        }

        require_once 'app/Views/problemas/problema6.php';
    }
}