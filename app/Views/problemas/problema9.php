<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problema 9 – Primeras 15 potencias</title>
    <link rel="stylesheet" href="Public/Css/general.css"> <!-- CSS unificado del proyecto -->
</head>
<body>
    <div class="problemas">
        <!-- Título del problema -->
        <h2>Problema 9: Primeras 15 potencias</h2>

        <!-- Formulario para ingresar el número -->
        <form method="POST" action="index.php?problema=9">
            <label for="numero">Ingrese un número (1-9):</label>
            <input type="number" name="numero" id="numero" min="1" max="9" required>
            <button type="submit">Generar</button>
        </form>

        <!-- Mostrar resultados solo si se calculó $resultado -->
        <?php if (!empty($resultado)): ?>
            <h3>Potencias de <?= htmlspecialchars($numero) ?></h3>
            <ul>
                <?php foreach($resultado as $i => $pot): ?>
                    <li><?= htmlspecialchars($numero) ?> ^ <?= $i+1 ?> = <?= $pot ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <!-- Botón de volver al menú -->
        <a href="index.php" class="volver">← Volver al menú</a>
    </div>
</body>
</html>