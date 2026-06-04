<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clasificación de Edades</title>
    <link rel="stylesheet" href="/Public/Css/general.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
</head>
<body>

<header>
    <h1>Clasificación de Edades</h1>
    <p>Ingresa 5 edades y clasifícalas por categoría.</p>
</header>

<!-- Errores -->
<?php if (!empty($errores)) : ?>
    <ul class="lista-errores">
        <?php foreach ($errores as $error) : ?>
            <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<!-- Formulario -->
<div class="tarjeta">
    <h2>Ingresar edades</h2>
    <form method="POST" action="">
        <?php for ($i = 1; $i <= 5; $i++) : ?>
            <label for="edad_<?= $i ?>">Persona <?= $i ?>:</label>
            <input
                type="number"
                id="edad_<?= $i ?>"
                name="edades[]"
                min="0"
                max="120"
                placeholder="Edad"
                oninvalid="this.setCustomValidity('Ingresa una edad entre 0 y 120')"
                oninput="this.setCustomValidity('')"
                value="<?= isset($_POST['edades'][$i - 1])
                    ? htmlspecialchars($_POST['edades'][$i - 1], ENT_QUOTES, 'UTF-8')
                    : '' ?>"
                required
            >
        <?php endfor; ?>
        <button type="submit">Clasificar</button>
        <a href="index.php" class="volver">← Volver al menú</a>
    </form>
</div>

<?php if ($procesado) : ?>

<!-- Tabla de clasificaciones -->
<div class="tarjeta">
    <h2>Resultado por persona</h2>
    <table>
        <thead>
            <tr>
                <th>Persona</th>
                <th>Edad</th>
                <th>Categoría</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clasificaciones as $fila) : ?>
                <tr>
                    <td>Persona <?= (int) $fila['persona'] ?></td>
                    <td><?= (int) $fila['edad'] ?> años</td>
                    <td><?= htmlspecialchars($fila['categoria'], ENT_QUOTES, 'UTF-8') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Estadísticas por categoría -->
<div class="tarjeta">
    <h2>Estadísticas por categoría</h2>
    <table>
        <thead>
            <tr>
                <th>Categoría</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($conteo as $categoria => $cantidad) : ?>
                <tr>
                    <td><?= htmlspecialchars($categoria, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= (int) $cantidad ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Edades repetidas -->
<?php if (!empty($repeticiones)) : ?>
<div class="tarjeta">
    <h2>Edades repetidas</h2>
    <table>
        <thead>
            <tr>
                <th>Edad</th>
                <th>Veces repetida</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($repeticiones as $edad => $veces) : ?>
                <tr>
                    <td><?= (int) $edad ?> años</td>
                    <td><?= (int) $veces ?> veces</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>

<!-- Gráfica de pastel -->
<div class="tarjeta">
    <h2>Distribución por categoría</h2>
    <canvas id="graficaEdades" width="400" height="400"></canvas>
</div>

<script>
    const etiquetas = <?= json_encode(array_keys($conteo)) ?>;
    const valores   = <?= json_encode(array_values($conteo)) ?>;

    new Chart(document.getElementById('graficaEdades'), {
        type: 'pie',
        data: {
            labels: etiquetas,
            datasets: [{
                data: valores,
                backgroundColor: ['#6c63ff', '#34d399', '#fbbf24', '#f87171'],
                borderWidth: 2,
            }]
        },
        options: {
            responsive: false,
            plugins: { legend: { position: 'bottom' } }
        }
    });
</script>

<?php endif; ?>



<?php require_once 'app/Views/layout/footer.php'; ?>

</body>
</html>