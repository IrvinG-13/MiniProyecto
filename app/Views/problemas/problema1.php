<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estadísticas</title>
</head>
<body>
    <div class="problemas">
    <h2>Ingrese 5 números positivos</h2>

    <form method="POST">

        <!-- Inputs de números -->
        <input type="number" step="any" name="num1" required placeholder="Número 1"><br><br>
        <input type="number" step="any" name="num2" required placeholder="Número 2"><br><br>
        <input type="number" step="any" name="num3" required placeholder="Número 3"><br><br>
        <input type="number" step="any" name="num4" required placeholder="Número 4"><br><br>
        <input type="number" step="any" name="num5" required placeholder="Número 5"><br><br>

        <!--
            DROPDOWN DE OPERACIÓN
        -->
        <label for="operacion">¿Qué desea calcular?</label><br>
        <select name="operacion" id="operacion">
            <option value="media">Media</option>
            <option value="minimo">Mínimo</option>
            <option value="maximo">Máximo</option>
            <option value="desviacion">Desviación estándar</option>
        </select>
        <br><br>

        <button type="submit">Calcular</button>

    </form>

    <!--
        BLOQUE DE ERROR
    -->
    <?php if (!empty($error)): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <!--
        BLOQUE DE RESULTADO
    -->
    <?php if (!empty($resultado)): ?>
        <h3>Resultado</h3>
        <p>
            <strong><?php echo ucfirst($resultado['operacion']); ?>:</strong>
            <?php echo round($resultado['valor'], 2); ?>
        </p>
    <?php endif; ?>
    <a href="index.php">Volver al menú principal</a>
    </div>
</body>
</html>