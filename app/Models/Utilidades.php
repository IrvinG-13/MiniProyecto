<?php

class Utilidades
{
    // VALIDACIONES & SANITIZACIÓN 

    // Elimina etiquetas HTML y codifica caracteres especiales (previene XSS)
    public static function sanitizar(string $valor): string
    {
        return trim(htmlspecialchars(strip_tags($valor), ENT_QUOTES, 'UTF-8'));
    }

    // Verifica que el valor sea numérico y mayor que 0
    public static function esNumeroPositivo($valor): bool
    {
        return is_numeric($valor) && (float) $valor > 0;
    }

    // Verifica que el valor sea un entero positivo sin decimales (usa preg_match)
    public static function esEnteroPositivo(string $valor): bool
    {
        return (bool) preg_match('/^[1-9][0-9]*$/', $valor);
    }

    // Verifica que el correo tenga formato válido (usa filter_var)
    public static function esCorreoValido(string $correo): bool
    {
        return filter_var($correo, FILTER_VALIDATE_EMAIL) !== false;
    }

    // Devuelve true si la petición fue enviada por POST
    public static function esPost(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    // Verifica que el valor esté dentro de una lista permitida (whitelist)
    public static function esOpcionValida(string $valor, array $listaPermitida): bool
    {
        return in_array($valor, $listaPermitida, true);
    }

    // MATEMÁTICAS 

    // Calcula el promedio de un arreglo de números
    public static function promedio(array $numeros): float
    {
        return array_sum($numeros) / count($numeros);
    }

    // Devuelve el valor mínimo del arreglo
    public static function minimo(array $numeros): float
    {
        return min($numeros);
    }

    // Devuelve el valor máximo del arreglo
    public static function maximo(array $numeros): float
    {
        return max($numeros);
    }

    // Calcula la desviación estándar muestral: S = sqrt( Σ(x - x̄)² / (n-1) )
    public static function desviacionEstandar(array $numeros): float
    {
        $media = self::promedio($numeros);
        $suma  = 0.0;
        foreach ($numeros as $numero) {
            $suma += pow($numero - $media, 2);
        }
        return sqrt($suma / (count($numeros) - 1));
    }

    // Calcula base elevada a exponente usando pow()
    public static function potencia(float $base, float $exponente): float
    {
        return pow($base, $exponente);
    }

    // Calcula la raíz cuadrada usando sqrt()
    public static function raiz(float $numero): float
    {
        return sqrt($numero);
    }

    //NAVEGACIÓN d

    // Genera el enlace "Volver al menú" con la URL sanitizada
    public static function enlaceVolver(string $url): string
    {
        $urlSegura = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
        return "<a href='{$urlSegura}' class='volver'>← Volver al menú</a>";
    }
}