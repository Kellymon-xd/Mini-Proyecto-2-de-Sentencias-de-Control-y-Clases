<?php
require_once __DIR__ . '/layouts/header.php';
require_once __DIR__ . '/../app/Utils/Navegacion.php';
?>

<main class="contenedor">
    <h1 class="titulo-problema">Problema 3 — Múltiplos de 4</h1>
    <p class="descripcion-problema">
        Ingresa un número N para ver los primeros N múltiplos de 4.
    </p>

    <div class="formulario">
        <div class="campo">
            <label for="n">Cantidad de múltiplos (N):</label>
            <input type="number" id="n" name="n" placeholder="Ej: 10" min="1" max="500">
        </div>
        <button class="btn-primario" id="btnGenerar">Generar múltiplos</button>
    </div>

    <div class="mensaje-error" id="mensajeError" role="alert"></div>

    <div class="resultado" id="panelResultado">
        <h3 id="tituloResultado">Múltiplos de 4</h3>
        <div id="contenedorMultiplos" class="chips-container"></div>
    </div>

    <?= Navegacion::botonVolver($projectBase . '/index.php') ?>
</main>

<?php
    echo '<script src="' . $hrefBase . '/js/problema3.js"></script>';
?>
<?php require_once __DIR__ . '/layouts/footer.php'; ?>
