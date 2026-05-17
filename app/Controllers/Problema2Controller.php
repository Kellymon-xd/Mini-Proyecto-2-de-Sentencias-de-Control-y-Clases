<?php
// El Problema 2 no necesita input del usuario: solo calcula la suma del 1 al 1000.

require_once __DIR__ . '/../Models/Sumatoria.php';

header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Método no permitido.']);
    exit;
}

$resultado = Sumatoria::calcular(1, 1000);

echo json_encode([
    'ok'        => true,
    'inicio'    => 1,
    'fin'       => 1000,
    'resultado' => $resultado,
]);
?>