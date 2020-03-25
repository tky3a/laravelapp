<?php

use Illuminate\Database\Seeder;
use App\Restdata;

class RestdataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      # ダミーレコード作成
      $params = [
        'message' => 'Google Japan',
        'url' => 'https://www.goog;e.co.jp'
      ];
      $restdata = New Restdata;
      $restdata->fill($params)->save();

      $params = [
        'message' => 'Yahoo Japan',
        'url' => 'https://www.yahoo.co.jp',
      ];
      $restdata = New Restdata;
      $restdata->fill($params)->save();

      $params = [
        'message' => 'MNS Japan',
        'url' => 'http://www.msn.com/ja-jp',
      ];
      $restdata = New Restdata;
      $restdata->fill($params)->save();
    }
}
