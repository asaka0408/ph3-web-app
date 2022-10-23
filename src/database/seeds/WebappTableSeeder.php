<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Provider\DateTime;


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
                'created_at' => DateTime::dateTimeThisDecade(), // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => DateTime::dateTimeThisDecade(), // 追加
                'updated_at' => Carbon::now(),
            ],
        ];
        foreach ($params as $param) {
            DB::table('bases')->insert($param);
        }

        $params = [
            [
                'base_id' => 1,
                'content_name' => 1,
                'content_learning_time' => 2,
                'created_at' => DateTime::dateTimeThisDecade(), // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'base_id' => 1,
                'content_name' => 2,
                'content_learning_time' => 2,
                'created_at' => DateTime::dateTimeThisDecade(), // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'base_id' => 2,
                'content_name' => 2,
                'content_learning_time' => 3,
                'created_at' => DateTime::dateTimeThisDecade(), // 追加
                'updated_at' => Carbon::now(),
            ],
        ];
        foreach ($params as $param) {
            DB::table('contents')->insert($param);
        }

        $params = [
            [
                'base_id' => 1,
                'language_name' => 2,
                'language_learning_time' => 2,
                'created_at' => DateTime::dateTimeThisDecade(), // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'base_id' => 2,
                'language_name' => 2,
                'language_learning_time' => 1,
                'created_at' => DateTime::dateTimeThisDecade(), // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'base_id' => 2,
                'language_name' => 3,
                'language_learning_time' => 2,
                'created_at' => DateTime::dateTimeThisDecade(), // 追加
                'updated_at' => Carbon::now(),
            ],
        ];
        foreach ($params as $param) {
            DB::table('languages')->insert($param);
        }
    }
}
