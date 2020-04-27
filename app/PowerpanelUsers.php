<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class PowerpanelUsers extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'fkRoleId', 'fkCateId', 'is_active', 'varName', 'email', 'varPersonalEmail', 'password'
    ];

    public function role()
    {
        return $this->belongsTo('App\Role', 'fkRoleId');
    }

    public function isAdmin()
    {
            if($this->role->name == 'Super Administrator' && $this->is_active == 1)
            {
                return true;
            }
                return false;
    }
    
}
