<?php
require_once __DIR__ . '/layouts/header.php';
require_once __DIR__ . '/../app/Utils/Navegacion.php';
?>

<main class="contenedor">
    <h1 class="titulo-problema">Problema 2 — Sumatoria del 1 al 1000</h1>
    <p class="descripcion-problema">
        Calcula la suma de todos los enteros del 1 al 1000.
        El resultado esperado es <strong>500,500</strong>.
    </p>

    <div class="formulario">
        <p style="margin-bottom:1rem; color: var(--texto-medio); font-size:0.93rem;">
            Este problema no requiere datos de entrada.
            Presiona el botón para obtener el resultado.
        </p>
        <button class="btn-primario" id="btnCalcular">Calcular sumatoria</button>
    </div>

    <div class="mensaje-error" id="mensajeError" role="alert"></div>

    <div class="resultado" id="panelResultado">
        <h3>Resultado</h3>
        <table class="tabla-datos">
            <thead>
                <tr><th>Rango</th><th>Resultado</th></tr>
            </thead>
            <tbody>
                <tr>
                    <td>Suma del 1 al 1000</td>
                    <td id="rResultado">—</td>
                </tr>
            </tbody>
        </table>
    </div>

    <?= Navegacion::botonVolver($projectBase . '/index.php') ?>
</main>

<?php
    echo '<script src="' . $hrefBase . '/js/problema2.js"></script>';
?>
<?php require_once __DIR__ . '/layouts/footer.php'; ?>
