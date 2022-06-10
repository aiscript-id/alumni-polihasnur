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
                        <a href="{{ route('user.tracer.section-a', ['slug' => $tracer->slug]) }}" class="btn btn-outline-primary btn-sm">
                            Lihat Data
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                <div class="card-body py-3">
                    <div class="align-items-center">
                    <div class="row">
                        <div class="col-9">
                        <h6>{{ $tracer_user->section_b }} <small>%</small></h6> 
                        <span class="text-muted small pt-2">Riwayat Pendidikan</span>
                        </div>
                        <div class="col-3">
                        @if ($tracer_user->section_b == 100)
                        <img src="{{ asset('assets/check-mark.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" style="height:50px" alt="">
                        @endif
                        </div>
                    </div>
                    <a href="{{ route('user.tracer.section-b', ['slug' => $tracer->slug]) }}" class="mt-3 btn btn-outline-{{ ($tracer_user->section_b == 100) ? 'success' : 'primary' }} btn-block btn-sm">
                        @if ($tracer_user->section_b < 100)
                        <i class="bi bi-pencil-square"></i>
                        @endif
                        {{ ($tracer_user->section_b == 100) ? 'Data Telah Lengkap' : 'Lengkapi Data' }}
                    </a>
                    </div>
                </div>
                </div>
            </div>

            @if ($tracer_user->bekerja != 'tidak')    
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                <div class="card-body py-3">
                    <div class="align-items-center">
                    <div class="row">
                        <div class="col-9">
                        <h6>{{ $tracer_user->section_c }} <small>%</small></h6> 
                        <span class="text-muted small pt-2">Riwayat Pekerjaan</span>
                        </div>
                        <div class="col-3">
                        @if ($tracer_user->section_c == 100)
                        <img src="{{ asset('assets/check-mark.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" style="height:50px" alt="">
                        @endif
                        </div>
                    </div>
                    <a href="{{ route('user.tracer.section-c', ['slug' => $tracer->slug]) }}" class="mt-3 btn btn-outline-{{ ($tracer_user->section_c == 100) ? 'success' : 'primary' }} btn-block btn-sm">
                        @if ($tracer_user->section_c < 100)
                        <i class="bi bi-pencil-square"></i>
                        @endif
                        {{ ($tracer_user->section_c == 100) ? 'Data Telah Lengkap' : 'Lengkapi Data' }}
                    </a>
                    </div>
                </div>
                </div>
            </div>

            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                <div class="card-body py-3">
                    <div class="align-items-center">
                    <div class="row">
                        <div class="col-9">
                        <h6>{{ $tracer_user->section_d }} <small>%</small></h6> 
                        <span class="text-muted small pt-2">Relevansi Pekerjaan dan Pendidikan</span>
                        </div>
                        <div class="col-3">
                        @if ($tracer_user->section_d == 100)
                        <img src="{{ asset('assets/check-mark.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" style="height:50px" alt="">
                        @endif
                        </div>
                    </div>
                    <a href="{{ route('user.tracer.section-d', ['slug' => $tracer->slug]) }}" class="mt-3 btn btn-outline-{{ ($tracer_user->section_d == 100) ? 'success' : 'primary' }} btn-block btn-sm">
                        @if ($tracer_user->section_d < 100)
                        <i class="bi bi-pencil-square"></i>
                        @endif
                        {{ ($tracer_user->section_d == 100) ? 'Data Telah Lengkap' : 'Lengkapi Data' }}
                    </a>
                    </div>
                </div>
                </div>
            </div>
            @endif

            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                <div class="card-body py-3">
                    <div class="align-items-center">
                    <div class="row">
                        <div class="col-9">
                        <h6>{{ $tracer_user->section_e }} <small>%</small></h6> 
                        <span class="text-muted small pt-2">Pengalaman Pembelajaran</span>
                        </div>
                        <div class="col-3">
                        @if ($tracer_user->section_e == 100)
                        <img src="{{ asset('assets/check-mark.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" style="height:50px" alt="">
                        @endif
                        </div>
                    </div>
                    <a href="{{ route('user.tracer.section-e', ['slug' => $tracer->slug]) }}" class="mt-3 btn btn-outline-{{ ($tracer_user->section_e == 100) ? 'success' : 'primary' }} btn-block btn-sm">
                        @if ($tracer_user->section_e < 100)
                        <i class="bi bi-pencil-square"></i>
                        @endif
                        {{ ($tracer_user->section_e == 100) ? 'Data Telah Lengkap' : 'Lengkapi Data' }}
                    </a>
                    </div>
                </div>
                </div>
            </div>

            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                <div class="card-body py-3">
                    <div class="align-items-center">
                    <div class="row">
                        <div class="col-9">
                        <h6>{{ $tracer_user->section_f }} <small>%</small></h6> 
                        <span class="text-muted small pt-2">Indikator Kompetensi Lulusan</span>
                        </div>
                        <div class="col-3">
                        @if ($tracer_user->section_f == 100)
                        <img src="{{ asset('assets/check-mark.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" style="height:50px" alt="">
                        @endif
                        </div>
                    </div>
                    <a href="{{ route('user.tracer.section-f', ['slug' => $tracer->slug]) }}" class="mt-3 btn btn-outline-{{ ($tracer_user->section_f == 100) ? 'success' : 'primary' }} btn-block btn-sm">
                        @if ($tracer_user->section_f < 100)
                        <i class="bi bi-pencil-square"></i>
                        @endif
                        {{ ($tracer_user->section_f == 100) ? 'Data Telah Lengkap' : 'Lengkapi Data' }}
                    </a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
@endsection