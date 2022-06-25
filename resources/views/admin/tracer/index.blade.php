@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        <h1>Tracer Study</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Tracer Study</li>
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
                        <h4 class="card-title">Tracer Study</h4>
                        <div class="table-responsive">
                            <table class="table nowrap datatable" id="datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Tampilkan?</th>
                                        <th class="text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tracers as $tracer)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $tracer->name }}</td>
                                            <td>{{ $tracer->getDate }}</td>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        {{-- <i class="input-helper"></i> --}}
                                                    </label>
                                                    <input type="checkbox" id="publish-{{ $tracer->id }}" class="form-check-input" {{ (@$tracer->publish == 1) ? 'checked' : '' }} onchange="publish({{ $tracer->id }})">
                                                </div>
                                            </td>
                                            
                                            <td class="text-right">
                                                {{-- button detail --}}
                                                <a href="{{ route('tracer.show', $tracer->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-eye"></i>Lihat Hasil
                                                </a>
                                                {{-- button edit modal --}}
                                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit-{{ $tracer->id }}">
                                                    <i class="fa fa-edit"></i>
                                                    Edit
                                                </button>
                                                <form action="{{ route('tracer.destroy', $tracer->id) }}" method="POST" class="d-inline show_confirm">
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
                    <form action="{{ route('tracer.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nama" required>
                            <small class="form-text">Berikan nama yang berbeda pada tiap Tracer Study</small>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {{-- start date --}}
                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                {{-- end date --}}
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-none">
                            <label for="name">Deskripsi</label>
                            <textarea name="description" id="description" cols="2" rows="2" class="form-control" placeholder="Deskripsi"></textarea>
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- modal edit --}}
    @foreach ($tracers as $tracer)
        <div class="modal fade" id="modal-edit-{{ $tracer->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-edit-{{ $tracer->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-edit-{{ $tracer->id }}">Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('tracer.update', $tracer->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nama" value="{{ $tracer->name }}" required>
                                <small class="form-text">Berikan nama yang berbeda pada tiap Tracer Study</small>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {{-- start date --}}
                                    <div class="form-group">
                                        <label for="start_date">Start Date</label>
                                        <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $tracer->start_date }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- end date --}}
                                    <div class
                                    class="form-group">
                                        <label for="end_date">End Date</label>
                                        <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $tracer->end_date }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @push('script')    
    <script>
        function publish(id) {
            $.ajax({
                url: "{{ route('admin.publish') }}",
                type: "PUT",
                data: {
                id: id,
                table:"tracers",
                publish: $('#publish-'+id).prop('checked') ? 1 : 0,
                _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                if (data == 1) {
                    toastr.success('Tracer Study published');
                } else {
                    toastr.success('Tracer Study unpublished');
                }
                }
            });
        }
    </script>
    @endpush



@endsection