<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Carbon\Carbon;

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

    private function addLines($text)
    {
        $separators = "\r\n";
        $text = strtok($text, $separators);
        $line = strtok($separators);

        while ($line) {
            $text .= "<br>" . $line;
            $line = strtok($separators);
        }

        $separators = "[]";
        $text = strtok($text, $separators);
        $line = strtok($separators);
        $openTag = true;

        while ($line) {
            if ($openTag) {
                $text .= "<span class=\"fw-bold\">" . $line;
            }
            else {
                $text .= "</span>" . $line;
            }
            $openTag = !$openTag;
            $line = strtok($separators);
        }
        return $text;
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

        $currentDate = Carbon::now();
        $currentDate = $currentDate->toDateString();

        return view('home')
                    ->with('companiesWithContract', $companiesWith)
                    ->with('companiesWithoutContract', $companiesWithout)
                    ->with('currentDate', $currentDate);
    }

    public function showDetails($id)
    {
        $company = self::getCompanyById($id);
        return view('company-details')
                    ->with('company', $company)
                    ->with('details', self::addLines($company->details));
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
