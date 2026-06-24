<?php
require_once __DIR__ . '/layouts/header.php';
require_once __DIR__ . '/../app/Utils/Navegacion.php';
?>

<?php // Vista de Problema 8: seleccionar una fecha y mostrar la estación del año. ?>
<main class="contenedor">

    <h1 class="titulo-problema">Problema 8 — Estación del año</h1>
    <p class="descripcion-problema">
        Ingresa una fecha y el sistema determinará la estación del año correspondiente
        junto con una imagen representativa.
    </p>

    <!-- Formulario -->
    <div class="formulario">
        <?php // Formulario para elegir la fecha que se enviará al servidor. ?>
        <div class="campo">
            <label for="fecha">Fecha:</label>
            <input
                type="date"
                id="fecha"
                name="fecha"
            >
        </div>
        <button class="btn-primario" id="btnConsultar">Consultar estación</button>
    </div>

    <?php // Mensaje de error para validación de fecha y respuesta del servidor. ?>
    <div class="mensaje-error" id="mensajeError" role="alert"></div>

    <?php // Contenedor donde se muestra la estación y la imagen resultante. ?>
    <div class="resultado" id="panelResultado">
        <h3>Resultado</h3>

        <p>
            La fecha <strong id="fechaMostrada">—</strong>
            corresponde a la estación de:
        </p>

        <p class="nombre-estacion" id="nombreEstacion">—</p>

        <img
            id="imagenEstacion"
            src=""
            alt="Imagen de la estación"
            class="imagen-estacion"
            style="display:none;"
        >
    </div>

    <?= Navegacion::botonVolver($projectBase . '/index.php') ?>

</main>

<?php
    echo '<script src="' . $hrefBase . '/js/problema8.js"></script>';
?>

<?php require_once __DIR__ . '/layouts/footer.php'; ?>
