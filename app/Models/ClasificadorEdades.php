<?php
/**
 * ClasificadorEdades
 *
 * Clasifica edades en categorías de edad y genera estadísticas del
 * conjunto de edades proporcionado.
 */

require_once "Estadistica.php";

class ClasificadorEdades
{
    /**
     * Devuelve la categoría de edad según el rango.
     *
     * @param int $edad
     * @return string
     */
    public static function clasificarUna(int $edad): string
    {
        if ($edad >= 0 && $edad <= 12) {
            return 'Niño';
        }

        if ($edad >= 13 && $edad <= 17) {
            return 'Adolescente';
        }

        if ($edad >= 18 && $edad <= 64) {
            return 'Adulto';
        }

        return 'Adulto mayor';
    }

    /**
     * Procesa un arreglo de edades y devuelve categorías, conteos y estadísticas.
     *
     * @param int[] $edades
     * @return array{
     *     personas:array,
     *     conteo:array,
     *     estadisticas:array,
     *     edadesRepetidas:array
     * }
     */
    public static function procesar(array $edades): array
    {
        $personas = [];
        $conteo = [
            'Niño' => 0,
            'Adolescente' => 0,
            'Adulto' => 0,
            'Adulto mayor' => 0,
        ];

        foreach ($edades as $edad) {
            $categoria = self::clasificarUna($edad);

            $personas[] = [
                'edad' => $edad,
                'categoria' => $categoria,
            ];

            $conteo[$categoria]++;
        }

        $estadisticas = Estadistica::calcular($edades, 2);

        return [
            'personas' => $personas,
            'conteo' => $conteo,
            'estadisticas' => [
                'media' => $estadisticas['media'],
                'desviacion' => $estadisticas['desviacion'],
                'minimo' => $estadisticas['minimo'],
                'maximo' => $estadisticas['maximo'],
                'cantidad' => $estadisticas['cantidad'],
            ],

        ];
    }
}
?>