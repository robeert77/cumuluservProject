<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;
use App\Models\Company;

class pdfController extends Controller
{
    public function generate($id)
    {
        $pdf = new FPDI('p');
        $pdf->setSourceFile('C:\Users\Robert\OneDrive\Desktop\Formular.pdf'); // trebe sa ma gandesc unde ar fi cel mai ok sa pun pdf u in proiect
        $pdfTemplate = $pdf->importPage(1);
        $pdf->AddPage();
        $pdf->useTemplate($pdfTemplate);
        $pdf->SetFont('Helvetica');

        $company = Company::find($id);
        $nrDisplacement = $company->nr_next_movement;
        $name = $company->name;
        $company->nr_next_movement++;
        $company->save();

        // Set the number of displacement
        $pdf->SetFontSize('11');
        $pdf->SetXY(2.75, 50.75);
        $pdf->Cell(0, 10, $nrDisplacement, 0, 0, 'C');

        // Set the name of 'Beneficiar' field
        $pdf->SetFontSize('11');
        $pdf->SetXY(43, 68.5);
        $pdf->Cell(147, 10, $name, 0, 0, 'L');

        return response($pdf->Output('I', $name . '_' . $nrDisplacement . '.pdf'))
            ->header('Content-Type', 'application/pdf');
    }
}
