<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne(User::class);
    }
    public function juez(){
        return $this->hasOne(Juez::class);
    }
    public function abogado(){
        return $this->hasOne(Abogado::class);
    }
    public function demandanteProceso(){
        return $this->hasMany(DemandanteProceso::class);
    }
    public function demandadoProceso(){
        return $this->hasMany(DemandadoProceso::class);
    }
}
