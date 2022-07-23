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
                        <p class="mb-0"><b>Riwayat Pekerjaan</b> <i class="bi bi-chevron-right"></i>  2 Bagian <i class="bi bi-chevron-right"></i> 16 Pertanyaan</p>
                    </div>
                </div>

                <form action="{{ route('user.tracer.section-c.update', ['id' => $section->id]) }}" method="post">
                @csrf
                @method('PUT')

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pekerjaan Terakhir/Sekarang</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nama Tempat Bekerja</label>
                                    <input type="text" class="form-control" name="c1"  value="{{ $section->c1 }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jenis Instansi</label>
                                    @php
                                        $c2 = ['Pemerintah Pusat', 'Pemerintah Daerah', 'BUMN', 'Swasta (Jasa)', 'Swasta (Manufaktur)', 'Wiraswasta', 'Lainnya'];
                                    @endphp
                                    <select name="c2" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($c2 as $x => $item)
                                            <option value="{{ $x+1 }}" {{ $section->c2 == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jabatan/Posisi dalam Pekerjaan</label>
                                    <input type="text" class="form-control" name="c3" placeholder="" value="{{ $section->c3 }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Bulan & Tahun mulai bekerja</label>
                                    <input type="text" class="form-control" placeholder="contoh : 01-2021" name="c41" value="{{ $section->c41 }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Bulan & Tahun berhenti bekerja </label>
                                    <input type="text" class="form-control" placeholder="contoh : 01-2021" name="c42" value="{{ $section->c42 }}">
                                    <small class="small text-muted" style="font-size: 8pt">Jika masih bekerja sampai sekarang, tulis "Sekarang" pada kolom diatas</small>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Proses Mendapatkan Pekerjaan Terakhir/Sekarang</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Bagaimana proses anda mendapatkan pekerjaan ini ?</label>
                                    {{-- select prodi --}}
                                    {{-- set card-pendidikan d-none if b4 tidak  --}}
                                    <select name="c5" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="aktif" {{ $section->c5 == 'aktif' ? 'selected' : '' }}>Aktif (Mencari Sendiri)</option>
                                        <option value="pasif" {{ $section->c5 == 'pasif' ? 'selected' : '' }}>Pasif (Ditawari pekerjaan)</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Darimana anda mengetahui informasi mengenai adanya pekerjaan ini ?</label>
                                    {{-- checkbox --}}
                                    @php
                                        $c6 = ['Iklan', 'Internet', 'Pengumuman di Kampus', 'Koneksi (Teman, Dosen, Keluarga)', 'Info Lowongan Kemahasiswaan', 'Lainnya'];

                                    @endphp
                                    @foreach ($c6 as $x => $item)
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="c6[]" value="{{ $x+1 }}"
                                            @if (@$section->c6)
                                            {{ in_array($x+1, json_decode($section->c6)) ? 'checked' : '' }}
                                            @endif 
                                            > 
                                            <label class="form-check-label">
                                                {{ Str::title($item) }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div> 
                            
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pertanyaan Tambahan tentang Pekerjaan Terakhir/Sekarang</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Sejauh mana pekerjaan anda yang terakhir/sekarang sesuai dengan harapan ketika pertama kali belajar di Polihasnur ?</label>
                                    @php
                                        $c7 = ['sangat sesuai harapan', 'sesuai harapan', 'kurang sesuai harapan', 'tidak sesuai harapan'];
                                    @endphp
                                    <select name="c7" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($c7 as $x => $item)
                                            <option value="{{ $x+1 }}" {{ $section->c7 == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Apakah anda puas dengan pekerjaan anda yang terakhir/sekarang ?</label>
                                    @php
                                        $c8 = ['sangat puas', 'puas', 'kurang puas', 'tidak puas'];
                                    @endphp
                                    <select name="c8" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($c8 as $x => $item)
                                            <option value="{{ $x+1 }}" {{ $section->c8 == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Secara umum, apa pertimbangan utama anda dalam memilih pekerjaan yang terakhir/sekarang ?</label>
                                    @php
                                        $c9 = ['gaji memadai', 'sesuai bidang keilmuan', 'mendapatkan pengalaman', 'mendapatkan ilmu pengetahuan', 'mendapatkan ketrampilan'];
                                    @endphp
                                    <select name="c9" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($c9 as $x => $item)
                                            <option value="{{ $x+1 }}" {{ $section->c9 == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Berapa rata-rata pendapatan perbulan (take home pay, insentif, bonus, dsb) anda pada pekerjaan terakhir/sekarang ?</label>
                                    @php
                                        $c10 = ['< Rp. 1.000.000', 'Rp. 1.000.000 - Rp. 3.000.000', 'Rp. 3.000.000 - Rp. 5.000.000', 'Rp. 5.000.000 - Rp. 7.500.000', 'Rp. 7.500.000 - Rp. 10.000.000', '> Rp. 10.000.000'];
                                    @endphp
                                    <select name="c10" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($c10 as $x => $item)
                                            <option value="{{ $x+1 }}" {{ $section->c10 == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Apakah pekerjaan anda ini berhubungan dengan bidang ilmu yang anda pelajari ?</label>
                                    <select name="cx1" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="ya" {{ $section->cx1 == 'ya' ? 'selected' : '' }}>Ya</option>
                                        <option value="tidak" {{ $section->cx1 == 'tidak' ? 'selected' : '' }}>Tidak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Menurut anda, bagaimana kebutuhan institusi tempat anda bekerja terhadap lulusan Program Studi anda ?</label>
                                    @php
                                        $cx2 = ['sangat tinggi', 'tinggi', 'rendah', 'sangat rendah'];
                                    @endphp
                                    <select name="cx2" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($cx2 as $x => $item)
                                            <option value="{{ $x+1 }}" {{ $section->cx2 == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Sebelumnya, apakah anda pernah bekerja di tempat lain ?</label>
                                    <select name="cx3" onchange="open_field()" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="ya" {{ $section->cx3 == 'ya' ? 'selected' : '' }}>Ya</option>
                                        <option value="tidak" {{ $section->cx3 == 'tidak' ? 'selected' : '' }}>Tidak</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 {{ ($section->cx3 == 'ya') ? '' : 'd-none'}}" id="card-cx4">
                                <div class="form-group">
                                    <label for="">Sudah berapa kali anda berganti pekerjaan</label>
                                    @php
                                        $cx4 = ['1 kali', '2 kali', '3 kali', 'lebih dari 3 kali'];
                                    @endphp
                                    <select name="cx4" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($cx4 as $x => $item)
                                            <option value="{{ $x+1 }}" {{ $section->cx4 == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 

                            <div class="col-md-6 {{ ($section->cx3 == 'ya') ? '' : 'd-none'}}" id="card-cx5">
                                <div class="form-group">
                                    <label for="">Apakah anda masih ingin berpindah kerja</label>
                                    <select name="cx5" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="ya" {{ $section->cx5 == 'ya' ? 'selected' : '' }}>Ya</option>
                                        <option value="tidak" {{ $section->cx5 == 'tidak' ? 'selected' : '' }}>Tidak</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card {{ ($section->cx3 == 'ya') ? '' : 'd-none'}}" id="card-pekerjaan-1">
                    <div class="card-body">
                        <h4 class="card-title">Pekerjaan Pertama</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nama Tempat Bekerja</label>
                                    <input type="text" class="form-control" name="cp1"  value="{{ $section->cp1 }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jenis Instansi</label>
                                    @php
                                        $cp2 = ['Pemerintah Pusat', 'Pemerintah Daerah', 'BUMN', 'Swasta (Jasa)', 'Swasta (Manufaktur)', 'Wiraswasta', 'Lainnya'];
                                    @endphp
                                    <select name="cp2" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($cp2 as $x => $item)
                                            <option value="{{ $x+1 }}" {{ $section->cp2 == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jabatan/Posisi dalam Pekerjaan</label>
                                    <input type="text" class="form-control" name="cp3" placeholder="" value="{{ $section->cp3 }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Bulan & Tahun mulai bekerja</label>
                                    <input type="text" class="form-control" placeholder="contoh : 01-2021" name="cp41" value="{{ $section->cp41 }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Bulan & Tahun berhenti bekerja </label>
                                    <input type="text" class="form-control" placeholder="contoh : 01-2021" name="cp42" value="{{ $section->cp42 }}">
                                    <small class="small text-muted" style="font-size: 8pt">Jika masih bekerja sampai sekarang, tulis "Sekarang" pada kolom diatas</small>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="card {{ ($section->cx3 == 'ya') ? '' : 'd-none'}}" id="card-pekerjaan-2">
                    <div class="card-body">
                        <h4 class="card-title">Proses Mendapatkan Pekerjaan Pertama</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Bagaimana proses anda mendapatkan pekerjaan ini ?</label>
                                    {{-- select prodi --}}
                                    {{-- set card-pendidikan d-none if b4 tidak  --}}
                                    <select name="cp5" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="aktif" {{ $section->cp5 == 'aktif' ? 'selected' : '' }}>Aktif (Mencari Sendiri)</option>
                                        <option value="pasif" {{ $section->cp5 == 'pasif' ? 'selected' : '' }}>Pasif (Ditawari pekerjaan)</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Darimana anda mengetahui informasi mengenai adanya pekerjaan ini ?</label>
                                    {{-- checkbox --}}
                                    @php
                                        $cp6 = ['Iklan', 'Internet', 'Pengumuman di Kampus', 'Koneksi (Teman, Dosen, Keluarga)', 'Info Lowongan Kemahasiswaan', 'Lainnya'];

                                    @endphp
                                    @foreach ($cp6 as $x => $item)
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="cp6[]" value="{{ $x+1 }}"
                                            @if (@$section->cp6)
                                            {{ in_array($x+1, json_decode($section->cp6)) ? 'checked' : '' }}
                                            @endif 
                                            > 
                                            <label class="form-check-label">
                                                {{ Str::title($item) }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div> 
                            
                        </div>
                    </div>
                </div>

                <div class="card {{ ($section->cx3 == 'ya') ? '' : 'd-none'}}" id="card-pekerjaan-3">
                    <div class="card-body">
                        <h4 class="card-title">Pertanyaan Tambahan tentang Pekerjaan Pertama</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Sejauh mana pekerjaan anda yang pertama sesuai dengan harapan ketika pertama kali belajar di Polihasnur ?</label>
                                    @php
                                        $cp7 = ['sangat sesuai harapan', 'sesuai harapan', 'kurang sesuai harapan', 'tidak sesuai harapan'];
                                    @endphp
                                    <select name="cp7" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($cp7 as $x => $item)
                                            <option value="{{ $x+1 }}" {{ $section->cp7 == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Apakah anda puas dengan pekerjaan anda yang pertama ?</label>
                                    @php
                                        $cp8 = ['sangat puas', 'puas', 'kurang puas', 'tidak puas'];
                                    @endphp
                                    <select name="cp8" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($cp8 as $x => $item)
                                            <option value="{{ $x+1 }}" {{ $section->cp8 == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Secara umum, apa pertimbangan utama anda dalam memilih pekerjaan yang pertama ?</label>
                                    @php
                                        $cp9 = ['gaji memadai', 'sesuai bidang keilmuan', 'mendapatkan pengalaman', 'mendapatkan ilmu pengetahuan', 'mendapatkan ketrampilan'];
                                    @endphp
                                    <select name="cp9" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($cp9 as $x => $item)
                                            <option value="{{ $x+1 }}" {{ $section->cp9 == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Berapa rata-rata pendapatan perbulan (take home pay, insentif, bonus, dsb) anda pada pekerjaan pertama ?</label>
                                    @php
                                        $cp10 = ['< Rp. 1.000.000', 'Rp. 1.000.000 - Rp. 3.000.000', 'Rp. 3.000.000 - Rp. 5.000.000', 'Rp. 5.000.000 - Rp. 7.500.000', 'Rp. 7.500.000 - Rp. 10.000.000', '> Rp. 10.000.000'];
                                    @endphp
                                    <select name="cp10" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($cp10 as $x => $item)
                                            <option value="{{ $x+1 }}" {{ $section->cp10 == $x+1 ? 'selected' : '' }}>{{ Str::title($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Apakah pekerjaan anda ini berhubungan dengan bidang ilmu yang anda pelajari ?</label>
                                    <select name="cpx1" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="ya" {{ $section->cpx1 == 'ya' ? 'selected' : '' }}>Ya</option>
                                        <option value="tidak" {{ $section->cpx1 == 'tidak' ? 'selected' : '' }}>Tidak</option>
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

        function open_field(){
            var field = $('#card-cx4, #card-cx5');
            if(field.hasClass('d-none')){
                field.removeClass('d-none');
            }else{
                field.addClass('d-none');
                field.find('input').val('');
            }

            var card = $('#card-pekerjaan-1, #card-pekerjaan-2, #card-pekerjaan-3');
            if(card.hasClass('d-none')){
                card.removeClass('d-none');
            }else{
                card.addClass('d-none');
                card.find('input').val('');
            }

        }
    </script>

@endsection