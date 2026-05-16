<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        // Data 5 kategori buku
        $kategori_list = [
            [
                'id' => 1,
                'nama' => 'Programming',
                'deskripsi' => 'Buku pemrograman dan coding',
                'jumlah_buku' => 25
            ],
            [
                'id' => 2,
                'nama' => 'Database',
                'deskripsi' => 'Buku basis data dan manajemen data',
                'jumlah_buku' => 18
            ],
            [
                'id' => 3,
                'nama' => 'Jaringan',
                'deskripsi' => 'Buku jaringan komputer dan keamanan',
                'jumlah_buku' => 12
            ],
            [
                'id' => 4,
                'nama' => 'Desain',
                'deskripsi' => 'Buku desain grafis dan UI/UX',
                'jumlah_buku' => 9
            ],
            [
                'id' => 5,
                'nama' => 'Matematika',
                'deskripsi' => 'Buku matematika dan statistika',
                'jumlah_buku' => 15
            ],
        ];

        return view('kategori.index', compact('kategori_list'));
    }

    public function show($id)
    {
        // Data kategori dengan daftar buku
        $kategori = [
            1 => [
                'id' => 1,
                'nama' => 'Programming',
                'deskripsi' => 'Buku pemrograman dan coding',
                'jumlah_buku' => 25
            ],
            2 => [
                'id' => 2,
                'nama' => 'Database',
                'deskripsi' => 'Buku basis data dan manajemen data',
                'jumlah_buku' => 18
            ],
            3 => [
                'id' => 3,
                'nama' => 'Jaringan',
                'deskripsi' => 'Buku jaringan komputer dan keamanan',
                'jumlah_buku' => 12
            ],
            4 => [
                'id' => 4,
                'nama' => 'Desain',
                'deskripsi' => 'Buku desain grafis dan UI/UX',
                'jumlah_buku' => 9
            ],
            5 => [
                'id' => 5,
                'nama' => 'Matematika',
                'deskripsi' => 'Buku matematika dan statistika',
                'jumlah_buku' => 15
            ],
        ];

        //Buku dalam kategori ini
        $buku_list = [
            1 => [
                [
                    'id' => 1,
                    'judul' => 'Laravel untuk Pemula',
                    'pengarang' => 'Budi Santoso',
                    'tahun' => 2023
                ],
                [
                    'id' => 2,
                    'judul' => 'Belajar PHP Modern',
                    'pengarang' => 'Bima Adi Nugroho',
                    'tahun' => 2022
                ],
                [
                    'id' => 3,
                    'judul' => 'Clean Code Indonesia',
                    'pengarang' => 'Ibrahim Guntur',
                    'tahun' => 2023
                ],
            ],
            2 => [
                [
                    'id' => 4,
                    'judul' => 'MySQL Mahir',
                    'pengarang' => 'Ida Eliza',
                    'tahun' => 2022
                ],
                [
                    'id' => 5,
                    'judul' => 'PostgreSQL & Laravel',
                    'pengarang' => 'Vina Agustina',
                    'tahun' => 2023
                ],
            ],
            3 => [
                [
                    'id' => 6,
                    'judul' => 'Dasar Jaringan Komputer',
                    'pengarang' => 'Hendra Wijaya',
                    'tahun' => 2021
                ],
                [
                    'id' => 7,
                    'judul' => 'Keamanan Sistem Informasi',
                    'pengarang' => 'Nina Kusuma',
                    'tahun' => 2022
                ],
            ],
            4 => [
                [
                    'id' => 8,
                    'judul' => 'Figma untuk UI/UX Designer',
                    'pengarang' => 'Andi Setiawan',
                    'tahun' => 2023
                ],
            ],
            5 => [
                [
                    'id' => 9,
                    'judul' => 'Statistika Terapan',
                    'pengarang' => 'Rina Marlina',
                    'tahun' => 2021
                ],
                [
                    'id' => 10,
                    'judul' => 'Aljabar Linear Modern',
                    'pengarang' => 'Dian Purnomo',
                    'tahun' => 2022
                ],
            ],
        ];

        if (!isset($kategori[$id])) {
            abort(404, 'Kategori tidak ditemukan');
        }

        return view('kategori.show', [
            'kategori' => $kategori[$id],
            'buku_list' => $buku_list[$id] ?? []
        ]);
    }

    public function search($keyword)
    {
        // Filter kategori berdasarkan keyword
        $kategori_list = [
            [
                'id' => 1,
                'nama' => 'Programming',
                'deskripsi' => 'Buku pemrograman dan coding',
                'jumlah_buku' => 25
            ],
            [
                'id' => 2,
                'nama' => 'Database',
                'deskripsi' => 'Buku basis data dan manajemen data',
                'jumlah_buku' => 18
            ],
            [
                'id' => 3,
                'nama' => 'Jaringan',
                'deskripsi' => 'Buku jaringan komputer dan keamanan',
                'jumlah_buku' => 12
            ],
            [
                'id' => 4,
                'nama' => 'Desain',
                'deskripsi' => 'Buku desain grafis dan UI/UX',
                'jumlah_buku' => 9
            ],
            [
                'id' => 5,
                'nama' => 'Matematika',
                'deskripsi' => 'Buku matematika dan statistika',
                'jumlah_buku' => 15
            ],
        ];

        //Return view dengan hasil
        $hasil = [];
        foreach ($kategori_list as $item) {
            if (
                str_contains(strtolower($item['nama']), strtolower($keyword)) ||
                str_contains(strtolower($item['deskripsi']), strtolower($keyword))
            ) {
                $hasil[] = $item;
            }
        }
        
        return view('kategori.search', compact('hasil', 'keyword'));
    }
}