<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model {
  protected $fillable = [
    'id', 'doctor_id', 'patient_id', 'reviser_id', 'product_id', 'condition', 'date'
  ];

  public function product(){
    return $this->belongsTo('App\Product');
  }

  public function form(){
    return $this->hasOne('App\Form');
  }

  public function attachments(){
    return $this->hasMany('App\Attachment');
  }
  
  public function doctor(){
    return $this->belongsTo('App\Doctor');
  }

  public function patient(){
    return $this->belongsTo('App\Patient');
  }

  public function reviser(){
    return $this->belongsTo('App\Reviser');
  }
}
