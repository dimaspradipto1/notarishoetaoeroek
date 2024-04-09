<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LacakIzinUsaha extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lacakizinusaha()
    {
        return $this->belongsTo(IzinUsaha::class, 'izin_usahas_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
