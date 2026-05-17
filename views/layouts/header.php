<?php

require_once __DIR__ . '/../../app/Utils/Navegacion.php';

$hrefBase = Navegacion::obtenerRutaPublic();
$projectBase = Navegacion::obtenerBaseProyecto();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Proyecto #2 — PHP</title>

    <link rel="stylesheet" href="<?= htmlspecialchars($hrefBase, ENT_QUOTES, 'UTF-8') ?>/css/style.css">

    <script>
        window.__APP_BASE = "<?= htmlspecialchars($projectBase, ENT_QUOTES, 'UTF-8') ?>";
    </script>
</head>
<body>

<header class="barra-superior">
    <?= Navegacion::enlaceLogo(); ?>
    <span class="materia">Desarrollo Web VII</span>
</header>