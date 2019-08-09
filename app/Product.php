<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = ['name', 'description'];
  
  public function consultations(){
    return $this->hasMany('App\Consultation');
  }
}
