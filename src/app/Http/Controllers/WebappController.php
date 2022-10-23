<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Base;

class WebappController extends Controller
{
    public function index() {
        $this->bases = new Base();
        $day_times = $this->bases->getDateTime();
        return view('user.webapp', compact('day_times'));
    }
}
