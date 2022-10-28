<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Base;

class WebappController extends Controller
{
    public function index() {
        $this->bases = new Base();
        $day_times = $this->bases->getBarTime();
        // dd($day_times[0]->day_time);
        $study_day_time = $this->bases->getDayTime();
        $study_month_time = $this->bases->getMonthTime();
        $study_total_time = $this->bases->getAllTime();
        return view('user.webapp', compact('day_times', 'study_day_time', 'study_month_time', 'study_total_time'));
    }
}
