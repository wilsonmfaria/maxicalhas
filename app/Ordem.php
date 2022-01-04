<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordem extends Model
{
    protected $fillable = ["cliente_nome", "cliente_id", "funcionario_nome", "local_obra", "valor_desconto", "valor_bruto", "valor_final", "total_pago", "total_devido", "paga", "concluida"];
}
