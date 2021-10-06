<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Intervention;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    private function daysToBeMarked($startDate, $endDate, $id)
    {
        $days = array_fill(0, 32, '');
        $interventions = DB::select("SELECT day FROM interventions WHERE company_id = ? AND day >= to_date(?, 'YYYY-MM-DD') AND day < to_date(?, 'YYYY-MM-DD') ORDER BY day", [$id, $startDate, $endDate]);

        foreach ($interventions as $intervention) {
            $days[intval(substr($intervention->day, -2))] = 'intervntion-mark';
        }

        return $days;
    }

    public function monthlyReport($id, $reportDate)
    {
        $startDate = new Carbon($reportDate);
        $startDate->day = 1;
        $endDate = new Carbon($startDate);
        $endDate->addMonth();

        $client = Company::find($id);
        $totalTime = DB::select("SELECT SUM(end_at - start_at) AS time FROM interventions WHERE company_id = ? AND day >= to_date(?, 'YYYY-MM-DD') AND day < to_date(?, 'YYYY-MM-DD')", [$id, $startDate, $endDate]);
        $interventions = DB::select("SELECT end_at - start_at AS time, day FROM interventions WHERE company_id = ? AND day >= to_date(?, 'YYYY-MM-DD') AND day < to_date(?, 'YYYY-MM-DD') ORDER BY day", [$id, $startDate, $endDate]);
        // dd($interventions);
        return view('monthly-reports')
                ->with('client', $client->name)
                ->with('id', $id)
                ->with('totalTime', $totalTime[0]->time)
                ->with('interventions', $interventions)
                ->with('markedDays', self::daysToBeMarked($startDate, $endDate, $id));
    }

    public function interventionReport($id, $reportDate)
    {
        $startDate = new Carbon($reportDate);
        $startDate->day = 1;
        $endDate = new Carbon($startDate);
        $endDate->addMonth();

        $client = Company::find($id);
        $intervention = DB::select("SELECT * FROM interventions WHERE day = ? AND company_id = ?", [$reportDate, $id]);

        return view('intervention-report')
                ->with('client', $client->name)
                ->with('reportDate', $reportDate)
                ->with('intervention', $intervention)
                ->with('id', $id)
                ->with('markedDays', self::daysToBeMarked($startDate, $endDate, $id));
    }
}
