<?php
class Estadistica{
    private array $numeros;

    public function __construct(array $numeros){
        $this -> numeros = $numeros;
    }

    public function calcularOperacion(string $operacion){
        switch($operacion){
            case'media':
                return $this ->calcularMedia();
            
            case'minimo':
                return $this ->calcularMinimo();

            case'maximo':
                return $this ->calcularMaximo();
            case'desviacion':
                return $this ->calcularDesviacion();
        }
    }

    //Funciones

    public function calcularMedia():float{
        return array_sum($this ->numeros)/count($this ->numeros);
    }

    public function calcularMinimo():float {
        return min($this ->numeros);
    }

    public function calcularMaximo(){
        return max($this ->numeros);
    }

    public function calcularDesviacion():float{
        $media =$this-> calcularMedia();
        $suma = 0;

        foreach ($this ->numeros as $numero) {
            $suma += pow($numero - $media,2);
        }
        return sqrt($suma/count($this ->numeros));
    }
    //Para sanitizar
        public static function sanitizar(string $valor): string
    {
        return htmlspecialchars(trim($valor));
    }
}