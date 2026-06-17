<?php
/**
 * Sumatoria
 *
 * Contiene el método para calcular rápidamente la suma de todos los
 * enteros entre dos valores incluidos.
 */

class Sumatoria
{
    /**
     * Calcula la suma de todos los enteros en un rango cerrado.
     *
     * Usa la fórmula de Gauss para obtener el resultado sin iterar.
     *
     * @param int $inicio Valor inicial inclusive.
     * @param int $fin Valor final inclusive.
     * @return int
     */
    public static function calcular(int $inicio, int $fin): int
    {
        $sumaHastaFin    = ($fin   * ($fin   + 1)) / 2;
        $sumaAntesDeinicio = (($inicio - 1) * $inicio) / 2;

        return (int) ($sumaHastaFin - $sumaAntesDeinicio);
    }
}
?>