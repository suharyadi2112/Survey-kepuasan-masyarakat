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

            //--date
            $querydate = DB::table('surveys')->selectRaw('value, COUNT(*) as total')->groupBy('value');
            if ($request->filled('tanggal')) {
                $querydate->whereDate('created_at', $request->tanggal);
            }
            $totalsPerDay = $querydate->get();

            //--month
            $querymonth = DB::table('surveys')->selectRaw('value, COUNT(*) as total')->groupBy('value');
            if ($request->filled('bulan')) {
                list($year, $month) = explode('-', $request->bulan);
                $querymonth->whereYear('created_at', $year)->whereMonth('created_at', $month);
            }
            $totalsPerMonth = $querymonth->get();
    
            return response()->json(['status' => 'success', 'message' => 'success retrieved data', 'dataPerdays' => $totalsPerDay, 'dataPerMonth' => $totalsPerMonth], 200);
        }

        return view('laporan.laporan');

    }
}
