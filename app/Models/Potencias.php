<?php
// Model: genera las primeras N potencias de una base dada.

class Potencias
{
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