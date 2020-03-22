<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Scope\ScopePerson;

class Person extends Model
{
  // リレーション
  public function boards()
  {
    return $this->hasMany('App\Board');
  }
  // public function board()
  // {
  //   return $this->hasOne('App\Board');
  // }

  // バリデーション  //
  # 値を用意しておかない項目を$guardedに記載(基本的にはid)
  protected $guarded = array('id');

  # 配列ではないrequest(通常の受け取り)
  public static $rules = array(
    'name' => 'required',
    'email' => 'email',
    'age' => 'integer|min:0|max:150'
  );  

  # requestが配列で送られてくる場合は'配列.要素名'
  // public static $rules = array(
  //   'person.name' => 'required',
  //   'person.email' => 'email',
  //   'person.age' => 'integer|min:0|max:150'
  // );

  // グローバルスコープ定義 //
  protected static function boot()
  {
    parent::boot();
    static::addGlobalScope(New ScopePerson);
  }

  // スコープ定義 //
  public function scopeNameEqual($query, $str)
  {
    return $query->where('name', $str);
  }

  // $min(変数の値)以上のageを検索するスコープ
  public function scopeAgeGreaterThan($query, $min)
  {
    return $query->where('age', '>=', $min);
  }

  // $max(変数の値)以下のageを検索するスコープ
  public function scopeAgeLessThan($query, $max)
  {
    return $query->where('age', '<=', $max);
  }

  // メソッド定義 //
  public function getData()
  {
    return $this->id . ':' . $this->name . '(' . $this->age . ')';
  }
}
