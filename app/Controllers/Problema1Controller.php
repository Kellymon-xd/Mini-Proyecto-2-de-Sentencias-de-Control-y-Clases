<?php
/**
 * Problema 1 controller.
 *
 * Valida 5 valores numéricos recibidos por POST, los convierte a números
 * y calcula estadísticas básicas con el modelo Estadistica.
 */

require_once __DIR__ . '/../Models/Estadistica.php';
require_once __DIR__ . '/../Utils/Utilidades.php';

header('Content-Type: application/json; charset=UTF-8');

// Acepte solo solicitudes POST para evitar peticiones inesperadas.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Método no permitido.']);
    exit;
}

$numeros = [];

for ($i = 1; $i <= 5; $i++) {
    // Limpiar el texto recibido por POST antes de validar.
    $raw = Utilidades::limpiarTexto($_POST["n{$i}"] ?? '');

    // Validar que el contenido sea numérico.
    if (!Utilidades::esNumero($raw)) {
        echo json_encode(['error' => "El número {$i} no es válido."]);
        exit;
    }

    // Convertir el valor limpio a tipo numérico.
    $valor = Utilidades::convertirANumero($raw);

    // Validar que el número sea positivo.
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