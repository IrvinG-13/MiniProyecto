<?php
 require_once 'app/Models/Utilidades.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas de Números</title>
    <link rel="stylesheet" href="Public/Css/general.css">
</head>
<body>
<?php require_once 'app/Views/layout/header.php'; ?>

<div class="problemas">

    <header class="problema-header">
        <h1>Estadísticas de Números</h1>
        <p>Ingresa 5 números positivos y elige la operación a calcular.</p>
    </header>

    <div class="tarjeta">

        <!-- Mensaje de error si la validación falló -->
        <?php if (!empty($error)) : ?>
            <ul class="lista-errores">
                <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
            </ul>
        <?php endif; ?>

        <form method="POST" action="">

            <?php for ($i = 1; $i <= 5; $i++) : ?>
                <label for="num<?= $i ?>">Número <?= $i ?>:</label>
                <input
                    type="number"
                    id="num<?= $i ?>"
                    name="num<?= $i ?>"
                    step="any"
                    min="1"
                    placeholder="Ingrese un número positivo"
                    value="<?= isset($_POST["num$i"]) ? htmlspecialchars($_POST["num$i"], ENT_QUOTES, 'UTF-8') : '' ?>"
                    required
                >
            <?php endfor; ?>

            <label for="operacion">¿Qué desea calcular?</label>
            <select name="operacion" id="operacion">
                <?php
                $operaciones = [
                    'media'      => 'Media',
                    'minimo'     => 'Mínimo',
                    'maximo'     => 'Máximo',
                    'desviacion' => 'Desviación estándar',
                ];
                foreach ($operaciones as $valor => $etiqueta) :
                    $seleccionado = (isset($_POST['operacion']) && $_POST['operacion'] === $valor) ? 'selected' : '';
                ?>
                    <option value="<?= $valor ?>" <?= $seleccionado ?>><?= $etiqueta ?></option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Calcular</button>

        </form>
    </div>

    <!-- Resultado de la operación seleccionada -->
    <?php if (!empty($resultado)) : ?>
        <div class="tarjeta tarjeta-resultado">
            <h2>Resultado</h2>
            <p>
                <strong><?= htmlspecialchars(ucfirst($resultado['operacion']), ENT_QUOTES, 'UTF-8') ?>:</strong>
                <?= number_format((float) $resultado['valor'], 2) ?>
            </p>
        </div>
    <?php endif; ?>

    <!-- Enlace centralizado en Utilidades para no hardcodear la URL -->
    <?= Utilidades::enlaceVolver('index.php') ?>

</div>

<?php require_once 'app/Views/layout/footer.php'; ?>
</body>
</html>