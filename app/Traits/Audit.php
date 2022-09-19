<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Contracts\Role;

trait Audit
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function bootAudit()
    {
      static::creating(function ($model) {
        self::auditUser($model);
      });
    }

    private static function auditUser(&$model)
    {
      if(Auth::check() and Auth::user()->hasRole('administrador')) {
        $model->administrador_id = Auth::user()->id;
      }
    }
}