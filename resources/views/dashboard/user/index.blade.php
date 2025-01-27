@extends('dashboard_layout.main')
@section('title', 'Daftar User')
@section('navUser', 'active')

@section('contents')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-primary text-white text-center rounded-top">
                        <h5 class="mb-0" style="color: white">Daftar Pengguna</h5>
                    </div>
                    <form action="#" method="GET" class="mt-4">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="input-group input-group-sm">
                                    <input type="text" name="search" class="form-control" placeholder="Cari pengguna..." value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="align-middle" data-feather="search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card-body">
                        <!-- Tabel User -->
                        <table class="table table-striped table-hover table-bordered align-middle">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th><i class="align-middle me-1" data-feather="hash"></i>No</th>
                                    <th><i class="align-middle me-1" data-feather="tag"></i>Nama Pengguna</th>
                                    <th><i class="align-middle me-1" data-feather="tag"></i>Email</th>
                                    <th><i class="align-middle me-1" data-feather="tag"></i>Role</th>
                                    <th><i class="align-middle me-1" data-feather="info"></i>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="text-center">
                                        <td>{{ $users->firstItem() + $loop->index }}</td>
                                        <td><strong>{{ $user->name }}</strong></td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->role == 1)
                                                Admin
                                            @elseif ($user->role == 0)
                                                Customer
                                            @else
                                                Tidak Diketahui
                                            @endif
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="/dashboard-user/{{ $user->id }}/edit" class="btn btn-outline-warning btn-sm me-2" title="Edit">
                                                <i class="align-middle" data-feather="edit"></i>
                                            </a>
                                            <form action="/dashboard-user/{{ $user->id }}" method="POST" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')" title="Hapus">
                                                    <i class="align-middle" data-feather="trash-2"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection