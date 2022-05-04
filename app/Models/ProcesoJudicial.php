<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcesoJudicial extends Model
{
    use HasFactory;

    public function juez(){
        return $this->belongsTo(Juez::class);
    }
    public function juzgado(){
        return $this->belongsTo(Juzgado::class);
    }
    public function demandadoProceso(){
        return $this->hasMany(DemandadoProceso::class);
    }
    public function demandanteProceso(){
        return $this->hasMany(DemandanteProceso::class);
    }
    public function expedienteJudicial(){
        return $this->hasOne(ExpedienteJudicial::class);
    }
}
