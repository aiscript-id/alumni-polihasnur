@extends('layouts.user')
@section('content')
  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center"> 
                        <img src="{{ $user->getAvatar }}" alt="Profile" class="rounded-circle">
                        <h2>{{ $user->name }}</h2>
                        <h3>{{ $user->username }}</h3>
                        <p class="text-center">Alumni Angkatan {{ $user->angkatan }} <br>
                            <small class="text-sm text-muted">{{ $user->tahun_masuk }} - {{ $user->tahun_lulus }}</small>
                        </p>
                        <div class="social-links mt-2 text-center">
                            <a href="#" class="twitter"><i class="bi bi-google"></i></a>
                            <a href="#" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                {{-- <h5 class="card-title">About</h5>
                                <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p> --}}
                                <h5 class="card-title">Profile Details</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Instansi/Perusahaan</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->company ?? '-'}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Posisi</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->position ?? '-' }}</div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Telepon/Whatsapp</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->whatsapp ?? '-' }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->email ?? '-' }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Alamat</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->address ?? '-' }}</div>
                                </div>
                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <form action="{{ route('user.profile.update') }}" method="post" >
                                    @csrf
                                    @method('PUT')

                                    <div class="row mb-3 d-none">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="{{ $user->getAvatar }}" alt="Profile">
                                            <div class="pt-2">
                                                <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image">
                                                    <i class="bi bi-upload"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-md-8 col-lg-9"> 
                                            <input name="name" type="text" class="form-control" id="name" value="{{ $user->name }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email" value="{{ $user->email }}">
                                        </div>
                                    </div>

                                    {{-- <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Instansi/Perusahaan</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="company" type="text" class="form-control" id="company" value="{{ $user->company }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="position" class="col-md-4 col-lg-3 col-form-label">Posisi</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="position" type="text" class="form-control" id="position" value="{{ $user->position }}">
                                        </div>
                                    </div> --}}
                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Angkatan</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="angkatan" type="text" class="form-control" id="angkatan" value="{{ $user->angkatan }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Tahun Masuk</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="tahun_masuk" type="text" class="form-control" id="tahun_masuk" value="{{ $user->tahun_masuk }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Tahun Lulus</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="tahun_lulus" type="text" class="form-control" id="tahun_lulus" value="{{ $user->tahun_lulus }}">
                                        </div>
                                    </div>
                                                                     
                                    {{-- prodi --}}
                                    @if (!@$user->prodi_id)    
                                    <div class="row mb-3">
                                        <label for="prodi" class="col-md-4 col-lg-3 col-form-label">Prodi</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select name="prodi_id" id="prodi" class="form-control">
                                                <option value="">Pilih Prodi</option>
                                                @foreach ($prodi as $item)
                                                    <option value="{{ $item->id }}" {{ $user->prodi_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Whatsapp/Telpon</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="whatsapp" type="text" class="form-control" id="whatsapp" value="{{ $user->whatsapp }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="address" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="address" type="text" class="form-control" id="address" value="{{ $user->address }}">
                                        </div>
                                    </div>   
                                    
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                            
                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <form action="{{ route('user.password.update') }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <label for="old_password" class="col-md-4 col-lg-3 col-form-label">Password Lama</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="old_password" type="password" class="form-control" id="old_password">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control" id="password">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Konfirmasi Password Baru</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input id="password-confirm" type="password" class="form-control"  name="password_confirmation">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection