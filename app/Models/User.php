<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\Audit;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Uuids, Audit;

    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = 'data_alteracao';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'login',
        'senha',
        'saldo_atual',
        'administrador_id',
    ];

    protected $appends = ['funcionarios'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'senha',
        'administrador_id',
        'funcionarios',
        'roles',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'login_verified_at' => 'datetime',
    ];

    public function getFuncionariosAttribute()
    {
      return DB::table('users')
      ->select('users.uuid', 'users.nome', 'users.login', 'users.saldo_atual')
      ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
      ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
      ->where('roles.name', 'funcionario')->get();
    }
}
