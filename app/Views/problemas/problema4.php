<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problema 4</title>
    <!-- Se enlaza el CSS general del proyecto -->
    <link rel="stylesheet" href="Public/Css/general.css">
</head>
<body>
    <div class="problemas">
        <!-- Título del problema -->
        <h2>Problema 4: Suma de números pares e impares entre 1 y 200</h2>

        <!-- Muestra los resultados calculados por el controlador -->
        <p>Suma de los números pares: <?= $resultado['pares'] ?></p>
        <p>Suma de los números impares: <?= $resultado['impares'] ?></p>

        <!-- Enlace para regresar al menú principal -->
        <a href="index.php" class="volver">← Volver al menú</a>
    </div>
</body>
</html>