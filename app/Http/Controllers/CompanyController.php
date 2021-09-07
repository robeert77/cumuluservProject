<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    private function insertInDatabase(&$company, $request)
    {
        $company->name = $request->input('client');
        $company->phone_number = $request->input('phoneNumber');
        $company->with_contract = ($request->contract === 'true');
        $company->save();
    }

    private function getCompanyById($id)
    {
        return Company::where('id', $id)->get()->first();
    }

    public function add(Request $request)
    {
        $company = new Company;
        self::insertInDatabase($company, $request);
        return redirect(route('home'));
    }

    public function companiesList() {
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

    public function showDetails($id)
    {
        return view('company-details')
                    ->with('company', self::getCompanyById($id));
    }

    public function editCompany($id) {
        return view('edit-company')
                    ->with('company', self::getCompanyById($id));
    }

    public function updateCompany(Request $request, $id)
    {
        $company = Company::find($id);
        $company->details = $request->details;
        self::insertInDatabase($company, $request);
        return redirect(route('detailsCompany', $id));
    }
}
