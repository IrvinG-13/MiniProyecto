<?php

require_once 'app/Models/Utilidades.php';
require_once 'app/Views/layout/header.php';
?>

<div class="problemas">

    <header class="problema-header">
        <h1>Estadísticas de Notas</h1>
        <p>Ingresa tus notas y obtén el promedio, desviación estándar, mínimo y máximo.</p>
    </header>

    <?php if (!empty($errores)) : ?>
        <ul class="lista-errores">
            <?php foreach ($errores as $error) : ?>
                <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if ($paso === 1) : ?>
        <!-- PASO 1: solicitar cantidad de notas -->
        <div class="tarjeta">
            <h2>¿Cuántas notas deseas ingresar?</h2>
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

    <?php elseif ($paso === 2) : ?>
        <!-- PASO 2: ingresar las notas -->
        <div class="tarjeta">
            <h2>Ingresa las <?= (int) $cantidad ?> notas</h2>
            <form method="POST" action="">

                <!-- Campo oculto para pasar la cantidad al paso 3 -->
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
                        placeholder="0 – 100"
                        oninvalid="this.setCustomValidity('La nota debe estar entre 0 y 100')"
                        oninput="this.setCustomValidity('')"
                        required
                    >
                <?php endfor; ?>

                <button type="submit">Calcular estadísticas</button>

            </form>
        </div>

    <?php elseif ($paso === 3) : ?>
        <!-- PASO 3: mostrar resultados -->
        <div class="tarjeta">

            <h2>Resultados</h2>

            <!-- Chips con las notas ingresadas -->
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

            <div class="alerta">
                <?= htmlspecialchars($resultados['rendimiento'], ENT_QUOTES, 'UTF-8') ?>
            </div>

        </div>

    <?php endif; ?>

    <?php
    // Enlace al menú principal centralizado en Utilidades (DRY + XSS)
    echo Utilidades::enlaceVolver('index.php');
    ?>

</div>

<?php require_once 'app/Views/layout/footer.php'; ?>