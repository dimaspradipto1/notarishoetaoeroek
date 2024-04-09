<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SertifikatGallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'sertifikats_id',
        'url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    
}
