<?php

namespace App\Http\Controllers;

use App\Models\IzinUsaha;
use Illuminate\Http\Request;
use App\Exports\IzinUsahaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\DataTables\IzinUsahaDataTable;
use App\Exports\Rejected\IzinUsahaRejectedExport;
use RealRashid\SweetAlert\Facades\Alert;

class IzinUsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IzinUsahaDataTable $dataTable)
    {
        return $dataTable->render('pages.izin_usaha.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.izin_usaha.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['users_id'] = auth()->id();

        IzinUsaha::create($data);

        Alert::success('Berhasil', 'Data Berhasil ditambah!')->autoclose(3000)->toToast();
        return redirect()->route('izin_usaha.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(IzinUsaha $izinUsaha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IzinUsaha $izinUsaha)
    {
        return view('pages.izin_usaha.edit', compact('izinUsaha'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IzinUsaha $izinUsaha)
    {
        $izinUsaha = IzinUsaha::findOrFail($izinUsaha->id);

        $izinUsaha->update($request->all());

        Alert::success('Berhasil', 'Data Berhasil diupdate!')->autoclose(3000)->toToast();
        return redirect()->route('izin_usaha.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IzinUsaha $izinUsaha)
    {
        $izinUsaha->delete();

        Alert::success('Berhasil', 'Data Berhasil dihapus!')->autoclose(3000)->toToast();
        return redirect()->route('izin_usaha.index');
    }

    public function export_izin_usaha()
    {
        return Excel::download(new IzinUsahaExport, 'Laporan Izin Usaha Pending.xlsx');
    }

    public function export_izin_usaha_rejected()
    {
        return Excel::download(new IzinUsahaRejectedExport, 'Laporan Izin Usaha Rejected.xlsx');
    }
}
