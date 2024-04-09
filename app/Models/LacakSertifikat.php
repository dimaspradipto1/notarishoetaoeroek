<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LacakSertifikat extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sertifikat()
    {
        return $this->belongsTo(Sertifikat::class, 'sertifikats_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
