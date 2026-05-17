<?php
// Model: calcula la suma de números pares y la suma de impares dentro de un rango.

class SumaParesImpares
{
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