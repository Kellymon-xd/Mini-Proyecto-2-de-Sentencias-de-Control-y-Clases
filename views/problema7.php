<?php
require_once __DIR__ . '/layouts/header.php';
require_once __DIR__ . '/../app/Utils/Navegacion.php';
?>

<?php // Vista de Problema 7: pasos dinámicos para ingresar notas y mostrar estadísticas. ?>
<main class="contenedor">
    <h1 class="titulo-problema">Problema 7 — Estadísticas de notas</h1>
    <p class="descripcion-problema">
        Primero indica cuántas notas deseas ingresar. Luego completa cada campo
        y calcula las estadísticas.
    </p>

    <div class="formulario" id="paso1">
        <?php // Paso 1: seleccionar cuántas notas se desean ingresar. ?>
        <div class="campo">
            <label for="cantidad">¿Cuántas notas deseas ingresar? (1 – 100):</label>
            <input type="number" id="cantidad" min="1" max="100" placeholder="Ej: 5">
        </div>
        <button class="btn-primario" id="btnGenerarCampos">Continuar</button>
    </div>

    <div class="formulario" id="paso2" style="display:none;">
        <?php // Paso 2: contenedor dinámico donde JS insertará los campos de nota. ?>
        <div id="camposNotas"></div>
        <button class="btn-primario" id="btnCalcular">Calcular estadísticas</button>
    </div>

    <?php // Mensajes de error para guiar la entrada y las validaciones de cliente. ?>
    <div class="mensaje-error" id="mensajeError" role="alert"></div>

    <?php // Resultados calculados que se rellenan tras recibir la respuesta del servidor. ?>
    <div class="resultado" id="panelResultado">
        <h3>Resultados</h3>
        <table class="tabla-datos">
            <thead><tr><th>Métrica</th><th>Valor</th></tr></thead>
            <tbody>
                <tr><td>Cantidad de notas</td><td id="rCantidad">—</td></tr>
                <tr><td>Promedio</td><td id="rPromedio">—</td></tr>
                <tr><td>Desviación estándar</td><td id="rDesviacion">—</td></tr>
                <tr><td>Nota mínima</td><td id="rMinima">—</td></tr>
                <tr><td>Nota máxima</td><td id="rMaxima">—</td></tr>
            </tbody>
        </table>
    </div>

    <?= Navegacion::botonVolver($projectBase . '/index.php') ?>
</main>

<?php
    echo '<script src="' . $hrefBase . '/js/problema7.js"></script>';
?>
<?php require_once __DIR__ . '/layouts/footer.php'; ?>
