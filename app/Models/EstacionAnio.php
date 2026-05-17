<?php
// Model: determina la estación del año a partir de una fecha.

class EstacionAnio
{
    /**
     * Determina la estación del año para una fecha dada.
     *
     * Tabla de estaciones:
     *   Verano    : 21 dic → 20 mar
     *   Otoño     : 21 mar → 21 jun
     *   Invierno  : 22 jun → 22 sep
     *   Primavera : 23 sep → 20 dic
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
     * Clasifica la estación usando los rangos de mes/día.
     * Usamos un número compuesto (mes * 100 + día) para comparar rangos fácilmente.
     */
    private static function clasificar(int $mes, int $dia): string
    {
        $valor = $mes * 100 + $dia;

        // Verano: 21 dic (1221) - 31 dic (1231)  y  1 ene (101) - 20 mar (320)
        if ($valor >= 1221 || $valor <= 320) {
            return 'Verano';
        }

        // Otoño: 21 mar (321) - 21 jun (621)
        if ($valor >= 321 && $valor <= 621) {
            return 'Otoño';
        }

        // Invierno: 22 jun (622) - 22 sep (922)
        if ($valor >= 622 && $valor <= 922) {
            return 'Invierno';
        }

        // Primavera: 23 sep (923) - 20 dic (1220)
        return 'Primavera';
    }

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