@extends('layouts.home')

@section('content')
<div class="mx-auto flex-lg-row hero">
    @include('landing-page.alumni.head')
    <div class="card">
        <div class="card-body">
            {{-- button statistik --}}
            
            <h4 class="card-title mb-4">Tabel Data Alumni Politeknik Hasnur</h4>
            {{-- table --}}
            <div class="table-responsive">
                <table class="table table-striped datatable" id="datatable">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Jurusan</th>
                            <th>Angkatan</th>
                            <th>Email</th>
                            {{-- <th>No. HP</th> --}}
                            {{-- <th>Alamat</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                <img src="{{ $user->getAvatar }}" alt="{{ $user->name }}" class="img-thumbnail" width="50" height="50"></td>
                            
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->prodi->name ?? '-' }}</td>
                            <td>{{ $user->angkatan }}</td>
                            <td>{{ $user->email }}</td>
                            {{-- <td>{{ $user->whatsapp }}</td> --}}
                            {{-- <td>{{ $user->address }}</td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- end of table --}}
            {{ $users->links() }}
        </div>
    </div>
</div>


@endsection
