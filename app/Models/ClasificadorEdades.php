<?php
// Model: clasifica cada edad en su categoría y genera estadísticas del grupo.

require_once "Estadistica.php";

class ClasificadorEdades
{
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
            'edadesRepetidas' => self::obtenerEdadesRepetidas($edades),
        ];
    }

    private static function obtenerEdadesRepetidas(array $edades): array
    {
        $conteoEdades = [];
        $repetidas = [];

        foreach ($edades as $edad) {
            if (!isset($conteoEdades[$edad])) {
                $conteoEdades[$edad] = 0;
            }

            $conteoEdades[$edad]++;
        }

        foreach ($conteoEdades as $edad => $cantidad) {
            if ($cantidad > 1) {
                $repetidas[] = [
                    'edad' => $edad,
                    'cantidad' => $cantidad,
                ];
            }
        }

        return $repetidas;
    }
}
?>