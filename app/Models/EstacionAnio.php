<?php
/**
 * EstacionAnio
 *
 * Determina la estación del año para una fecha dada y devuelve
 * un nombre de imagen correspondiente.
 */

class EstacionAnio
{
    /**
     * Determina la estación del año para una fecha dada.
     *
     * Tabla de estaciones:
     * Invierno: 21 dic → 20 mar
     * Primavera: 21 mar → 20 jun
     * Verano: 21 jun → 22 sep
     * Otoño: 23 sep → 20 dic
    */
    public static function determinar(string $fechaStr): array
    {
        $fecha = new DateTime($fechaStr);

        // Extraemos solo mes y día para comparar sin importar el año
        $mes = (int) $fecha->format('n');
        $dia = (int) $fecha->format('j');

        $estacion = self::clasificar($mes, $dia);

        $nombreArchivo = self::nombreArchivo($estacion);

        return [
            'estacion' => $estacion,
            'imagen'   => $nombreArchivo . '.png',
        ];
    }

    /**
     * Clasifica la estación del año según mes y día.
     *
     * Convierte mes y día a un valor compuesto para comparar rangos sin
     * depender del año.
     *
     * @param int $mes
     * @param int $dia
     * @return string
     */
    private static function clasificar(int $mes, int $dia): string
    {
        $valor = $mes * 100 + $dia;

        // Hemisferio Norte:
        // Invierno: 21 dic (1221) - 31 dic (1231) y 1 ene (101) - 20 mar (320)
        if ($valor >= 1221 || $valor <= 320) {
            return 'Invierno';
        }

        // Primavera: 21 mar (321) - 20 jun (620)
        if ($valor >= 321 && $valor <= 620) {
            return 'Primavera';
        }

        // Verano: 21 jun (621) - 22 sep (922)
        if ($valor >= 621 && $valor <= 922) {
            return 'Verano';
        }

        // Otoño: 23 sep (923) - 20 dic (1220)
        return 'Otoño';
    }

    /**
     * Devuelve el nombre de archivo de imagen según la estación.
     *
     * @param string $estacion
     * @return string
     */
    private static function nombreArchivo(string $estacion): string
    {
        $mapa = [
            'Verano'    => 'verano',
            'Otoño'     => 'otono',
            'Invierno'  => 'invierno',
            'Primavera' => 'primavera',
        ];

        return $mapa[$estacion] ?? 'verano';
    }
}
?>