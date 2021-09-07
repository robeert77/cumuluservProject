<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Intervention;

class InterventionController extends Controller
{
    public function showForm($id)
    {
        return view('create-intervention')
                ->with('users', User::all())
                ->with('id', $id);
    }

    private function insertInDatabase(&$intervention, $request, $id)
    {
        $intervention->company_id = $id;
        $intervention->day = $request->input('dateIntervention');
        $intervention->start_at = $request->input('startAt');
        $intervention->end_at = $request->input('endAt');
        $intervention->observations = $request->input('observations');
        $intervention->mabe_by = User::find($request->get('users'))->name;
        $intervention->save();
    }

    public function saveIntervention(Request $request, $id)
    {
        $intervention = new Intervention;
        self::insertInDatabase($intervention, $request, $id);
        return redirect(route('home'));
    }
}
