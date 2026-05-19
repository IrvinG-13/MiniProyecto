<?php

require_once 'app/Models/SumaNumeros.php';

$resultado = SumaNumeros::sumarDelUnoAlMil();

require_once 'app/Views/problemas/problema2.php';