<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BalikNamaSertifikat;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\BalikNamaSertifikatExport;
use App\DataTables\BalikNamaSertifikatDataTable;

class BalikNamaSertifikatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BalikNamaSertifikatDataTable $dataTable)
    {
        return $dataTable->render('pages.balik_nama_sertifikat.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.balik_nama_sertifikat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['users_id'] = Auth::id();

        BalikNamaSertifikat::create($data);

        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('balik_nama_sertifikat.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(BalikNamaSertifikat $balikNamaSertifikat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BalikNamaSertifikat $balikNamaSertifikat)
    {
        return view('pages.balik_nama_sertifikat.edit', compact('balikNamaSertifikat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BalikNamaSertifikat $balikNamaSertifikat)
    {
        $balikNamaSertifikat->update($request->all());

        Alert::success('Berhasil', 'Data berhasil diupdate')->autoclose(3000)->toToast();
        return redirect()->route('balik_nama_sertifikat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BalikNamaSertifikat $balikNamaSertifikat)
    {
        $balikNamaSertifikat->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('balik_nama_sertifikat.index');
    }

    public function export_balik_nama_sertifikat()
    {
        return Excel::download(new BalikNamaSertifikatExport, 'Laporan Balik Nama Sertifikat Pending.xlsx');
    }
}
