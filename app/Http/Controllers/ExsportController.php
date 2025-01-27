<?php

namespace App\Http\Controllers;

use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class ExsportController extends Controller
{
    public function exportOrders()
    {
        return Excel::download(new OrdersExport, 'Rekap.xlsx');
    }
}
