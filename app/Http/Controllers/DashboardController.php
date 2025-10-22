<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Apply;
use App\Models\Produk;
use App\Models\Layanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bulanIni = Carbon::now()->month;
        $tahunIni = Carbon::now()->year;

        $totalUsers = User::count();
        $totalProduk = Produk::count();
        $totalLayanan = Layanan::count();
        $totalApply = Apply::count();

        // $totalOrder = PengeluaranBarang::whereMonth('created_at', $bulanIni)
        // ->whereYear('created_at', $tahunIni)
        // ->count();
        // $totalPendapatan = PengeluaranBarang::whereMonth('created_at', $bulanIni)
        // ->whereYear('created_at', $tahunIni)
        // ->sum('total_harga');
        // $totalPendapatan = "Rp. " . number_format($totalPendapatan);

        return view('dashboard.index', compact('totalUsers', 'totalProduk', 'totalLayanan', 'totalApply'));
    }
}
