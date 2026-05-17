<?php
// Model: genera los primeros N múltiplos de una base dada.

class Multiplos
{
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