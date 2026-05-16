@extends('layouts.app')

@section('title', 'Detail Anggota - ' . $anggota['nama'])

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/perpustakaan">Perpustakaan</a></li>
            <li class="breadcrumb-item"><a href="/anggota">Anggota</a></li>
            <li class="breadcrumb-item active">{{ $anggota['nama'] }}</li>
        </ol>
    </nav>

    <div class="card shadow-sm mt-2" style="max-width: 600px;">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Detail Anggota</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <table class="table table-borderless">
                        <tr>
                            <th width="160">Kode Anggota</th>
                            <td>: <code>{{ $anggota['kode'] }}</code></td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>: {{ $anggota['nama'] }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>: {{ $anggota['email'] }}</td>
                        </tr>
                        <tr>
                            <th>Telepon</th>
                            <td>: {{ $anggota['telepon'] }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>: {{ $anggota['alamat'] }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>:
                                @if ($anggota['status'] === 'Aktif')
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary">Non-Aktif</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <a href="/anggota" class="btn btn-secondary">
            Kembali
        </a>
    </div>

@endsection