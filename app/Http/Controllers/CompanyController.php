<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'vat'       => 'required|string|max:20',
            'type'      => 'required|integer',
            'address'   => 'required|string',
            'phone'     => 'nullable|string|max:20',
            'email'     => 'nullable|email|max:255',
        ]);

        $company = Company::create([
            'name'      => $request->input('name'),
            'vat'       => $request->input('vat'),
            'type'      => $request->input('type'),
            'status'    => 1,
            'address'   => $request->input('address'),
            'phone'     => $request->input('phone'),
            'email'     => $request->input('email'),
        ]);

        return redirect()
                ->route('companies.index')
                ->with('success', 'Companie creata cu succes!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
                    ->with('success', 'Compania a fost stearsa cu succes.');
        }

        return redirect()
                ->route('companies.index')
                ->with('error', 'Compania nu a fost gasita.');
    }
}
