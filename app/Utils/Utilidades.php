<?php
// Se usa en controllers para limpiar y validar datos antes de pasarlos al model.  (sanitización, validación, conversión)

class Utilidades
{
    /**
     * Elimina espacios al inicio y al final de una cadena.
     */
    public static function limpiarTexto(string $texto): string
    {
        return trim($texto);
    }

    /**
     * Convierte caracteres especiales a entidades HTML para evitar XSS.
     * Siempre usar esta función antes de imprimir datos del usuario en HTML.
     * Ejemplo: "<script>" → "&lt;script&gt;"
     */
    public static function escaparHTML(string $texto): string
    {
        return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
    }

    /**
     * Verifica si un valor es numérico (entero o decimal).
     * Acepta números negativos y con decimales.
     */
    public static function esNumero(mixed $valor): bool
    {
        return is_numeric($valor);
    }

    /**
     * Convierte un valor a float.
     */
    public static function convertirANumero(mixed $valor): float
    {
        return (float) $valor;
    }

    /**
     * Redondea un número a N decimales (por defecto 2).
     */
    public static function redondear(float $numero, int $decimales = 2): float
    {
        return round($numero, $decimales);
    }

    /**
     * Valida que un valor sea un entero dentro de un rango [min, max].
     * Retorna true si es válido, false si no.
     */
    public static function validarEnteroRango(mixed $valor, int $min, int $max): bool
    {
        // Primero verificamos que sea numérico
        if (!self::esNumero($valor)) {
            return false;
        }

        $numero = (int) $valor;

        // Verificamos que no sea decimal (ej: 3.5 no es entero válido)
        if ((float) $valor !== (float) $numero) {
            return false;
        }

        return $numero >= $min && $numero <= $max;
    }

    /**
     * Devuelve la fecha actual formateada en español.
     *
     * Ajusta la zona horaria a América/Panamá antes de formatear.
     *
     * @return string
     */
    public static function obtenerFechaEjecucion(): string
    {
    date_default_timezone_set('America/Panama');

    $dias = [
        'domingo',
        'lunes',
        'martes',
        'miércoles',
        'jueves',
        'viernes',
        'sábado'
    ];

    $meses = [
        1 => 'enero',
        2 => 'febrero',
        3 => 'marzo',
        4 => 'abril',
        5 => 'mayo',
        6 => 'junio',
        7 => 'julio',
        8 => 'agosto',
        9 => 'septiembre',
        10 => 'octubre',
        11 => 'noviembre',
        12 => 'diciembre'
    ];

    $hoy = new DateTime();

    $diaSemana = $dias[(int) $hoy->format('w')];
    $dia = $hoy->format('d');
    $mes = $meses[(int) $hoy->format('n')];
    $anio = $hoy->format('Y');

    return $diaSemana . ', ' . $dia . ' de ' . $mes . ' de ' . $anio;
}
}
?>