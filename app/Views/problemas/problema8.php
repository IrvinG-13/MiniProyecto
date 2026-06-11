<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problema 8 – Estación del Año</title>
    <!-- Enlazamos CSS general del proyecto -->
    <link rel="stylesheet" href="Public/Css/general.css">
</head>
<body>
    <div class="problemas">
        <h2>Problema 8: Estación del Año</h2>

        <!-- Formulario para ingresar la fecha -->
        <form method="POST" action="index.php?problema=8">
            <label for="fecha">Seleccione una fecha:</label>
            <input type="date" name="fecha" id="fecha" required>
            <button type="submit">Mostrar</button>
        </form>

        <!-- Si se calculó el resultado, mostrarlo -->
        <?php if (!empty($resultado)): ?>
            <p>Fecha ingresada: <?= htmlspecialchars($resultado['fecha']) ?></p>
            <p>La estación es: <strong><?= htmlspecialchars($resultado['estacion']) ?></strong></p>
            <img src="<?= htmlspecialchars($resultado['imagen']) ?>" 
                 alt="<?= htmlspecialchars($resultado['estacion']) ?>" 
                 style="max-width:400px; display:block; margin:auto;">
        <?php endif; ?>

        <!-- Enlace para regresar al menú principal -->
        <a href="index.php" class="volver">← Volver al menú</a>
    </div>
</body>
</html>