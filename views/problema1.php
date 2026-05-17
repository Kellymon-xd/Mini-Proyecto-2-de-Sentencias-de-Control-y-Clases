<?php
require_once __DIR__ . '/layouts/header.php';
require_once __DIR__ . '/../app/Utils/Navegacion.php';
?>

<main class="contenedor">
    <h1 class="titulo-problema">Problema 1 — Estadísticas básicas</h1>
    <p class="descripcion-problema">
        Ingresa 5 números positivos. Se calculará la media, desviación estándar,
        valor mínimo y valor máximo.
    </p>

    <div class="formulario">
        <?php for ($i = 1; $i <= 5; $i++): ?>
    <div class="campo">
        <label for="n<?= $i ?>">Número <?= $i ?>:</label>

        <input
            type="number"
            id="n<?= $i ?>"
            name="n<?= $i ?>"
            placeholder="Ej: <?= $i * 10 ?>"
            min="0.01"
            step="any"
            required

            oninput="
                this.value = this.value
                    .replace(/-/g, '')
                    .replace(/[eE+]/g, '');
            ">
    </div>
<?php endfor; ?>
        <button class="btn-primario" id="btnCalcular">Calcular estadísticas</button>
    </div>

    <div class="mensaje-error" id="mensajeError" role="alert"></div>

    <div class="resultado" id="panelResultado">
        <h3>Resultados</h3>
        <table class="tabla-datos">
            <thead>
                <tr><th>Métrica</th><th>Valor</th></tr>
            </thead>
            <tbody>
                <tr><td>Media aritmética</td><td id="rMedia">—</td></tr>
                <tr><td>Desviación estándar</td><td id="rDesviacion">—</td></tr>
                <tr><td>Valor mínimo</td><td id="rMinimo">—</td></tr>
                <tr><td>Valor máximo</td><td id="rMaximo">—</td></tr>
            </tbody>
        </table>
    </div>

    <?= Navegacion::botonVolver($projectBase . '/index.php') ?>
</main>

<?php
    echo '<script src="' . $hrefBase . '/js/problema1.js"></script>';
?>
<?php require_once __DIR__ . '/layouts/footer.php'; ?>