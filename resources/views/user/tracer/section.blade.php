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
                        <p class="mb-0"><b>{{ $section->name }}</b> <i class="bi bi-chevron-right"></i>  {{ $section->questions->count() }} Pertanyaan</p>
                    </div>
                </div>

                @if (auth()->user()->hasRole('user'))    

                <form action="{{ route('answer.update', ['section' => $section->id, 'id' => $tracerUser->id]) }}" method="post">
                @csrf
                @method('PUT')
                @endif


                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $section->name }}</h4>
                        @foreach ($questions as $question)    
                        @php
                            $answer = $question->getAnswer($tracerUser);
                        @endphp
                        <div class="form-group">
                            <label for="">{{ $question->code }}. {{ $question->question }}</label>
                            @if ($question->type == 'text')
                            <input type="text" class="form-control" name="answer_{{ $question->code }}" value="{{ $answer }}">
                            @elseif($question->type == 'date')
                            <input type="date" class="form-control" name="answer_{{ $question->code }}" value="{{ $answer }}">
                            @elseif($question->type == 'select')
                            <select class="form-control" name="answer_{{ $question->code }}">
                                <option value="">Pilih</option>
                                @foreach (json_decode($question->options) as $option)
                                <option {{ ($answer == $option) ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                        @endforeach
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