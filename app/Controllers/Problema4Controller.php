<?php
/**
 * Problema 4 controller.
 *
 * Recibe dos valores por POST, valida que sean enteros y que inicio
 * sea menor que fin. Luego delega el cálculo de pares e impares al modelo.
 */

require_once __DIR__ . '/../Models/SumaParesImpares.php';
require_once __DIR__ . '/../Utils/Utilidades.php';

header('Content-Type: application/json; charset=UTF-8');

// Solo aceptar POST.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Método no permitido.']);
    exit;
}

// Limpiar y validar los valores de inicio y fin.
$rawInicio = Utilidades::limpiarTexto($_POST['inicio'] ?? '');
$rawFin    = Utilidades::limpiarTexto($_POST['fin']    ?? '');

if (!Utilidades::validarEnteroRango($rawInicio, -10000, 10000)) {
    echo json_encode(['error' => 'El valor de inicio no es un entero válido.']);
    exit;
}

if (!Utilidades::validarEnteroRango($rawFin, -10000, 10000)) {
    echo json_encode(['error' => 'El valor de fin no es un entero válido.']);
    exit;
}

$inicio = (int) $rawInicio;
$fin    = (int) $rawFin;

// Validar que el rango tenga sentido.
if ($inicio >= $fin) {
    echo json_encode(['error' => 'El valor de inicio debe ser menor que el valor de fin.']);
    exit;
}

// Calcular las sumas de pares e impares usando el modelo.
$resultado = SumaParesImpares::calcular($inicio, $fin);

echo json_encode([
    'ok'           => true,
    'inicio'       => $resultado['inicio'],
    'fin'          => $resultado['fin'],
    'sumaPares'    => $resultado['sumaPares'],
    'sumaImpares'  => $resultado['sumaImpares'],
    'totalPares'   => $resultado['totalPares'],
    'totalImpares' => $resultado['totalImpares'],
]);
?>