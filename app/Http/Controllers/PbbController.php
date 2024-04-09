<?php

namespace App\Http\Controllers;

use App\Models\Pbb;
use Illuminate\Http\Request;
use App\DataTables\PbbDataTable;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PbbController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PbbDataTable $dataTable)
    {
        return $dataTable->render('pages.pbb.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pbb.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['users_id'] = Auth::id();

        Pbb::create($data);
        Alert::success('Berhasil', 'Data berhasil ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('pbb.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pbb $pbb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pbb $pbb)
    {
        return view('pages.pbb.edit', compact('pbb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pbb $pbb)
    {
        $pbb->update($request->all());

        Alert::success('Berhasil', 'Data berhasil diupdate')->autoclose(3000)->toToast();
        return redirect()->route('pbb.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pbb $pbb)
    {
        $pbb->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus')->autoclose(3000)->toToast();
        return redirect()->route('pbb.index');
    }
}
