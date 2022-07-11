@extends('layouts.home')

@section('content')

<div>
    <div class="mx-auto d-flex flex-lg-row flex-column hero">
        <!-- Left Column -->
        <div
            class="left-column d-flex flex-lg-grow-1 flex-column align-items-lg-start text-lg-start align-items-center text-center">
            <p class="text-caption">POLITEKNIK HASNUR</p>
            <h1 class="title-text-big">
                OFFICIAL WEBSITE<br class="d-lg-block d-none" />
                <span style="font-size: 2rem;">ALUMNI POLITEKNIK HASNUR</span>
            </h1>
            <p class="mb-4">
                Education is not just about going to school and getting a degree. It's about widening your knowledge and absorbing the truth about life. Knowledge is power.
            </p>
            <div
                class="d-flex flex-sm-row flex-column align-items-center mx-lg-0 mx-auto justify-content-center gap-3">
                <a href="{{ route('tracer-study') }}" class="btn d-inline-flex mb-md-0 btn-try text-white">
                    Tracer Study
                </a>
            </div>
        </div>
        <!-- Right Column -->
        <div class="right-column text-center d-flex justify-content-center pe-0">
            <img id="img-fluid" class="h-auto mw-100"
                src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header2/Header-2-1.png"
                alt="" />
        </div>
    </div>
</div>
<div class="content-2-2 container-xxl mx-auto p-0  position-relative"
    style="font-family: 'Poppins', sans-serif">
    <div class="text-center title-text  d-none">
        <h1 class="text-title">3 Keys Benefit</h1>
        <p class="text-caption" style="margin-left: 3rem; margin-right: 3rem">
            You can easily manage your business with a powerful tools
        </p>
    </div>

    <div class="grid-padding text-center d-none">
        <div class="row">
            <div class="col-lg-4 column">
                <div class="icon">
                    <img src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content2/Content-2-5.png"
                        alt="" />
                </div>
                <h3 class="icon-title">Easy to Operate</h3>
                <p class="icon-caption">
                    This can easily help you to<br />
                    grow up your business fast
                </p>
            </div>
            <div class="col-lg-4 column">
                <div class="icon">
                    <img src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content2/Content-2-6.png"
                        alt="" />
                </div>
                <h3 class="icon-title">Real-Time Analytic</h3>
                <p class="icon-caption">
                    With real-time analytics, you<br />
                    can check data in real time
                </p>
            </div>
            <div class="col-lg-4 column">
                <div class="icon">
                    <img src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content2/Content-2-7.png"
                        alt="" />
                </div>
                <h3 class="icon-title">Very Full Secured</h3>
                <p class="icon-caption">
                    With real-time analytics, we<br />
                    will guarantee your data
                </p>
            </div>
        </div>
    </div>

    <div class="card-block">
        <div class="card">
            <div class="d-flex flex-lg-row flex-column align-items-center">
                <div class="me-lg-3">
                    <img src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content2/Content-2-1%20(1).png"
                        alt="" />
                </div>
                <div class="flex-grow-1 text-lg-start text-center card-text">
                    <h3 class="card-title">
                        Kerjakan Tracer Study Alumni
                    </h3>
                    <p class="card-caption">
                        Dengan fitur ini, anda dapat mengerjakan tracer study alumni Politeknik Hasnur dengan mudah.
                    </p>
                </div>
                <div class="card-btn-space">
                    <button class="btn btn-card text-white">Mulai Sekarang </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
