<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $fillable = ['nombre'];
    
    public function actividads()
    {
        return $this->hasMany(Actividad::class);
    }
}
