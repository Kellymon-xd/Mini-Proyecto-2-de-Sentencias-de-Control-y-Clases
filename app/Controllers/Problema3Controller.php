<?php
// Recibe N por POST y devuelve los N primeros múltiplos de 4.

require_once __DIR__ . '/../Models/Multiplos.php';
require_once __DIR__ . '/../Utils/Utilidades.php';

header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Método no permitido.']);
    exit;
}

$raw = Utilidades::limpiarTexto($_POST['n'] ?? '');

if (!Utilidades::validarEnteroRango($raw, 1, 500)) {
    echo json_encode(['error' => 'Ingresa un número entero entre 1 y 500.']);
    exit;
}

$n        = (int) $raw;
$multiplos = Multiplos::generar(4, $n);

echo json_encode([
    'ok'       => true,
    'n'        => $n,
    'multiplos'=> $multiplos,
]);
?>