<?php

use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pdf/outcoming-letter/{outcomingLetter}', [PdfController::class, 'outcomingLetter'])->name('pdf.outcoming-letter');
