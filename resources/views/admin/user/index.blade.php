@extends((auth()->user()->hasRole(['admin', 'superadmin'])) ? 'layouts.admin' : 'layouts.user')
@section('content')
    <div class="pagetitle">
        <h1>Data Alumni</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Data Alumni</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            {{-- table --}}
            <div class="col-md-12">
                @if (auth()->user()->hasRole(['admin', 'superadmin']))      
                <div class="text-right my-3">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Create
                    </a>
                </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Akun Alumni</h4>
                        <div class="table-responsive nowrap">
                            <table class="table datatable" id="datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>Email</th>
                                        <th>Prodi</th>
                                        @if (auth()->user()->hasRole(['admin', 'superadmin']))    

                                        <th class="text-center">Verified</th>
                                        <th class="text-right">Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{-- getAvatar --}}
                                                <img src="{{ $user->getAvatar }}" alt="{{ $user->name }}" class="img-fluid rounded-circle" width="30">
                                                {{ $user->name }}
                                            </td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->prodi->name ?? '-' }}</td>
                                            @if (auth()->user()->hasRole(['admin', 'superadmin']))   
                                            <td class="text-center">
                                                @if ($user->is_verified == true)
                                                    {{-- checklist --}}
                                                    <span class="badge border-success border-1 text-success">
                                                        <i class="bx bxs-check-circle"></i>
                                                        Verified
                                                    </span>
                                                @else
                                                    {{-- button verified --}}
                                                    <a href="{{ route('admin.user.verify', $user->id) }}" class="btn btn-sm btn-success">Verify</a>
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline show_confirm">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection