<?php

namespace App\Http\Modules\Producto\Model;

use App\Http\Modules\Categoria\Model\Categoria;
use App\Http\Modules\Detalle\Model\Detalle;
use App\Http\Modules\Factura\Model\Factura;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'stock',
        'categoria_id'
    ];

    public function facturas(): BelongsToMany
    {
        return $this->belongsToMany(Factura::class, 'factura_producto')->withPivot('cantidad', 'precio');
    }

}
