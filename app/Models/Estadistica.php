<?php
// Model: calcula estadísticas de un arreglo de números usando foreach.

class Estadistica
{
    public static function calcular(array $numeros, int $decimales = 2): array
    {
        $cantidad = count($numeros);

        if ($cantidad === 0) {
            return [
                'cantidad' => 0,
                'media' => 0,
                'desviacion' => 0,
                'minimo' => 0,
                'maximo' => 0,
                'numeros' => [],
            ];
        }

        $suma = self::sumar($numeros);
        $media = $suma / $cantidad;

        return [
            'cantidad' => $cantidad,
            'media' => round($media, $decimales),
            'desviacion' => round(self::desviacionEstandar($numeros, $media), $decimales),
            'minimo' => self::minimo($numeros),
            'maximo' => self::maximo($numeros),
            'numeros' => $numeros,
        ];
    }

    public static function sumar(array $numeros): float
    {
        $suma = 0;

        foreach ($numeros as $numero) {
            $suma += $numero;
        }

        return $suma;
    }

    public static function desviacionEstandar(array $numeros, float $media): float
    {
        $cantidad = count($numeros);
        $sumaDiferenciasCuadradas = 0;

        foreach ($numeros as $numero) {
            $sumaDiferenciasCuadradas += ($numero - $media) ** 2;
        }

        return sqrt($sumaDiferenciasCuadradas / $cantidad);
    }

    public static function minimo(array $numeros): float
    {
        $minimo = $numeros[0];

        foreach ($numeros as $numero) {
            if ($numero < $minimo) {
                $minimo = $numero;
            }
        }

        return $minimo;
    }

    public static function maximo(array $numeros): float
    {
        $maximo = $numeros[0];

        foreach ($numeros as $numero) {
            if ($numero > $maximo) {
                $maximo = $numero;
            }
        }

        return $maximo;
    }
}
?>