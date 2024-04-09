<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use Illuminate\Http\Request;
use App\Exports\SertifikatExport;
use Maatwebsite\Excel\Facades\Excel;
use App\DataTables\SertifikatDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class SertifikatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SertifikatDataTable $dataTable)
    {
        return $dataTable->render('pages.sertifikat.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.sertifikat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['users_id'] = auth()->id();

        Sertifikat::create($data);

        Alert::success('Berhasil', 'Data Berhasil ditambah!')->autoclose(3000)->toToast();
        return redirect()->route('sertifikat.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sertifikat $sertifikat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sertifikat $sertifikat)
    {
        return view('pages.sertifikat.edit', compact('sertifikat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sertifikat $sertifikat)
    {
        $sertifikat = Sertifikat::findOrFail($sertifikat->id);

        $sertifikat->update($request->all());

        Alert::success('Berhasil', 'Data Berhasil diupdate!')->autoclose(3000)->toToast();
        return redirect()->route('sertifikat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sertifikat $sertifikat)
    {
        $sertifikat->delete();

        Alert::success('Berhasil', 'Data Berhasil dihapus!')->autoclose(3000)->toToast();
        return redirect()->route('sertifikat.index');
    }

    public function export_sertifikat()
    {
        return Excel::download(new SertifikatExport, 'Laporan Sertifikat Pending.xlsx');
    }
}
