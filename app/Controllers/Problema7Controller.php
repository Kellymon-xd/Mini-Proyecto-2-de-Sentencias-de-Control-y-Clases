<?php
/**
 * Problema 7 controller.
 *
 * Lee un JSON desde el cuerpo de la petición con un arreglo de notas,
 * valida cada nota y calcula estadísticas con el modelo Estadistica.
 */

require_once __DIR__ . '/../Models/Estadistica.php';
require_once __DIR__ . '/../Utils/Utilidades.php';

header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'ok' => false,
        'error' => 'Método no permitido.'
    ]);
    exit;
}

// Leer el cuerpo de la petición y convertirlo de JSON a arreglo.
$bodyRaw = file_get_contents('php://input');
$body = json_decode($bodyRaw, true);

if (!isset($body['notas']) || !is_array($body['notas'])) {
    echo json_encode([
        'ok' => false,
        'error' => 'Formato de datos incorrecto.'
    ]);
    exit;
}

$notasRaw = $body['notas'];

if (count($notasRaw) < 1) {
    echo json_encode([
        'ok' => false,
        'error' => 'Debes ingresar al menos una nota.'
    ]);
    exit;
}

if (count($notasRaw) > 100) {
    echo json_encode([
        'ok' => false,
        'error' => 'El máximo permitido es 100 notas.'
    ]);
    exit;
}

$notas = [];

foreach ($notasRaw as $indice => $raw) {
    $limpio = Utilidades::limpiarTexto((string) $raw);

    if (!Utilidades::esNumero($limpio)) {
        $pos = $indice + 1;

        echo json_encode([
            'ok' => false,
            'error' => "La nota #{$pos} no es un número válido."
        ]);
        exit;
    }

    $valor = Utilidades::convertirANumero($limpio);

    if ($valor < 0 || $valor > 100) {
        $pos = $indice + 1;

        echo json_encode([
            'ok' => false,
            'error' => "La nota #{$pos} debe estar entre 0 y 100."
        ]);
        exit;
    }

    $notas[] = $valor;
}

$resultado = Estadistica::calcular($notas, 2);

echo json_encode([
    'ok' => true,
    'cantidad' => $resultado['cantidad'],
    'promedio' => $resultado['media'],
    'desviacion' => $resultado['desviacion'],
    'minima' => $resultado['minimo'],
    'maxima' => $resultado['maximo'],
]);
?>