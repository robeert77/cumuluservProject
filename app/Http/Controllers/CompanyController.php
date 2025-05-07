<?php

namespace App\Http\Controllers;

use App\Models\Intervention;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $companies = Company::filters($request->all())->paginate(10);

        $statusesArr = Company::$STATUSES_ARR;
        $typesArr = Company::$TYPES_ARR;

        return view('companies.index',
            compact('companies', 'statusesArr', 'typesArr'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statusesArr = Company::$STATUSES_ARR;
        $typesArr = Company::$TYPES_ARR;

        return view('companies.create',
            compact('statusesArr', 'typesArr'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate((new Company)->validationRules());

        Company::create($validated);

        return redirect()
            ->route('companies.index')
            ->with('success', 'Company created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Company $company)
    {
        $date = Carbon::parse($request->get('date'));

        $interventionDays = Intervention::getInterventionDaysByMonthAndYear($date, $company);

        $statusesArr = Company::$STATUSES_ARR;
        $typesArr = Company::$TYPES_ARR;

        return view('companies.show', [
            'company'           => $company,
            'statuses_arr'      => $statusesArr,
            'types_arr'         => $typesArr,
            'interventionDays'  => $interventionDays,
            'date'              => $date->toDateString(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        $statusesArr = Company::$STATUSES_ARR;
        $typesArr = Company::$TYPES_ARR;

        return view('companies.edit',
            compact('company', 'statusesArr', 'typesArr'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $validated = $request->validate($company->validationRules());

        $company->update($validated);

        return redirect()
            ->route('companies.index')
            ->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()
            ->route('companies.index')
            ->with('success', 'Company was deleted successfully.');
    }
}
