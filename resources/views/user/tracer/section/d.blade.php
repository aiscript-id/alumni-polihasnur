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
                        <p class="mb-0"><b>Relevansi Pendidikan dengan Pekerjaan</b> <i class="bi bi-chevron-right"></i>  2 Pertanyaan</p>
                    </div>
                </div>

                @if (auth()->user()->hasRole('user'))    

                <form action="{{ route('user.tracer.section-d.update', ['id' => $section->id]) }}" method="post">
                @csrf
                @method('PUT')
                @endif

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Relevansi Pendidikan dengan Pekerjaan</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Apakah pendidikan yang anda dapat di Polihasnur relevan dengan pekerjaan anda ?</label>
                                    <select name="d11" onchange="open_field('card-d12')" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="ya" {{ $section->d11 == 'ya' ? 'selected' : '' }}>Ya</option>
                                        <option value="tidak" {{ $section->d11 == 'tidak' ? 'selected' : '' }}>Tidak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 {{ ($section->d11 != 'ya') ? '' : 'd-none' }}" id="card-d12">
                                <div class="form-group">
                                    <label for="">Alasan dari jawaban pertanyaan diatas ?</label>
                                    <textarea name="d12" class="form-control" rows="3">{{ $section->d12 }}</textarea>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Saran dan masukan</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Dari pengalaman anda bekerja, apa saran praktis untuk pendidikan di Polihasnur dalam rangka meningkatkan kesesuaian antara pendidik dengan lapangan pekerjaan ?</label>
                                    <textarea name="d2" class="form-control" rows="3">{{ $section->d2 }}</textarea>
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
            var d11 = $('select[name="d11"]').val();
            if(d11 == 'tidak'){
                field.removeClass('d-none');
            }else{
                field.addClass('d-none');
                // clear field textarea
                field.find('textarea').val('');
            }
        }
    </script>

@endsection