@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        <h1>Statistik Pekerjaan Alumni</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Pekerjaan Alumni</li>
            <li class="breadcrumb-item active">Statistik</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            {{-- table --}}
            <div class="col-md-12">
                {{-- button --}}
                <a href="{{ route('job.statistic') }}" class="btn btn-sm btn-primary mr-2">Statistik Pekerjaan Alumni</a>
                <a href="{{ route('job.index') }}" class="btn btn-sm btn-outline-primary">Tabel Pekerjaan Alumni</a>
            </div>
            <div class="col-md-12">
                <div class="text-right my-3">
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pekerjaan Alumni</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <h5 class="card-title">Program Studi</h5>
                                @foreach ($prodis as $prodi)
                                    {{-- button --}}
                                    <a href="{{ route('job.statistic', ['prodi_id' => $prodi->id]) }}" class="btn btn-primary btn-sm btn-block mb-4">
                                        {{ $prodi->name }}
                                    </a>
                                    <br>
                                @endforeach
                            </div>
                            <div class="col-md-8">
                                {{-- pie chart --}}
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Grafik Pekerjaan Alumni</h4>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="chart-container">
                                                    {{-- <canvas id="pie-chart"></canvas> --}}
                                                    <!-- Doughnut Chart -->
                                                    <canvas id="doughnutChart" style="max-height: 400px;"></canvas>
                                                    <script>
                                                        document.addEventListener("DOMContentLoaded", () => {
                                                          new Chart(document.querySelector('#doughnutChart'), {
                                                            type: 'doughnut',
                                                            data: {
                                                              labels: [
                                                                @foreach ($jobs as $job)
                                                                    '{{ $job["name"] }}',
                                                                @endforeach
                                                              ],
                                                              datasets: [{
                                                                label: 'My First Dataset',
                                                                data: [
                                                                    @foreach ($jobs as $job)
                                                                        '{{ $job["count"] }}',
                                                                    @endforeach
                                                                ],
                                                                backgroundColor: [
                                                                  'rgb(255, 99, 132)',
                                                                  'rgb(54, 162, 235)',
                                                                  'rgb(255, 205, 86)'
                                                                ],
                                                                hoverOffset: 4
                                                              }]
                                                            }
                                                          });
                                                        });
                                                      </script>
                                                    <!-- End Doughnut CHart -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        var ctx = document.getElementById('pie-chart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    ['Bekerja Sesuai Bidang', 'Bekerja Tidak Sesuai Bidang', 'Tidak Bekerja']
                ],
                datasets: [{
                    label: 'Jumlah Pekerjaan Alumni',
                    data: [
                        [100, 20, 5]
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

    </script>



@endsection