@extends('dashboard_layout.main')
@section('title', 'Daftar Contact')
@section('navContact', 'active')

@section('contents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top">
                    <h5 class="mb-0" style="color: white">Daftar Pesan</h5>
                </div>
                <div class="card-body">
                    <!-- Tabel User -->
                    <table class="table table-striped table-hover table-bordered align-middle">
                        <thead class="table-primary text-center">
                            <tr>
                                <th><i class="align-middle me-1" data-feather="hash"></i>No</th>
                                <th><i class="align-middle me-1" data-feather="tag"></i>Nama</th>
                                <th><i class="align-middle me-1" data-feather="tag"></i>Email</th>
                                <th><i class="align-middle me-1" data-feather="tag"></i>Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr class="text-center">
                                    <td>{{ $contacts->firstItem() + $loop->index }}</td>
                                    <td><strong>{{ $contact->nama }}</strong></td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->pesan }}</td>
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