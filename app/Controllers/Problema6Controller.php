<?php
// Recibe el monto total del presupuesto y lo calcula por departamento

require_once __DIR__ . '/../Models/PresupuestoHospital.php';
require_once __DIR__ . '/../Utils/Utilidades.php';

header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Método no permitido.']);
    exit;
}

$valorRaw = Utilidades::limpiarTexto($_POST['presupuesto'] ?? '');

if (!Utilidades::esNumero($valorRaw)) {
    echo json_encode(['error' => 'Ingrese un valor numérico válido para el presupuesto.']);
    exit;
}

$presupuesto = Utilidades::convertirANumero($valorRaw);

if ($presupuesto <= 0) {
    echo json_encode(['error' => 'El presupuesto debe ser un valor positivo mayor a cero.']);
    exit;
}

$distribucion = PresupuestoHospital::calcularDistribucion($presupuesto);

echo json_encode([
    'ok'            => true,
    'total'         => $distribucion['total'],
    'ginecologia'   => $distribucion['ginecologia'],
    'traumatologia' => $distribucion['traumatologia'],
    'pediatria'     => $distribucion['pediatria'],
]);
?>