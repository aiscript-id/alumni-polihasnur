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

    public function scopeSesuaiProdi($query)
    {
        // group by user and where sesuai_prodi = 1
        return $query->groupBy('user_id')->where('sesuai_prodi', 1)->count();
    }

    public function scopeBelumSesuaiProdi($query)
    {
        // group by user and where sesuai_prodi = 0
        return $query->groupBy('user_id')->where('sesuai_prodi', 0)->count();
    }

    public function scopeBelumBekerja($query)
    {
        $user_job = $query->groupBy('user_id')->pluck('user_id')->toArray();
        $users = User::role('user')->whereNotIn('id', $user_job)->count();
        return $users;

    }

    public function scopeChartJob($query)
    {
        $data = User::role('user');
        if (request()->has('prodi_id')) {
            $data = $data->where('prodi_id', request('prodi_id'));
        }
        $users = $data->pluck('id')->toArray();

        $sesuaiProdi = 0;
        $belumSesuaiProdi = 0;
        $belumBekerja = 0;
        foreach ($users as $user) {
            $job = Job::where('user_id', $user)->latest()->first();
            if ($job) {
                if ($job->sesuai_prodi) {
                    $sesuaiProdi++;
                } else {
                    $belumSesuaiProdi++;
                }
            } else {
                $belumBekerja++;
            }
        }

        $result =  [
            [
                'name' => 'Sesuai Prodi',
                'count' => $sesuaiProdi,
            ],
            [
                'name' => 'Belum Sesuai Prodi',
                'count' => $belumSesuaiProdi,
            ],
            [
                'name' => 'Belum Bekerja',
                'count' => $belumBekerja,
            ],
        ];

        // result to json
        return $result;

    }
}
