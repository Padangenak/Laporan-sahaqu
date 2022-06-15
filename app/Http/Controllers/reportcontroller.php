<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Day;

class reportcontroller extends Controller
{
    public function tahajjud(Request $request){
        $validate = $request->validate([
            'reportTahajjud'=>'required'
        ]);
        $days = Day::max('days');
        $count = Day::where('days','=',$days)->first();
        $save = new Report;
        $save->participant_id = $request->reportTahajjud;
        $save->status = "v";
        $save->type = "tahajjud";
        $save->create = $request->milis;
        $save->day_id = $count->id;
        $save->save();

        return back()->with('success', "Anda Sudah Mengerjakan Tahajjud");
    }
    public function dhuha(Request $request){
        $validate = $request->validate([
            'reportDhuha'=>'required'
        ]);
        $days = Day::max('days');
        $count = Day::where('days','=',$days)->first();
        $save = new Report;
        $save->participant_id = $request->reportDhuha;
        $save->status = "v";
        $save->type = "dhuha";
        $save->create = $request->milis;
        $save->day_id = $count->id;
        $save->save();

        return back()->with('success', "Anda Sudah Mengerjakan Dhuha");
    }
}
