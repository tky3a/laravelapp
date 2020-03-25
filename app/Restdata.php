<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restdata extends Model
{
  # Restdataモデルを作った場合,デフォルトでマッピングされるテーブルは「restdatas」となる。
  # このルールを変更したい場合に「protected $table」する。今回は「s」が付かない形に変更。
  protected $table = 'restdata';

  # ブラックリストの設定
  # Eloqunet モデルを使って create するときに、何も設定していないと MassAssignmentException というエラーが出ます。
  # 下記のように $guarded 変数に配列を設定した上で protected すれば、「id」以外の要素を、create から渡すことができます。
  protected $guarded = array('id');

  # バリデーション ルール
  public static $rules = array(
    'message' => 'required',
    'url' => 'required'
  );

  # メソッド
  public function getData()
  {
    return $this->id . ':' . $this->message . '(' . $this->url . ')';
  }
}
