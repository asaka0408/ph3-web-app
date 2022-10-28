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
                'created_at' => '2022-10-01', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-02 14:04:34', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-03', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-04', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-05', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-06', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-07', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-10',
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-10', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-11', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-12', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-13', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-14', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-15', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-16', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-17', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-18', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-19', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-20', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-21', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-22', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-23', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-24', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-25', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-26', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-27', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-28', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-29', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-30', // 追加
                'updated_at' => Carbon::now(),
            ],
            [
                'time' => 3,
                'comment' => 'まあまあ',
                'created_at' => '2022-10-31', // 追加
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
