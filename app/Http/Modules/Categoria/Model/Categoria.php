<?php

namespace App\Http\Modules\Categoria\Model;

use App\Http\Modules\Producto\Model\Producto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    public function producto(): HasMany
    {
        return $this->hasMany(Producto::class);
    }
}
