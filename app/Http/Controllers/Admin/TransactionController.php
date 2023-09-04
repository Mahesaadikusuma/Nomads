<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionRequest;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $Transaction = Transaction::with(['details', 'travel_package', 'user'])->get();
        return view('pages.admin.Transaction.index', compact('Transaction'));
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
    public function store(TransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $items = Transaction::with(['details', 'travel_package', 'user'])->findOrFail($id);

        
        return view('pages.admin.Transaction.detail', compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $items = Transaction::findOrFail($id);
        return view('pages.admin.Transaction.edit', compact('items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransactionRequest $request, string $id)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->title);

        $item = Transaction::findOrFail($id);
        $item->update($data);
        // Transaction::update($data);

        return redirect()->route('transaction.index');
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


        return redirect()->route('transaction.index');
    }

    

    

}
