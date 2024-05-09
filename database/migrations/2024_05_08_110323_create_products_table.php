<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nazwa_produktu', 150);
            $table->string('producent', 50);
            $table->string('jednostka_ceny', 6);
            $table->decimal('waga')->nullable();
            $table->decimal('srednica')->nullable();
            $table->integer('dlugosc')->nullable();
            $table->integer('szerokosc')->nullable();
            $table->integer('wysokosc')->nullable();
            $table->decimal('grubosc')->nullable();
            $table->string('typ_pakowania', 20)->nullable();
            $table->string('jednostki_zakupu', 50)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
