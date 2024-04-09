<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PbbGallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'pbbs_id',
        'url'
    ];

    public function pbb()
    {
        return $this->belongsTo(Pbb::class, 'pbbs_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
   
}
