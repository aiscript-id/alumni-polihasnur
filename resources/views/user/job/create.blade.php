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

                <div class="col-md-12 ">
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                              <label for="latitude" class="control-label">{{ __('latitude') }}</label>
                              <input id="latitude" type="text" class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}" name="latitude" value="{{ @$job->latitude }}" required>
                              {!! $errors->first('latitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="longitude" class="control-label">{{ __('longitude') }}</label>
                              <input id="longitude" type="text" class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}" name="longitude" value="{{ @$job->longitude }}" required>
                              {!! $errors->first('longitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                          </div>
                      </div>
                  </div>
                  {{-- map link --}}
                  <div id="mapid"></div>
                  
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


@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>

<style>
    #mapid { height: 300px; }
</style>
@endsection


@push('scripts')
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>
<script>
    var mapCenter = [{{ request('latitude', config('leaflet.map_center_latitude')) }}, {{ request('longitude', config('leaflet.map_center_longitude')) }}];
    var mapCenter = [{{ @$job->latitude ?? config('leaflet.map_center_latitude') }}, {{ @$job->longitude ?? config('leaflet.map_center_longitude') }}];
    var map = L.map('mapid').setView(mapCenter, {{ config('leaflet.zoom_level') }});
    // var mapCenter = [-6.917, 107.619];
    // var map = L.map('mapid').setView(mapCenter, 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var marker = L.marker(mapCenter).addTo(map);
    function updateMarker(lat, lng) {
        marker
        .setLatLng([lat, lng])
        .bindPopup("Your location :  " + marker.getLatLng().toString())
        .openPopup();
        return false;
    };

    map.on('click', function(e) {
        let latitude = e.latlng.lat.toString().substring(0, 15);
        let longitude = e.latlng.lng.toString().substring(0, 15);
        $('#latitude').val(latitude);
        $('#longitude').val(longitude);
        updateMarker(latitude, longitude);
    });

    var updateMarkerByInputs = function() {
        return updateMarker( $('#latitude').val() , $('#longitude').val());
    }
    $('#latitude').on('input', updateMarkerByInputs);
    $('#longitude').on('input', updateMarkerByInputs);
</script>
@endpush