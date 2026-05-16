@extends('layouts.app')

@section('title', 'Daftar Kategori Buku')

@section('content')

    <h1 class="mb-4">Daftar Kategori Buku</h1>
    {{-- Form search --}}
    <form action="{{ route('kategori.search', ['keyword' => 'placeholder']) }}" method="GET"
        onsubmit="this.action='/kategori/search/' + this.querySelector('input').value; return true;">
        <div class="input-group mb-4">
            <input type="text" class="form-control" name="keyword" placeholder="Cari kategori...">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>

    <div class="row">
        @foreach ($kategori_list as $kategori)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $kategori['nama'] }}</h5>
                        <p class="card-text text-muted">{{ $kategori['deskripsi'] }}</p>
                        <p class="card-text">
                            <span class="badge bg-info text-dark">
                                {{ $kategori['jumlah_buku'] }} buku
                            </span>
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('kategori.show', $kategori['id']) }}" class="btn btn-primary w-100">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection