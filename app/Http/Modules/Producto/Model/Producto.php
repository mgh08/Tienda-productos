<?php

namespace App\Http\Modules\Producto\Model;

use App\Http\Modules\Categoria\Model\Categoria;
use App\Http\Modules\Detalle\Model\Detalle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'stock',
        'categoria_id'
    ];

    protected $appends = ['NombreCategoria'];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function detalle(): HasMany
    {
        return $this->hasMany(Detalle::class);
    }

    public function getNombreCategoriaAttribute()
    {
        return $this->categoria->nombre;
    }
}
