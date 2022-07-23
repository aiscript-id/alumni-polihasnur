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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>


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
                                <a href="{{ route('job.statistic') }}" class="btn btn-outline-primary btn-sm btn-block mb-4">
                                    Tampilkan semua Program Studi
                                </a>
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
                                                    {{-- <script>
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
                                                    </script> --}}
                                                    <script>
                                                        var data = [{
                                                            data: [
                                                                @foreach ($jobs as $job)
                                                                    {{ $job["count"] }}{{ $loop->last ? '' : ',' }}
                                                                @endforeach
                                                            ],
                                                            labels: [
                                                                @foreach ($jobs as $job)
                                                                    '{{ $job["name"] }}',
                                                                @endforeach
                                                            ],
                                                            backgroundColor: [
                                                                'rgb(255, 99, 132)',
                                                                'rgb(54, 162, 235)',
                                                                'rgb(255, 205, 86)'
                                                            ],
                                                            borderColor: "#fff"
                                                        }];
                                                
                                                        var options = {
                                                            tooltips: {
                                                                enabled: true
                                                            },
                                                            plugins: {
                                                                datalabels: {
                                                                    formatter: (value, jobs) => {
                                                
                                                                        let sum = 0;
                                                                        let dataArr = jobs.chart.data.datasets[0].data;
                                                                        dataArr.map(data => {
                                                                            sum += data;
                                                                        });
                                                                        // if value is 0, then don't show percentage
                                                                        if (value == 0) {
                                                                            return null;
                                                                        } else {
                                                                            let percentage = (value*100 / sum).toFixed(2)+"%";
                                                                            return percentage;
                                                                        }
                                                
                                                
                                                                    },
                                                                    color: '#fff',
                                                                }
                                                            }
                                                        };
                                                
                                                
                                                        var jobs = document.getElementById('doughnutChart').getContext('2d');
                                                        var myChart = new Chart(jobs, {
                                                            type: 'doughnut',
                                                            data: {
                                                                labels: [
                                                                    @foreach ($jobs as $job)
                                                                        '{{ $job["name"] }}',
                                                                    @endforeach
                                                                ],
                                                                datasets: data
                                                            },
                                                            options: options
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

    



@endsection