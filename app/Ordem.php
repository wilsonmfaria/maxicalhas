<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordem extends Model
{
    protected $fillable = ["cliente_nome", "cliente_id", "funcionario_nome", "valor_final", "total_pago", "total_devido", "paga", "concluida"];
}
