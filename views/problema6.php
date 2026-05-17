<?php

require_once __DIR__ . '/layouts/header.php';
require_once __DIR__ . '/../app/Utils/Navegacion.php';
?>

<main class="contenedor">

    <h1 class="titulo-problema">Problema 6 — Presupuesto del Hospital</h1>
    <p class="descripcion-problema">
        Ingresa el presupuesto anual del hospital. El sistema distribuirá el monto
        entre las tres áreas: Ginecología (40%), Traumatología (35%) y Pediatría (25%).
    </p>

    <div class="formulario">
        <div class="campo">
            <label for="presupuesto">Presupuesto anual ($):</label>
            <input
                type="number"
                id="presupuesto"
                name="presupuesto"
                placeholder="Ej: 1000000"
                min="1"
                step="0.01"
            >
        </div>
        <button class="btn-primario" id="btnCalcular">Calcular distribución</button>
    </div>

    <div class="mensaje-error" id="mensajeError" role="alert"></div>

    <div class="resultado" id="panelResultado">
        <h3>Distribución del presupuesto</h3>

        <table class="tabla-datos">
            <thead>
                <tr>
                    <th>Área</th>
                    <th>Porcentaje</th>
                    <th>Monto asignado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Ginecología</td>
                    <td>40%</td>
                    <td id="montoGinecologia">—</td>
                </tr>
                <tr>
                    <td>Traumatología</td>
                    <td>35%</td>
                    <td id="montoTraumatologia">—</td>
                </tr>
                <tr>
                    <td>Pediatría</td>
                    <td>25%</td>
                    <td id="montoPediatria">—</td>
                </tr>
            </tbody>
        </table>

        <div class="contenedor-grafica">
            <canvas id="graficaPresupuesto" width="340" height="340"></canvas>
        </div>
    </div>

    <?= Navegacion::botonVolver($projectBase . '/index.php') ?>

</main>

<?php
    echo '<script src="' . $hrefBase . '/js/problema6.js"></script>';
?>

<?php require_once __DIR__ . '/layouts/footer.php'; ?>
