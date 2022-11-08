<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

   
    protected $fillable = [
        'name',
        'email',
        'password',
        'token',
        'kelas_id',
        'kandidat_id'
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

   
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['role_name'];

    public function getRoleNameAttribute()
    {
        return $this->roles->pluck('name')[0];
    }

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class,'kelas_id');
    }

    
}
