<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $Transaction = Transaction::with(['details', 'travel_package', 'user'])->where('user_id', $request->user()->id)->get();


        
        return view('pages.admin.TransactionUser.index', compact('Transaction'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $items = Transaction::with(['details', 'travel_package', 'user'])->findOrFail($id);

        return view('pages.admin.TransactionUser.detail', compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        $item = Transaction::with(['details'])->findOrFail($id);

        // dd($item->details);


        // SETIAP MEMAMGGIL RELASI DI CONTROLLER MISALNYA details harus di tambah kurung seperti
        // INI details() Berlaku setiap relasinya
        $item->details()->delete();
        $item->delete();


        return redirect()->route('transactionUser.index');
    }
}
