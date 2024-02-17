<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelImport;

class ExcelController extends Controller
{


    /**
     * @return \Illuminate\Support\Collection
     */
    public function excelImport(Request $request)
    {
        Excel::import(new ExcelImport, $request->file('file')->store('temp'));
        return back();
    }
    /**
     * @return \Illuminate\Support\Collection
     */
}
