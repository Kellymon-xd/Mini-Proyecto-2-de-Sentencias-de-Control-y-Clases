<?php
/**
 * Navegacion
 *
 * Provee métodos para generar rutas y enlaces reutilizables del proyecto.
 */

class Navegacion
{
    /**
     * Devuelve la ruta base del proyecto en el servidor.
     *
     * @return string
     */
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

    /**
     * Devuelve la ruta pública del proyecto.
     *
     * @return string
     */
    public static function obtenerRutaPublic(): string
    {
        $base = self::obtenerBaseProyecto();

        return $base === '' ? '/public' : $base . '/public';
    }

    /**
     * Devuelve la ruta de la carpeta de imágenes dentro de public.
     *
     * @return string
     */
    public static function obtenerRutaImagenes(): string
    {
        return self::obtenerRutaPublic() . '/img';
    }

    public static function urlMenuPrincipal(): string
    {
        return self::obtenerBaseProyecto() . '/index.php';
    }

    /**
     * Genera un enlace HTML seguro para volver al menú.
     *
     * @param string $url URL de destino para el botón.
     * @return string
     */
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