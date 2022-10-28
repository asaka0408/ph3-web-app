<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class Base extends Model
{
    public function contents()
    {
        return $this->hasMany("App\Contents");
    }

    public function languages()
    {
        return $this->hasMany("App\Languages");
    }

    public function getBarTime()
    {
        $today = Carbon::now()->format('Ym');
        $start = $today . '01';
        $end = $today . '31';

        return DB::table('bases')
            ->selectRaw('DATE_FORMAT(created_at, "%Y%m%d") AS date')
            ->selectRaw('SUM(time) AS day_time')
            ->groupBy('date')
            ->where('created_at', '>', $start)
            ->where('created_at', '<', $end)
            ->get();
    }

    public function getDayTime()
    {
        $today = Carbon::now()->format('Ymd');
        return DB::table('bases')
            ->selectRaw('DATE_FORMAT(created_at, "%Y%m%d") AS date')
            ->selectRaw('SUM(time) AS day_time')
            ->groupBy('date')
            ->where('created_at', '=', $today)
            ->get();
    }

    public function getMonthTime()
    {
        return DB::table('bases')
            ->selectRaw('DATE_FORMAT(created_at, "%Y%m") AS date')
            ->selectRaw('SUM(time) AS day_time')
            ->groupBy('date')
            ->get();
    }

    public function getAllTime()
    {
        return DB::table('bases')
            ->selectRaw('SUM(time) AS total_time')
            ->get();
    }
}
