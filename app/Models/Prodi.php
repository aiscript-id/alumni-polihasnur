<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodi';
    protected $fillable = ['name', 'slug', 'description'];
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
