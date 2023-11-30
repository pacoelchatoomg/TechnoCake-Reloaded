<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = ['amount','name', 'price', 'description', 'image', 'stock'];
    public function productos()
    {
        return $this->hasMany(Producto::class, 'inventory_id');
    }

}
