@extends('layouts.user')
@section('content')
  <div class="pagetitle">
    <h1>Pekerjaan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Pekerjaan</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <h5 class="card-title mb-0">Riwayat Pekerjaan Alumni</h5>
              </div>
              <div class="col-md-6 text-left text-md-right">
                {{-- create --}}
                <a href="{{ route('user.job.create') }}" class="btn btn-primary mt-3">
                  <i class="fa fa-plus"></i>
                  Tambah Pekerjaan
                </a>
              </div>
            </div>
            
          </div>
        </div>
      </div>

      @if ($jobs->count() > 0)
      <div class="col-md-12"> 
        {{-- <h5 class="card-title">Riwayat Pekerjaan Alumni</h5> --}}
        @foreach ($jobs as $job)    
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <h5 class="card-title">{{ $job->name }}</h5>
                </div>
                <div class="col-md-6 text-left text-md-right">
                  <p class="card-text text-muted mt-3">{{ $job->getDate }}</p>
                </div>
              </div>
              <p>{{ \Str::limit($job->description, 400, '. . .') }}</p>
  
              {{-- button show Penelusuran Alumni --}}
              <a href="{{ route('user.job.edit', ['id' => $job->id]) }}" class="btn btn-primary">
                <i class="fa fa-eye"></i>
                Lihat Detail
              </a>
            </div>
          </div>
        @endforeach
      </div>
      @else

      @endif

    </div>
  </section>
@endsection