<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedidos extends Model
{   
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'amount',
        'price',
        'status',
        'description'
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class,'pedido_id');
    }
}
