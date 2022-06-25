<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prodi;
use App\Models\SectionA;
use App\Models\SectionB;
use App\Models\SectionC;
use App\Models\SectionD;
use App\Models\SectionE;
use App\Models\SectionF;
use App\Models\Tracer;
use App\Models\TracerUser;
use Illuminate\Http\Request;
use Illuminate\Support\Js;

class TracerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tracers = Tracer::paginate(10);
        return view('admin.tracer.index', compact('tracers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $slug = \Str::slug($request->name);
        $tracer = Tracer::where('slug', $slug)->first();

        if ($tracer) {
            toastr()->error('Data sudah ada, Silahkan Gunakan Nama Lain');
            return redirect()->route('tracer.index');
        }

        $tracer = Tracer::create([
            'name' => $request->name,
            'slug' => $slug,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => 1,
            'description' => $request->description,
        ]);

        toastr()->success('Data berhasil ditambahkan');
        return redirect()->route('tracer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tracer = Tracer::findOrFail($id);
        $tracer_users = $tracer->tracer_user()->get();
        // return response()->json($tracer);
        return view('admin.tracer.show', compact('tracer', 'tracer_users'));
    }

    public function detail($tracer_user)
    {
        $tracer_user = TracerUser::findOrFail($tracer_user);
        $tracer = $tracer_user->tracer;
        // return response()->json($tracer_user);
        return view('admin.tracer.detail', compact('tracer_user', 'tracer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $slug = \Str::slug($request->name);
        $tracer = Tracer::where('slug', $slug)->where('id', '!=' , $id)->first();

        if ($tracer) {
            toastr()->error('Data sudah ada, Silahkan Gunakan Nama Lain');
            return redirect()->route('tracer.index');
        }

        $tracer = Tracer::findOrFail($id);
        $data = [
            'name' => $request->name,
            'slug' => $slug,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => 1,
            'description' => $request->description,
        ];

        $tracer->update($data);

        toastr()->success('Data berhasil diubah');
        return redirect()->route('tracer.index');
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

    public function sectionA($id)
    {
        $tracerUser = TracerUser::findOrFail($id);
        $tracer = $tracerUser->tracer;
        $section = SectionA::where('tracer_user_id', $tracerUser->id)->first();
        if (!$section) {
            $section = new SectionA();
            $section->tracer_user_id = $tracerUser->id;
            $section->save();
        }
        // return response()->json($section);

        return view('user.tracer.section.a', compact('tracer', 'tracerUser', 'section'));
    }

    public function sectionB($id)
    {
        $tracerUser = TracerUser::findOrFail($id);
        $tracer = $tracerUser->tracer;
        $section = SectionB::where('tracer_user_id', $tracerUser->id)->first();
        if (!$section) {
            $section = new SectionB();
            $section->tracer_user_id = $tracerUser->id;
            $section->save();
        }
        $prodis = Prodi::get();


        return view('user.tracer.section.b', compact('tracer', 'tracerUser', 'section', 'prodis'));
    }

    public function sectionC($id)
    {
        $tracerUser = TracerUser::findOrFail($id);
        $tracer = $tracerUser->tracer;
        $section = SectionC::where('tracer_user_id', $tracerUser->id)->first();
        if (!$section) {
            $section = new SectionC();
            $section->tracer_user_id = $tracerUser->id;
            $section->save();
        }
        // return response()->json($section);

        return view('user.tracer.section.c', compact('tracer', 'tracerUser', 'section'));
    }

    public function sectionD($id)
    {
        $tracerUser = TracerUser::findOrFail($id);
        $tracer = $tracerUser->tracer;
        $section = SectionD::where('tracer_user_id', $tracerUser->id)->first();
        if (!$section) {
            $section = new SectionD();
            $section->tracer_user_id = $tracerUser->id;
            $section->save();
        }
        // return response()->json($section);

        return view('user.tracer.section.d', compact('tracer', 'tracerUser', 'section'));
    }

    public function sectionE($id)
    {
        $tracerUser = TracerUser::findOrFail($id);
        $tracer = $tracerUser->tracer;
        $section = SectionE::where('tracer_user_id', $tracerUser->id)->first();
        if (!$section) {
            $section = new SectionE();
            $section->tracer_user_id = $tracerUser->id;
            $section->save();
        }
        // return response()->json($section);

        return view('user.tracer.section.e', compact('tracer', 'tracerUser', 'section'));
    }

    public function sectionF($id)
    {
        $tracerUser = TracerUser::findOrFail($id);
        $tracer = $tracerUser->tracer;
        $section = SectionF::where('tracer_user_id', $tracerUser->id)->first();
        if (!$section) {
            $section = new SectionF();
            $section->tracer_user_id = $tracerUser->id;
            $section->save();
        }
        // return response()->json($section);

        return view('user.tracer.section.f', compact('tracer', 'tracerUser', 'section'));
    }
}
