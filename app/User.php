<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable;

  protected $fillable = ['name', 'email', 'password', 'role'];

  protected $hidden   = ['password', 'remember_token'];

  protected $casts    = ['email_verified_at' => 'datetime'];

  public function doctor(){
    return $this->hasOne('App\Doctor');
  }

  public function patient(){
    return $this->hasOne('App\Patient');
  }

  public function reviser(){
    return $this->hasOne('App\Reviser');
  }
}
