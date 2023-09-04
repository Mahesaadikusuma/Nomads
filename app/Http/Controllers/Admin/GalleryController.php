<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\GalleryRequest;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request )
    {

        $items = Gallery::with(['travel_package'])->get();
        
        return view('pages.admin.gallery.index', [
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $travel = TravelPackage::all();

        return view('pages.admin.gallery.create', [
            'travel' => $travel
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryRequest $request)
    {
        $data = $request->all();
        
        $data['image'] = $request->file('image')->store('assets/gallery', 'public');


        Gallery::create($data);
        return redirect()->route('gallery.index')->with('status', 'Data berhasil ditambah');
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
        $items = Gallery::findOrFail($id);
        $travel = TravelPackage::all();


        return view('pages.admin.gallery.edit',[
            'items' => $items,
            'travel' => $travel,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GalleryRequest $request, string $id)
    {
        $data = $request->all();
        
        $item = Gallery::findOrFail($id);

        
        if ($request->hasFile('image')) {
            Storage::disk('local')->delete('public/' . $item->image); 
        }

        $data['image'] = $request->file('image')->store('assets/gallery', 'public');

        $item->update($data);
        return redirect()->route('gallery.index')->with('status', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request ,string $id )
    {   
        
        
        $item = Gallery::findOrFail($id);

        
        // Storage::disk('local')->delete('public/' . $item->image);   
        $item->delete();

        return redirect()->route('gallery.index')->with('status', 'Data berhasil dihapus');
    }
}
