<?php

namespace App\Http\Controllers;

use App\Models\OutcomingLetter;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class PdfController
{

    public function outcomingLetter(OutcomingLetter $outcomingLetter)
    {
        setlocale(LC_ALL, 'IND');
        
        return Pdf::loadView('pdf.outcoming-letter', ['letter' => $outcomingLetter])->stream();
    }
}
