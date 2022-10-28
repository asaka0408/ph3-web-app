<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Base;
use App\Languages;

class WebappController extends Controller
{
    public function index() {
        $bases = new Base;
        $day_times = $bases->getBarTime();
        $study_day_time = $bases->getDayTime();
        $study_month_time = $bases->getMonthTime();
        $study_total_time = $bases->getAllTime();
        $content_time = $bases->getContentsTime();
        $languages_time = $bases->getLanguagesTime();
       
        // dd($content_time);
        return view('user.webapp', compact('day_times', 'study_day_time', 'study_month_time', 'study_total_time', 'content_time', 'languages_time'));
    }
}
