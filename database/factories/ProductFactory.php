<?php

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "tahun_terbit" => $faker->randomNumber(2),
        "penerbit" => $faker->name,
        "lokasi_buku" => $faker->name,
        "description" => $faker->name,
    ];
});
