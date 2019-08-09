<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
  protected $fillable = ['id', 'url', 'date', 'consultation_id'];

  public function consultation(){
    return $this->belongsTo('App\Consultation');
  }
}
