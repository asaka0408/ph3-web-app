<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    public function base() {
        return $this->belongsTo("App\Base");
    }
}
