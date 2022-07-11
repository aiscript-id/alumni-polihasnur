<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Section;
use App\Models\SectionA;
use App\Models\SectionB;
use App\Models\SectionC;
use App\Models\SectionD;
use App\Models\SectionE;
use App\Models\SectionF;
use App\Models\Tracer;
use App\Models\TracerUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\NodeVisitor\FirstFindingVisitor;

class TracerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $tracers = $user->tracer_user->load('tracer');
        // return response()->json($tracers);

        return view('user.tracer.index', compact('user', 'tracers'));
    }


    public function tracer($slug)
    {
        // if user not verified, redirect to home
        if (!Auth::user()->is_verified) {
            toastr()->error('Akun Anda Belum terverifikasi oleh admin. Silahkan tunggu beberapa saat');
            return redirect()->back();
        }
        $tracer = Tracer::where('slug', $slug)->first();
        $sections = Section::with('questions')->get();
        $tracerUser = $this->createTracerUser($tracer);
        $progress = $tracerUser->progress;

        if ($tracerUser->complete != 1 && $progress == 100) {
            $tracerUser->update([
                'submit_date'   => now(),
                'complete'      => 1
            ]);
        }

        return view('user.tracer.show', compact('tracer', 'tracerUser', 'progress', 'sections'));
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

    public function section(Request $request, $slug, $section)
    {
        $tracer = Tracer::where('slug', $slug)->first();
        $section = Section::find($section);
        $questions = $section->questions;
        $tracerUser = $this->createTracerUser($tracer);
        $answers = $this->createAnswers($tracerUser, $section);

        return view('user.tracer.section', compact('tracer', 'tracerUser', 'section', 'questions'));
    }

    public function createAnswers($tracerUser, $section)
    {
        $answers = $tracerUser->answers()->where('section_id', $section->id)->get();
        if (!$answers->count()) {
            // foreach
            foreach ($section->questions as $question) {
                // firstOrUpdate answer
                $tracerUser->answers()->firstOrCreate([
                    'question_id' => $question->id,
                    'section_id' => $section->id,
                ]);
            }
        }
        return $answers;
    }

    public function answer(Request $request, $id, $section)
    {
        // return response()->json($request->all());
        $tracer_user = TracerUser::find($id);
        $section = Section::find($section);
        $questions = $section->questions;
        foreach($questions as $question) {
            $answer = $tracer_user->answers()->where('question_id', $question->id)->first();
            $answer->answer = $request->input('answer_'.$question->code);
            $answer->save();
        }

        // toastr
        toastr()->success('Jawaban berhasil disimpan');
        return redirect()->route('user.tracer.show', ['slug' => $tracer_user->tracer->slug]);
    }

    public function section_a(Request $request, $slug)
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
            $question = (count($request->except('_token', '_method')));
            $tracerUser = $this->section_update($request, $request->id, 'section_e', $question);
            return redirect()->route('user.tracer.show', $tracerUser->tracer->slug);
        }

        $tracer = Tracer::where('slug', $slug)->first();
        $tracerUser = $this->createTracerUser($tracer);

        $section = SectionE::where('tracer_user_id', $tracerUser->id)
            ->firstOrCreate(['tracer_user_id' => $tracerUser->id,]);

        return view('user.tracer.section.e', compact('tracer', 'tracerUser', 'section'));
    }

    public function section_f(Request $request, $slug)
    {
        if($request->isMethod('put')) {
            $question = (count($request->except('_token', '_method')));
            $tracerUser = $this->section_update($request, $request->id, 'section_f', $question);
            return redirect()->route('user.tracer.show', $tracerUser->tracer->slug);
        }

        $tracer = Tracer::where('slug', $slug)->first();
        $tracerUser = $this->createTracerUser($tracer);

        $section = SectionF::where('tracer_user_id', $tracerUser->id)
            ->firstOrCreate(['tracer_user_id' => $tracerUser->id,]);

        return view('user.tracer.section.f', compact('tracer', 'tracerUser', 'section'));
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
