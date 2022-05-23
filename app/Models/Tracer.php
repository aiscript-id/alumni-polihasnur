<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracer extends Model
{
    protected $fillable = ['name', 'slug', 'start_date', 'end_date', 'status', 'description'];
    use HasFactory;

    public function getGetDateAttribute()
    {
        // parse to indonesia date
        $start_date = date('d F Y', strtotime($this->start_date));
        $end_date = date('d F Y', strtotime($this->end_date));
        return $start_date . ' - ' . $end_date;
    }
}
