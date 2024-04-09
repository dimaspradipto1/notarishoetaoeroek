<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\IzinUsaha;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class IzinUsahaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return IzinUsaha::query()->where('status', 'PENDING')->get()->map(function ($data, $index) {

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
            'Nik',
            'No HP',
            'Kuasa',
            'Nik Kuasa',
            'No HP Kuasa',
            'Tanggal Dibuat'
        ];
    }
}
