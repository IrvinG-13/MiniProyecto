<?php

require_once 'app/Models/Multiplos4.php';

class Problema3Controller
{
    /** @var string Método HTTP del formulario */
    private const METODO_FORMULARIO = 'POST';

    /** @return void */
    public function procesar(): void
    {
        $datos = [
            'multiplos'    => [],
            'n'            => null,
            'magnitud'     => null,
            'limiteSeguro' => Multiplos4::limiteSeguro(),
            'errores'      => [],
        ];

        if ($_SERVER['REQUEST_METHOD'] === self::METODO_FORMULARIO) {
            $datos = $this->procesarFormulario($datos);
        }

        $this->cargarVista($datos);
    }

    /**
     * @param  array $datos Estructura base para la vista
     * @return array        Datos actualizados
     */
    private function procesarFormulario(array $datos): array
    {
        $entradaCruda  = $_POST['n'] ?? '';
        $entradaLimpia = $this->sanitizarEntrada($entradaCruda);
        $errores       = $this->validarN($entradaLimpia);

        if (!empty($errores)) {
            $datos['errores'] = $errores;
            return $datos;
        }

        $n      = (int) $entradaLimpia;
        $modelo = new Multiplos4($n);

        $datos['n']         = $n;
        $datos['multiplos'] = $modelo->generarMultiplos();
        $datos['magnitud']  = Multiplos4::interpretarMagnitud($n);

        return $datos;
    }

    /**
     * @param  string $entrada Valor crudo del POST
     * @return string          Valor limpio
     */
    private function sanitizarEntrada(string $entrada): string
    {
        $limpia = strip_tags($entrada);
        $limpia = htmlspecialchars($limpia, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        return trim($limpia);
    }

    /**
     * @param  string   $valor Cadena sanitizada a validar
     * @return string[]        Lista de errores
     */
    private function validarN(string $valor): array
    {
        $errores = [];

        if ($valor === '' || !ctype_digit($valor)) {
            $errores[] = 'Debes ingresar un número entero positivo válido.';
            return $errores;
        }

        if ((int) $valor <= 0) {
            $errores[] = 'El valor de N debe ser mayor que 0.';
        }

        return $errores;
    }

    /**
     * @param  array $datos Variables para la vista
     * @return void
     */
    private function cargarVista(array $datos): void
    {
        extract($datos);
        require_once 'app/Views/problemas/problema3.php';
    }
}