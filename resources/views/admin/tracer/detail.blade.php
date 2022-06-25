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
            <div class="col-xxl-4 col-md-6">
                <div class="card">
                    <div class="card-body py-3">
                        <p class="small p-0">Data Pribadi <br> {{ $tracer_user->section_a }} <small>%</small></p>
                        {{-- progress --}}
                        <div class="progress mb-2">
                            <div class="progress-bar progress-bar-sm progress-bar-striped bg-{{ ($tracer_user->section_a == 100) ? 'success' : 'primary' }} progress-bar-primary animated" role="progressbar" style="width: {{ $tracer_user->section_a }}%" aria-valuenow="{{ $tracer_user->section_a }}" aria-valuemin="0" aria-valuemax="100">
                                {{ $tracer_user->section_a }}
                            </div>
                        </div>
                        <a href="{{ route('admin.tracer.section-a', ['id' => $tracer_user->id]) }}" class="btn btn-outline-primary btn-sm">
                            Lihat Data
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                    <div class="card-body py-3">
                        <p class="small p-0">Riwayat Pendidikan <br> {{ $tracer_user->section_b }} <small>%</small></p>
                        {{-- progress --}}
                        <div class="progress mb-2">
                            <div class="progress-bar progress-bar-sm progress-bar-striped bg-{{ ($tracer_user->section_b == 100) ? 'success' : 'primary' }} progress-bar-primary animated" role="progressbar" style="width: {{ $tracer_user->section_b }}%" aria-valuenow="{{ $tracer_user->section_b }}" aria-valuemin="0" aria-valuemax="100">
                                {{ $tracer_user->section_b }}
                            </div>
                        </div>
                        <a href="{{ route('admin.tracer.section-b', ['id' => $tracer_user->id]) }}" class="btn btn-outline-primary btn-sm">
                            Lihat Data
                        </a>
                    </div>
                </div>
            </div>

            @if ($tracer_user->bekerja != 'tidak')    
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                    <div class="card-body py-3">
                        <p class="small p-0">Riwayat Pekerjaan <br> {{ $tracer_user->section_c }} <small>%</small></p>
                        {{-- progress --}}
                        <div class="progress mb-2">
                            <div class="progress-bar progress-bar-sm progress-bar-striped bg-{{ ($tracer_user->section_c == 100) ? 'success' : 'primary' }} progress-bar-primary animated" role="progressbar" style="width: {{ $tracer_user->section_c }}%" aria-valuenow="{{ $tracer_user->section_c }}" aria-valuemin="0" aria-valuemax="100">
                                {{ $tracer_user->section_c }}
                            </div>
                        </div>
                        <a href="{{ route('admin.tracer.section-c', ['id' => $tracer_user->id]) }}" class="btn btn-outline-primary btn-sm">
                            Lihat Data
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                    <div class="card-body py-3">
                        <p class="small p-0">Relevansi Pekerjaan dan Pendidikan <br> {{ $tracer_user->section_d }} <small>%</small></p>
                        {{-- progress --}}
                        <div class="progress mb-2">
                            <div class="progress-bar progress-bar-sm progress-bar-striped bg-{{ ($tracer_user->section_d == 100) ? 'success' : 'primary' }} progress-bar-primary animated" role="progressbar" style="width: {{ $tracer_user->section_d }}%" aria-valuenow="{{ $tracer_user->section_d }}" aria-valuemin="0" aria-valuemax="100">
                                {{ $tracer_user->section_d }}
                            </div>
                        </div>
                        <a href="{{ route('admin.tracer.section-d', ['id' => $tracer_user->id]) }}" class="btn btn-outline-primary btn-sm">
                            Lihat Data
                        </a>
                    </div>
                </div>
            </div>
            @endif

            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                    <div class="card-body py-3">
                        <p class="small p-0">Pengalaman Pembelajaran <br> {{ $tracer_user->section_e }} <small>%</small></p>
                        {{-- progress --}}
                        <div class="progress mb-2">
                            <div class="progress-bar progress-bar-sm progress-bar-striped bg-{{ ($tracer_user->section_e == 100) ? 'success' : 'primary' }} progress-bar-primary animated" role="progressbar" style="width: {{ $tracer_user->section_e }}%" aria-valuenow="{{ $tracer_user->section_e }}" aria-valuemin="0" aria-valuemax="100">
                                {{ $tracer_user->section_e }}
                            </div>
                        </div>
                        <a href="{{ route('admin.tracer.section-e', ['id' => $tracer_user->id]) }}" class="btn btn-outline-primary btn-sm">
                            Lihat Data
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                    <div class="card-body py-3">
                        <p class="small p-0">Indikator Kompetensi Lulusan <br> {{ $tracer_user->section_f }} <small>%</small></p>
                        {{-- progress --}}
                        <div class="progress mb-2">
                            <div class="progress-bar progress-bar-sm progress-bar-striped bg-{{ ($tracer_user->section_f == 100) ? 'success' : 'primary' }} progress-bar-primary animated" role="progressbar" style="width: {{ $tracer_user->section_f }}%" aria-valuenow="{{ $tracer_user->section_f }}" aria-valuemin="0" aria-valuemax="100">
                                {{ $tracer_user->section_f }}
                            </div>
                        </div>
                        <a href="{{ route('admin.tracer.section-f', ['id' => $tracer_user->id]) }}" class="btn btn-outline-primary btn-sm">
                            Lihat Data
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection