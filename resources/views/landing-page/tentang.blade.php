@extends('layouts.home')

@section('content')

<div>
    <div class="mx-auto d-flex flex-lg-row flex-column hero">
        <!-- Left Column -->
        <div
            class="left-column d-flex flex-lg-grow-1 flex-column align-items-lg-start text-lg-start align-items-center text-center">
            <p class="text-caption">Tentang Kami</p>
            <h1 class="title-text-big">
                <span style="font-size: 2rem;">ALUMNI POLITEKNIK HASNUR</span>
            </h1>
            <p class="mb-4">
                Website Alumni Politeknik Hasnur adalah website yang digunakan untuk pengelolaan, arsip serta berita mengenai mahasiswa lulusan dari kampus Politeknik Hasnur
            </p>
        </div>
        <!-- Right Column -->
        <div class="right-column text-center d-flex justify-content-center pe-0">
            <img id="img-fluid" class="h-auto mw-100"
            {{-- rounded image --}}
                style=""
                src="https://alumni.polihasnur.ac.id/assets/img/gedung_polihasnur.jpg"
                alt="" />
        </div>
    </div>
</div>
@endsection
