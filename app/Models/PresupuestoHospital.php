<?php

class PresupuestoHospital
{
    private float $total;

    public function __construct(float $total)
    {
        $this->total = $total;
    }

    public function calcular(): array
    {
        return [
            'Ginecologia' => $this->total * 0.40,
            'Traumatologia' => $this->total * 0.35,
            'Pediatria' => $this->total * 0.25,
        ];
    }
}