<?php
// Se obtiene el parámetro 'problema' de la URL, si no existe se asigna 'menu'
$problema = $_GET['problema'] ?? 'menu';

// Incluye el header de la aplicación
require_once 'app/Views/layout/header.php';

// Dependiendo del valor de $problema, se carga el controlador correspondiente
if ($problema === '1') {
    // Problema 1: Estadísticas
    require_once 'app/Controllers/EstadisticaController.php';
    $controller = new EstadisticaController();
    $controller->procesarFormulario();

} elseif ($problema === '2') {
    // Problema 2: Suma de números del 1 al 1000
    require_once 'app/Controllers/Problema2Controller.php';
    $controller = new Problema2Controller();
    $controller->procesar();

} elseif ($problema === '3') {
    // Problema 3
    require_once 'app/Controllers/Problema3Controller.php';
    $controller = new Problema3Controller();
    $controller->procesar();

} elseif ($problema === '4') {
    // Problema 4: Suma de números pares e impares
    require_once 'app/Controllers/Problema4Controller.php';
    $controller = new Problema4Controller();
    $controller->procesar();

} elseif ($problema === '5') {
    // Problema 5
    require_once 'app/Controllers/Problema5Controller.php';
    $controller = new Problema5Controller();
    $controller->procesar();

} elseif ($problema === '6') {
    // Problema 6: Reparto del presupuesto hospitalario
    require_once 'app/Controllers/Problema6Controller.php';
    $controller = new Problema6Controller();
    $controller->procesar();

} elseif ($problema === '7') {
    // Problema 7: Estadísticas de notas
    require_once 'app/Controllers/Problema7Controller.php';
    $controller = new Problema7Controller();
    $controller->procesar();

} elseif ($problema === '8') {
    // Problema 8: Estación del año
    require_once 'app/Controllers/Problema8Controller.php';
    $controller = new Problema8Controller();
    $controller->procesar();

} elseif ($problema === '9') {
    // Problema 9: Primeras 15 potencias
    require_once 'app/Controllers/Problema9Controller.php';
    $controller = new Problema9Controller();
    $controller->procesar();

} else {
    // Menú principal: se muestran los enlaces a todos los problemas
    echo '<div class="menu-grid">';
    echo '<a href="index.php?problema=1">Problema 1</a>';
    echo '<a href="index.php?problema=2">Problema 2</a>';
    echo '<a href="index.php?problema=3">Problema 3</a>';
    echo '<a href="index.php?problema=4">Problema 4</a>';
    echo '<a href="index.php?problema=5">Problema 5</a>';
    echo '<a href="index.php?problema=6">Problema 6</a>';
    echo '<a href="index.php?problema=7">Problema 7</a>';
    echo '<a href="index.php?problema=8">Problema 8</a>';
    echo '<a href="index.php?problema=9">Problema 9</a>';
    echo '</div>';
}

// Se incluye el footer de la aplicación
require_once 'app/Views/layout/footer.php';