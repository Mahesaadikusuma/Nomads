<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request)
    {

        $item = TravelPackage::with('gallery')->where('slug', $request->slug)->firstOrFail();
        // dd($item->gallery());

        // $departure_date = TravelPackage::where('departure_date', $request->departure_date);
        $date = Carbon::create($item->departure_date)->toFormattedDateString();

        // dd($date);
        return view('pages.Detail', compact('item', 'date'));
    }
}
