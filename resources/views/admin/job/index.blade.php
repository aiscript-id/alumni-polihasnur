@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        <h1>Pekerjaan Alumni</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Pekerjaan Alumni</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                {{-- button --}}
                <a href="{{ route('job.statistic') }}" class="btn btn-sm btn-outline-primary mr-2">Statistik Pekerjaan Alumni</a>
                <a href="{{ route('job.index') }}" class="btn btn-sm btn-primary">Tabel Pekerjaan Alumni</a>
            </div>
            {{-- table --}}
            <div class="col-md-12">
                <div class="text-right my-3">
                    {{-- modal create --}}
                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                        <i class="fa fa-plus"></i>
                        Create
                    </button> --}}
                    
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pekerjaan Alumni</h4>

                        <div class="table-responsive">
                            <table class="table datatable" id="datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Perusahaan/Instansi</th>
                                        <th>Jabatan</th>
                                        <th>Kota</th>
                                        <th class="text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $job)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $job->user->username }}</td>
                                            <td>{{ $job->user->name }}</td>
                                            <td> {{ $job->name }}</td>
                                            <td> {{ $job->position }}</td>
                                            <td> {{ $job->city }}</td>

                                            
                                            <td class="text-right">
                                                
                                                {{-- button edit modal --}}
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit-{{ $job->id }}">
                                                    {{-- <i class="fa fa-edit"></i> --}}
                                                    Detail
                                                </button>
                                                {{-- <form action="{{ route('job.destroy', $job->id) }}" method="POST" class="d-inline show_confirm">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                </form> --}}
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

    {{-- modal edit --}}
    @foreach ($jobs as $job)
        <div class="modal fade" id="modal-edit-{{ $job->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-edit-{{ $job->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-edit-{{ $job->id }}">Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        <section class="profile">
                            <div class="profile-overview">
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nama</div>
                                    <div class="col-lg-9 col-md-8">{{ $job->user->name }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">NIM - Program Studi</div>
                                    <div class="col-lg-9 col-md-8">{{ $job->user->username }} - {{ @$job->user->prodi->name }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Perusahaan/Instansi</div>
                                    <div class="col-lg-9 col-md-8">
                                        <a href="{{ $job->map_link }}" target="_blank">
                                            {{ $job->name }}
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Jabatan</div>
                                    <div class="col-lg-9 col-md-8">{{ $job->position }}</div>
                                </div>
                                {{-- status --}}
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Status Pekerjaan</div>
                                    <div class="col-lg-9 col-md-8">{{ $job->status }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Kota</div>
                                    <div class="col-lg-9 col-md-8">{{ $job->city }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Tahun Bekerja</div>
                                    <div class="col-lg-9 col-md-8">{{ $job->getDate }}</div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 label">Deskripsi</div>
                                    <div class="col-lg-12 col-md-12">{{ $job->description }}</div>
                                </div>

                                {{-- alert --}}
                                {{-- @if (session('success')) --}}
                                <div class="alert alert-{{ ($job->sesuai_prodi == 1) ? 'success' : 'warning' }}">
                                    <i class="bi bi-info-circle mr-2" aria-hidden="true"></i>
                                    <span class="text-sm">
                                        Pekerjaan ini {{ ($job->sesuai_prodi == 0) ? 'kurang' : '' }} sesuai dengan bidang keahlian yang dimiliki
                                    </span>
                                </div>
                                {{-- @endif --}}
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


@endsection