<?php

namespace App\Http\Controllers;
use App\Exports\BooksExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Illuminate\Http\Request;
use App\Models\Livre;


class BookController extends Controller
{
  

public function exportExcel()
{
    return Excel::download(new BooksExport, 'libre.xlsx');
}

public function exportPdf()
{
    $books = Livre::all();
    $pdf = PDF::loadView('livre.pdf', compact('books'));
    return $pdf->download('livre.pdf');
}

}
