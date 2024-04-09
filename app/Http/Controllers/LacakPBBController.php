<?php

namespace App\Http\Controllers;

use App\Models\Pbb;
use App\Models\User;
use App\Models\LacakPBB;
use Illuminate\Http\Request;
use App\DataTables\lacakPBBDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class LacakPBBController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(lacakPBBDataTable $dataTable)
    {
        return $dataTable->render('pages.lacak_pbb.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user, Pbb $pbb)
    {
        return view('pages.lacak_pbb.create',[
            'users' => $user->all(),
            'pbbs' => $pbb->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['pbbs_id'] = $request->pbbs_id;
   
        LacakPBB::create($data);

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('lacak-pbb.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(LacakPBB $lacakPBB)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LacakPBB $lacak_pbb, User $user, Pbb $pbb)
    {
        return view('pages.lacak_pbb.edit',[
            'lacak_pbb' => $lacak_pbb,
            'users' => $user->all(),
            'pbbs' => $pbb->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LacakPBB $lacak_pbb, Pbb $pbb)
    {
        $data = $request->all();

        $data['pbbs_id'] = $request->pbbs_id;
   
        $lacak_pbb->update($data);

        Alert::success('Berhasil', 'Data Berhasil Diubah')->autoclose(3000)->toToast();
        return redirect()->route('lacak-pbb.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LacakPBB $lacak_pbb)
    {
        $lacak_pbb->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus')->autoclose(3000)->toToast();
        return redirect()->route('lacak-pbb.index');
    }
}
