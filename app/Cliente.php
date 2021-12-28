<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nome','rua','numero','bairro','cidade','cpf','cnpj','telefone','celular','estado','cep'];

    public function ordems()
    {
        return $this->hasMany(Ordem::class);
    }
}
