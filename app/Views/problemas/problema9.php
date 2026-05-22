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
        <h2>Problema 9: Primeras 15 potencias</h2>

        <form method="POST" action="index.php?problema=9">
            <label>Ingrese un número (1-9):</label>
            <input type="number" name="numero" min="1" max="9" required>
            <button type="submit">Generar</button>
        </form>

        <?php if (!empty($resultado)): ?>
            <h3>Potencias de <?= $numero ?></h3>
            <ul>
                <?php foreach($resultado as $i => $pot): ?>
                    <li><?= $numero ?> ^ <?= $i+1 ?> = <?= $pot ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <a href="index.php">Volver al menú principal</a>
    </div>
</body>
</html>