<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juzgado extends Model
{
    use HasFactory;
    public function juez(){
        return $this->hasMany(Juez::class);
    }
    public function procesoJudicial(){
        return $this->hasMany(ProcesoJudicial::class);
    }
}
