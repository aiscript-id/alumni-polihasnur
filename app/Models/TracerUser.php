<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TracerUser extends Model
{
    use HasFactory;

    protected $table = 'tracer_user';
    protected $fillable = [
        'tracer_id', 'user_id', 
        'section_a', 'section_b', 'section_c', 'section_d', 'section_e', 'section_f',
        'bekerja', 'submit_date', 'complete'
    ];

    public function tracer()
    {
        return $this->belongsTo('App\Models\Tracer');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getProgressAttribute()
    {
        $total = $this->section_a +  $this->section_b + $this->section_e + $this->section_f;
        if ($this->bekerja != 'tidak') {
            $total += $this->section_c + $this->section_d;
            $question = 6;
        }
        $progress = round(($total / (@$question ?? 4)), 0);

        return $progress;
    }

    // get jsubmit_date
    public function getGetSubmitDateAttribute()
    {
        $date = @$this->submit_date ? date('d F Y', strtotime($this->submit_date)) : '-';
        return $date;
    }


}
