<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use Illuminate\Http\Request;
use App\Models\SertifikatGallery;
use App\DataTables\SertifikatDataTable;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\DataTables\SertifikatGalleryDataTables;
use App\Http\Requests\SertifikatGalleryRequest;

class SertifikatGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SertifikatGalleryDataTables $dataTable, $sertifikat)
    {
        return $dataTable->render('pages.sertifikat_gallery.index', [
            'sertifikat' => $sertifikat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Sertifikat $sertifikat)
    {
        return view('pages.sertifikat_gallery.create', [
            'sertifikat' => $sertifikat
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SertifikatGalleryRequest $request, Sertifikat $sertifikat)
    {
        $files = $request->file('files');
        if($request->hasFile('files'))
        {
            foreach($files as $file){
                $path = $file->store('public/sertifikat_gallery');
  
                SertifikatGallery::create([
                    'users_id'=>auth()->user()->id,
                    'sertifikats_id'=>$sertifikat->id,
                    'url'=>$path,
                ]);
          
            }  
        }

        return redirect()->route('sertifikat.sertifikat_gallery.index', $sertifikat->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(SertifikatGallery $sertifikatGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SertifikatGallery $sertifikatGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SertifikatGallery $sertifikatGallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SertifikatGallery $sertifikatGallery)
    {
        $sertifikatGallery->delete();

        Storage::delete($sertifikatGallery->url);

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('sertifikat.sertifikat_gallery.index', $sertifikatGallery->sertifikats_id);
    }
}
