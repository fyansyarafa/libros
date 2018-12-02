<?php

use Illuminate\Database\Seeder;

class ProductCategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Biografi', 'description' => 'ini deskripsi biografi',],
            ['id' => 2, 'name' => 'Sains & Teknologi', 'description' => 'ini',],

        ];

        foreach ($items as $item) {
            \App\ProductCategory::create($item);
        }
    }
}
