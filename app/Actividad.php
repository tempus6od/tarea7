<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $fillable = ['asignatura_id', 'tipo', 'calificacion', 'fecha', 'comentarios']

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }
}
