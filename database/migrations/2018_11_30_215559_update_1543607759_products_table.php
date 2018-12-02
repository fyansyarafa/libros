<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1543607759ProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            if(Schema::hasColumn('products', 'price')) {
                $table->dropColumn('price');
            }
            
        });
Schema::table('products', function (Blueprint $table) {
            
if (!Schema::hasColumn('products', 'tahun_terbit')) {
                $table->integer('tahun_terbit')->nullable();
                }
if (!Schema::hasColumn('products', 'penerbit')) {
                $table->string('penerbit')->nullable();
                }
if (!Schema::hasColumn('products', 'lokasi_buku')) {
                $table->string('lokasi_buku');
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
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('tahun_terbit');
            $table->dropColumn('penerbit');
            $table->dropColumn('lokasi_buku');
            
        });
Schema::table('products', function (Blueprint $table) {
                        $table->decimal('price', 15, 2)->nullable();
                
        });

    }
}
