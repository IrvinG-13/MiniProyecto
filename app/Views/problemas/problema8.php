
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problema 2</title>
    <link rel="stylesheet" href="Public/Css/general.css">
</head>
<body>
    <div class="problemas">
        <h2>Problema 8: Estación del Año</h2>

        <form method="POST" action="index.php?problema=8">
            <label>Seleccione una fecha:</label>
            <input type="date" name="fecha" required>
            <button type="submit">Mostrar</button>
        </form>

        <?php if (!empty($resultado)): ?>
            <p>Fecha ingresada: <?= $resultado['fecha'] ?></p>
            <p>La estación es: <strong><?= $resultado['estacion'] ?></strong></p>
            <img src="<?= $resultado['imagen'] ?>" alt="<?= $resultado['estacion'] ?>" style="max-width:400px; display:block; margin:auto;">
        <?php endif; ?>

        <a href="index.php" class="volver">← Volver al menú</a>
    </div>
</body>
</html>