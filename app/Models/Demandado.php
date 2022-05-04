<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demandado extends Model
{
    use HasFactory;
    
    public function persona(){
        return $this->belongsTo(Persona::class);
    }
    public function demandadoProceso(){
        return $this->hasMany(DemandadoProceso::class);
    }
}
