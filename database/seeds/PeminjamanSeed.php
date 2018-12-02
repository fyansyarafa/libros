<?php

use Illuminate\Database\Seeder;

class PeminjamanSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'nama_id' => 2, 'judul_buku_id' => 1, 'tanggal_peminjaman' => '2018-12-01', 'batas_waktu' => '2018-12-08',],

        ];

        foreach ($items as $item) {
            \App\Peminjaman::create($item);
        }
    }
}
