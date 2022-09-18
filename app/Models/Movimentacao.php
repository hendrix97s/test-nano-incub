<?php

namespace App\Models;

use App\Traits\Audit;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    use HasFactory, Uuids, Audit;

    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = null;

    protected $table = 'movimentacoes';

    protected $fillable = [
      'administrador_id',
      'funcionario_id',
      'tipo_movimentacao',
      'valor',
      'observacao',
    ];

    protected $hidden = [
      'id',
      'administrador_id',
      'funcionario_id',
    ];
}
