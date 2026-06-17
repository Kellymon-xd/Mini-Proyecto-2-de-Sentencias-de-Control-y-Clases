<?php
/**
 * Potencias
 *
 * Genera una lista de potencias de una base para mostrar resultados
 * de exponente progresivo.
 */

class Potencias
{
    /**
     * Genera las primeras potencias de la base especificada.
     *
     * @param int $base
     * @param int $cantidad
     * @return array<int,array{exponente:int,resultado:int}>
     */
    public static function generar(int $base, int $cantidad): array
    {
        $potencias = [];

        for ($exp = 1; $exp <= $cantidad; $exp++) {
            $potencias[] = [
                'exponente' => $exp,
                'resultado' => $base ** $exp,
            ];
        }

        return $potencias;
    }
}
?>