<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c0196b22171dRelationshipsToPeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('peminjamen', function(Blueprint $table) {
            if (!Schema::hasColumn('peminjamen', 'nama_id')) {
                $table->integer('nama_id')->unsigned()->nullable();
                $table->foreign('nama_id', '234710_5c0196b09a8a5')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('peminjamen', 'judul_buku_id')) {
                $table->integer('judul_buku_id')->unsigned()->nullable();
                $table->foreign('judul_buku_id', '234710_5c0196b0af1a3')->references('id')->on('products')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peminjamen', function(Blueprint $table) {
            
        });
    }
}
