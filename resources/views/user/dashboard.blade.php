@extends('layouts.user')
@section('content')
  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Selamat Datang, {{ Auth::user()->name }}</h5>
            <p>Sistem Informasi Data Alumni Politeknik Hasnur</p>
          </div>
        </div>
      </div><!-- End Left side columns -->

    </div>
  </section>
@endsection