<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Base;
use App\Languages;
use App\Contents;

class WebappController extends Controller
{
    public function index(Request $request) {
        return view('user.webapp');
    }
}
