<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\SectionA;
use App\Models\SectionB;
use App\Models\SectionC;
use App\Models\SectionD;
use App\Models\SectionE;
use App\Models\Tracer;
use App\Models\TracerUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TracerController extends Controller
{
    public function tracer($slug)
    {
        $tracer = Tracer::where('slug', $slug)->first();
        $tracerUser = $this->createTracerUser($tracer);
        $progress = $tracerUser->progress;

        return view('user.tracer.index', compact('tracer', 'tracerUser', 'progress'));
    }



    public function createTracerUser($tracer)
    {
        $tracerUser = $tracer->tracer_user()->where('user_id', Auth::user()->id)->first();
        if (!$tracerUser) {
            $tracerUser = $tracer->tracer_user()->create([
                'tracer_id' => $tracer->id,
                'user_id' => Auth::user()->id,
            ]);
        }

        return $tracerUser;
    }

    public function sectioe(Request $request, $slug)
    {
        if($request->isMethod('put')) {
            $tracerUser = $this->section_update($request, $request->id, 'section_a', 15);
            return redirect()->route('user.tracer.show', $tracerUser->tracer->slug);
        }

        $tracer = Tracer::where('slug', $slug)->first();
        $tracerUser = $this->createTracerUser($tracer);

        $section = SectionA::where('tracer_user_id', $tracerUser->id)
            ->firstOrCreate(['tracer_user_id' => $tracerUser->id,]);

        return view('user.tracer.section.a', compact('tracer', 'tracerUser', 'section'));
    }

    public function section_b(Request $request, $slug)
    {
        if($request->isMethod('put')) {
            $question = (count($request->except('_token', '_method')));
            if ($request->b31 == 'ya') { $question -= 1; }
            if ($request->b4 == 'tidak') { $question -= 5; }

            $tracerUser = $this->section_update($request, $request->id, 'section_b', $question);

            if ($request->bx4 == 'tidak') {
                $tracerUser->update([
                    'section_c' => 100,
                    'section_d' => 100,
                    'bekerja'   => 'tidak',
                ]);
            } else {
                $tracerUser->update([
                    'section_c' => 0,
                    'section_d' => 0,
                    'bekerja'   => 'ya',
                ]);
            }
            return redirect()->route('user.tracer.show', $tracerUser->tracer->slug);
        }

        $tracer = Tracer::where('slug', $slug)->first();
        $tracerUser = $this->createTracerUser($tracer);

        $section = SectionB::where('tracer_user_id', $tracerUser->id)
            ->firstOrCreate(['tracer_user_id' => $tracerUser->id,]);

        $prodis = Prodi::get();

        return view('user.tracer.section.b', compact('tracer', 'tracerUser', 'section', 'prodis'));
    }

    public function section_c(Request $request, $slug)
    {
        if($request->isMethod('put')) {
            $question = (count($request->except('_token', '_method')));
            if ($request->cx3 == 'tidak') { $question -= 14; }
            $tracerUser = $this->section_update($request, $request->id, 'section_c', $question);
            return redirect()->route('user.tracer.show', $tracerUser->tracer->slug);
        }

        $tracer = Tracer::where('slug', $slug)->first();
        $tracerUser = $this->createTracerUser($tracer);

        $section = SectionC::where('tracer_user_id', $tracerUser->id)
            ->firstOrCreate(['tracer_user_id' => $tracerUser->id,]);

        return view('user.tracer.section.c', compact('tracer', 'tracerUser', 'section'));
    }

    public function section_d(Request $request, $slug)
    {
        if($request->isMethod('put')) {
            $question = (count($request->except('_token', '_method')));
            if ($request->d11 == 'ya') { $question -= 1; }
            $tracerUser = $this->section_update($request, $request->id, 'section_d', $question);
            return redirect()->route('user.tracer.show', $tracerUser->tracer->slug);
        }

        $tracer = Tracer::where('slug', $slug)->first();
        $tracerUser = $this->createTracerUser($tracer);

        $section = SectionD::where('tracer_user_id', $tracerUser->id)
            ->firstOrCreate(['tracer_user_id' => $tracerUser->id,]);

        return view('user.tracer.section.d', compact('tracer', 'tracerUser', 'section'));
    }

    public function section_e(Request $request, $slug)
    {
        if($request->isMethod('put')) {
            $tracerUser = $this->section_update($request, $request->id, 'section_e', 7);
            return redirect()->route('user.tracer.show', $tracerUser->tracer->slug);
        }

        $tracer = Tracer::where('slug', $slug)->first();
        $tracerUser = $this->createTracerUser($tracer);

        $section = SectionE::where('tracer_user_id', $tracerUser->id)
            ->firstOrCreate(['tracer_user_id' => $tracerUser->id,]);

        return view('user.tracer.section.e', compact('tracer', 'tracerUser', 'section'));
    }

    public function section_update(Request $request, $id, $table, $question)
    {
        // dd($request);
        $data = $request->except('_method', '_token');
        $section = DB::table($table)->where('id', $id);
        $section->update($data);

        // count null value from all input
        $countValue = $this->countValue($data, $question);
        $tracerUser = TracerUser::find($section->first()->tracer_user_id);
        $tracerUser->update([
            $table => $countValue,
        ]);

        toastr()->success('Data Berhasil Di Update');
        return $tracerUser;
    }
    

    public function countValue($request, $question)
    {
        $count = 0;
        foreach ($request as $key => $value) {
            if ($value != null) {
                $count++;
            }
        }

        $countValue = (($count)  / $question) * 100;
        $result  = ($countValue > 100) ? 100 : $countValue;
        return $result;
    }
}
