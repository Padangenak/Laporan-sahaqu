<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Report;
use App\Models\Day;

class participantcontroller extends Controller
{
    public function index(){
        $participants = Participant::get();
        $days = Day::max('days');
        $time = (int)round(microtime(true) * 1000);
        $count = Day::where('days','=',$days)->first();
        $report = Report::where('day_id','=', $count->id)->get();
        return view('welcome',[
            'participants'=>$participants,
            'reports'=>$report,
            'maxdays'=>$count->id,
            'time'=>$time
        ]);

    }
}
