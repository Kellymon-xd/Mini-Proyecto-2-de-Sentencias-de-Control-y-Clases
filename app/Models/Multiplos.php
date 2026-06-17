<?php
/**
 * Multiplos
 *
 * Genera una secuencia de múltiplos de un número base.
 */

class Multiplos
{
    /**
     * Genera los primeros N múltiplos de una base.
     *
     * @param int $base Valor base del múltiplo.
     * @param int $cantidad Cantidad de múltiplos a generar.
     * @return int[]
     */
    public static function generar(int $base, int $cantidad): array
    {
        $multiplos = [];

        for ($i = 1; $i <= $cantidad; $i++) {
            $multiplos[] = $base * $i;
        }

        return $multiplos;
    }
}
?>