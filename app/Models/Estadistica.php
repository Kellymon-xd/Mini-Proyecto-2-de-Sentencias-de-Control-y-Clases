<?php
/**
 * Estadistica
 *
 * Provee métodos para calcular estadísticas básicas sobre un arreglo
 * de números, como media, desviación estándar, mínimo y máximo.
 */

class Estadistica
{
    /**
     * Calcula estadísticas de un arreglo de números.
     *
     * @param float[] $numeros
     * @param int $decimales Cantidad de decimales para redondear los resultados.
     * @return array{
     *     cantidad:int,
     *     media:float,
     *     desviacion:float,
     *     minimo:float,
     *     maximo:float,
     *     numeros:array
     * }
     */
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

    /**
     * Suma todos los valores del arreglo.
     *
     * @param float[] $numeros
     * @return float
     */
    public static function sumar(array $numeros): float
    {
        $suma = 0;

        foreach ($numeros as $numero) {
            $suma += $numero;
        }

        return $suma;
    }

    /**
     * Calcula la desviación estándar poblacional.
     *
     * @param float[] $numeros
     * @param float $media Media del conjunto de datos.
     * @return float
     */
    public static function desviacionEstandar(array $numeros, float $media): float
    {
        $cantidad = count($numeros);
        $sumaDiferenciasCuadradas = 0;

        foreach ($numeros as $numero) {
            $sumaDiferenciasCuadradas += ($numero - $media) ** 2;
        }

        return sqrt($sumaDiferenciasCuadradas / $cantidad);
    }

    /**
     * Encuentra el valor mínimo del arreglo.
     *
     * @param float[] $numeros
     * @return float
     */
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

    /**
     * Encuentra el valor máximo del arreglo.
     *
     * @param float[] $numeros
     * @return float
     */
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