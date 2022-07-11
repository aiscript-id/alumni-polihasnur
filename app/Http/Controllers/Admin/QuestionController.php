<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Section;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $section = Section::findOrFail($request->section);
        $url = route('question.store', ['section' => $section->id]);
        $method = 'POST';
        return view('admin.section.question.form', compact('section', 'url', 'method'));
    }

    public function store(Request $request)
    {
        // return response()->json($request->all());
        $data = $request->validate([
            'code' => 'required|unique:questions,code',
            'question' => 'required',
            'type' => 'required',
            'optional' => 'nullable',
        ]);

        $section = Section::find($request->section);
        $section->questions()->create($data);
        toastr()->success('Question created successfully.');
        return redirect()->route('section.show', $section->id)->withInput();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $section = $question->section;
        $url = route('question.update', ['question' => $question->id]);
        $method = 'PUT';
        return view('admin.section.question.form', compact('question', 'section', 'url', 'method'));

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
        //
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
