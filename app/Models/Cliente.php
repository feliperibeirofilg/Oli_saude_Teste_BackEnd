<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome',
        'sexo',
        'data_nascimento'
    ];

    public function doencas(){
        return $this->belongsToMany(Doenca::class, 'cliente_doenca', 'cliente_id', 'doenca_id')
        ->withPivot('grau_doenca')
        ->withTimestamps();
    }
}
