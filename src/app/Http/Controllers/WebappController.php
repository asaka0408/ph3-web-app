<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebappController extends Controller
{
    public function index(Request $request) {
        $bases = Base::get();
    }
}
