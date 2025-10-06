<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pembelian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nm_cust');
            $table->text('alamat');
            $table->integer('quantity');            
            $table->string('grade');
            $table->double('harga');
            $table->date('tgl_antar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_pembelian');
    }
};
