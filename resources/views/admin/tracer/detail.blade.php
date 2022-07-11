@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        <h1>Hasil Tracer Study</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Tracer Study</li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="text-right my-3">
                {{-- back --}}
                <a href="{{ route('tracer.show', ['tracer' => $tracer->id]) }}" class="btn btn-sm btn-secondary">Kembali</a>
            </div>
            @foreach ($sections as $section)    
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                    <div class="card-body py-3">
                        <div class="align-items-center">
                        <div class="row mb-3">
                            <div class="col-12">
                            <p class="text-sm mb-0">{{ $section->name }}</p>
                            <span class="text-muted small pt-2">{{ $section->questions->count() }} Pertanyaan</span>
                            </div>
                        </div>
                        {{-- button update data --}}
                        <a href="{{ route('tracer.section', ['id' => $tracer_user->id, 'section' => $section->id]) }}" class="btn btn-block btn-outline-primary btn-sm">
                            Lihat Data
                        </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection