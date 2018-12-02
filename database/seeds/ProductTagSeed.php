<?php

use Illuminate\Database\Seeder;

class ProductTagSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'boleh dipinjam',],
            ['id' => 2, 'name' => 'tidak boleh dipinjam',],

        ];

        foreach ($items as $item) {
            \App\ProductTag::create($item);
        }
    }
}
