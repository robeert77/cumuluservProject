<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Intervention;
use App\Models\User;
use Illuminate\Http\Request;

class InterventionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Company $company)
    {
        $interventions = $company->interventions()->filters($request->all())->paginate(10);

        $users_arr = User::pluck('name', 'id');

        return view('companies.interventions.index',
            compact('company', 'interventions', 'users_arr'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Company $company)
    {
        $users_arr = User::pluck('name', 'id');

        return view('companies.interventions.create',
            compact('company', 'users_arr'));
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
            ->with('success', 'Intervention created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company, Intervention $intervention)
    {
        $users_arr = User::pluck('name', 'id');

        return view('companies.interventions.edit',
            compact('company', 'intervention', 'users_arr'));
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
            ->with('success', 'Intervention updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company, Intervention $intervention)
    {
        $intervention->delete();

        return redirect()
            ->route('companies.interventions.index', $company)
            ->with('success', 'Intervention was deleted successfully.');
    }
}
