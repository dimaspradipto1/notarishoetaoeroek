<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IzinUsaha extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function izin_usaha_gallery()
    {
        return $this->hasMany(IzinUsahaGallery::class, 'izin_usahas_id', 'id');
    }
}
