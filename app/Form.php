<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
  protected $fillable = [
    'id', 'type', 'consultation_id'
  ];

  public function consultation(){
    return $this->belongsTo('App\Consultation');
  }
}
