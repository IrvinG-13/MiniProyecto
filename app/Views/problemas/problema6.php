<?php
// problema6.php

// Si el formulario fue enviado, capturamos el presupuesto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['presupuesto'])) {
    $presupuestoTotal = floatval($_POST['presupuesto']);

    // Calculamos la distribución según porcentajes
    $resultado = [
        'Ginecologia'   => $presupuestoTotal * 0.40,
        'Traumatologia' => $presupuestoTotal * 0.35,
        'Pediatria'     => $presupuestoTotal * 0.25,
    ];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 6</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Public/Css/general.css">
</head>
<body>
<div class="problemas">
    <h2>Problema 6: Reparto del presupuesto hospitalario</h2>

    <?php if (!isset($resultado)) : ?>
        <!-- Formulario para ingresar presupuesto -->
        <form method="POST" action="">
            <label for="presupuesto">Ingrese el presupuesto total del hospital:</label>
            <input type="number" name="presupuesto" id="presupuesto" min="1" step="any" required placeholder="Ej: 20000">
            <button type="submit">Calcular distribución</button>
        </form>
    <?php else: ?>
        <!-- Resultados -->
        <div class="resultados-presupuesto">
            <p>🧾 Ginecología (40%) - $<?= number_format($resultado['Ginecologia'], 2) ?></p>
            <p>🩺 Traumatología (35%) - $<?= number_format($resultado['Traumatologia'], 2) ?></p>
            <p>👶 Pediatría (25%) - $<?= number_format($resultado['Pediatria'], 2) ?></p>
        </div>

        <div class="grafica-container">
            <canvas id="graficaPresupuesto"></canvas>
        </div>

        <a href="index.php" class="volver">← Volver al menú</a>
    <?php endif; ?>
</div>

<!-- Chart.js desde CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php if (isset($resultado)) : ?>
<script>
    window.onload = function() {
        const ctx = document.getElementById('graficaPresupuesto').getContext('2d');
        const data = {
            labels: ['Ginecología (40%)', 'Traumatología (35%)', 'Pediatría (25%)'],
            datasets: [{
                data: [
                    <?= $resultado['Ginecologia'] ?>,
                    <?= $resultado['Traumatologia'] ?>,
                    <?= $resultado['Pediatria'] ?>
                ],
                backgroundColor: ['#8e44ad', '#e67e22', '#3498db'],
                borderColor: ['#722d91', '#b35e0d', '#217dbb'],
                borderWidth: 2
            }]
        };

        new Chart(ctx, {
            type: 'pie',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'bottom', labels: { boxWidth: 15, padding: 10 } },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                let value = context.parsed || 0;
                                return label + ': $' + value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
    };
</script>
<?php endif; ?>
</body>
</html>