<?php
// Model: calcula la suma de todos los enteros entre dos valores.Usa la fórmula de Gauss: n*(n+1)/2 adaptada al rango dado.

class Sumatoria
{
    public static function calcular(int $inicio, int $fin): int
    {
        $sumaHastaFin    = ($fin   * ($fin   + 1)) / 2;
        $sumaAntesDeinicio = (($inicio - 1) * $inicio) / 2;

        return (int) ($sumaHastaFin - $sumaAntesDeinicio);
    }
}
?>