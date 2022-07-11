<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'section_id',
        'question',
        'type',
        'optional',
    ];
    

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function getGetOptionalAttribute()
    {
        // explode the string into an array
        $optional = explode(', ', $this->optional);
        $optional = array_map(function ($item) {
            return '<span class="badge badge-primary mr-1">' . $item . '</span>';
        }, $optional);
        // optional is now an array of html elements
        return implode('', $optional);
        // return $optional;
    }

    public function getOptionsAttribute()
    {
        $options = explode(', ', $this->optional);
        // to json
        $options = json_encode($options);
        return $options;
    }



    public function getAnswer($tracerUser)
    {
        $answer = Answer::where('question_id', $this->id)->where('tracer_user_id', $tracerUser->id)->first();
        $answer = $answer ? $answer->answer : null;
        return $answer;
    }
}
