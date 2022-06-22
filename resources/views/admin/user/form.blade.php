@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        <h1>Form Data Alumni</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
            <li class="breadcrumb-item active">User</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="row">
        <div class="text-right my-3">
            <a href="{{ route('users.index') }}" class="btn btn-warning">
                <i class="fa fa-plus"></i>
                Back
            </a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <img class="card-img-top" src="holder.js/100x180/" alt="">
                <div class="card-body">
                    <h4 class="card-title">User Account</h4>

                    {{-- form user --}}
                    <form action="{{ $route }}" method="POST">
                        @csrf
                        @if (@$user)
                            @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name ?? old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                {{-- prodi --}}
                                <div class="form-group">
                                    <label for="prodi">Prodi</label>
                                    <select name="prodi_id" id="prodi" class="form-control @error('prodi') is-invalid @enderror" required>
                                        <option value="">Pilih Prodi</option>
                                        @foreach ($prodis as $prodi)
                                            <option {{ (@$user->prodi_id == $prodi->id) ? 'selected' : '' }} value="{{ $prodi->id }}">{{ $prodi->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('prodi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="angkatan">Angkatan</label>
                                    <input type="text" name="angkatan" id="angkatan" class="form-control @error('angkatan') is-invalid @enderror" value="{{ $user->angkatan ?? old('angkatan') }}">
                                    @error('angkatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tahun_masuk">Tahun Masuk</label>
                                    <input type="text" name="tahun_masuk" id="tahun_masuk" class="form-control @error('tahun_masuk') is-invalid @enderror" value="{{ $user->tahun_masuk ?? old('tahun_masuk') }}">
                                    @error('tahun_masuk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tahun_masuk">Tahun Lulus</label>
                                    <input type="text" name="tahun_lulus" id="tahun_lulus" class="form-control @error('tahun_lulus') is-invalid @enderror" value="{{ $user->tahun_lulus ?? old('tahun_lulus') }}">
                                    @error('tahun_lulus')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">NIM / Username</label>
                                    <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ $user->username ?? old('username') }}">
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>  
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email ?? old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">    
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required>
                                        <option value="">Pilih Role</option>
                                        <option {{ (@$user && $user->role('admin')) ? 'selected' : '' }} value="admin">Admin</option>
                                        <option {{ (@$user && $user->role('user')) ? 'selected' : '' }} value="user">User</option>
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div> --}}
                            <input type="hidden" name="role" value="user">
                        </div>
                        

                        <hr>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection