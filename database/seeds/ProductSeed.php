<?php

use Illuminate\Database\Seeder;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'test', 'tahun_terbit' => 2018, 'penerbit' => 'testttt', 'lokasi_buku' => 'ku21', 'description' => 'sdfsadf', 'photo1' => null, 'photo2' => null, 'photo3' => null,],

        ];

        foreach ($items as $item) {
            \App\Product::create($item);
        }
    }
}
