<?php

namespace App\Http\Controllers;

use App\Http\AuthController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi;
use App\Models\Ticket;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index()
    {
        $jumlahtiket = Ticket::sum('jumlah_tiket');
        $jumlahtiketkategori = Ticket::selectRaw('kategori_tiket, SUM(jumlah_tiket) as jumlahtiketkategori')
        ->groupBy('kategori_tiket')
        ->get();
        $jumlahTransaksi = Transaksi::sum('jumlah_tiket');
        $totaljualtiket =Transaksi::selectRaw('kategori, SUM(jumlah_tiket) as totaljualtiket')
        ->groupBy('kategori')
        ->get();
        $totalPemasukan = Transaksi::sum('total_bayar');
        $pemasukan = Transaksi::selectRaw('kategori, SUM(total_bayar) as total_pemasukan')
        ->groupBy('kategori')
        ->get();

        return view('dashboard-admin', compact('jumlahTransaksi', 'totalPemasukan', 'pemasukan', 'totaljualtiket', 'jumlahtiket', 'jumlahtiketkategori'));
    }

    public function form_beli(){
        $kategori_tiket = DB::table('tiket')->get();
        $username = Auth::user()->name;
        return view('belitiket', compact('kategori_tiket', 'username'));
    }


}
