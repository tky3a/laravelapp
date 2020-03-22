<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
  // リレーション
  public function person()
  {
    return $this->belongsTo('App\Person');
  }

  // バリデーション 
  protected $guarded = array('id');

  public static $rules = array(
    'person_id' => 'required',
    'title' => 'required',
    'message' => 'required'
  );

  public function getData()
  {
    return $this->id . ':' . $this->title . '(' . $this->person->name . ')';
  }
}
