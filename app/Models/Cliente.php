<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    
    protected $fillable = [
        'nome',
        'sexo',
        'data_nascimento'
    ];

    public function doenca(){
        return $this->hasMany(Doenca::class, 'id_doenca');
    }
}
