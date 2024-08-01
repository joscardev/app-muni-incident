<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class incidencia extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo', 'descripcion', 'estado_id', 'prioridad_id', 'categoria_id', 'creado_por', 'asignado_a'
    ];

    public function estado()
    {
        return $this->belongsTo(EstadoIncidencia::class);
    }

    public function prioridad()
    {
        return $this->belongsTo(PrioridadIncidencia::class);
    }

    public function categoria()
    {
        return $this->belongsTo(CategoriaIncidencia::class);
    }

    public function creador()
    {
        return $this->belongsTo(User::class, 'creado_por');
    }

    public function asignado()
    {
        return $this->belongsTo(User::class, 'asignado_a');
    }

    public function comentarios()
    {
        return $this->hasMany(ComentarioIncidencia::class);
    }

    public function reportes()
    {
        return $this->hasMany(ReporteIncidencia::class);
    }
    
}
