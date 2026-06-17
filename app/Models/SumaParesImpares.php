<?php
/**
 * SumaParesImpares
 *
 * Calcula por separado la suma y el conteo de los números pares e impares
 * dentro de un rango de enteros.
 */

class SumaParesImpares
{
    /**
     * Recorre cada número del rango e incrementa los totales.
     *
     * @param int $inicio Valor inicial del rango.
     * @param int $fin Valor final del rango.
     * @return array{
     *     sumaPares:int,
     *     sumaImpares:int,
     *     totalPares:int,
     *     totalImpares:int,
     *     inicio:int,
     *     fin:int
     * }
     */
    public static function calcular(int $inicio, int $fin): array
    {
        $sumaPares   = 0;
        $sumaImpares = 0;
        $totalPares  = 0;
        $totalImpares= 0;

        for ($i = $inicio; $i <= $fin; $i++) {
            if ($i % 2 === 0) {
                $sumaPares  += $i;
                $totalPares++;
            } else {
                $sumaImpares += $i;
                $totalImpares++;
            }
        }

        return [
            'sumaPares'    => $sumaPares,
            'sumaImpares'  => $sumaImpares,
            'totalPares'   => $totalPares,
            'totalImpares' => $totalImpares,
            'inicio'       => $inicio,
            'fin'          => $fin,
        ];
    }
}
?>