<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Priority;
use phpDocumentor\Reflection\PseudoTypes\True_;

class DataController extends Controller
{
    //
    public function index()
    {
        $data = Project::all();
        $count = $data->count();
        $onTrack = Project::where('onTrack', '=', 'On Track')->count();
        $delay = Project::where('onTrack', '=', 'Delay')->count();
        $live = Project::where('perkiraanLive','=','Live')->count();
        
        //Prioritas
        $prioritas_1 = Project::where('prioritas', 'LIKE', '1 - Report Internal')->count();
        $prioritas_2 = Project::where('prioritas', 'LIKE', '2 - Proses Flow Enhancement / Office Automation')->count();
        $prioritas_3 = Project::where('prioritas', 'LIKE', '3 - Market Demand / Bisnis Impact / Skala Bisnis - Innovation')->count();
        $prioritas_4 = Project::where('prioritas', 'LIKE', '4 - Market Demand / Bisnis Impact / Skala Bisnis - Existing')->count();
        $prioritas_5 = Project::where('prioritas', 'LIKE', '5 - Audit / SAI / Carry over Project')->count();
        $prioritas_6 = Project::where('prioritas', 'LIKE', '6 - Regulatory / Mandatory / Compliance')->count();
        
        $perkiraanLive = DB::table('projects')->select('perkiraanLive')->distinct()->pluck('perkiraanLive');
        $totalProTBC = DB::table('projects')
                            ->select(DB::raw('COUNT(nama) as name'))
                            ->where('perkiraanLive', '=', 'TBC', 'OR')
                            ->orWhere('perkiraanLive', '=', '', 'OR')
                            ->pluck('name');
        $totalPro = DB::table('projects')
                            ->select(DB::raw('COUNT(nama) as name'))
                            ->groupBy('perkiraanLive')
                            ->pluck('name');
        $nameTotalPro = DB::table('projects')
                            ->select(DB::raw('perkiraanLive'))
                            ->groupBy('perkiraanLive')
                            ->pluck('perkiraanLive');
        $totalOnTrack = DB::table('projects')
                            ->select(DB::raw('COUNT(nama) as name'))
                            ->where('onTrack', '=', 'On Track')
                            ->groupBy('perkiraanLive')
                            ->pluck('name');
        $nameOnTrack = DB::table('projects')
                            ->select(DB::raw('perkiraanLive'))
                            ->where('onTrack', '=', 'On Track')
                            ->groupBy('perkiraanLive')
                            ->pluck('perkiraanLive');
        $totalDelay = DB::table('projects')
                            ->select(DB::raw('COUNT(nama) as name'))
                            ->where('onTrack', '=', 'Delay')
                            ->groupBy('perkiraanLive')
                            ->pluck('name');
        $nameDelay = DB::table('projects')
                            ->select(DB::raw('perkiraanLive'))
                            ->where('onTrack', '=', 'Delay')
                            ->groupBy('perkiraanLive')
                            ->pluck('perkiraanLive');
        $totalLiveOnTrack = DB::table('projects')
                            ->select(DB::raw('COUNT(nama) as name'))
                            ->where('onTrack', '=', 'On Track')
                            ->where('perkiraanLive', '=', 'Live')
                            ->pluck('name');
        $totalLiveDelay = DB::table('projects')
                            ->select(DB::raw('COUNT(nama) as name'))
                            ->where('onTrack', '=', 'Delay')
                            ->where('perkiraanLive', '=', 'Live')
                            ->pluck('name');

        //Progress Status
        $progress_1 = Project::where('progressStatus', 'LIKE', '1. Create Requirement')->count();
        $progress_2 = Project::where('progressStatus', 'LIKE', '2. Submit Requirement')->count();
        $progress_3 = Project::where('progressStatus', 'LIKE', '3. Confirm Requirement')->count();
        $progress_4 = Project::where('progressStatus', 'LIKE', '4. Development')->count();
        $progress_5 = Project::where('progressStatus', 'LIKE', '5. SIT')->count();
        $progress_6 = Project::where('progressStatus', 'LIKE', '6. UAT')->count();
        $progress_7 = Project::where('progressStatus', 'LIKE', '7. Pre-production')->count();
        $progress_8 = Project::where('progressStatus', 'LIKE', '8. Production')->count();
        $progress_9 = Project::where('progressStatus', 'LIKE', '9. PIR')->count();
        $progress_10 = Project::where('progressStatus', 'LIKE', '10. Live')->count();
        $others = Project::where([
            ['progressStatus', 'NOT LIKE', '1. Create Requirement'],
            ['progressStatus', 'NOT LIKE', '2. Submit Requirement'],
            ['progressStatus', 'NOT LIKE', '3. Confirm Requirement'],
            ['progressStatus', 'NOT LIKE', '4. Development'],
            ['progressStatus', 'NOT LIKE', '5. SIT'],
            ['progressStatus', 'NOT LIKE', '6. UAT'],
            ['progressStatus', 'NOT LIKE', '7. Pre-production'],
            ['progressStatus', 'NOT LIKE', '8. Production'],
            ['progressStatus', 'NOT LIKE', '9. PIR'],
            ['progressStatus', 'NOT LIKE', '10. Live'],
        ])->count();
       
        return view('dashboard', [
            'data'=>$data,
            'count' =>$count,
            'onTrack' => $onTrack,
            'delay'=>$delay,
            'live'=>$live,
            'prioritas_1'=>$prioritas_1,
            'prioritas_2'=>$prioritas_2,
            'prioritas_3'=>$prioritas_3,
            'prioritas_4'=>$prioritas_4,
            'prioritas_5'=>$prioritas_5,
            'prioritas_6'=>$prioritas_6,
            'ps1'=>$progress_1,
            'ps2'=>$progress_2,
            'ps3'=>$progress_3,
            'ps4'=>$progress_4,
            'ps5'=>$progress_5,
            'ps6'=>$progress_6,
            'ps7'=>$progress_7,
            'ps8'=>$progress_8,
            'ps9'=>$progress_9,
            'ps10'=>$progress_10,
            'others'=>$others,
            'perkiraanLive'=>$perkiraanLive,
            'totalProTBC'=>$totalProTBC,
            'totalPro'=>$totalPro,
            'nameTotalPro'=>$nameTotalPro,
            'totalOnTrack'=>$totalOnTrack,
            'nameOnTrack'=>$nameOnTrack,
            'totalDelay'=>$totalDelay,
            'nameDelay'=>$nameDelay,
            'totalLiveDelay'=>$totalLiveDelay,
            'totalLiveOnTrack'=>$totalLiveOnTrack
    ]);
    }
}
