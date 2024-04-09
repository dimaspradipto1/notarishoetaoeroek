<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\LacakSertifikat;
use RealRashid\SweetAlert\Facades\Alert;
use App\DataTables\LacakSertifikatDataTable;
use App\Models\Sertifikat;

class LacakSertifikatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(LacakSertifikatDataTable $dataTable)
    {

        return $dataTable->render('pages.lacak_sertifikat.index',);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user, Sertifikat $sertifikat)
    {
        return view('pages.lacak_sertifikat.create',[
            'users' => $user->all(),
            'sertifikats' => $sertifikat->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['sertifikats_id'] = $request->sertifikats_id;
   
        LacakSertifikat::create($data);

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan')->autoclose(3000)->toToast();
        return redirect()->route('lacak-sertifikat.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, $id)
    {
        $lacakSertifikat = LacakSertifikat::find($id);
        $lacakSertifikats = LacakSertifikat::where('id', $id)->get();
         
        LacakSertifikat::where('users_id', $user->id)->get();

        if ($lacakSertifikat === null) {
             
            abort(404);
        }

        return view('pages.lacak_sertifikat.show', [
            'lacakSertifikat' => $lacakSertifikat. ' - Detail',
            'lacakSertifikats' => $lacakSertifikats
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LacakSertifikat $lacakSertifikat, User $user, Sertifikat $sertifikat)
    {
        return view('pages.lacak_sertifikat.edit', [
            'lacakSertifikat' => $lacakSertifikat,
            'users' => $user->all(),
            'sertifikats' => $sertifikat->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LacakSertifikat $lacakSertifikat)
    {
        $data = $request->all();

        $data['sertifikats_id'] = $request->sertifikats_id;
        // $data['users_id'] = $request->users_id;

        $lacakSertifikat->update($data);

        Alert::success('Berhasil', 'Data Berhasil Diubah')->autoclose(3000)->toToast();
        return redirect()->route('lacak-sertifikat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LacakSertifikat $lacakSertifikat)
    {
        $lacakSertifikat->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus')->autoclose(3000)->toToast();
        return redirect()->route('lacak-sertifikat.index');
    }

}
