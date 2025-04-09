<?php

namespace App\Http\Controllers;

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

        return view('companies.index', [
            'companies'     => $companies,
            'statuses_arr'  => Company::$STATUSES_ARR,
            'types_arr'     => Company::$TYPES_ARR,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create', [
            'statuses_arr'  => Company::$STATUSES_ARR,
            'types_arr'     => Company::$TYPES_ARR,
        ]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::findOrFail($id);

        return view('companies.edit', [
            'company'       => $company,
            'statuses_arr'  => Company::$STATUSES_ARR,
            'types_arr'     => Company::$TYPES_ARR,
        ]);
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
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);

        if ($company) {
            $company->delete();

            return redirect()
                ->route('companies.index')
                ->with('success', 'Company was deleted successfully.');
        }

        return redirect()
            ->route('companies.index')
            ->with('error', 'Company not found.');
    }
}
