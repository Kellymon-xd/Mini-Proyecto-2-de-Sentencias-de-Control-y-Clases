<?php
// index.php — Menú principal del Mini Proyecto #2
// Punto de entrada de la aplicación

require_once 'views/layouts/header.php';
?>

<main class="contenedor">
    <h1 class="titulo-principal">Mini Proyecto #2</h1>
    <p class="subtitulo">Estructuras de decisión y repetición en PHP</p>

    <nav class="menu-problemas">

        <a class="tarjeta-problema" href="views/problema1.php">
            <span class="numero">01</span>
            <h2>Estadísticas básicas</h2>
            <p>Media, desviación estándar, mínimo y máximo de 5 números positivos.</p>
        </a>

        <a class="tarjeta-problema" href="views/problema2.php">
            <span class="numero">02</span>
            <h2>Sumatoria 1–1000</h2>
            <p>Calcular la suma de todos los números del 1 al 1000.</p>
        </a>

        <a class="tarjeta-problema" href="views/problema3.php">
            <span class="numero">03</span>
            <h2>Múltiplos de 4</h2>
            <p>Imprimir los N primeros múltiplos de 4 según valor ingresado.</p>
        </a>

        <a class="tarjeta-problema" href="views/problema4.php">
            <span class="numero">04</span>
            <h2>Pares e impares</h2>
            <p>Suma de pares e impares entre dos números dados.</p>
        </a>

        <a class="tarjeta-problema" href="views/problema5.php">
            <span class="numero">05</span>
            <h2>Clasificador de edades</h2>
            <p>Clasificar 5 personas en niño, adolescente, adulto o adulto mayor.</p>
        </a>

        <a class="tarjeta-problema" href="views/problema6.php">
            <span class="numero">06</span>
            <h2>Presupuesto hospital</h2>
            <p>Distribuir el presupuesto anual entre tres áreas con gráfica circular.</p>
        </a>

        <a class="tarjeta-problema" href="views/problema7.php">
            <span class="numero">07</span>
            <h2>Estadísticas de notas</h2>
            <p>Promedio, desviación estándar, mínima y máxima de N notas.</p>
        </a>

        <a class="tarjeta-problema" href="views/problema8.php">
            <span class="numero">08</span>
            <h2>Estación del año</h2>
            <p>Determinar la estación según la fecha ingresada.</p>
        </a>

        <a class="tarjeta-problema" href="views/problema9.php">
            <span class="numero">09</span>
            <h2>Potencias</h2>
            <p>Generar las 15 primeras potencias de un número del 1 al 9.</p>
        </a>

    </nav>
</main>

<?php require_once 'views/layouts/footer.php'; ?>