<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doenca extends Model
{
    protected $fillable = [
        'nome_doenca',
        'grau_doenca',
    ];

    public function clientes(){
        return $this->belongsToMany(Cliente::class, 'cliente_doenca', 'doenca_id', 'cliente_id')
        ->withPivot('grau_doenca')
        ->withTimestamps();
    }

}
