<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function fetDateTime()
    {
        return DB::table('bases')
                ->selectRaw('DATE_FORMAT(created_at, "%Y%m%d") AS date')
                ->selectRaw('SUM(time) AS day_time')
                ->groupBy('date')
                ->get();
    }
}
