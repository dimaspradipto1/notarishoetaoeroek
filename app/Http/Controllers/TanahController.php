<?php

namespace App\Http\Controllers;

use App\Models\Tanah;
use App\Exports\TanahExport;
use Illuminate\Http\Request;
use App\DataTables\TanahDataTable;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class TanahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TanahDataTable $dataTable)
    {
        return $dataTable->render('pages.tanah.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.tanah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['users_id'] = auth()->id();

        Tanah::create($data);

        Alert::success('Success', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('tanah.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tanah $tanah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tanah $tanah)
    {
        return view('pages.tanah.edit', compact('tanah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tanah $tanah)
    {
        $tanah->update($request->all());

        Alert::success('Success', 'Data berhasil diupdate')->autoclose(3000)->toToast();
        return redirect()->route('tanah.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tanah $tanah)
    {
        $tanah->delete();

        Alert::success('Success', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('tanah.index');
    }

    public function export_tanah()
    {
        return Excel::download(new TanahExport, 'Laporan Tanah Pending.xlsx');
    }
}
