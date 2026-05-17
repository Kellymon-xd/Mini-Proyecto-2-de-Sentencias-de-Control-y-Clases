<?php
// Componente: muestra el botón "Volver al menú".
// Úsalo con: require y pasando la variable $urlVolver antes del include.

if (!isset($urlVolver)) {
    $script = $_SERVER['SCRIPT_NAME'] ?? '';
    $base   = rtrim(dirname($script), '/\\');
    if (strpos($base, '/views') !== false) {
        $base = substr($base, 0, strpos($base, '/views'));
    }
    $urlVolver = ($base === '') ? '/index.php' : $base . '/index.php';
}
?>
<a href="<?= htmlspecialchars($urlVolver, ENT_QUOTES, 'UTF-8') ?>" class="btn-volver">
    ← Volver al menú
</a>
