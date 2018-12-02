<?php

$factory->define(App\Peminjaman::class, function (Faker\Generator $faker) {
    return [
        "nama_id" => factory('App\User')->create(),
        "judul_buku_id" => factory('App\Product')->create(),
        "tanggal_peminjaman" => $faker->date("Y-m-d", $max = 'now'),
        "batas_waktu" => $faker->date("Y-m-d", $max = 'now'),
    ];
});
