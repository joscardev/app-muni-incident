<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoriaIncidencia extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];
}
