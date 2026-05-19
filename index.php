<?php

$problema = $_GET['problema'] ?? 'menu';

if ($problema === '1') {
    
} elseif ($problema === '2') {
    require_once 'app/Controllers/Problema2Controller.php';
} else {
    echo '<h1>Menú Principal</h1>';
    //Problema1(Apurate Charlotte xd)
    echo '<a href="index.php?problema=2">Problema 2</a>';
}