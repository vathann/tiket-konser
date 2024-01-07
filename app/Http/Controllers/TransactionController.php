<?php

namespace App\Http\Controllers;
use App\Http\AuthController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Ticket;
use App\Models\User;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = DB::table('transaksi')->get();
        return view('list-transaksi', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $email = Auth::user()->email;

        // Validasi data yang diterima dari formulir
        Validator::make($request->all(), [
            'Name' => 'required',
            'no_telephone' => 'required',
            'kategori' => 'required|exists:tiket,id',
            'jumlah_tiket' => 'required|integer|min:1'
        ])->validate();

        $idTiket = $request->kategori;
        $tiket = Ticket::find($idTiket);
        $kategoriTiket = $tiket->kategori_tiket;
        $hargaTiket = $tiket->harga_tiket;
        $total = $hargaTiket * $request->jumlah_tiket;

        Transaksi::create([
            'nama_pemilik' => $request->Name,
            'no_telephone' => $request->no_telephone,
            'kategori' => $kategoriTiket,
            'jumlah_tiket' => $request->jumlah_tiket,
            'harga_tiket' => $hargaTiket,
            'total_bayar' => $total,
            'email' => $email,
            'payment_status'=>'belum lunas'
        ]);
        return redirect()->route('myticket');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           
    
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
            $transaction = Transaksi::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }

        return view('detail-transaksi', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $transaction)
    {
        // Cari transaksi berdasarkan ID
        $transaction = Transaksi::find($transaction);
        
        // Periksa apakah transaksi ditemukan
        if (!$transaction) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }
        
        // Hapus transaksi
        $transaction->delete();
        
        // Berikan respons yang sesuai
        return response()->json(['message' => 'Transaksi berhasil dihapus'], 200);
    }






    public function myticket()
{
    $userEmail = Auth::user()->email;
    $transaksiUser = Transaksi::where('email', $userEmail)->get();

    return view('myticket', ['transaksiUser' => $transaksiUser]);
}
public function lunasi($id)
{
    $transaksi = Transaksi::findOrFail($id);
    $transaksi->payment_status = 'lunas';
    $transaksi->save();
    
    if ($transaksi->items !== null) {
        foreach ($transaksi->items as $item) {
            $tiket = Ticket::findOrFail($item->id);
            $tiket->stok -= $item->jumlah_tiket;
            $tiket->save();
        }
    }
    
    return redirect()->back()->with('success', 'Transaksi berhasil dilunasi.');
}

public function printTiket($id)
{
    $transaksi = Transaksi::findOrFail($id);
    // Ambil data tiket yang terkait dengan transaksi
    $tiket = $transaksi->items;
    
    // Render template cetakan tiket dengan data tiket
    $cetakanTiket = view('cetak-tiket', compact('transaksi', 'tiket'));
    
    // Mengembalikan tampilan cetakan tiket dalam format yang diinginkan
    return $cetakanTiket;

    
}

}
