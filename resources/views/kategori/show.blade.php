@extends('layouts.app')

@section('title', 'Kategori: ' . $kategori['nama'])

@section('content')

    {{-- Breadcrumb navigation --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/perpustakaan">Perpustakaan</a></li>
            <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Kategori</a></li>
            <li class="breadcrumb-item active">{{ $kategori['nama'] }}</li>
        </ol>
    </nav>

    {{-- Info kategori --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">{{ $kategori['nama'] }}</h4>
        </div>
        <div class="card-body">
            <p class="mb-1"><strong>Deskripsi:</strong> {{ $kategori['deskripsi'] }}</p>
            <p class="mb-0"><strong>Jumlah Buku:</strong> {{ $kategori['jumlah_buku'] }} buku</p>
        </div>
    </div>

    {{-- Tabel buku dalam kategori --}}
    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="mb-0">Buku dalam Kategori Ini</h5>
        </div>
        <div class="card-body">
            @if (count($buku_list) > 0)
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Tahun</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buku_list as $index => $buku)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $buku['judul'] }}</td>
                                <td>{{ $buku['pengarang'] }}</td>
                                <td>{{ $buku['tahun'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-muted">Belum ada buku dalam kategori ini.</p>
            @endif
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>

@endsection