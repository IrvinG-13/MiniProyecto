


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
        <h2>Problema 6: Reparto del presupuesto hospitalario</h2>

<p>Total del presupuesto: $20,000</p>

<ul>
    <li>Ginecología (40%): $<?= number_format($resultado['Ginecologia'], 2) ?></li>
    <li>Traumatología (35%): $<?= number_format($resultado['Traumatologia'], 2) ?></li>
    <li>Pediatría (25%): $<?= number_format($resultado['Pediatria'], 2) ?></li>
</ul>

<!-- Gráfica simple usando canvas y Chart.js -->
<canvas id="graficaPresupuesto" width="400" height="200"></canvas>
<script src="Public/Js/Chart.min.js"></script>


<a href="index.php">Volver al menú principal</a>
    </div>
</body>
<script>
    const ctx = document.getElementById('graficaPresupuesto').getContext('2d');
    const grafica = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Ginecología', 'Traumatología', 'Pediatría'],
            datasets: [{
                label: 'Presupuesto',
                data: [<?= $resultado['Ginecologia'] ?>, <?= $resultado['Traumatologia'] ?>, <?= $resultado['Pediatria'] ?>],
                backgroundColor: ['#8e44ad','#e67e22','#3498db']
            }]
        },
    });
</script>
</html>