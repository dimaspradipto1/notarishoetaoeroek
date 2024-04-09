<?php

namespace App\Http\Controllers;

use App\Models\IzinUsaha;
use Illuminate\Http\Request;
use App\Models\IzinUsahaGallery;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\DataTables\IzinUsahaGalleryDataTable;

class IzinUsahaGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IzinUsahaGalleryDataTable $dataTable)
    {
        return $dataTable->render('pages.izin_usaha_gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(IzinUsaha $izinUsaha)
    {
        return view('pages.izin_usaha_gallery.create',[
            'izinusaha'=>$izinUsaha
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, IzinUsaha $izinUsaha)
    {
        $files = $request->all();
        if($request->hasFile('files'))
        {
            foreach($files['files'] as $file){
                $path = $file->store('public/izin_usaha_gallery');
  
                IzinUsahaGallery::create([
                    'users_id'=>auth()->user()->id,
                    'izin_usahas_id'=>$izinUsaha->id,
                    'url'=>$path,
                ]);
          
            }  
        }

        Alert::success('Berhasil', 'Data berhasil ditambahkan');
        return redirect()->route('izin_usaha.izin_usaha_gallery.index', $izinUsaha->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(IzinUsahaGallery $izinUsahaGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IzinUsahaGallery $izinUsahaGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IzinUsahaGallery $izinUsahaGallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IzinUsahaGallery $izinUsahaGallery)
    {
        $izinUsahaGallery->delete();

        Storage::delete($izinUsahaGallery->url);

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('izin_usaha.izin_usaha_gallery.index', $izinUsahaGallery->izin_usahas_id);
    }
}
