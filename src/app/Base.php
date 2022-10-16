<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    public static $rules = array(
        'name' => 'required',
    );

    public function contents()
    {
        return $this->hasMany("App\Contents");
    }

    public function languages()
    {
        return $this->hasMany("App\Languages");
    }
}
