<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Transaksi;

class TicketsController extends Controller
{
    public function index()
    {
        $tikets = Ticket::all();

        return view('stok-ticket', ['tikets' => $tikets]);
    }

    public function destroy(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect('/tickets-stok')->with('success');
    }

    public function edit($id)
    {
        $ticket = Ticket::find($id);
        return view('edit-tiket', compact('ticket'));
    }
    
    public function update(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        
        // Update the ticket with the new values
        $ticket->kategori_tiket = $request->input('kategori_tiket');
        $ticket->harga_tiket = $request->input('harga_tiket');
        $ticket->jumlah_tiket = $request->input('jumlah_tiket');
        $ticket->save();
    
        return redirect()->route('tickets.index')->with('success', 'Ticket updated successfully');
    }

    public function create()
{
    return view('create-tiket');
}



public function store(Request $request)
{
    $ticket = new Ticket();

    $ticket->kategori_tiket = $request->input('kategori_tiket');
    $ticket->harga_tiket = $request->input('harga_tiket');
    $ticket->jumlah_tiket = $request->input('jumlah_tiket');
    $ticket->save();

    return redirect()->route('tickets.index')->with('success', 'Tiket berhasil ditambahkan');
}
}
