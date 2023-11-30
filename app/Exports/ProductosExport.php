<?php

namespace App\Exports;

use App\Models\Pedidos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductosExport implements FromCollection, WithHeadings
{
    protected $productos;

    public function __construct($productos)
    {
        $this->productos = $productos;
    }

    public function collection()
    {
        return $this->productos;
    }

    public function headings(): array
    {
        return [
            '#',
            'title',
            'price',
            'product_code',
            'description'
            // Añade aquí más columnas si es necesario
        ];
    }
}
