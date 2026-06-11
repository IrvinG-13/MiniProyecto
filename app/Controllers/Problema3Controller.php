<?php

require_once 'app/Models/Utilidades.php';
require_once 'app/Models/Multiplos4.php';

class Problema3Controller
{   // Controla el flujo del problema y envía los datos a la vista
    public function procesar(): void
    {
        $datos = [
            'multiplos'         => [],
            'n'                 => null,
            'magnitud'          => null,
            'huboDesbordamiento'=> false,
            'limiteMaximo'      => Multiplos4::limiteMaximo(),
            'errores'           => [],
        ];

        if (Utilidades::esPost()) {
            $datos = $this->procesarFormulario($datos);
        }

        extract($datos);
        require_once 'app/Views/problemas/problema3.php';
    }
    // Valida la entrada, genera los múltiplos y prepara los datos para la vista
    private function procesarFormulario(array $datos): array
    {
        // Sanitiza la entrada para prevenir XSS
        $entradaLimpia = Utilidades::sanitizar($_POST['n'] ?? '');

        // Verifica que N sea un entero positivo válido
        if (!Utilidades::esEnteroPositivo($entradaLimpia)) {
            $datos['errores'][] = 'Debes ingresar un número entero positivo válido (mayor que 0).';
            return $datos;
        }

        $n      = (int) $entradaLimpia;
        $modelo = new Multiplos4($n);

        $multiplos = $modelo->generarMultiplos();

        $datos['n']         = $n;
        $datos['multiplos'] = $multiplos;
        $datos['magnitud']  = Multiplos4::interpretarMagnitud($n);

        // Indica si el valor ingresado supera el límite permitido 
        $datos['huboDesbordamiento'] = Multiplos4::detectarDesbordamiento($n);

        return $datos;
    }
}