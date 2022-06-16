@extends('layouts.user')
@section('content')
  <div class="pagetitle">
    <h1>Pekerjaan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item ">Pekerjaan</li>
        <li class="breadcrumb-item active">{{ (@$job) ? $job->name : 'Create'}}</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <h5 class="card-title">Data Pekerjaan Alumni</h5>
              </div>
              <div class="col-md-6 text-left text-md-right">
                {{-- back right button --}}
                <a href="{{ route('user.job') }}" class="btn btn-warning mt-3">
                  <i class="fa fa-arrow-left"></i>
                  Kembali
                </a>
              </div>
            </div>
            {{-- create --}}

            <form action="{{ $url }}" method="post">
              @csrf
              @if (@$job)
                @method('PUT')
              @endif

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Nama Perusahaan/Instansi</label>
                    <input type="text" class="form-control" name="name" id="name" required placeholder="Nama Perusahaan" value="{{ @$job->name }}">
                  </div>
                  {{-- position --}}
                  <div class="form-group">
                    <label for="">Jabatan</label>
                    <input type="text" class="form-control" name="position" id="position" required placeholder="Jabatan" value="{{ @$job->position }}">
                  </div>

                  {{-- KOTA --}}
                  <div class="form-group">
                    <label for="">Kota</label>
                    <input type="text" class="form-control" name="city" id="city" required placeholder="Kota" value="{{ @$job->city }}">
                  </div>

                  <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" class="form-control" name="address" id="address" required placeholder="Alamat Perusahaan" value="{{ @$job->address }}">
                  </div>
                </div>
                <div class="col-md-6">
                  {{-- start_date --}}
                  <div class="form-group">
                    <label for="">Mulai Kerja</label>
                    <input type="date" class="form-control" name="start_date" id="start_date" required placeholder="Mulai Kerja" value="{{ @$job->start_date }}" >
                  </div>

                  {{-- end_date --}}
                  <div class="form-group">
                    <label for="">Berakhir Kerja</label><small class="text-muted ml-1" style="font-size : 10px">kosongi jika masih bekerja ditempat ini</small>
                    <input type="date" class="form-control" name="end_date" id="end_date" placeholder="Berakhir Kerja" value="{{ @$job->end_date }}">
                  </div>
                  {{-- status pekerjaan --}}
                  @php
                      $status = ['Kontrak', 'Tetap', 'Lainnya'];
                  @endphp

                  <div class="form-group">
                    <label for="">Status Pekerjaan</label>
                    <select name="status" id="status" class="form-control">
                      <option value="">Silahkan Pilih</option>
                      @foreach ($status as $item)
                        <option value="{{ $item }}" {{ (@$job->status == $item) ? 'selected' : '' }}>{{ $item }}</option>
                      @endforeach
                    </select>
                  </div>

                  {{-- apakah sesuai prodi --}}
                  <div class="form-group">
                    <label for="">Apakah Sesuai Prodi?</label>
                    <select name="sesuai_prodi" id="sesuai_prodi" class="form-control">
                      <option value="">Silahkan Pilih</option>
                      <option value="1" {{ (@$job->sesuai_prodi == 1) ? 'selected' : '' }}>Ya</option>
                      <option value="0" {{ (@$job->sesuai_prodi == 0) ? 'selected' : '' }}>Tidak</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-12">
                  {{-- textarea descirption --}}
                  <div class="form-group">
                    <label for="">Deskripsi Pekerjaan</label>
                    <textarea name="description" id="description" cols="30" rows="2" class="form-control" placeholder="Deskripsi Pekerjaan">{{ @$job->description }}</textarea>
                  </div>
                </div>
                <div class="col-8 col-md-10 ">
                  {{-- map link --}}
                  <div class="form-group">
                    <label for="">Link Peta</label> <small class="text-muted" style="font-size:10px">Copy link dari google maps</small>
                    <input type="text" class="form-control" name="map_link" id="map_link" placeholder="Link Peta" value="{{ @$job->map_link }}">
                  </div>
                </div>
                <div class="col-4 col-md-2">
                  {{-- open google maps --}}
                  <div class="form-group">
                    <label for="" class="mb-2"></label><br>
                    <a target="_blank" href="https://www.google.co.id/maps/place/Politeknik+Hasnur/@-3.2344799,114.6201257,17z/data=!4m5!3m4!1s0x2de4230bff29bd8b:0x9b8228278b99e443!8m2!3d-3.2344799!4d114.6223144" class="btn btn-warning mt-2 btn-block" id="open_google_maps"><i class="bi bi-google"></i>  Maps</a>
                  </div>
                </div>

                {{-- button submit --}}
                <div class="col-md-12 text-right">
                  <hr>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

              </div>
            </form>
          </div>
        </div>
      </div><!-- End Left side columns -->

    </div>
  </section>

  {{-- connect to googlemaps --}}
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-9tSrke72PouQMnMX-A7eZSW0jkFMBWY&callback=initMap" async defer></script>

  <script>
    // open_google_map
    $('#open_google_maps').click(function(){
      var map_link = $('#map_link').val();
      window.open(map_link, '_blank');
    });


    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 8,
        center: {lat: -34.397, lng: 150.644}
      });
      var geocoder = new google.maps.Geocoder();

      document.getElementById('map_link').addEventListener('click', function() {
        geocodeAddress(geocoder, map);
      });
    }
  </script>
@endsection