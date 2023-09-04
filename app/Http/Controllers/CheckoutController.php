<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request, $id)
    {
        $item =  Transaction::with(['details', 'travel_package', 'user'])->findOrFail($id);

        return view('pages.Checkout', [
            'item' => $item,
        ]);
    }


    public function process(Request $request, $id)
    {
        $travel_package = TravelPackage::findOrFail($id);

        $transaction = Transaction::create([
            'travel_package_id' => $id,
            'user_id' => Auth::user()->id,
            'additional_visa' => 0,
            'transactions_total' => $travel_package->price,
            'trasactions_status' => 'IN_CART',
        ]);


        TransactionDetail::create([
            'transaction_id' => $transaction->id,
            'username' => Auth::user()->username,
            'nasionality' => 'ID',
            'is_visa' => false,
            'doe_passport' => Carbon::now()->addYear(5),
        ]);

        return redirect()->route('checkout', $transaction->id);
    }

    
    public function create(Request $request, $id)
    {
        
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'is_visa' => 'required|boolean',
            'doe_passport' => 'required',
        ]);


        
        // // Validasi input yang diterima dari form, termasuk username, is_visa, dan doe_passport.
        $data = $request->all();
        
        $data['transaction_id'] = $id;

        // dd($data['transaction_id'] = $id);
        TransactionDetail::create($data);
        

        //  Mengambil data transaksi berdasarkan id yang diberikan, termasuk relasi travel_package.
        $transaction = Transaction::with(['travel_package'])->find($id);

        // // Jika is_visa bernilai true (1), tambahkan biaya visa ke total transaksi dan additional_visa.
        if($request->is_visa)
        {
            $transaction->transactions_total += 190;
            $transaction->additional_visa += 190;
        }

        // Menambahkan biaya dari travel_package ke total transaksi.
        $transaction->transactions_total += $transaction->travel_package->price;

        // Menyimpan perubahan data transaksi.
        $transaction->save();

        return redirect()->route('checkout', $id);
    }

    public function remove(Request $request, $detail_id)
    {
        $item = TransactionDetail::findorFail($detail_id);
        // dd($item);
        $transaction = Transaction::with(['details','travel_package'])
            ->findOrFail($item->transaction_id);

        if($item->is_visa)
        {
            $transaction->transactions_total -= 190;
            $transaction->additional_visa -= 190;
        }

        $transaction->transactions_total -= $transaction->travel_package->price;

        $transaction->save();
        $item->delete();

        return redirect()->route('checkout', $item->transaction_id);
    }


    public  function success(Request $request, $id )
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->trasactions_status = 'PENDING';

        $transaction->save();
        return view('pages.Success');
    }
}
