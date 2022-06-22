@extends('layouts.admin')
@section('content')
  <div class="pagetitle">
    <h1>Sistem Informasi Data Alumni Politeknik Hasnur</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row justify-content-center">

      <div class="col-6">
        {{-- logo --}}
        <div class="text-center mt-5">
          <img src="{{ asset('assets/images/polihasnur.png') }}" style="max-height:200px" alt="">
          <h1 class="mt-4 font-weight-bold">Selamat Datang di Sistem Infomasi Data Alumni</h1>
        </div>
      </div>

      

    </div>
  </section>
@endsection