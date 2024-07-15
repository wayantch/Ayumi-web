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
        Schema::create('daftars', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->text('address');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('status'); // pekerja atau siswa
            $table->string('company_name')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('email');
            $table->string('class'); // kelas yang dipilih
            $table->string('day_time'); // hari/jam yang dipilih
            $table->string('file'); // nama file daftar
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftars');
    }
};

