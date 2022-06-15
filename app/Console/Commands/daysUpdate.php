<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Report;

class daysUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'day:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $days = DB::table('days')->max('days');
        $days_id = DB::table('days')->where('days','=',$days)->first();
        $reports =  DB::table('reports')->where('day_id','=',$days_id->id)->get();
        $participants = DB::table('participants')->get();
        $now = (int)round(microtime(true) * 1000);
        $run_tahajjud = collect([]);
        $run_dhuha = collect([]);
        foreach($reports as $report){
            if(date('l',($now/1000)) == date('l',($report->create/1000)) && $report->type == "tahajjud"){
                $run_tahajjud->push($report->participant_id);
            }
            if(date('l',($now/1000)) == date('l',($report->create/1000)) && $report->type == "dhuha"){
                $run_dhuha->push($report->participant_id);
            }
        }
        foreach($participants as $participant){
            if ($run_tahajjud->contains($participant->id) == false) {
                $new = new Report;
                $new->participant_id = $participant->id;
                $new->status = "x";
                $new->type = "tahajjud";
                $new->create = $now;
                $new->day_id = $days_id->id;
                $new->save();
            }
            if ($run_dhuha->contains($participant->id) == false) {
                $new = new Report;
                $new->participant_id = $participant->id;
                $new->status = "x";
                $new->type = "dhuha";
                $new->create = $now;
                $new->day_id = $days_id->id;
                $new->save();
            }
        }
    }
}
