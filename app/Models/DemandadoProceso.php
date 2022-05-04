<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandadoProceso extends Model
{
    use HasFactory;
    public function persona(){
        return $this->belongsTo(Persona::class);
    }
    public function abogado(){
        return $this->belongsTo(Abogado::class);
    }
    public function procesoJudicial(){
        return $this->belongsTo(ProcesoJudicial::class);
    }
}
