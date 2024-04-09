<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BalikNamaSertifikat;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\BalikNamaSertifikatGallery;
use App\Http\Requests\BalikNamaGalleryRequest;
use App\DataTables\BalikNamaSertifikatGalleryDataTable;

class BalikNamaSertifikatGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BalikNamaSertifikatGalleryDataTable $dataTable)
    {
        return $dataTable->render('pages.balik_nama_sertifikat_gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(BalikNamaSertifikat $balikNamaSertifikat)
    {
        return view('pages.balik_nama_sertifikat_gallery.create', compact('balikNamaSertifikat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BalikNamaGalleryRequest $request , BalikNamaSertifikat $balikNamaSertifikat)
    {
        $files = $request->file('files');
        if($request->hasFile('files'))
        {
           foreach($files as $file){
                $path = $file->store('public/balik_nama_sertifikat_gallery');
                
                BalikNamaSertifikatGallery::create([
                    'users_id' => auth()->user()->id,
                    'balik_nama_sertifikats_id' => $balikNamaSertifikat->id,
                    'url' => $path,
                ]);
           } 
        }

        return redirect()->route('balik_nama_sertifikat.balik_nama_sertifikat_gallery.index', $balikNamaSertifikat->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(BalikNamaSertifikatGallery $balikNamaSertifikatGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BalikNamaSertifikatGallery $balikNamaSertifikatGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BalikNamaSertifikatGallery $balikNamaSertifikatGallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BalikNamaSertifikatGallery $balikNamaSertifikatGallery)
    {
        $balikNamaSertifikatGallery->delete();

        Storage::delete($balikNamaSertifikatGallery->url);
        
        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('balik_nama_sertifikat.balik_nama_sertifikat_gallery.index', $balikNamaSertifikatGallery->balik_nama_sertifikats_id);
    }
}
