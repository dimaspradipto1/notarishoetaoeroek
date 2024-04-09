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
        Schema::create('izin_usahas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constraned();
            $table->string('nama_pemilik')->nullable();
            $table->string('nik_pemilik')->nullable();
            $table->string('no_hp', 15)->nullable()->zerofill();
            $table->string('nama_kuasa')->nullable();
            $table->string('nik_kuasa')->nullable();
            $table->string('no_hp_kuasa', 15)->nullable()->zerofill();
            $table->string('status')->default('PENDING');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('izin_usahas');
    }
};
