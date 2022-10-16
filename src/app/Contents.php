<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contents extends Model
{
    public static $rules = array(
        'name' => 'required',
    );
}
