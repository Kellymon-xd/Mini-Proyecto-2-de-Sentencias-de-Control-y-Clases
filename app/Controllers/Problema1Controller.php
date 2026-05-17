<?php
// Recibe 5 números positivos por POST y devuelve estadísticas en JSON.

require_once __DIR__ . '/../Models/Estadistica.php';
require_once __DIR__ . '/../Utils/Utilidades.php';

header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Método no permitido.']);
    exit;
}

$numeros = [];

for ($i = 1; $i <= 5; $i++) {
    $raw = Utilidades::limpiarTexto($_POST["n{$i}"] ?? '');

    if (!Utilidades::esNumero($raw)) {
        echo json_encode(['error' => "El número {$i} no es válido."]);
        exit;
    }

    $valor = Utilidades::convertirANumero($raw);

    if ($valor <= 0) {
        echo json_encode(['error' => "El número {$i} debe ser positivo (mayor a 0)."]);
        exit;
    }

    $numeros[] = $valor;
}

$resultado = Estadistica::calcular($numeros);

echo json_encode([
    'ok'         => true,
    'media'      => $resultado['media'],
    'desviacion' => $resultado['desviacion'],
    'minimo'     => $resultado['minimo'],
    'maximo'     => $resultado['maximo'],
]);
?>