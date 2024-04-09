<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'nama_pemilik',
        'nik_pemilik',
        'no_hp',
        'nama_kuasa',
        'nik_kuasa',
        'no_hp_kuasa',
        'status',
        'keterangan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function sertifikat_gallery()
    {
        return $this->hasMany(SertifikatGallery::class, 'sertifikats_id', 'id');
    }

    public function lacakSertifikat()
    {
        return $this->hasMany(LacakSertifikat::class, 'sertifikats_id', 'id');
    }
}
