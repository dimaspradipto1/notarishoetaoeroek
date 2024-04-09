<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LacakBalikNamaSertifikat extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function baliknamasertifikat()
    {
        return $this->belongsTo(BalikNamaSertifikat::class, 'balik_nama_sertifikats_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
