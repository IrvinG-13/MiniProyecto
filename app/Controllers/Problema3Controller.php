<?php
require_once 'app/Models/Multiplos4.php';

class Problema3Controller
{
    //metodo HTTP para envio del formulario
    private const METODO_FORMULARIO = 'POST';

    public function procesar(): void
    {
        //datos iniciales utilizados para la vista 
        $datos = [
            'multiplos'    => [],
            'n'            => null,
            'magnitud'     => null,
            'limiteMaximo' => Multiplos4::limiteMaximo(),
            'errores'      => [],
        ];
        //Procesa el formulario cuando se envia por post 
        if ($_SERVER['REQUEST_METHOD'] === self::METODO_FORMULARIO) {
            $datos = $this->procesarFormulario($datos);
        }
        //carga la vista con los datos generados 
        $this->cargarVista($datos);
    }

    private function procesarFormulario(array $datos): array
    {
    //obtiene y limpia el valor ingresado 
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
    //limpia la entrada del usuario 
    private function sanitizarEntrada(string $entrada): string
    {
        $limpia = strip_tags($entrada);
        $limpia = htmlspecialchars($limpia, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        return trim($limpia);
    }
    // verifica que N sea un entero valido 
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
    // envia los datos procesados a la vista
    private function cargarVista(array $datos): void
    {
        extract($datos);
        require_once 'app/Views/problemas/problema3.php';
    }
}