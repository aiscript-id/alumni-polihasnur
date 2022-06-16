<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getGetDateAttribute()
    {
        // format to indonesian date
        $start_date =  date('d F Y', strtotime($this->start_date)); 
        $end_date = $this->end_date ? date('d F Y', strtotime($this->end_date)) : 'Sekarang';
        return $start_date . ' - '. $end_date;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
