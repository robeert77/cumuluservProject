<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Intervention;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InterventionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Company $company)
    {
        $interventions = $company->interventions()
            ->filters($request->all())
            ->orderBy('date', 'desc')
            ->paginate(10);

        $users_arr = User::pluck('name', 'id');

        return view('companies.interventions.index',
            compact('company', 'interventions', 'users_arr'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Company $company)
    {
        $usersArr = User::pluck('name', 'id');

        return view('companies.interventions.create',
            compact('company', 'usersArr'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Company $company)
    {
        $validated = $request->validate((new Intervention())->validationRules());

        $company->interventions()->create($validated);

        return redirect()
            ->route('companies.interventions.index', $company)
            ->with('success', __('interventions.success_created'));
    }

    public function byDate(Request $request, Company $company)
    {
        $date = Carbon::parse($request->get('date'));

        $interventionDays = Intervention::getInterventionDaysByMonthAndYear($date, $company);

        $interventions = $company->interventions()
            ->whereDate('date', $date)
            ->paginate(10);

        $usersArr = User::pluck('name', 'id');

        return view('companies.interventions.show_by_date',
            compact('company', 'interventions', 'interventionDays', 'date', 'usersArr'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company, Intervention $intervention)
    {
        $date = Carbon::parse($intervention->date);

        $interventionDays = Intervention::getInterventionDaysByMonthAndYear($date, $company);

        $usersArr = User::pluck('name', 'id');

        return view('companies.interventions.show',
            compact('intervention', 'interventionDays', 'date', 'usersArr'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company, Intervention $intervention)
    {
        $usersArr = User::pluck('name', 'id');

        return view('companies.interventions.edit',
            compact('company', 'intervention', 'usersArr'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company, Intervention $intervention)
    {
        $validated = $request->validate((new Intervention())->validationRules());

        $intervention->update($validated);

        return redirect()
            ->route('companies.interventions.index', $company)
            ->with('success', __('interventions.success_updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company, Intervention $intervention, Request $request)
    {
        $intervention->delete();

        return redirect($request->input('redirect_url', route('companies.interventions.index', $company)))
            ->with('success', __('interventions.success_deleted'));
    }
}
