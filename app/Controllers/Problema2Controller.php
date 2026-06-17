<?php
/**
 * Problema 2 controller.
 *
 * Solo acepta POST y calcula la sumatoria de los enteros del 1 al 1000
 * usando el modelo Sumatoria.
 */

require_once __DIR__ . '/../Models/Sumatoria.php';

header('Content-Type: application/json; charset=UTF-8');

// Solo se procesan solicitudes POST.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Método no permitido.']);
    exit;
}

// Llamada al modelo para calcular la sumatoria del rango fijo.
$resultado = Sumatoria::calcular(1, 1000);

echo json_encode([
    'ok'        => true,
    'inicio'    => 1,
    'fin'       => 1000,
    'resultado' => $resultado,
]);
?>