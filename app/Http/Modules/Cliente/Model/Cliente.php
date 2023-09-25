<?php

namespace App\Http\Modules\Cliente\Model;

use App\Http\Modules\Factura\Model\Factura;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'direccion',
        'fecha_nacimiento',
        'telefono',
        'email'
    ];

    public function factura(): HasMany
    {
        return $this->hasMany(Factura::class);
    }
}
