<?php
// app/Controllers/Problema5Controller.php
// Recibe 5 edades por POST y devuelve clasificación + estadísticas en JSON.

require_once __DIR__ . '/../Models/ClasificadorEdades.php';
require_once __DIR__ . '/../Utils/Utilidades.php';

header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'ok' => false,
        'error' => 'Método no permitido.'
    ]);
    exit;
}

$edades = [];

for ($i = 1; $i <= 5; $i++) {
    $raw = Utilidades::limpiarTexto($_POST["edad{$i}"] ?? '');

    if (!Utilidades::validarEnteroRango($raw, 0, 120)) {
        echo json_encode([
            'ok' => false,
            'error' => "La edad {$i} debe ser un número entero entre 0 y 120."
        ]);
        exit;
    }

    $edades[] = (int) $raw;
}

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