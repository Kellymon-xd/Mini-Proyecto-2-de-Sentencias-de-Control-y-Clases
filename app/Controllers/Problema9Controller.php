<?php
// Recibe un número del 1 al 9 y devuelve sus 15 primeras potencias.

require_once __DIR__ . '/../Models/Potencias.php';
require_once __DIR__ . '/../Utils/Utilidades.php';

header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Método no permitido.']);
    exit;
}

$num = Utilidades::limpiarTexto($_POST['numero'] ?? '');

if (!Utilidades::validarEnteroRango($num, 1, 9)) {
    echo json_encode(['error' => 'Ingresa un número entero entre 1 y 9.']);
    exit;
}

$base     = (int) $num;
$potencias = Potencias::generar($base, 15);

echo json_encode([
    'ok'       => true,
    'base'     => $base,
    'potencias'=> $potencias,
]);
?>