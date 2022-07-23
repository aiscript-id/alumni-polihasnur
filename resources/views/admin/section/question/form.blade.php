@extends((auth()->user()->hasRole(['admin', 'superadmin'])) ? 'layouts.admin' : 'layouts.user')
@section('content')

    <div class="pagetitle">
        <h1>Tambah Pertanyaan Penelusuran Alumni</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Section</li>
            <li class="breadcrumb-item">{{ $section->name }}</li>
            <li class="breadcrumb-item active">Tambah Pertanyaan</li>

        </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row justify-content-center">
            {{-- table --}}
            <div class="col-md-12">
                <div class="text-right my-3">
                    <a href="{{ route('section.show', $section->id) }}" class="btn btn-warning">
                        Kembali
                    </a>
                </div>
            </div>
            <div class="col-lg-8 col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pertanyaan</h4>
                        {{-- form pertanyaan --}}
                        <form action="{{ $url }}" method="POST">
                            @csrf
                            @method($method)
                            <div class="form-group">
                                <label for="code">Kode</label>
                                <input type="text" value="{{ $question->code ?? old('code') }}" class="form-control" id="code" name="code" placeholder="Kode">
                            </div>
                            <div class="form-group">
                                <label for="question">Pertanyaan</label>
                                <textarea class="form-control" id="question" name="question" rows="3">{{ $question->question ?? old('question') }}</textarea>
                            </div>
                            @php
                                $types = ['text', 'select', 'date'];
                            @endphp
                            <div class="form-group">
                                <label for="type">Tipe</label>
                                <select class="form-control" id="type" name="type">
                                    <option value="">Pilih Tipe</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type }}" {{ @$question->type == $type ? 'selected' : '' }}>{{ Str::title($type) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="optional">Pilihan Jawaban</label>
                                <input type="text" class="form-control" id="optional" name="optional" value="{{ $question->optional ?? old('optional') }}" />
                            </div>
                            <small>isi pilihan jawaban, untuk pertanyaan bertipe "<b>Select</b>".  </small>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- modal edit --}}

@endsection