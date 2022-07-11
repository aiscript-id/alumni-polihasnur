@extends('layouts.user')
@section('content')
  <div class="pagetitle">
    <h1>Tracer Study</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('user') }}">Home</a></li>
        <li class="breadcrumb-item active">Tracer Study</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">     
    
      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{  $tracer->name }}</h5>
            <p>{{ $tracer->description }}</p>
            {{-- alert --}}
            <div class="alert alert-warning small">
              Batas waktu pengisian tracer study ini adalah <b>{{ $tracer->getDate }}</b>
            </div>
          </div>
        </div>
      </div><!-- End Left side columns -->

      {{-- card hover --}}

      <div class="col-lg-12">
        {{-- progress section --}}
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Progress</h5>
            <div class="progress">
              <div class="progress-bar progress-bar-striped bg-{{ ($progress == 100) ? 'success' : 'primary' }} progress-bar-primary animated" role="progressbar" style="width: {{ $progress }}%" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">
                {{ $progress }}%
              </div>
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
                  <h6>{{ $tracerUser->section_a }} <small>%</small></h6> 
                  <span class="text-muted small pt-2">Data Pribadi</span>
                </div>
                @if ($tracerUser->section_a == 100)
                <div class="col-3">
                  <img src="{{ asset('assets/check-mark.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" style="height:50px" alt="">
                </div>
                @endif
              </div>
              {{-- button update data --}}
              <a href="{{ route('user.tracer.section-a', ['slug' => $tracer->slug]) }}" class="mt-3 btn btn-outline-{{ ($tracerUser->section_a == 100) ? 'success' : 'primary' }} btn-block btn-sm">
                @if ($tracerUser->section_a < 100)
                  <i class="bi bi-pencil-square"></i>
                @endif
                {{ ($tracerUser->section_a == 100) ? 'Data Telah Lengkap' : 'Lengkapi Data' }}
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
                  <h6>{{ $tracerUser->section_b }} <small>%</small></h6> 
                  <span class="text-muted small pt-2">Riwayat Pendidikan</span>
                </div>
                <div class="col-3">
                  @if ($tracerUser->section_b == 100)
                  <img src="{{ asset('assets/check-mark.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" style="height:50px" alt="">
                  @endif
                </div>
              </div>
              <a href="{{ route('user.tracer.section-b', ['slug' => $tracer->slug]) }}" class="mt-3 btn btn-outline-{{ ($tracerUser->section_b == 100) ? 'success' : 'primary' }} btn-block btn-sm">
                @if ($tracerUser->section_b < 100)
                  <i class="bi bi-pencil-square"></i>
                @endif
                {{ ($tracerUser->section_b == 100) ? 'Data Telah Lengkap' : 'Lengkapi Data' }}
              </a>
            </div>
          </div>
        </div>
      </div>

      @if ($tracerUser->bekerja != 'tidak')    
      <div class="col-xxl-4 col-md-6">
        <div class="card info-card sales-card">
          <div class="card-body py-3">
            <div class="align-items-center">
              <div class="row">
                <div class="col-9">
                  <h6>{{ $tracerUser->section_c }} <small>%</small></h6> 
                  <span class="text-muted small pt-2">Riwayat Pekerjaan</span>
                </div>
                <div class="col-3">
                  @if ($tracerUser->section_c == 100)
                  <img src="{{ asset('assets/check-mark.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" style="height:50px" alt="">
                  @endif
                </div>
              </div>
              <a href="{{ route('user.tracer.section-c', ['slug' => $tracer->slug]) }}" class="mt-3 btn btn-outline-{{ ($tracerUser->section_c == 100) ? 'success' : 'primary' }} btn-block btn-sm">
                @if ($tracerUser->section_c < 100)
                  <i class="bi bi-pencil-square"></i>
                @endif
                {{ ($tracerUser->section_c == 100) ? 'Data Telah Lengkap' : 'Lengkapi Data' }}
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
                  <h6>{{ $tracerUser->section_d }} <small>%</small></h6> 
                  <span class="text-muted small pt-2">Relevansi Pekerjaan dan Pendidikan</span>
                </div>
                <div class="col-3">
                  @if ($tracerUser->section_d == 100)
                  <img src="{{ asset('assets/check-mark.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" style="height:50px" alt="">
                  @endif
                </div>
              </div>
              <a href="{{ route('user.tracer.section-d', ['slug' => $tracer->slug]) }}" class="mt-3 btn btn-outline-{{ ($tracerUser->section_d == 100) ? 'success' : 'primary' }} btn-block btn-sm">
                @if ($tracerUser->section_d < 100)
                  <i class="bi bi-pencil-square"></i>
                @endif
                {{ ($tracerUser->section_d == 100) ? 'Data Telah Lengkap' : 'Lengkapi Data' }}
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
                  <h6>{{ $tracerUser->section_e }} <small>%</small></h6> 
                  <span class="text-muted small pt-2">Pengalaman Pembelajaran</span>
                </div>
                <div class="col-3">
                  @if ($tracerUser->section_e == 100)
                  <img src="{{ asset('assets/check-mark.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" style="height:50px" alt="">
                  @endif
                </div>
              </div>
              <a href="{{ route('user.tracer.section-e', ['slug' => $tracer->slug]) }}" class="mt-3 btn btn-outline-{{ ($tracerUser->section_e == 100) ? 'success' : 'primary' }} btn-block btn-sm">
                @if ($tracerUser->section_e < 100)
                  <i class="bi bi-pencil-square"></i>
                @endif
                {{ ($tracerUser->section_e == 100) ? 'Data Telah Lengkap' : 'Lengkapi Data' }}
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
                  <h6>{{ $tracerUser->section_f }} <small>%</small></h6> 
                  <span class="text-muted small pt-2">Indikator Kompetensi Lulusan</span>
                </div>
                <div class="col-3">
                  @if ($tracerUser->section_f == 100)
                  <img src="{{ asset('assets/check-mark.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" style="height:50px" alt="">
                  @endif
                </div>
              </div>
              <a href="{{ route('user.tracer.section-f', ['slug' => $tracer->slug]) }}" class="mt-3 btn btn-outline-{{ ($tracerUser->section_f == 100) ? 'success' : 'primary' }} btn-block btn-sm">
                @if ($tracerUser->section_f < 100)
                  <i class="bi bi-pencil-square"></i>
                @endif
                {{ ($tracerUser->section_f == 100) ? 'Data Telah Lengkap' : 'Lengkapi Data' }}
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
@endsection