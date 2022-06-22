@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        <h1>Program Studi</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Program Studi</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            {{-- table --}}
            <div class="col-md-12">
                <div class="text-right my-3">
                    {{-- modal create --}}
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                        <i class="fa fa-plus"></i>
                        Create
                    </button>
                    
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Program Studi</h4>

                        <div class="table-responsive">
                            <table class="table" id="datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jumlah Alumni</th>
                                        <th class="text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prodis as $prodi)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $prodi->name }}</td>
                                            <td>
                                                {{ $prodi->users->count() }}
                                            </td>
                                            
                                            <td class="text-right">
                                                {{-- button edit modal --}}
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit-{{ $prodi->id }}">
                                                    <i class="fa fa-edit"></i>
                                                    Edit
                                                </button>
                                                <form action="{{ route('prodi.destroy', $prodi->id) }}" method="POST" class="d-inline show_confirm">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                </form>
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

    

    {{-- modal create --}}
    <div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="modal-create" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-create">Create</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('prodi.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Kode / Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" required placeholder="Contoh : TI">
                        </div>
                        <div class="form-group">
                            <label for="name">Deskripsi</label>
                            <textarea name="description" id="description" cols="2" rows="2" class="form-control" placeholder="Deskripsi"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- modal edit --}}
    @foreach ($prodis as $prodi)
        <div class="modal fade" id="modal-edit-{{ $prodi->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-edit-{{ $prodi->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-edit-{{ $prodi->id }}">Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('prodi.update', $prodi->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nama" value="{{ $prodi->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Kode / Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control" value="{{ $prodi->slug }}" required placeholder="Contoh : TI">
                            </div>
                            <div class="form-group">
                                <label for="name">Deskripsi</label>
                                <textarea name="description" id="description" cols="2" rows="2" class="form-control" placeholder="Deskripsi">{{ $prodi->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


@endsection