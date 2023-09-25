<?php

namespace App\Http\Modules\Factura\Model;

use App\Http\Modules\Cliente\Model\Cliente;
use App\Http\Modules\Detalle\Model\Detalle;
use App\Http\Modules\ModoPago\Model\ModoPago;
use App\Http\Modules\Producto\Model\Producto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'cliente_id',
        'modo_pago_id'
    ];

    public function productos(): BelongsToMany
    {
        return $this->belongsToMany(Producto::class, 'factura_producto')->withPivot('cantidad', 'precio');
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function modoPago(): BelongsTo
    {
        return $this->belongsTo(ModoPago::class);
    }

}
