<?php

namespace App\Http\Modules\Factura\Model;

use App\Http\Modules\Cliente\Model\Cliente;
use App\Http\Modules\Detalle\Model\Detalle;
use App\Http\Modules\ModoPago\Model\ModoPago;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'cliente_id',
        'modo_pago_id'
    ];

    protected $appends = ['NombreCliente','MedioPago'];

    public function detalle(): HasMany
    {
        return $this->hasMany(Detalle::class);
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function modoPago(): BelongsTo
    {
        return $this->belongsTo(ModoPago::class);
    }

    public function getNombreClienteAttribute()
    {
        return $this->cliente->nombre;
    }

    public function getMedioPagoAttribute()
    {
        return $this->modoPago->nombre;
    }
}
