<?php

use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            'name' => 'taro',
            'email' => 'taro@yamada.jp',
            'age' => 12
        ];
        DB::table('people')->insert($params);

        $params = [
            'name' => 'hanako',
            'email' => 'hanako@flower.jp',
            'age' => 35
        ];
        DB::table('people')->insert($params);

        $params = [
            'name' => 'sachiko',
            'email' => 'sachiko@kobayashi.jp',
            'age' => 66
        ];
        DB::table('people')->insert($params);
    }
}
