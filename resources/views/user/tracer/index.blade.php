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

  @if ($tracers->count() > 0) 
    {{-- <h5 class="card-title">Tracer Study</h5> --}}
    @foreach ($tracers as $tracer)    
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <h5 class="card-title">{{ $tracer->tracer->name }}</h5>
            </div>
            <div class="col-md-6 text-left text-md-right">
              <p class="card-text text-muted mt-3 small">{{ $tracer->tracer->getDate }}</p>
            </div>
          </div>
          <p class="small">{{ $tracer->tracer->description }}</p>
          {{-- button show tracer study --}}
          @if ($tracer->progress == 100)
            {{-- alert --}}
            <div class="alert alert-success small" role="alert"> Anda telah menyelesaikan Tracer Study ini pada {{ $tracer->getSubmitDate }}</div>
          @else
            <p class="card-text small">Progress</p>
            <div class="progress mb-4">
              <div class="progress-bar progress-bar-striped bg-{{ ($tracer->progress == 100) ? 'success' : 'primary' }} progress-bar-primary animated" role="progressbar" style="width: {{ $tracer->progress }}%" aria-valuenow="{{ $tracer->progress }}" aria-valuemin="0" aria-valuemax="100">
                {{ $tracer->progress }}%
              </div>
            </div>
          @endif
          @if (@$tracer->tracer->my_tracer->id)
          <a href="{{ route('user.tracer.show', ['slug' => $tracer->tracer->slug]) }}" class="btn btn-{{ ($tracer->progress == 100) ? 'outline-success' : 'warning' }}">
            <i class="fa fa-eye"></i>
            {{ ($tracer->progress == 100) ? 'Lihat Tracer Study' : 'Lanjutkan Pengisian Tracer Study' }}
          </a>
          @else
          <a href="{{ route('user.tracer.show', ['slug' => $tracer->tracer->slug]) }}" class="btn btn-primary">
            <i class="fa fa-eye"></i>
            Mulai Pengisian Tracer Study
          </a>
          @endif
        </div>
      </div>
    @endforeach   
    @else
    {{-- image --}}
    <div class="card">
      <div class="card-body">
        <div class="row justify-content-center mt-5">
          <div class="col-md-4 text-center">
            <img src="{{ asset('assets/images/selection.svg') }}" alt="tracer" class="img-fluid p-4">
            {{-- belum ada data --}}
            <h5 class="alert-heading mt-3">Belum ada Tracer Study</h5>
            <p class="">Silahkan lakukan pengisian Tracer Study untuk mengikuti kuisioner</p>
          </div>
        </div>
      </div>
    </div>
    @endif
@endsection