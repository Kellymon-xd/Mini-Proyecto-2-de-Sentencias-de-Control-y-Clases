<?php
require_once __DIR__ . '/layouts/header.php';
require_once __DIR__ . '/../app/Utils/Navegacion.php';
?>

<main class="contenedor">
    <h1 class="titulo-problema">Problema 4 — Pares e impares</h1>
    <p class="descripcion-problema">
        Ingresa el rango. Se calculará la suma de los pares y la suma de los impares
        comprendidos en ese intervalo.
    </p>

    <div class="formulario">
        <div class="campo">
            <label for="inicio">Desde:</label>
            <input type="number" id="inicio" name="inicio" value="1">
        </div>
        <div class="campo">
            <label for="fin">Hasta:</label>
            <input type="number" id="fin" name="fin" value="200">
        </div>
        <button class="btn-primario" id="btnCalcular">Calcular</button>
    </div>

    <div class="mensaje-error" id="mensajeError" role="alert"></div>

    <div class="resultado" id="panelResultado">
        <h3 id="tituloResultado">Resultados</h3>
        <table class="tabla-datos">
            <thead>
                <tr><th>Tipo</th><th>Cantidad de números</th><th>Suma total</th></tr>
            </thead>
            <tbody>
                <tr>
                    <td>Números pares</td>
                    <td id="rTotalPares">—</td>
                    <td id="rSumaPares">—</td>
                </tr>
                <tr>
                    <td>Números impares</td>
                    <td id="rTotalImpares">—</td>
                    <td id="rSumaImpares">—</td>
                </tr>
            </tbody>
        </table>
    </div>

    <?= Navegacion::botonVolver($projectBase . '/index.php') ?>
</main>

<?php
    echo '<script src="' . $hrefBase . '/js/problema4.js"></script>';
?>
<?php require_once __DIR__ . '/layouts/footer.php'; ?>
