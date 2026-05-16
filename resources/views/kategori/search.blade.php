@extends('layouts.app')

@section('title', 'Hasil Pencarian: ' . $keyword)

@section('content')

    <h2 class="mb-1">Hasil Pencarian Kategori</h2>
    <p class="text-muted mb-4">
        Menampilkan hasil untuk kata kunci: <strong>"{{ $keyword }}"</strong>
    </p>

    <div class="row">
        @forelse ($hasil as $kategori)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-warning">
                    <div class="card-body">
                        <h5 class="card-title">
                            {!! str_ireplace($keyword, '<mark>' . $keyword . '</mark>', $kategori['nama']) !!}
                        </h5>
                        <p class="card-text text-muted">
                            {!! str_ireplace($keyword, '<mark>' . $keyword . '</mark>', $kategori['deskripsi']) !!}
                        </p>
                        <span class="badge bg-info text-dark">
                            {{ $kategori['jumlah_buku'] }} buku
                        </span>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('kategori.show', $kategori['id']) }}" class="btn btn-primary w-100">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning">
                    Kategori dengan kata kunci "<strong>{{ $keyword }}</strong>" tidak ditemukan.
                </div>
            </div>
        @endforelse
    </div>

    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
        Kembali ke Semua Kategori
    </a>

@endsection