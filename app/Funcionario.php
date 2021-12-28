<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = ['nome','rua','numero','bairro','cidade','cpf','telefone','celular','estado','cep'];
}
