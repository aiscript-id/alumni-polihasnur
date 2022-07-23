@extends((auth()->user()->hasRole(['admin', 'superadmin'])) ? 'layouts.admin' : 'layouts.user')
@section('content')
    <div class="pagetitle">
        <h1>Data Section Pertanyaan Penelusuran Alumni</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Section</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            {{-- table --}}
            <div class="col-md-12">
                @if (auth()->user()->hasRole(['admin', 'superadmin']))      
                <div class="text-right my-3 d-none">
                    <a href="{{ route('section.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Create
                    </a>
                </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Section</h4>
                        <div class="table-responsive nowrap">
                            <table class="table datatable" id="datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kode</th>
                                        <th>Jumlah Pertanyaan</th>
                                        @if (auth()->user()->hasRole(['admin', 'superadmin']))    
                                        <th class="text-right">Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sections as $section)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $section->name }}</td>
                                            <td>{{ $section->code }}</td>
                                            <td>{{ $section->questions->count() }}</td>
                                            @if (auth()->user()->hasRole(['admin', 'superadmin']))   
                                            <td class="text-right">
                                                {{-- show question --}}
                                                <a href="{{ route('section.show', $section->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="fa fa-eye"></i>Pertanyaan
                                                </a>
                                                {{-- modal edit --}}
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-edit-{{ $section->id }}">
                                                    <i class="bi bi-edit"></i>Edit
                                                </button>
                                            </td>
                                            @endif
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
    @foreach ($sections as $section)
    <div class="modal fade" id="modal-edit-{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-edit" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-edit">Edit Section</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('section.update', $section->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $section->name }}">
                        </div>
                        <div class="form-group">
                            <label for="code">Kode</label>
                            <input type="text" class="form-control" id="code" name="code" value="{{ $section->code }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach


@endsection