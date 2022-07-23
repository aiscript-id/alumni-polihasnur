@extends((auth()->user()->hasRole(['admin', 'superadmin'])) ? 'layouts.admin' : 'layouts.user')
@section('content')
    <div class="pagetitle">
        <h1>Data Pertanyaan Penelusuran Alumni</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Section</li>
            <li class="breadcrumb-item active">{{ $section->name }}</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            {{-- table --}}
            <div class="col-md-12">
                @if (auth()->user()->hasRole(['admin', 'superadmin']))      
                <div class="text-right my-3">
                    <a href="{{ route('question.create', ['section' => $section->id]) }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Create
                    </a>
                    {{-- back --}}
                    <a href="{{ route('section.index') }}" class="btn btn-warning">
                        <i class="fa fa-arrow-left"></i>
                        Back
                    </a>
                </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pertanyaan</h4>
                        <div class="table-responsive">
                            <table class="table datatable" id="datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Pertanyaan</th>
                                        <th>Tipe</th>
                                        <th>Pilihan Jawaban</th>
                                        @if (auth()->user()->hasRole(['admin', 'superadmin']))    
                                        <th class="text-right">Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($questions as $question)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $question->code }}</td>
                                            <td>{{ $question->question }}</td>
                                            <td>{{ $question->type }}</td>
                                            <td>{!! $question->getOptional !!}</td>
                                            @if (auth()->user()->hasRole(['admin', 'superadmin']))   
                                            <td class="text-right">
                                                <a href="{{ route('question.edit', $question->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                    Edit
                                                </a>
                                                {{-- delete form --}}
                                                <form action="{{ route('section.destroy', $question->id) }}" method="POST" class="d-inline show_confirm">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="bi bi-trash"></i>Delete
                                                    </button>
                                                </form>

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

@endsection