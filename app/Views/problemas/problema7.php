<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problema 7 – Notas</title>
    <link rel="stylesheet" href="/Public/Css/general.css">
</head>
<body>

<header>
    <h1>Estadísticas de Notas</h1>
    <p>Ingresa tus notas y obtén el promedio, desviación estándar, mínimo y máximo.</p>
</header>

<!-- Errores -->
<?php if (!empty($errores)) : ?>
    <ul class="lista-errores">
        <?php foreach ($errores as $error) : ?>
            <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<!-- PASO 1: pedir cantidad -->
<?php if ($paso === 1) : ?>
<div class="tarjeta">
    <h2>Paso 1 — ¿Cuántas notas deseas ingresar?</h2>
    <form method="POST" action="">
        <label for="cantidad">Cantidad de notas:</label>
        <input
            type="number"
            id="cantidad"
            name="cantidad"
            min="1"
            placeholder="Ej: 5"
            oninvalid="this.setCustomValidity('Ingresa un número mayor que 0')"
            oninput="this.setCustomValidity('')"
            required
        >
        <button type="submit">Continuar</button>
    </form>
</div>

<!-- PASO 2: ingresar las notas -->
<?php elseif ($paso === 2) : ?>
<div class="tarjeta">
    <h2>Paso 2 — Ingresa las <?= (int) $cantidad ?> notas</h2>
    <form method="POST" action="">

        <input type="hidden" name="cantidad_hidden" value="<?= (int) $cantidad ?>">

        <?php for ($i = 1; $i <= $cantidad; $i++) : ?>
            <label for="nota_<?= $i ?>">Nota <?= $i ?>:</label>
            <input
                type="number"
                id="nota_<?= $i ?>"
                name="notas[]"
                min="0"
                max="100"
                step="0.01"
                placeholder="0 - 100"
                oninvalid="this.setCustomValidity('La nota debe estar entre 0 y 100')"
                oninput="this.setCustomValidity('')"
                required
            >
        <?php endfor; ?>

        <button type="submit">Calcular estadísticas</button>
    </form>
</div>

<!-- PASO 3: mostrar resultados -->
<?php elseif ($paso === 3) : ?>
<div class="tarjeta">
    <h2>Resultados</h2>

    <div class="chips">
        <?php foreach ($notas as $nota) : ?>
            <span class="chip"><?= number_format($nota, 2) ?></span>
        <?php endforeach; ?>
    </div>

    <table>
        <thead>
            <tr>
                <th>Estadística</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Promedio</td>
                <td><?= number_format($resultados['promedio'], 2) ?></td>
            </tr>
            <tr>
                <td>Desviación estándar</td>
                <td><?= number_format($resultados['desviacion'], 2) ?></td>
            </tr>
            <tr>
                <td>Nota mínima</td>
                <td><?= number_format($resultados['minimo'], 2) ?></td>
            </tr>
            <tr>
                <td>Nota máxima</td>
                <td><?= number_format($resultados['maximo'], 2) ?></td>
            </tr>
        </tbody>
    </table>

    <p><?= htmlspecialchars($resultados['rendimiento'], ENT_QUOTES, 'UTF-8') ?></p>

    <a href="index.php?problema=7">Calcular de nuevo</a>
</div>
<?php endif; ?>

<!-- Siempre visible -->
<a href="index.php">← Volver al menú</a>

<?php require_once 'app/Views/layout/footer.php'; ?>

</body>
</html>