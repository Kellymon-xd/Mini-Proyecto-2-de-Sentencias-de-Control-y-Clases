<?php
// Controller: recibe la fecha por POST, valida y devuelve JSON con la estación e imagen.

require_once __DIR__ . '/../Models/EstacionAnio.php';
require_once __DIR__ . '/../Utils/Utilidades.php';
require_once __DIR__ . '/../Utils/Navegacion.php';

header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'ok' => false,
        'error' => 'Método no permitido.'
    ]);
    exit;
}

$fechaRaw = Utilidades::limpiarTexto($_POST['fecha'] ?? '');

if ($fechaRaw === '') {
    echo json_encode([
        'ok' => false,
        'error' => 'Por favor ingresa una fecha válida.'
    ]);
    exit;
}

$fechaObj = DateTime::createFromFormat('Y-m-d', $fechaRaw);
$esValida = $fechaObj && $fechaObj->format('Y-m-d') === $fechaRaw;

if (!$esValida) {
    echo json_encode([
        'ok' => false,
        'error' => 'El formato de fecha no es válido.'
    ]);
    exit;
}

$resultado = EstacionAnio::determinar($fechaRaw);

$assetBase = Navegacion::obtenerRutaImagenes();

echo json_encode([
    'ok' => true,
    'fecha' => $fechaRaw,
    'estacion' => $resultado['estacion'],
    'imagen' => $assetBase . '/' . $resultado['imagen'],
]);
?>