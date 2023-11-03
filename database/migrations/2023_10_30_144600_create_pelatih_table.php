<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pelatih', function (Blueprint $table) {
            $table->increments('id_pelatih');
            $table->string('nama', 199);
            $table->string('nama_panggilan', 99);
            $table->string('no_wa', 14);
            $table->string('ig', 99);
            $table->string('keterangan', 199);
            $table->text('foto');
            $table->char('status', 1)->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelatih');
    }
};
