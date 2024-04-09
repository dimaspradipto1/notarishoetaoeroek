<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LacakTanah extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tanah()
    {
        return $this->belongsTo(Tanah::class, 'tanahs_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
