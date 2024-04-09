<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanahGallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'tanahs_id',
        'url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }


}
