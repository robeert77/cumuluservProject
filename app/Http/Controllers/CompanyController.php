<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    function add(Request $request)
    {
        $company = new Company;
        $company->name = $request->input('client');
        $company->phone_number = $request->input('phoneNumber');
        $company->with_contract = ($request->contract === 'true');
        $company->save();
        return redirect(route('home'));
    }

    function createClient()
    {
        return view('new-company');
    }

    function companiesList() {
        $companiesWith = Company::where('with_contract', 'true')
                                ->orderBy('name')
                                ->get();
        $companiesWithout = Company::where('with_contract', 'false')
                                ->orderBy('name')
                                ->get();

        return view('home')
                    ->with('companiesWithContract', $companiesWith)
                    ->with('companiesWithoutContract', $companiesWithout);
    }

    function showDetails($id)
    {
        $details = Company::where('id', $id)
                            ->get();
        return view('company-details')
                    ->with('company', $details->first());
    }

    function editCompany($id) {
        $details = Company::where('id', $id)
                            ->get();
        return view('edit-company')
                    ->with('company', $details->first());
    }

    function updateCompany(Request $request, $id)
    {
        $company = Company::find($id);
        $company->name = $request->input('client');
        $company->phone_number = $request->input('phoneNumber');
        $company->with_contract = ($request->contract === 'true');
        $company->details = $request->details;
        $company->save();
        return redirect(route('detailsCompany', $id));
    }
}
