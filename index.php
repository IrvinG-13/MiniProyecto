<?php

$problema = $_GET['problema'] ?? 'menu';

require_once 'app/Views/layout/header.php';

if ($problema === '1') {

    require_once 'app/Controllers/EstadisticaController.php';
    $controller = new EstadisticaController();
    $controller->procesarFormulario();

} elseif ($problema === '2') {

    require_once 'app/Controllers/Problema2Controller.php';
    $controller = new Problema2Controller();
    $controller->procesar();

} else {

    echo '<h1>Menú Principal</h1>';
    echo '<a href="index.php?problema=1">Problema 1</a><br>';
    echo '<a href="index.php?problema=2">Problema 2</a>';
}

require_once 'app/Views/layout/footer.php';