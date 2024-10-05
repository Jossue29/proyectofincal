<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
    protected $table = 'inventarios';

    protected $fillable = [
        'producto_id',
         'tipo',
         'cantidad',
         'create_at',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
