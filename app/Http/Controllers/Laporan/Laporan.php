<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Laporan extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request){

        if ($request->ajax()) {

            $totalsPerDay = DB::table('surveys')
            ->selectRaw('DATE(created_at) as date, value, COUNT(*) as total')
            ->groupBy('date', 'value')
            ->get();

            $totalsPerMonth = DB::table('surveys')
            ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, value, COUNT(*) as total')
            ->groupBy('year', 'month', 'value')
            ->get();



            return response()->json(['status' => 'success', 'message' => 'success retrieved data', 'dataPerdays' => $totalsPerDay, 'dataPerMonth' => $totalsPerMonth], 200);
        }

        return view('laporan.laporan');

    }
}
