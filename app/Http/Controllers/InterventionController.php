<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Intervention;

class InterventionController extends Controller
{
    public function showForm($id)
    {
        return view('create-intervention')
                ->with('users', User::all())
                ->with('id', $id);
    }

    private function insertInDatabase($intervention, $request)
    {
        $intervention->day = $request->input('dateIntervention');
        $intervention->start_at = $request->input('startAt');
        $intervention->end_at = $request->input('endAt');
        $intervention->observations = $request->input('observations');
        $intervention->made_by = User::find($request->get('users'))->name;
        $intervention->save();
    }

    public function saveIntervention(Request $request, $id)
    {
        $intervention = new Intervention;
        $intervention->company_id = $id;
        self::insertInDatabase($intervention, $request, $id);
        return redirect(route('home'));
    }

    public function editIntervention($id)
    {
        $intervention = Intervention::where('id', $id)->get()->first();
        return view('edit-intervention')
                ->with('users', User::all())
                ->with('intervention', $intervention);
    }

    public function updateIntervention(Request $request, $id)
    {
        $intervention = Intervention::where('id', $id)->get()->first();
        self::insertInDatabase($intervention, $request);
        return redirect(route('interventionsReports',  ['id' => $intervention->company_id, 'date' => $intervention->day]));
    }
}
