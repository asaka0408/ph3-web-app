<?php
namespace App;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Contents extends Model
{
    public function baseContents() {
        return $this->belongsTo("App\Base");
    }
}
