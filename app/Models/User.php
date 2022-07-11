<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // must be filled
        'name', 'email', 'password', 'username', 'avatar', 'is_verified',
        // additional
        'gender', 'born_place', 'born_date', 'prodi_id', 'whatsapp', 'company', 'position', 'angkatan', 'tahun_masuk', 'tahun_lulus', 'address'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getGetAvatarAttribute() {
        return $this->avatar ? asset($this->avatar) : 'https://ui-avatars.com/api/?background=4B49AC&color=fff&name=' . $this->name;;
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

    public function tracer_user()
    {
        return $this->hasMany(TracerUser::class, 'user_id');
    }


    public function jobs()
    {
        return $this->hasMany(Job::class, 'user_id');
    }

    public function lastJob()
    {
        return $this->hasOne(Job::class, 'user_id')->latest();
    }

    public function getFirstNameAttribute()
    {
        return explode(' ', $this->name)[0];
    }
}
