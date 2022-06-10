<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tracer extends Model
{
    protected $fillable = ['name', 'slug', 'start_date', 'end_date', 'publish', 'description'];
    use HasFactory;

    public function getGetDateAttribute()
    {
        // parse to indonesia date
        $start_date = date('d F Y', strtotime($this->start_date));
        $end_date = date('d F Y', strtotime($this->end_date));
        return $start_date . ' - ' . $end_date;
    }

    public function scopeActive()
    {
        return $this->where('publish', 1)->orderBy('start_date', 'desc');
    }

    public function tracer_user()
    {
        return $this->hasMany(TracerUser::class);
    }

    public function my_tracer()
    {
        return $this->hasOne(TracerUser::class)->where('user_id', Auth::user()->id);
    }

}
