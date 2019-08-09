<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
  protected $fillable = ['id', 'user_id', 'especiality'];

  public function consultations(){
    return $this->hasMany('App\Consultation');
  }

  public function user(){
    return $this->belongsTo('App\User');
  }
}
