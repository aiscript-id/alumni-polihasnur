<?php

namespace App\Http\Controllers\Api;

use App\Outlet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Job as JobResource;
use App\Models\Job;

class JobController extends Controller
{
    /**
     * Get outlet listing on Leaflet JS geoJSON data structure.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $jobs = Job::all();
        if (@$request->prodi_id) {
            $jobs = Job::join('users', 'users.id', '=', 'jobs.user_id')
                ->where('users.prodi_id', request()->prodi_id)
                ->get();
        }

        $geoJSONdata = $jobs->map(function ($job) {
            return [
                'type'       => 'Feature',
                'properties' => new JobResource($job),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $job->longitude,
                        $job->latitude,
                    ],
                ],
            ];
        });

        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }
}
