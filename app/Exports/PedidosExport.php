<?php
namespace App\Exports;

use App\Models\Pedidos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PedidosExport implements FromCollection, WithHeadings
{
    protected $pedidos;

    public function __construct($pedidos)
    {
        $this->pedidos = $pedidos;
    }

    public function collection()
    {
        return $this->pedidos;
    }

    public function headings(): array
    {
        return [
            '#',
            'Cantidad',
            'Pago',
            'Estado',
            'Descripción',
            // Añade aquí más columnas si es necesario
        ];
    }
}

