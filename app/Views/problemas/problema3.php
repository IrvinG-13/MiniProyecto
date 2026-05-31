<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Múltiplos de 4</title>
    <link rel="stylesheet" href="/Public/Css/general.css">
</head>
<body>

<header>
    <h1>Múltiplos de 4</h1>
    <p>Genera los primeros N múltiplos de 4 e informa si hay desbordamiento.</p>
</header>

<!-- Formulario de entrada -->
<div class="tarjeta">
    <?php if (!empty($errores)) : ?>
        <ul class="lista-errores">
            <?php foreach ($errores as $error) : ?>
                <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="n">Valor de N (cantidad de múltiplos):</label>
        <input
            type="number"
            id="n"
            name="n"
            min="1"
            placeholder="Ej: 10"
            value="<?= isset($_POST['n'])
                ? htmlspecialchars($_POST['n'], ENT_QUOTES, 'UTF-8')
                : '' ?>"
            required
        >
        <p>Límite seguro sin desbordamiento: <strong><?= number_format($limiteSeguro) ?></strong></p>
        <button type="submit">Generar múltiplos</button>
    </form>
</div>

<?php if (!empty($multiplos)) : ?>
<!-- Tabla de resultados -->
<div class="tarjeta">
    <h2>Resultados para N = <?= (int) $n ?></h2>

    <!-- Interpretación del rango (viene del switch del Modelo) -->
    <p><?= htmlspecialchars($magnitud, ENT_QUOTES, 'UTF-8') ?></p>

    <table>
        <thead>
            <tr>
                <th>i</th>
                <th>Operación</th>
                <th>Resultado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($multiplos as $fila) : ?>
                <tr>
                    <td><?= (int) $fila['indice'] ?></td>
                    <td>4 × <?= (int) $fila['indice'] ?></td>
                    <td>
                        <?php if ($fila['desbordado']) : ?>
                        <?= htmlspecialchars((string) $fila['valor'], ENT_QUOTES, 'UTF-8') ?>
                        <?php else : ?>
                            <?= number_format((int) $fila['valor']) ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php
    // Verificar si alguna fila tuvo desbordamiento
    $huboDesbordamiento = false;
    foreach ($multiplos as $fila) {
        if ($fila['desbordado']) {
            $huboDesbordamiento = true;
            break;
        }
    }
    ?>

    <?php if ($huboDesbordamiento) : ?>
        <p>
        <strong>Desbordamiento detectado:</strong> PHP_INT_MAX en este sistema es
        <strong><?= number_format(PHP_INT_MAX) ?></strong>.
        El cálculo 4 × N supera ese límite y produciría un valor incorrecto.
        </p>
    <?php endif; ?>
</div>
<?php endif; ?>

</body>
</html>