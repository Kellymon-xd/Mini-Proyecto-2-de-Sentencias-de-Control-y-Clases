<?php
/**
 * Problema 9 controller.
 *
 * Recibe un número entre 1 y 9 por POST, lo valida y calcula las primeras
 * 15 potencias a través del modelo Potencias.
 */

require_once __DIR__ . '/../Models/Potencias.php';
require_once __DIR__ . '/../Utils/Utilidades.php';

header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Método no permitido.']);
    exit;
}

// Limpiar y validar el número recibido.
$num = Utilidades::limpiarTexto($_POST['numero'] ?? '');

if (!Utilidades::validarEnteroRango($num, 1, 9)) {
    echo json_encode(['error' => 'Ingresa un número entero entre 1 y 9.']);
    exit;
}

$base      = (int) $num;
$potencias = Potencias::generar($base, 15);

echo json_encode([
    'ok'       => true,
    'base'     => $base,
    'potencias'=> $potencias,
]);
?>