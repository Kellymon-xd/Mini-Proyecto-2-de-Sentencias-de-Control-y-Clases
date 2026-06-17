<?php
/**
 * Problema 5 controller.
 *
 * Lee 5 edades enviadas por POST, valida cada edad y construye un arreglo
 * para pasarlo al modelo de clasificación de edades.
 */

require_once __DIR__ . '/../Models/ClasificadorEdades.php';
require_once __DIR__ . '/../Utils/Utilidades.php';

header('Content-Type: application/json; charset=UTF-8');

// Aceptar solo POST para evitar uso directo por URL.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'ok' => false,
        'error' => 'Método no permitido.'
    ]);
    exit;
}

$edades = [];

for ($i = 1; $i <= 5; $i++) {
    // Limpiar cada edad antes de validar.
    $raw = Utilidades::limpiarTexto($_POST["edad{$i}"] ?? '');

    // Validar que sea un entero dentro del rango aceptable.
    if (!Utilidades::validarEnteroRango($raw, 0, 120)) {
        echo json_encode([
            'ok' => false,
            'error' => "La edad {$i} debe ser un número entero entre 0 y 120."
        ]);
        exit;
    }

    $edades[] = (int) $raw;
}

// Enviar el arreglo de edades al modelo para clasificación y estadísticas.
$resultado = ClasificadorEdades::procesar($edades);

echo json_encode([
    'ok' => true,
    'personas' => $resultado['personas'],
    'conteo' => $resultado['conteo'],
    'media' => $resultado['estadisticas']['media'],
    'minimo' => $resultado['estadisticas']['minimo'],
    'maximo' => $resultado['estadisticas']['maximo'],
    'repetidas' => $resultado['edadesRepetidas'] ?? [],
]);
exit;