<?php
/**
 * Problema 6 controller.
 *
 * Recibe el presupuesto total por POST, lo valida como número positivo
 * y delega el cálculo de la distribución al modelo PresupuestoHospital.
 */

require_once __DIR__ . '/../Models/PresupuestoHospital.php';
require_once __DIR__ . '/../Utils/Utilidades.php';

header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Método no permitido.']);
    exit;
}

// Limpiar el campo de presupuesto y validar que sea un número.
$valorRaw = Utilidades::limpiarTexto($_POST['presupuesto'] ?? '');

if (!Utilidades::esNumero($valorRaw)) {
    echo json_encode(['error' => 'Ingrese un valor numérico válido para el presupuesto.']);
    exit;
}

// Convertir el presupuesto a número real.
$presupuesto = Utilidades::convertirANumero($valorRaw);

// Asegurarse de que el presupuesto sea mayor que cero.
if ($presupuesto <= 0) {
    echo json_encode(['error' => 'El presupuesto debe ser un valor positivo mayor a cero.']);
    exit;
}

// Enviar el valor al modelo de distribución.
$distribucion = PresupuestoHospital::calcularDistribucion($presupuesto);

echo json_encode([
    'ok'            => true,
    'total'         => $distribucion['total'],
    'ginecologia'   => $distribucion['ginecologia'],
    'traumatologia' => $distribucion['traumatologia'],
    'pediatria'     => $distribucion['pediatria'],
]);
?>