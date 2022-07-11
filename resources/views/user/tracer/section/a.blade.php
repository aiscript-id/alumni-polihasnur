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
                        <p class="mb-0"><b>Data Pribadi</b> <i class="bi bi-chevron-right"></i>  15 Pertanyaan</p>
                    </div>
                </div>

                @if (auth()->user()->hasRole('user'))    

                <form action="{{ route('user.tracer.section-a.update', ['id' => $section->id]) }}" method="post">
                @csrf
                @method('PUT')
                @endif


                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Asal Sekolah Menengah Atas</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama Sekolah</label>
                                    <input type="text" class="form-control" name="a31" value="{{ $section->a31 }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Kabupaten / Kota</label>
                                    <input type="text" class="form-control" name="a32" value="{{ $section->a32 }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Provinsi</label>
                                    <input type="text" class="form-control" name="a33" value="{{ $section->a33 }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Kode Pos</label>
                                    <input type="text" class="form-control" name="a34" value="{{ $section->a34 }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Alamat Kantor</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Alamat Kantor</label>
                                    <textarea class="form-control" name="a51" id="" cols="30" rows="2">{{ $section->a51 }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">No. Telp Kantor</label>
                                    <input type="text" class="form-control" name="a52" value="{{ $section->a52 }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Kode Pos</label>
                                    <input type="text" class="form-control" name="a53" value="{{ $section->a53 }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Alamat Rumah</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Alamat Rumah</label>
                                    <textarea class="form-control" name="a61" id="" cols="30" rows="2">{{ $section->a61 }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Kelurahan</label>
                                    <input type="text" class="form-control" name="a62" value="{{ $section->a62 }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Kecamatan</label>
                                    <input type="text" class="form-control" name="a63" value="{{ $section->a63 }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Kabupaten / Kota</label>
                                    <input type="text" class="form-control" name="a64" value="{{ $section->a64 }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Provinsi</label>
                                    <input type="text" class="form-control" name="a65" value="{{ $section->a65 }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">No. Telp</label>
                                    <input type="text" class="form-control" name="a66" value="{{ $section->a66 }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Kode Pos</label>
                                    <input type="text" class="form-control" name="a67" value="{{ $section->a67 }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">No. Handphone</label>
                                    <input type="text" class="form-control" name="a68" value="{{ $section->a68 }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                    <a href="{{ route('tracer.detail', ['tracer_user' => $tracerUser->id]) }}" class="btn btn-warning">
                        <i class="fa fa-arrow-left"></i>
                        Kembali
                    </a>
                </div>
                @endif
            </div>
        </div>
    </section>

@endsection