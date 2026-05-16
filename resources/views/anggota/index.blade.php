@extends('layouts.app')

@section('title', 'Daftar Anggota Perpustakaan')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/perpustakaan">Perpustakaan</a></li>
            <li class="breadcrumb-item active">Anggota</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Daftar Anggota Perpustakaan</h1>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Kode Anggota</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anggota_list as $index => $anggota)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><code>{{ $anggota['kode'] }}</code></td>
                        <td>{{ $anggota['nama'] }}</td>
                        <td>{{ $anggota['email'] }}</td>
                        <td>
                            @if ($anggota['status'] === 'Aktif')
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Non-Aktif</span>
                            @endif
                        </td>
                        <td>
                            <a href="/anggota/{{ $anggota['id'] }}" class="btn btn-primary btn-sm">
                                Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        <a href="/perpustakaan" class="btn btn-secondary">
            Kembali ke Perpustakaan
        </a>
    </div>

@endsection