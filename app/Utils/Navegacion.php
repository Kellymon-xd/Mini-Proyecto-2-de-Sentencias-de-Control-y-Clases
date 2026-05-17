<?php
// app/Utils/Navegacion.php
// Se usa para centralizar rutas y enlaces de navegación reutilizables del proyecto.

class Navegacion
{
    public static function obtenerBaseProyecto(): string
    {
        $script = $_SERVER['SCRIPT_NAME'] ?? '';
        $base = rtrim(dirname($script), '/\\');

        if (strpos($base, '/views') !== false) {
            $base = substr($base, 0, strpos($base, '/views'));
        }

        if (strpos($base, '/app') !== false) {
            $base = substr($base, 0, strpos($base, '/app'));
        }

        return $base === '' ? '' : $base;
    }

    public static function obtenerRutaPublic(): string
    {
        $base = self::obtenerBaseProyecto();

        return $base === '' ? '/public' : $base . '/public';
    }

    public static function obtenerRutaImagenes(): string
    {
        return self::obtenerRutaPublic() . '/img';
    }

    public static function urlMenuPrincipal(): string
    {
        return self::obtenerBaseProyecto() . '/index.php';
    }

    public static function botonVolver(string $url): string
    {
        $urlSegura = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');

        return '<a href="' . $urlSegura . '" class="btn-volver">← Volver al menú</a>';
    }

    public static function enlaceLogo(): string
    {
        $urlSegura = htmlspecialchars(self::urlMenuPrincipal(), ENT_QUOTES, 'UTF-8');

        return '<a href="' . $urlSegura . '" class="logo-link">Mini Proyecto #2</a>';
    }
}
?>