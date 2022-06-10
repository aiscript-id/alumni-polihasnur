<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionF extends Model
{
    use HasFactory;
    protected $table = 'section_f';
    protected $guarded = '';

    public function tracer_user()
    {
        return $this->belongsTo(TracerUser::class);
    }
}
