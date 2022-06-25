@extends((auth()->user()->hasRole('user')) ? 'layouts.user' : 'layouts.admin')
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

    <section class="section dashboard">
        <div class="row">
            {{-- table --}}
            <div class="col-md-12">
                <div class="text-right my-3">
                    
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">{{ $tracer->name }}</h4>
                        <p class="mb-0"><b>Pengalaman pembelajaran</b> <i class="bi bi-chevron-right"></i>  7 Pertanyaan</p>
                    </div>
                </div>

                @if (auth()->user()->hasRole('user'))    
                
                <form action="{{ route('user.tracer.section-e.update', ['id' => $section->id]) }}" method="post">
                @csrf
                @method('PUT')

                @endif
                @php
                    $data = ['sangat penting', 'penting', 'cukup penting', 'kurang penting', 'tidak penting'];
                @endphp
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pengalaman pembelajaran dan masukan bagi pendidikan di Polihasnur</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Pengalaman belajar di dalam kelas</label>
                                    <select name="e1" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($data as $x => $item)
                                            <option value="{{ $x+1 }}" {{ $section->e1 == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Pengalaman belajar di laboratorium</label>
                                    <select name="e2" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($data as $x => $item)
                                            <option value="{{ $x+1 }}" {{ $section->e2 == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Pengalaman belajar di masyarakat</label>
                                    <select name="e3" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($data as $x => $item)
                                            <option value="{{ $x+1 }}" {{ $section->e3 == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Pengalaman magang di perusahaan/instansi</label>
                                    <select name="e4" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($data as $x => $item)
                                            <option value="{{ $x+1 }}" {{ $section->e4 == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Pengalaman belajar dalam organisasi kemahasiswaan</label>
                                    <select name="e5" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($data as $x => $item)
                                            <option value="{{ $x+1 }}" {{ $section->e5 == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Pengalaman belajar dalam pergaulan kampus</label>
                                    <select name="e6" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($data as $x => $item)
                                            <option value="{{ $x+1 }}" {{ $section->e6 == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Pengalaman belajar mandiri</label>
                                    <select name="e7" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($data as $x => $item)
                                            <option value="{{ $x+1 }}" {{ $section->e7 == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>

                {{-- btn-submit --}}
                {{-- btn-submit --}}
                @if (auth()->user()->hasRole('user'))    
                <div class="text-right">
                    {{-- back --}}
                    <a href="{{ route('user.tracer.show', ['slug' => $tracer->slug]) }}" class="btn btn-warning">
                        <i class="fa fa-arrow-left"></i>
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i>
                        Simpan
                    </button>
                </div>
                
                </form>
                @else 
                <div class="text-right">
                    {{-- back --}}
                    <a href="{{ route('admin.tracer.detail', ['tracer_user' => $tracerUser->id]) }}" class="btn btn-warning">
                        <i class="fa fa-arrow-left"></i>
                        Kembali
                    </a>
                </div>
                @endif
            </div>
        </div>
    </section>

    <script>
        // open_card if b4 = ya
        function open_card(){
            var b31 = $('select[name="b4"]').val();
            var card = $('#card-pendidikan');
            if(b31 == 'ya'){
                card.removeClass('d-none');
            }else{
                card.addClass('d-none');
                card.find('input').val('');
            }
        }

        function open_field(fieldName){
            var field = $('#'+fieldName);
            if(field.hasClass('d-none')){
                field.removeClass('d-none');
            }else{
                field.addClass('d-none');
            }
        }
    </script>

@endsection