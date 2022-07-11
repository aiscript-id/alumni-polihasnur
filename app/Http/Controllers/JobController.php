<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return if user not verified
        if (!Auth::user()->is_verified) {
            toastr()->error('Akun Anda Belum terverifikasi oleh admin. Silahkan tunggu beberapa saat');
            return redirect()->back();
        }
        $jobs = Auth::user()->jobs;
        return view('user.job.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = route('user.job.store');
        return view('user.job.create', compact('url'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'start_date' => 'required',
            'end_date' => 'nullable',
            'status' => 'required',
            'sesuai_prodi' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'description' => 'nullable',

        ]);

        $data['user_id'] = Auth::user()->id;

        $job = Job::create($data);

        toastr()->success('Pekerjaan berhasil ditambahkan');
        return redirect()->route('user.job');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $url = route('user.job.update', $id);
        $job = Job::where('id', $id)->where('user_id', auth()->user()->id)->first();
        if (!$job) {
            toastr()->error('Pekerjaan tidak ditemukan');
            return redirect()->route('user.job');
        }
        return view('user.job.create', compact('job', 'url'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'start_date' => 'required',
            'end_date' => 'nullable',
            'status' => 'required',
            'sesuai_prodi' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'description' => 'nullable',

        ]);

        $data['user_id'] = Auth::user()->id;

        $job = Job::where('id', $id)->where('user_id', auth()->user()->id)->first();
        if (!$job) {
            toastr()->error('Pekerjaan tidak ditemukan');
            return redirect()->route('user.job');
        }
        $job->update($data);

        toastr()->success('Pekerjaan berhasil diubah');
        return redirect()->route('user.job');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
