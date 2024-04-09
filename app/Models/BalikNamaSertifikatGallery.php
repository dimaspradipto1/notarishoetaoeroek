<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalikNamaSertifikatGallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'balik_nama_sertifikats_id',
        'url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function balik_nama_sertifikat()
    {
        return $this->belongsTo(BalikNamaSertifikat::class, 'balik_nama_sertifikats_id', 'id');
    }
}
