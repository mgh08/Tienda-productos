<?php

namespace App\Http\Modules\ModoPago\Model;

use App\Http\Modules\Factura\Model\Factura;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ModoPago extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'otros_detalles'
    ];

    public function factura(): HasMany
    {
        return $this->hasMany(Factura::class);
    }

}
