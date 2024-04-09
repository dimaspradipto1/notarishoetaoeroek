<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalikNamaSertifikat extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function balik_nama_sertifikat_galleries()
    {
        return $this->hasMany(BalikNamaSertifikatGallery::class, 'balik_nama_sertifikats_id', 'id');
    }
}
