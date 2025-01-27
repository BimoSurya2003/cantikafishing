@extends('dashboard_layout.main')

@section('title', 'Detail User')
@section('navUser', 'active')

@section('contents')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0" style="color: white">Detail User {{ $user->name }}</h5>
        </div>
        <div class="card-body">
            <h6 class="card-title">Informasi Pengguna</h6>
            <ul class="list-group mb-4">
                <li class="list-group-item"><strong>Nama:</strong> {{ $user->name }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                <li class="list-group-item"><strong>Role:</strong> 
                    <span class="badge 
                        {{ $user->role == 1 ? 'bg-success' : 'bg-info' }}">
                        {{ $user->role == 1 ? 'Admin' : 'Customer' }}
                    </span>
                </li>
            </ul>

            <h6 class="mt-4">Edit Role Pengguna</h6>
            <form action="/dashboard-user/{{ $user->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="role">Pilih Role</label>
                    <select name="role" id="role" class="form-control" required>
                        <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Admin</option>
                        <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Customer</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update Role</button>
            </form>
        </div>
        <div class="card-footer text-muted">
            Pastikan untuk memeriksa kembali perubahan role sebelum memperbarui.
        </div>
    </div>
</div>
@endsection
