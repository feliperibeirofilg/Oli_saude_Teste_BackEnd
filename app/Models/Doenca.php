<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doenca extends Model
{
    use Notigiable;

    protected $fillable = [
        'nome_doenca',
        'grau_doenca',
    ];

    public function clientes(){
        return $this->belongsTo(Cliente::class, 'id_doenca');
    }

}
