@extends('layouts.home')

@section('content')

<div>
    <div class="mx-auto d-flex flex-lg-row flex-column hero">
        <!-- Left Column -->
        <div
            class="left-column d-flex flex-lg-grow-1 flex-column align-items-lg-start text-lg-start align-items-center text-center">
            <p class="text-caption">Kontak</p>
            <h1 class="title-text-big">
                <span style="font-size: 2rem;">POLITEKNIK HASNUR</span>
            </h1>
            <p class="mb-2">
                <i class="fa fa-phone" style="margin-right: 1rem" aria-hidden="true"></i>
                (+62) 511 3306 886
            </p>
            <p class="mb-4">
                <i class="fa fa-envelope" style="margin-right: 1rem" aria-hidden="true"></i>
                <a href="mailto:polihasnur@polihasnur.ac.id" class="text-dark text-decoration-none">
                    polihasnur@polihasnur.ac.id
                </a>
            </p>
        </div>
        <!-- Right Column -->
        <div class="right-column text-center d-flex justify-content-center pe-0">
            {{-- map politeknik hasnur --}}
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7966.92484730089!2d114.622361!3d-3.2345!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de4230bff29bd8b%3A0x9b8228278b99e443!2sPoliteknik%20Hasnur!5e0!3m2!1sen!2sid!4v1657470081176!5m2!1sen!2sid" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
    </div>
</div>
@endsection
