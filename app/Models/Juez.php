<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Juez extends Model
{
    use HasFactory;

    public function persona(){
        return $this->belongsTo(Persona::class);
    }
    public function juzgado(){
        return $this->belongsTo(Juzgado::class);
    }
    public function procesoJudicial(){
        return $this->hasMany(ProcesoJudicial::class);
    }
}
