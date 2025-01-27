@extends('dashboard_layout.main')

@section('title', 'Detail Kategori')

@section('contents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div>
                <h1 class="mb-4 text-center">Detail Data Kategori</h1>
            </div>
            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID Kategori</th>
                            <td>{{ $categorie->id }}</td>
                        </tr>
                        <tr>
                            <th>Nama Kategori</th>
                            <td>{{ $categorie->category_name }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Dibuat</th>
                            <td>{{ $categorie->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Diperbarui</th>
                            <td>{{ $categorie->updated_at->format('d M Y H:i') }}</td>
                        </tr>
                    </table>
                    <!-- Tambahkan tombol Kembali -->
                    <div class="d-flex justify-content-start mt-4">
                        <a href="/dashboard-categorie" class="btn btn-primary">
                            <i class="align-middle" data-feather="arrow-left"></i> Kembali
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
