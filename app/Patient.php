<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
  protected $fillable = ['id', 'user_id', 'birthdate', 'weight', 'height'];

  public function consultations(){
    return $this->hasMany('App\Consultation');
  }

  public function user(){
    return $this->belongsTo('App\User');
  }

  public function consultations(){
    return $this->hasMany('App\Consultation');
  }
}
