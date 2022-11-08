<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = [
        'photo_path'
    ];

    public function getPhotoPathAttribute()
    {
        return asset('storage/' . $this->photo);
    }

    public function Pemilih()
    {
        return $this->hasMany(User::class);
    }
}
