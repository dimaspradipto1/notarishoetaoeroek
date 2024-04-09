<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\BalikNamaSertifikat;
use App\Models\LacakBalikNamaSertifikat;
use RealRashid\SweetAlert\Facades\Alert;
use App\DataTables\LacakBalikNamaSertifikatDataTable;

class LacakBalikNamaSertifikatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(LacakBalikNamaSertifikatDataTable $dataTable)
    {
        return $dataTable->render('pages.lacak_balik_nama_sertifikat.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user, BalikNamaSertifikat $balikNamaSertifikat)
    {
        return view('pages.lacak_balik_nama_sertifikat.create',[
            'users' => $user->all(),
            'balik_nama_sertifikats' => $balikNamaSertifikat->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['balik_nama_sertifikats_id'] = $request->balik_nama_sertifikats_id;
   
        LacakBalikNamaSertifikat::create($data);

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('lacak-balik-nama-sertifikat.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(LacakBalikNamaSertifikat $lacakBalikNamaSertifikat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LacakBalikNamaSertifikat $lacakBalikNamaSertifikat, User $user, BalikNamaSertifikat $balikNamaSertifikat)
    {
        return view('pages.lacak_balik_nama_sertifikat.edit',[
            'lacakBalikNamaSertifikat' => $lacakBalikNamaSertifikat,
            'users' => $user->all(),
            'balik_nama_sertifikats' => $balikNamaSertifikat->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LacakBalikNamaSertifikat $lacakBalikNamaSertifikat)
    {
        $data = $request->all();

        $data['balik_nama_sertifikats_id'] = $request->balik_nama_sertifikats_id;

        $lacakBalikNamaSertifikat->update($data);

        Alert::success('Berhasil', 'Data Berhasil Diubah')->autoclose(3000)->toToast();
        return redirect()->route('lacak-balik-nama-sertifikat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LacakBalikNamaSertifikat $lacakBalikNamaSertifikat)
    {
        $lacakBalikNamaSertifikat->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus')->autoclose(3000)->toToast();
        return redirect()->route('lacak-balik-nama-sertifikat.index');
    }
}
