<?php

namespace App\Http\Controllers;

use App\Models\Pbb;
use App\Models\PbbGallery;
use Illuminate\Http\Request;
use App\DataTables\PbbGalleryDataTable;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PbbGalleryRequest;
use RealRashid\SweetAlert\Facades\Alert;

class PbbGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PbbGalleryDataTable $dataTable)
    {
        
        return $dataTable->render('pages.pbb_gallery.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    
    public function create(Pbb $pbb)
    {
        return view('pages.pbb_gallery.create', compact('pbb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PbbGalleryRequest $request, Pbb $pbb)
    {
        $files = $request->file('files');
        if($request->hasFile('files'))
        {
            foreach($files as $file){
                $path = $file->store('public/pbb_gallery');
  
                PbbGallery::create([
                    'users_id'=>auth()->user()->id,
                    'pbbs_id'=>$pbb->id,
                    'url'=>$path,
                ]);
          
            }  
        }
        
        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('pbb.pbb_gallery.index', $pbb->id);

    }

    /**
     * Display the specified resource.
     */
    public function show(PbbGallery $pbbGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PbbGallery $pbbGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PbbGallery $pbbGallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PbbGallery $pbbGallery)
    {
        $pbbGallery->delete();

        Storage::delete($pbbGallery->url);

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('pbb.pbb_gallery.index',$pbbGallery);
    }
}
