<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;

    public function clientes(){
        return $this->belongsToMany(Cliente::class);
    }
    public function moviminetos(){
        return $this->hasMany(Movimiento::class);
    }
    
}
