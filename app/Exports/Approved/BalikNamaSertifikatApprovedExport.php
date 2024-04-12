<?php

namespace App\Exports\Approved;

use Carbon\Carbon;
use App\Models\BalikNamaSertifikat;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class BalikNamaSertifikatApprovedExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BalikNamaSertifikat::query()->where('status', 'Approved')->get()->map(function ($data, $index) {
            return [
                'no' => $index + 1,
                'nama_pemilik' => $data->nama_pemilik,
                'nik_pemilik' => '\''.$data->nik_pemilik,
                'no_hp' => $data->no_hp,
                'nama_kuasa' => $data->nama_kuasa,
                'nik_kuasa' => '\''.$data->kuasa_nik ? $data->kuasa_nik : '',
                'no_hp_kuasa' => $data->no_hp_kuasa,
                'created_at' => Carbon::parse($data->created_at)->isoFormat('D MMMM Y')
            ];
        });
    }

    public function headings(): array
    { 
        return [
            'No',
            'Nama',
            'NIK',
            'No HP',
            'Kuasa',
            'NIK Kuasa',
            'No HP Kuasa',
            'Tanggal dibuat'
        ];
    }
}
