<?php

namespace App\Http\Modules\Detalle\Model;

use App\Http\Modules\Factura\Model\Factura;
use App\Http\Modules\Producto\Model\Producto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Detalle extends Model
{
    use HasFactory;

    protected $fillable = [
        'producto_id',
        'factura_id',
        'cantidad',
        'precio'
    ];

    protected $appends = ['NombreProducto'];

    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class);
    }

    public function factura(): BelongsTo
    {
        return $this->belongsTo(Factura::class);
    }

    public function getNombreProductoAttribute()
    {
        return $this->producto->nombre;
    }


}
