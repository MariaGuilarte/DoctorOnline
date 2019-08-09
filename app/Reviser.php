<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviser extends Model
{
  protected $fillable = ['id', 'user_id'];

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