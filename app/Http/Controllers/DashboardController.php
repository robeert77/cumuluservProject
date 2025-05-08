<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Intervention;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $interventionCountForUser = Intervention::where('user_id', auth()->id())
            ->count();

        $interventions = Intervention::where('user_id', auth()->id())
            ->whereMonth('date', Carbon::now()->month - 1)
            ->whereYear('date', Carbon::now()->year)
            ->get(['start_time', 'end_time']);

        $totalSeconds = 0;

        foreach ($interventions as $intervention) {
            $start = Carbon::parse($intervention->start_time);
            $end = Carbon::parse($intervention->end_time);
            $totalSeconds += $start->diffInSeconds($end);
        }

        $totalDuration = CarbonInterval::seconds($totalSeconds)->cascade();
        $totalDurationArr = [
            'h' => $totalDuration->hours,
            'm' => $totalDuration->minutes
        ];

        $newCompanies = Company::select('id', 'name', 'created_at')
            ->whereYear('created_at', Carbon::now()->year)
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        $companiesWithMostInterventions = Intervention::select('company_id',
                DB::raw('COUNT(id) AS nr_interventions'),
                DB::raw('SUM(TIMESTAMPDIFF(MINUTE, end_time, start_time)) AS total_duration'))
            ->groupBy('company_id')
            ->orderByDesc('nr_interventions')
            ->orderByDesc('total_duration')
            ->limit(5)
            ->get()
            ->map(function ($intervention) {
                $hours = floor($intervention->total_duration / 60);
                $minutes = floor($intervention->total_duration % 60);

                return [
                    'id'                  => $intervention->company->id,
                    'company_name'        => $intervention->company->name,
                    'total_interventions' => $intervention->nr_interventions,
                    'total_duration'      => [
                        'h' => $hours,
                        'm' => $minutes,
                        't' => $intervention->total_duration,
                    ],
                ];
            });

        return view('dashboard.index',
            compact('interventionCountForUser', 'totalDurationArr', 'newCompanies', 'companiesWithMostInterventions'));
    }
}
