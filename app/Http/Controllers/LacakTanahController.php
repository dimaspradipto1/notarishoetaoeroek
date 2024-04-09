<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tanah;
use App\Models\LacakTanah;
use Illuminate\Http\Request;
use App\DataTables\LacakTanahDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class LacakTanahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(LacakTanahDataTable $dataTable)
    {
        return $dataTable->render('pages.lacak_tanah.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user, Tanah $tanah)
    {
        return view('pages.lacak_tanah.create',[
            'users' => $user->all(),
            'tanah' => $tanah->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['tanahs_id'] = $request->tanahs_id;
   
        LacakTanah::create($data);

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('lacak-tanah.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(LacakTanah $lacakTanah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LacakTanah $lacakTanah, User $user, Tanah $tanah)
    {
        return view('pages.lacak_tanah.edit', [
            'lacak_tanah' => $lacakTanah,
            'users' => $user->all(),
            'tanah' => $tanah->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LacakTanah $lacakTanah)
    {
        $data = $request->all();

        $data['tanahs_id'] = $request->tanahs_id;
   
        $lacakTanah->update($data);

        Alert::success('Berhasil', 'Data Berhasil Diubah')->autoclose(3000)->toToast();
        return redirect()->route('lacak-tanah.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LacakTanah $lacakTanah)
    {
        $lacakTanah->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus')->autoclose(3000)->toToast();
        return redirect()->route('lacak-tanah.index');
    }
}
