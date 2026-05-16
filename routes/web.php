<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerpustakaanController;
use App\Http\Controllers\KategoriController;

Route::get('/', function () {
    return view('welcome');
});

// Route Perpustakaan menggunakan Controller
Route::get('/perpustakaan', [PerpustakaanController::class, 'index']);
Route::get('/buku/{id}', [PerpustakaanController::class, 'show']);
Route::get('/about', [PerpustakaanController::class, 'about']);

// Route Kategori menggunakan Controller
// Bonus menggunakan named routes
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/search/{keyword}', [KategoriController::class, 'search'])->name('kategori.search');
Route::get('/kategori/{id}', [KategoriController::class, 'show'])->name('kategori.show');

Route::get('/anggota', function () {
    //Data anggota
    $anggota_list = [
        [
            'id' => 1,
            'kode' => 'AGT-001',
            'nama' => 'Budi Santoso',
            'email' => 'budi@email.com',
            'telepon' => '081234567890',
            'alamat' => 'Jakarta',
            'status' => 'Aktif'
        ],
        [
            'id' => 2,
            'kode' => 'AGT-002',
            'nama' => 'Bima Adi Nugroho',
            'email' => 'masbim@email.com',
            'telepon' => '087745514313',
            'alamat' => 'Pekalongan',
            'status' => 'Aktif'
        ],
        [
            'id' => 3,
            'kode' => 'AGT-003',
            'nama' => 'Ibrahim Guntur',
            'email' => 'brahimzz@email.com',
            'telepon' => '085456789012',
            'alamat' => 'Batang',
            'status' => 'Non-Aktif'
        ],
        [
            'id' => 4,
            'kode' => 'AGT-004',
            'nama' => 'Ida Eliza',
            'email' => 'elisinok@email.com',
            'telepon' => '084567890123',
            'alamat' => 'Pekalongan',
            'status' => 'Non-Aktif'
        ],
        [
            'id' => 5,
            'kode' => 'AGT-005',
            'nama' => 'Vina Agustina',
            'email' => 'pinanih@email.com',
            'telepon' => '085678901234',
            'alamat' => 'Pekalongan',
            'status' => 'Aktif'
        ],
    ];

    return view('anggota.index', compact('anggota_list'));
});

Route::get('/anggota/{id}', function ($id) {
    //Detail anggota
    $anggota_list = [
        [
            'id' => 1,
            'kode' => 'AGT-001',
            'nama' => 'Budi Santoso',
            'email' => 'budi@email.com',
            'telepon' => '081234567890',
            'alamat' => 'Jakarta',
            'status' => 'Aktif'
        ],
        [
            'id' => 2,
            'kode' => 'AGT-002',
            'nama' => 'Bima Adi Nugroho',
            'email' => 'masbim@email.com',
            'telepon' => '087745514313',
            'alamat' => 'Pekalongan',
            'status' => 'Aktif'
        ],
        [
            'id' => 3,
            'kode' => 'AGT-003',
            'nama' => 'Ibrahim Guntur',
            'email' => 'brahimzz@email.com',
            'telepon' => '085456789012',
            'alamat' => 'Batang',
            'status' => 'Non-Aktif'
        ],
        [
            'id' => 4,
            'kode' => 'AGT-004',
            'nama' => 'Ida Eliza',
            'email' => 'elisinok@email.com',
            'telepon' => '084567890123',
            'alamat' => 'Pekalongan',
            'status' => 'Non-Aktif'
        ],
        [
            'id' => 5,
            'kode' => 'AGT-005',
            'nama' => 'Vina Agustina',
            'email' => 'pinanih@email.com',
            'telepon' => '085678901234',
            'alamat' => 'Pekalongan',
            'status' => 'Aktif'
        ],
    ];

    // Cari anggota berdasarkan id
    $anggota = collect($anggota_list)->firstWhere('id', (int) $id);

    if (!$anggota) {
        abort(404, 'Anggota tidak ditemukan');
    }

    return view('anggota.show', compact('anggota'));
});

