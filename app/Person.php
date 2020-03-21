<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Scope\ScopePerson;

class Person extends Model
{
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
