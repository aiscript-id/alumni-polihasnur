@extends('layouts.user')
@section('content')
  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Selamat Datang, {{ Auth::user()->name }}</h5>
            <p>Sistem Informasi Data Alumni Politeknik Hasnur</p>
          </div>
        </div>

        @if ($tracers->count() > 0) 
        <h5 class="card-title">Tracer Study</h5>
        @foreach ($tracers as $tracer)    
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <h5 class="card-title">{{ $tracer->name }}</h5>
                </div>
                <div class="col-md-6 text-left text-md-right">
                  <p class="card-text text-muted mt-3">{{ $tracer->getDate }}</p>
                </div>
              </div>
              <p>{{ \Str::limit($tracer->description, 400, '. . .') }}</p>

              {{-- button show tracer study --}}
              @if (@$tracer->my_tracer->id)
              <a href="{{ route('user.tracer.show', ['slug' => $tracer->slug]) }}" class="btn btn-warning">
                <i class="fa fa-eye"></i>
                Lanjutkan Pengisian Tracer Study
              </a>
              @else
              <a href="{{ route('user.tracer.show', ['slug' => $tracer->slug]) }}" class="btn btn-primary">
                <i class="fa fa-eye"></i>
                Mulai Pengisian Tracer Study
              </a>
              @endif
            </div>
          </div>
        @endforeach   
        @else

        @endif
      </div><!-- End Left side columns -->

    </div>
  </section>
@endsection