<?php
// footer.php — Se muestra en todas las páginas (DRY)
require_once __DIR__ . '/../../app/Utils/Utilidades.php';

$fechaHoy = Utilidades::obtenerFechaEjecucion();
?>

<footer class="pie-pagina">
    <p>
        Fecha de ejecución: <br>
        <?= Utilidades::escaparHTML($fechaHoy) ?>
    </p>

    <p>Desarrollo Web VII &mdash; Mini Proyecto #2</p>
</footer>

</body>
</html>