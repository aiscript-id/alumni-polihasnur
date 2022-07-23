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
                        <p class="mb-0"><b>Riwayat Pendidikan</b> <i class="bi bi-chevron-right"></i>  19 Pertanyaan</p>
                    </div>
                </div>

                @if (auth()->user()->hasRole('user'))    

                <form action="{{ route('user.tracer.section-b.update', ['id' => $section->id]) }}" method="post">
                @csrf
                @method('PUT')
                @endif

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Riwayat Pendidikan dan Organisasi</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tahun Masuk</label>
                                    <input type="text" class="form-control" name="b11" placeholder="contoh : 2015" value="{{ $section->b11 }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Bulan dan Tahun Lulus</label>
                                    <input type="text" class="form-control" name="b12" placeholder="contoh : 11-2018" value="{{ $section->b12 }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Program Studi</label>
                                    {{-- select prodi --}}
                                    <select name="b2" class="form-control">
                                        <option value="">Pilih Program Studi</option>
                                        @foreach ($prodis as $prodi)
                                            <option value="{{ $prodi->name }}" {{ Auth::user()->prodi_id == $prodi->id ? 'selected' : '' }}>{{ $prodi->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Apakah Anda berorganisasi ketika masih mahasiswa ?</label>
                                    {{-- select prodi --}}
                                    <select name="b31" onchange="open_field('card-b32')" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="ya" {{ $section->b31 == 'ya' ? 'selected' : '' }}>Ya</option>
                                        <option value="tidak" {{ $section->b31 == 'tidak' ? 'selected' : '' }}>Tidak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 {{ ($section->b31 == 'tidak') ? '' : 'd-none'}}" id="card-b32">
                                <div class="form-group">
                                    <label for="">Jika tidak, mengapa ?</label>
                                    {{-- select prodi --}}
                                    @php
                                        $b32 = ['sibuk', 'tidak berminat', 'tidak sempat', 'tidak cocok dengan organisasi yang ada', 'lainnya'];
                                    @endphp
                                    <select name="b32" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($b32 as $x => $item)
                                            <option value="{{ $x+1 }}" {{ $section->b32 == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pendidikan Lanjutan</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Setelah lulus Sarjana dari Polihasnur, Apakah Anda bersekolah lagi ?</label>
                                    {{-- select prodi --}}
                                    {{-- set card-pendidikan d-none if b4 tidak  --}}
                                    <select name="b4" onchange="open_card()" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="ya" {{ $section->b4 == 'ya' ? 'selected' : '' }}>Ya</option>
                                        <option value="tidak" {{ $section->b4 == 'tidak' ? 'selected' : '' }}>Tidak</option>
                                    </select>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>

                <div class="card {{ ($section->b4 == 'ya') ? '' : 'd-none'}}" id="card-pendidikan">
                    <div class="card-body">
                        <h4 class="card-title">Pendidikan Lanjutan (2)</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama Universitas</label>
                                    <input type="text" class="form-control" name="b51" value="{{ $section->b51 }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Kota / Negara</label>
                                    <input type="text" class="form-control" name="b52" value="{{ $section->b52 }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Fakultas / Jurusan / Program Studi</label>
                                    <input type="text" class="form-control" name="b53" value="{{ $section->b53 }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jenjang Pendidikan</label>
                                    <input type="text" class="form-control" name="b54" value="{{ $section->b54 }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tahun Masuk / Tahun Lulus</label>
                                    <input type="text" class="form-control" placeholder="contoh : 2018 - 2021" name="b55" value="{{ $section->b55 }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Apa alasan utama Anda melanjutkan pendidikan lagi ?</label>
                                    @php
                                        $b6 = ['Mengisi kekosongan menganggur', 'Perlu untuk bekerja', 'Merasa ilmu yang dimiliki masih kurang', 'Ada kesempatan', 'Sebagai Syarat dalam pekerjaan (di tempat bekerja)', 'Kurang yakin bila hanya dibidang ini saja'];
                                    @endphp
                                    <select name="b6" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($b6 as $x => $item)
                                            <option value="{{ $x+1 }}" {{ $section->b6 == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pertanyaan Tambahan</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Pada saat baru lulus, sebenarnya dimana anda ingin bekerja ?</label>
                                    @php
                                        $b7 = ['Pemerintah Pusat', 'Pemerintah Daerah', 'BUMN', 'Swasta (Jasa)', 'Swasta (Manufaktur)', 'Wiraswasta', 'Lainnya'];
                                    @endphp
                                    <select name="b7" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($b7 as $x => $item)
                                            <option value="{{ $x+1 }}" {{ $section->b7 == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Pada saat baru lulus, apakah anda bersedia bekerja di daerah ?</label>
                                    <select name="b8" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="ya" {{ $section->b8 == 'ya' ? 'selected' : '' }}>Ya</option>
                                        <option value="tidak" {{ $section->b8 == 'tidak' ? 'selected' : '' }}>Tidak</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Pada saat baru lulus, apakah anda mengetahui prosedur melamar pekerjaan ?</label>
                                    <select name="b9" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="ya" {{ $section->b9 == 'ya' ? 'selected' : '' }}>Ya</option>
                                        <option value="tidak" {{ $section->b9 == 'tidak' ? 'selected' : '' }}>Tidak</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Menurut anda, kapan seharusnya prosedur melamar pekerjaan harus diketahui ?</label>
                                    @php
                                        $b10 = ['Sejak tahun pertama perkuliahan', 'Di tahun kedua perkuliahan', 'di tahun akhir perkuliahan', 'setelah lulus'];
                                    @endphp
                                    <select name="b10" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($b10 as $x => $item)
                                            <option value="{{ $x+1 }}" {{ $section->b10 == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Pada saat baru lulus, apakah anda mengetahui cara membuat CV ?</label>
                                    <select name="bx1" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="ya" {{ $section->bx1 == 'ya' ? 'selected' : '' }}>Ya</option>
                                        <option value="tidak" {{ $section->bx1 == 'tidak' ? 'selected' : '' }}>Tidak</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Menurut anda, kapan seharusnya cara membuat CV harus diketahui ?</label>
                                    @php
                                        $bx2 = ['Sejak tahun pertama perkuliahan', 'Di tahun kedua perkuliahan', 'di tahun akhir perkuliahan', 'setelah lulus'];
                                    @endphp
                                    <select name="bx2" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($bx2 as $x => $item)
                                            <option value="{{ $x+1 }}" {{ $section->bx2 == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Berapa IPK terakhir Saudara ?</label>
                                    <input type="text" name="bx3" placeholder="contoh : 3.00" class="form-control" value="{{ $section->bx3 }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Setelah lulus, apakah anda sudah / pernah bekerja ?</label>
                                    <select name="bx4" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="ya" {{ $section->bx4 == 'ya' ? 'selected' : '' }}>Ya</option>
                                        <option value="tidak" {{ $section->bx4 == 'tidak' ? 'selected' : '' }}>Tidak</option>
                                    </select>
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