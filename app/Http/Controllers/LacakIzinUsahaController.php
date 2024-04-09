<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\LacakIzinUsaha;
use RealRashid\SweetAlert\Facades\Alert;
use App\DataTables\LacakIzinUsahaDataTable;
use App\Models\IzinUsaha;

class LacakIzinUsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(LacakIzinUsahaDataTable $dataTable)
    {
        return $dataTable->render('pages.lacak_izin_usaha.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user, IzinUsaha $izinusaha)
    {
        return view('pages.lacak_izin_usaha.create',[
            'users' => $user->all(),
            'izin_usaha' => $izinusaha->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['izin_usahas_id'] = $request->izin_usahas_id;
   
        LacakIzinUsaha::create($data);

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('lacak-izin-usaha.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(LacakIzinUsaha $lacakIzinUsaha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LacakIzinUsaha $lacakIzinUsaha, User $user, IzinUsaha $izinusaha)
    {
        return view('pages.lacak_izin_usaha.edit', [
            'lacak_izin_usaha' => $lacakIzinUsaha,
            'users' => $user->all(),
            'izin_usaha' => $izinusaha->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LacakIzinUsaha $lacakIzinUsaha)
    {
        $data = $request->all();
        
        $data['izin_usahas_id'] = $request->izin_usahas_id;

        $lacakIzinUsaha->update($data);

        Alert::success('Berhasil', 'Data Berhasil Diubah')->autoclose(3000)->toToast();
        return redirect()->route('lacak-izin-usaha.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LacakIzinUsaha $lacakIzinUsaha)
    {
        $lacakIzinUsaha->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus')->autoclose(3000)->toToast();
        return redirect()->route('lacak-izin-usaha.index');
    }
}
