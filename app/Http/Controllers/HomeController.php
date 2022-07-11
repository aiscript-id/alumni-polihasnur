<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Prodi;
use App\Models\Section;
use App\Models\Tracer;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('landing-page.welcome');
    }

    public function tentang()
    {
        return view('landing-page.tentang');
    }

    public function kontak()
    {
        return view('landing-page.kontak');
    }

    public function alumni()
    {
        // select user role user
        $users = User::role('user')->where('is_verified', 1)->paginate(10);
        return view('landing-page.alumni.data', compact('users'));
    }

    public function alumni_statistik(Request $request)
    {
        $prodis = Prodi::all();
        $jobs = Job::chartJob();
        return view('landing-page.alumni.statistik', compact('prodis', 'jobs'));
    }

    public function alumni_pekerjaan(Request $request)
    {
        $prodis = Prodi::all();
        $jobs = Job::all();
        return view('landing-page.alumni.pekerjaan', compact('jobs', 'prodis'));
    }

    public function tracer_study()
    {
        // route to user.dashboard
        $tracer = Tracer::active()->first();
        return redirect()->route('user.tracer.show', ['slug' => $tracer->slug]);
        
    }


}
