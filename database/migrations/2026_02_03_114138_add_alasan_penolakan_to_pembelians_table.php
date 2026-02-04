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
    Schema::table('tbl_pembelian', function (Blueprint $table) {
        $table->text('alasan_penolakan')->nullable();
    });
}

public function down()
{
    Schema::table('tbl_pembelian', function (Blueprint $table) {
        $table->dropColumn('alasan_penolakan');
    });
}
};
