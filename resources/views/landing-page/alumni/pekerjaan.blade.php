@extends('layouts.home')
@section('content')
<div class="mx-auto flex-lg-row hero">
    @include('landing-page.alumni.head')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Pekerjaan Alumni</h4>
            <div class="row">
                <div class="col-md-4">
                    <h5 class="card-title">Program Studi</h5>
                    @foreach ($prodis as $prodi)
                        {{-- button --}}
                        <a href="{{ route('alumni.pekerjaan', ['prodi_id' => $prodi->id]) }}" class="btn btn-primary btn-sm btn-block" style="display: block">
                            {{ $prodi->name }}
                        </a>
                        <br>
                    @endforeach
                    <a href="{{ route('alumni.pekerjaan') }}" class="btn btn-outline-primary btn-sm btn-block" style="display: block">
                        Tampilkan semua Program Studi
                    </a>
                </div>
                <div class="col-md-8">
                    {{-- pie chart --}}
                    <div  id="mapid"></div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />

<style>
    #mapid { min-height: 500px; }
</style>
@endsection

@push('script')
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>
<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>

<script>
    var map = L.map('mapid').setView([{{ config('leaflet.map_center_latitude') }}, {{ config('leaflet.map_center_longitude') }}], {{ config('leaflet.zoom_level') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    var markers = L.markerClusterGroup();

    axios.get('{{ route('api.jobs.index', ['prodi_id' => @request()->prodi_id]) }}')
    .then(function (response) {
        var marker = L.geoJSON(response.data, {
            pointToLayer: function(geoJsonPoint, latlng) {
                return L.marker(latlng).bindPopup(function (layer) {
                    return layer.feature.properties.map_popup_content;
                });
            }
        });
        markers.addLayer(marker);
    })
    .catch(function (error) {
        console.log(error);
    });
    map.addLayer(markers);
</script>
@endpush
