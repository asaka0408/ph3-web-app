<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebappTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [
                'time' => 4,
                'comment' => 'いい感じ',
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
            ],
        ];
        foreach ($params as $param) {
            DB::table('bases')->insert($param);
        }

        $params = [
            [
                'base_id' => 1,
                'content_name' => 1,
                'content_learning_time' => 2
            ],
            [
                'base_id' => 1,
                'content_name' => 2,
                'content_learning_time' => 2
            ],
            [
                'base_id' => 2,
                'content_name' => 2,
                'content_learning_time' => 3
            ],
        ];
        foreach ($params as $param) {
            DB::table('contents')->insert($param);
        }

        $params = [
            [
                'base_id' => 1,
                'language_name' => 2,
                'language_learning_time' => 2
            ],
            [
                'base_id' => 2,
                'language_name' => 2,
                'language_learning_time' => 1
            ],
            [
                'base_id' => 2,
                'language_name' => 3,
                'language_learning_time' => 2
            ],
        ];
        foreach ($params as $param) {
            DB::table('languages')->insert($param);
        }
    }
}
