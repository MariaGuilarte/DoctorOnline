<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public function consultations(){
    return $this->hasMany('App\Consultation');
  }
}
