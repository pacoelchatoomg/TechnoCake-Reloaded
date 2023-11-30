<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

 
class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;
 
    protected $fillable = [
        'name',
        'price',
        'product_code',
        'description',
        'inventory_id',
        'pedido_id',
        'disponible'
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedidos::class, 'pedido_id');
    }
    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'inventory_id');
    }
}