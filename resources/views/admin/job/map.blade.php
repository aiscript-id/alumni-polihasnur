@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        <h1>Pemetaan Pekerjaan Alumni</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Pekerjaan Alumni</li>
            <li class="breadcrumb-item active">Pemetaan</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            {{-- table --}}
            <div class="col-md-12">
                <div class="text-right my-3">
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pekerjaan Alumni</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <h5 class="card-title">Program Studi</h5>
                                @foreach ($prodis as $prodi)
                                    {{-- button --}}
                                    <a href="{{ route('job.statistic', ['prodi_id' => $prodi->id]) }}" class="btn btn-primary btn-sm btn-block mb-4">
                                        {{ $prodi->name }}
                                    </a>
                                    <br>
                                @endforeach
                            </div>
                            <div class="col-md-8">
                                {{-- pie chart --}}
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Pemetaan Pekerjaan Alumni</h4>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection