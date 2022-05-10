<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;


    protected $table = 'clientes';

    protected $fillable = [

        'dni',
        'nombre',
    ];

    public function cuentas(){

        return $this->belongsToMany(Cuenta::class);
    }


}
