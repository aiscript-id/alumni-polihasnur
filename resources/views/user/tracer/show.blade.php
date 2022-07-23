@extends('layouts.user')
@section('content')
  <div class="pagetitle">
    <h1>Penelusuran Alumni</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('user') }}">Home</a></li>
        <li class="breadcrumb-item active">Penelusuran Alumni</li>
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
              Batas waktu pengisian Penelusuran Alumni ini adalah <b>{{ $tracer->getDate }}</b>
            </div>
          </div>
        </div>
      </div><!-- End Left side columns -->

      {{-- card hover --}}

      @foreach ($sections as $section)    
      <div class="col-xxl-4 col-md-6">
        <div class="card info-card sales-card">
          <div class="card-body py-3">
            <div class="align-items-center">
              <div class="row">
                <div class="col-12">
                  <p class="text-sm mb-0">{{ $section->name }}</p>
                  <span class="text-muted small pt-2">{{ $section->questions->count() }} Pertanyaan</span>
                </div>
              </div>
              {{-- button update data --}}
              <a href="{{ route('user.tracer.section', ['slug' => $tracer->slug, 'section' => $section->id]) }}" class="mt-3 btn btn-outline-primary btn-block btn-sm">
                Lengkapi Data
              </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </section>
@endsection