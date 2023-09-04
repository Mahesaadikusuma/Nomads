<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TravelPackageRequest;

class TravelPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $travelPackage = TravelPackage::all();
        return view('pages.admin.travel-package.index', compact('travelPackage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        return view('pages.admin.travel-package.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TravelPackageRequest $request)
    {
        $items = $request->all();

        $items['slug'] = Str::slug($request->title);

        TravelPackage::create($items);

        return redirect()->route('travel-package.index');
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
        $items = TravelPackage::findOrFail($id);
        return view('pages.admin.travel-package.edit', compact('items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TravelPackageRequest $request, string $id)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->title);

        $item = TravelPackage::findOrFail($id);
        $item->update($data);
        // TravelPackage::update($data);

        return redirect()->route('travel-package.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = TravelPackage::findOrFail($id);
        $item->delete();

        return redirect()->route('travel-package.index');
    }
}
