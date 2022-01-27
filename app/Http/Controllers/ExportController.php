<?php

namespace App\Http\Controllers;

use App\Exports\CoupanExport;
use Illuminate\Http\Request;
use App\Exports\SalesExport;
use App\Exports\UserExport;
use Maatwebsite\Excel\facades\Excel;

class ExportController extends Controller
{
    //
    public function export()
    {
        return Excel::download(new SalesExport, 'sales.xlsx');
    }
    public function usersexport()
    {
        return Excel::download(new UserExport, 'user.xlsx');
    }
    public function coupansexport()
    {
        return Excel::download(new CoupanExport, 'coupon.xlsx');
    }
}
