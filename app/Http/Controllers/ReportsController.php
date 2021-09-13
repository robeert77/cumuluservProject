<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Intervention;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function monthlyReport($id, $reportDate)
    {
        $beginningDate = new Carbon($reportDate);
        $beginningDate->day = 1;
        $endDate = new Carbon($beginningDate);
        $endDate->addMonth();

        $client = Company::find($id);
        $totalTime = DB::select("SELECT SUM(end_at - start_at) AS time FROM interventions WHERE company_id = ? AND day >= to_date(?, 'YYYY-MM-DD') AND day < to_date(?, 'YYYY-MM-DD')", [$id, $beginningDate, $endDate]);
        $numberInterventions = DB::select("SELECT COUNT(*) AS number FROM interventions WHERE company_id = ? AND day >= to_date(?, 'YYYY-MM-DD') AND day < to_date(?, 'YYYY-MM-DD')", [$id, $beginningDate, $endDate]);

        return view('monthly-reports')
                ->with('client', $client->name)
                ->with('totalTime', $totalTime[0]->time)
                ->with('numberInterventions', $numberInterventions[0]->number);
    }

    public function interventionReport($id, $reportDate)
    {
        $client = Company::find($id);
        $intervention = DB::select("SELECT * FROM interventions WHERE day = ?", [$reportDate]);

        return view('intervention-report')
                ->with('client', $client->name)
                ->with('reportDate', $reportDate)
                ->with('intervention', $intervention);
    }
}
