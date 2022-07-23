@extends((auth()->user()->hasRole('user')) ? 'layouts.user' : 'layouts.admin')
@section('content')
    <div class="pagetitle">
        <h1>Penelusuran Alumni</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('user') }}">Home</a></li>
            <li class="breadcrumb-item active">Penelusuran Alumni</li>
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
                        <p class="mb-0"><b>Indikator Kompetensi dan Daya Saing</b> <i class="bi bi-chevron-right"></i>  26 Pertanyaan</p>
                    </div>
                </div>
                @php
                    $data = ['sangat menguasai', 'menguasai', 'kurang menguasai', 'tidak menguasai'];
                @endphp
                @if (auth()->user()->hasRole('user'))    
                <form action="{{ route('user.tracer.section-f.update', ['id' => $section->id]) }}" method="post">
                @csrf
                @method('PUT')
                @endif

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Indikator Kompetensi dan Daya Saing</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    @php
                                        $f1 = ['sangat mampu', 'mampu', 'kurang mampu', 'tidak mampu'];
                                    @endphp
                                    <label for="">Saat baru lulus, sejauh mana anda merasa mampu bersaing dengan lulusan perguruan tinggi lain</label>
                                    <select name="f1" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($f1 as $x => $item)
                                            <option value="{{ $x+1 }}" {{ $section->f1 == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    @php
                                        $f2 = ['generik (umum)', 'spesifik'];
                                    @endphp
                                    <label for="">Sejauh ini, menurut anda lulusan Polihasnur yang bagaimana yang diperlukan oleh pasar/lapangan kerja</label>
                                    <select name="f2" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($f2 as $x => $item)
                                            <option value="{{ $x+1 }}" {{ $section->f2 == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Kompetensi Saat Baru Lulus</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Pengetahuan Umum</label>
                                            <select name="f3a" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($data as $x => $item)
                                                    <option value="{{ $x+1 }}" {{ $section->f3a == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="">Bahasa Inggris</label>
                                            <select name="f3b" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($data as $x => $item)
                                                    <option value="{{ $x+1 }}" {{ $section->f3b == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="">Komputer</label>
                                            <select name="f3c" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($data as $x => $item)
                                                    <option value="{{ $x+1 }}" {{ $section->f3c == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="">Metodologi Penelitian</label>
                                            <select name="f3d" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($data as $x => $item)
                                                    <option value="{{ $x+1 }}" {{ $section->f3d == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="">Kerjasama Tim</label>
                                            <select name="f3e" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($data as $x => $item)
                                                    <option value="{{ $x+1 }}" {{ $section->f3e == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="">Keterampilan Komunikasi Lisan</label>
                                            <select name="f3f" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($data as $x => $item)
                                                    <option value="{{ $x+1 }}" {{ $section->f3f == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="">Keterampilan Komunikasi Tertulis</label>
                                            <select name="f3g" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($data as $x => $item)
                                                    <option value="{{ $x+1 }}" {{ $section->f3g == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="">Proses Pemberdayaan Masyarakat</label>
                                            <select name="f3h" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($data as $x => $item)
                                                    <option value="{{ $x+1 }}" {{ $section->f3h == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="">Pengetahuan Teoritis Spesifik Program Studi</label>
                                            <select name="f3i" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($data as $x => $item)
                                                    <option value="{{ $x+1 }}" {{ $section->f3i == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="">Pengetahuan Praktis Spesifik Program Studi</label>
                                            <select name="f3j" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($data as $x => $item)
                                                    <option value="{{ $x+1 }}" {{ $section->f3j == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="">Manajemen Organisasi</label>
                                            <select name="f3k" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($data as $x => $item)
                                                    <option value="{{ $x+1 }}" {{ $section->f3k == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="">Kepemimpinan/Leadership</label>
                                            <select name="f3l" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($data as $x => $item)
                                                    <option value="{{ $x+1 }}" {{ $section->f3l == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Kompetensi Dalam Pekerjaan</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Pengetahuan Umum</label>
                                            <select name="f4a" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($data as $x => $item)
                                                    <option value="{{ $x+1 }}" {{ $section->f4a == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="">Bahasa Inggris</label>
                                            <select name="f4b" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($data as $x => $item)
                                                    <option value="{{ $x+1 }}" {{ $section->f4b == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="">Komputer</label>
                                            <select name="f4c" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($data as $x => $item)
                                                    <option value="{{ $x+1 }}" {{ $section->f4c == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="">Metodologi Penelitian</label>
                                            <select name="f4d" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($data as $x => $item)
                                                    <option value="{{ $x+1 }}" {{ $section->f4d == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="">Kerjasama Tim</label>
                                            <select name="f4e" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($data as $x => $item)
                                                    <option value="{{ $x+1 }}" {{ $section->f4e == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="">Keterampilan Komunikasi Lisan</label>
                                            <select name="f4f" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($data as $x => $item)
                                                    <option value="{{ $x+1 }}" {{ $section->f4f == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="">Keterampilan Komunikasi Tertulis</label>
                                            <select name="f4g" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($data as $x => $item)
                                                    <option value="{{ $x+1 }}" {{ $section->f4g == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="">Proses Pemberdayaan Masyarakat</label>
                                            <select name="f4h" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($data as $x => $item)
                                                    <option value="{{ $x+1 }}" {{ $section->f4h == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="">Pengetahuan Teoritis Spesifik Program Studi</label>
                                            <select name="f4i" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($data as $x => $item)
                                                    <option value="{{ $x+1 }}" {{ $section->f4i == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="">Pengetahuan Praktis Spesifik Program Studi</label>
                                            <select name="f4j" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($data as $x => $item)
                                                    <option value="{{ $x+1 }}" {{ $section->f4j == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="">Manajemen Organisasi</label>
                                            <select name="f4k" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($data as $x => $item)
                                                    <option value="{{ $x+1 }}" {{ $section->f4k == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="">Kepemimpinan/Leadership</label>
                                            <select name="f4l" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($data as $x => $item)
                                                    <option value="{{ $x+1 }}" {{ $section->f4l == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
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