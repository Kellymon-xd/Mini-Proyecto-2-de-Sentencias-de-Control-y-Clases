<?php
require_once __DIR__ . '/layouts/header.php';
require_once __DIR__ . '/../app/Utils/Navegacion.php';
?>

<?php // Vista de Problema 9: ingreso de base y tabla de potencias calculadas. ?>
<main class="contenedor">
    <h1 class="titulo-problema">Problema 9 — Potencias</h1>
    <p class="descripcion-problema">
        Ingresa un número del 1 al 9. Se mostrarán sus 15 primeras potencias.
    </p>

    <div class="formulario">
        <?php // Campo para ingresar el número base cuyos exponentes se desean mostrar. ?>
        <div class="campo">
            <label for="numero">Número base (1 – 9):</label>
            <input 
  type="text"
  id="numero"
  name="numero"
  maxlength="1"
  inputmode="numeric"
  placeholder="Ej: 2"
  oninput="this.value = this.value.replace(/[^1-9]/g, '')">
        </div>
        <button class="btn-primario" id="btnCalcular">Generar potencias</button>
    </div>

    <?php // Mensaje de error para mostrar problemas de entrada o de servidor. ?>
    <div class="mensaje-error" id="mensajeError" role="alert"></div>

    <?php // Panel de resultados donde se renderizarán las potencias. ?>
    <div class="resultado" id="panelResultado">
        <h3 id="tituloPotencias">Potencias</h3>
        <table class="tabla-datos">
            <thead>
                <tr>
                    <th>Exponente</th>
                    <th>Expresión</th>
                    <th>Resultado</th>
                </tr>
            </thead>
            <tbody id="cuerpoPotencias"></tbody>
        </table>
    </div>

    <?= Navegacion::botonVolver($projectBase . '/index.php') ?>
</main>

<?php
    echo '<script src="' . $hrefBase . '/js/problema9.js"></script>';
?>
<?php require_once __DIR__ . '/layouts/footer.php'; ?>
