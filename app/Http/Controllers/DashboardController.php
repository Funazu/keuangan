<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keuangan;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $masuk = Keuangan::where('user_id', auth()->user()->id)->sum('masuk');
        $keluar = Keuangan::where('user_id', auth()->user()->id)->sum('keluar');
        $totalsaldo = $masuk - $keluar;
        $uangmasuk = $masuk;
        $uangkeluar = $keluar;

        return view('dashboard.pages.index',[
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'keuangan' => Keuangan::where('user_id', auth()->user()->id)->get(),
            'totalsaldo' => $totalsaldo,
            'totaluangmasuk' => $uangmasuk,
            'totaluangkeluar' => $uangkeluar
        ])->with('i');
    }
    public function keuangan(Request $request)
    {
        $validatedData = $request->validate([
            'masuk' => '',
            'keluar' => '',
            'keterangan' => 'required',
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        Keuangan::create($validatedData);
        return redirect('/dashboard');
    }
}
