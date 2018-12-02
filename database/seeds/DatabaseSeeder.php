<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(ProductTagSeed::class);
        $this->call(ProductCategorySeed::class);
        $this->call(ProductSeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);
        $this->call(PeminjamanSeed::class);
        $this->call(ProductSeedPivot::class);

    }
}
