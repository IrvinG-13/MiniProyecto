<?php
require_once 'app/Models/Utilidades.php';
require_once 'app/Views/layout/header.php';
?>

<div class="problemas">

    <header class="problema-header">
        <h1>Múltiplos de 4</h1>
        <p>
            Genera los primeros N múltiplos de 4.
            Si N supera <strong><?= (int) $limiteMaximo ?></strong>, se detectará desbordamiento.
        </p>
    </header>

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
                oninvalid="this.setCustomValidity('Ingresa un número entero mayor que 0')"
                oninput="this.setCustomValidity('')"
                required
            >

            <p>
                Límite máximo sin desbordamiento:
                <strong><?= (int) $limiteMaximo ?></strong>
                (ingresar más causará desbordamiento)
            </p>

            <button type="submit">Generar múltiplos</button>

        </form>
    </div>

    <?php if (!empty($multiplos)) : ?>
        <div class="tarjeta">

            <h2>Resultados para N = <?= (int) $n ?></h2>
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
                        <tr <?= $fila['desbordado'] ? 'class="fila-error"' : '' ?>>
                            <td><?= (int) $fila['indice'] ?></td>
                            <td>4 × <?= (int) $fila['indice'] ?></td>
                            <td>
                                <?= htmlspecialchars((string) $fila['valor'], ENT_QUOTES, 'UTF-8') ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?php if ($huboDesbordamiento) : ?>
                <p class="alerta">
                    <strong>Desbordamiento detectado:</strong>
                    El valor de N supera el límite máximo de <?= (int) $limiteMaximo ?>.
                    A partir de este punto el resultado sería incorrecto.
                </p>
            <?php endif; ?>

        </div>
    <?php endif; ?>

    <?php
    // Enlace centralizado; la URL no se hardcodea en la vista (DRY + XSS)
    echo Utilidades::enlaceVolver('index.php');
    ?>

</div>

<?php require_once 'app/Views/layout/footer.php'; ?>