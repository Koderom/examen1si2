<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpedienteJudicial extends Model
{
    use HasFactory;

    public function procesoJudicial(){
        return $this->belongsTo(ProcesoJudicial::class);
    }
    public function archivo(){
        return $this->hasMany(Archivo::class);
    }
}
