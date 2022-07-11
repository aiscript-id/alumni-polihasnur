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
            {{-- table --}}
            <div class="col-md-12">
                <div class="text-right my-3">
                    {{-- modal create --}}                    
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $tracer->name }}</h4>
                        <div class="table-responsive">
                            <table class="table nowrap datatable" id="datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tanggal Pengerjaan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tracer_users as $tracer_user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $tracer_user->user->name }}</td>
                                            <td>{{ $tracer_user->created_at }}</td>
                                            <td>
                                                <a href="{{ route('tracer.detail', ['tracer_user' => $tracer_user->id]) }}" class="btn btn-sm btn-primary">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection