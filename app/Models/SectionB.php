<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionB extends Model
{
    use HasFactory;
    protected $table = 'section_b';
    protected $guarded = '';

    public function tracer_user()
    {
        return $this->belongsTo(TracerUser::class);
    }
}
