<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionD extends Model
{
    use HasFactory;
    protected $table = 'section_d';
    protected $guarded = '';

    public function tracer_user()
    {
        return $this->belongsTo(TracerUser::class);
    }
}
