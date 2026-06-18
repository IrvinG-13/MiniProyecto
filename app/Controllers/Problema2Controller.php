<?php
require_once 'app/Models/SumaNumeros.php';

class Problema2Controller
{
    public function procesar()
    {
        $resultado = SumaNumeros::sumarDelUnoAlMil();
        require_once 'app/Views/problemas/problema2.php';
    }
}