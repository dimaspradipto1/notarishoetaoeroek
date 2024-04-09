<?php

namespace App\Http\Controllers;

use App\Models\Tanah;
use App\Models\TanahGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\DataTables\TanahGalleryDataTable;

class TanahGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TanahGalleryDataTable $dataTable)
    {
        return $dataTable->render('pages.tanah_gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tanah $tanah)
    {
        return view('pages.tanah_gallery.create', compact('tanah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Tanah $tanah)
    {
        $files = $request->file('files');
        if($request->hasFile('files')){
            foreach($files as $file){
                $path = $file->store('public/tanah_gallery');

                TanahGallery::create([
                    'users_id'=>auth()->user()->id,
                    'tanahs_id'=>$tanah->id,
                    'url'=>$path,
                ]);
            }
        }

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('tanah.tanah_gallery.index', $tanah->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(TanahGallery $tanahGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TanahGallery $tanahGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TanahGallery $tanahGallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TanahGallery $tanahGallery)
    {
        $tanahGallery->delete();

        Storage::delete($tanahGallery->url);

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('tanah.tanah_gallery.index', $tanahGallery->tanahs_id);
    }
}
