<?php

namespace App\Http\Controllers;

use App\Models\BalikNamaSertifikat;
use App\Models\Pbb;
use App\Models\IzinUsaha;
use App\Models\Sertifikat;
use App\Models\Tanah;

class DashboardController extends Controller
{
    public function admin( Pbb $pbb, Sertifikat $sertifikat, BalikNamaSertifikat $balikNamaSertifikat,  IzinUsaha $izinUsaha, Tanah $tanah)
    {
        return view('layouts.dashboard.index', [

            'sertifikat' => $sertifikat->count(),
            'balikNamaSertifikat' => $balikNamaSertifikat->count(),
            'pbb' => $pbb->count(),
            'izinUsaha' => $izinUsaha->count(),
            'tanah' => $tanah->count(),

            'sertifikatStatusSuccess' => $sertifikat->where('status', 'Approved')->count(),
            'sertifikatStatusPending' => $sertifikat->where('status', 'Pending')->count(),
            'sertifikatStatusRejected' => $sertifikat->where('status', 'Rejected')->count(),

            'balikNamaSertifikatStatusSuccess' => $balikNamaSertifikat->where('status', 'Approved')->count(),
            'balikNamaSertifikatStatusPending' => $balikNamaSertifikat->where('status', 'Pending')->count(),
            'balikNamaSertifikatStatusRejected' => $balikNamaSertifikat->where('status', 'Rejected')->count(),

            'pbbStatusSuccess' => $pbb->where('status', 'Approved')->count(),
            'pbbStatusPending' => $pbb->where('status', 'Pending')->count(),
            'pbbStatusRejected' => $pbb->where('status', 'Rejected')->count(),

            'izinUsahaStatusSuccess' => $izinUsaha->where('status', 'Approved')->count(),
            'izinUsahaStatusPending' => $izinUsaha->where('status', 'Pending')->count(),
            'izinUsahaStatusRejected' => $izinUsaha->where('status', 'Rejected')->count(),

            'tanahStatusSuccess' => $tanah->where('status', 'Approved')->count(),
            'tanahStatusPending' => $tanah->where('status', 'Pending')->count(),
            'tanahStatusRejected' => $tanah->where('status', 'Rejected')->count(),
        ]);
    }


}
