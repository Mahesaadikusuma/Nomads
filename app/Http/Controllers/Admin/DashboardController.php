<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        $travel_package = TravelPackage::count();

        // INI ADALAH AMBIL SELURUH DATA DI TRANSACTION DAN DIHITUNG SEMUANYA DATANYA 
        $transaction = Transaction::count();

        // DAN YANG INI MENGHITUNG DATA TRANSAKSI BERDASARKAN USER TRANSAKSINYA 
        $transaction_user = Transaction::where('user_id', Auth::user()->id)->count();

        $pending = Transaction::where('trasactions_status', 'PENDING')->count();
        $success = Transaction::where('trasactions_status', 'SUCCESS')->count();

        $userLatest = User::latest()->take(3)->get();

        return view('pages.admin.dashboard', compact('travel_package','transaction', 'pending', 'success', 'transaction_user', 'userLatest'));
    }
}
