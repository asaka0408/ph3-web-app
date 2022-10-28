<?php

namespace App;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    public function baseLanguage() {
        return $this->belongsTo("App\Base");
    }
}
