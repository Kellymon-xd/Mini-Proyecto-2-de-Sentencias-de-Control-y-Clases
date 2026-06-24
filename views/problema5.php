<?php
require_once __DIR__ . '/layouts/header.php';
require_once __DIR__ . '/../app/Utils/Navegacion.php';
?>

<?php // Vista de Problema 5: recolecta cinco edades y muestra la clasificación con gráfico. ?>
<main class="contenedor">
    <h1 class="titulo-problema">Problema 5 — Clasificador de edades</h1>
    <p class="descripcion-problema">
        Ingresa la edad de 5 personas. El sistema clasificará a cada una y mostrará
        estadísticas del grupo con una gráfica de barras.
    </p>

    <div class="formulario">
        <?php // Generar cinco campos de edad con validación básica de cliente. ?>
        <?php for ($i = 1; $i <= 5; $i++): ?>
    <div class="campo">
        <label for="edad<?= $i ?>">Edad persona <?= $i ?>:</label>

        <input
            type="number"
            id="edad<?= $i ?>"
            name="edad<?= $i ?>"
            placeholder="0 – 120"
            min="0"
            max="120"
            required

            oninput="
                this.value = this.value
                    .replace(/[^0-9]/g, '');

                if(this.value > 120){
                    this.value = 120;
                }
            ">
    </div>
<?php endfor; ?>
        <button class="btn-primario" id="btnClasificar">Clasificar</button>
    </div>

    <?php // Mensaje de error para mostrar problemas de validación o comunicación. ?>
    <div class="mensaje-error" id="mensajeError" role="alert"></div>

    <?php // Panel de resultados con tabla y gráfico de barras. ?>
    <div class="resultado" id="panelResultado">

        <h3>Clasificación individual</h3>
        <table class="tabla-datos" id="tablaPersonas">
            <thead>
                <tr><th>Persona</th><th>Edad</th><th>Categoría</th></tr>
            </thead>
            <tbody id="cuerpoTabla"></tbody>
        </table>

        <h3 style="margin-top:1.5rem;">Estadísticas del grupo</h3>
        <table class="tabla-datos">
            <thead><tr><th>Métrica</th><th>Valor</th></tr></thead>
            <tbody>
                <tr><td>Edad promedio</td><td id="rMedia">—</td></tr>
                <tr><td>Edad mínima</td><td id="rMinimo">—</td></tr>
                <tr><td>Edad máxima</td><td id="rMaximo">—</td></tr>
            </tbody>
        </table>

        <!-- Gráfica de barras con Canvas -->
        <div class="contenedor-grafica" style="margin-top:2rem;">
            <canvas id="graficaEdades" width="400" height="260"></canvas>
        </div>
    </div>

    <?= Navegacion::botonVolver($projectBase . '/index.php') ?>
</main>

<?php
    echo '<script src="' . $hrefBase . '/js/problema5.js"></script>';
?>
<?php require_once __DIR__ . '/layouts/footer.php'; ?>
