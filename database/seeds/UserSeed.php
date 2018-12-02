<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$ZlmSw5VQrXrJtrAxj1bYNORLfnu3L8/kx92PjENykCjWTYNznzPHC', 'role_id' => 1, 'remember_token' => '',],
            ['id' => 2, 'name' => 'Budi', 'email' => 'budi@libros.com', 'password' => '$2y$10$fLKZzAnAMorpBG0HAmdWqeFvscEh3VToO5Cfy2AWqRdiVaT27Z/ry', 'role_id' => 2, 'remember_token' => null,],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
