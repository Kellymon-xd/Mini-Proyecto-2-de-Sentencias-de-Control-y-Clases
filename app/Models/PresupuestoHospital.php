<?php
// Model: calcula el presupuesto del hospital distribuido entre tres áreas según porcentajes fijos.

class PresupuestoHospital
{
    const PORCENTAJE_GINECOLOGIA   = 0.40;
    const PORCENTAJE_TRAUMATOLOGIA = 0.35;
    const PORCENTAJE_PEDIATRIA     = 0.25;
    public static function calcularDistribucion(float $presupuesto): array
    {
        return [
            'ginecologia'   => round($presupuesto * self::PORCENTAJE_GINECOLOGIA,   2),
            'traumatologia' => round($presupuesto * self::PORCENTAJE_TRAUMATOLOGIA, 2),
            'pediatria'     => round($presupuesto * self::PORCENTAJE_PEDIATRIA,     2),
            'total'         => $presupuesto,
        ];
    }
}
?>