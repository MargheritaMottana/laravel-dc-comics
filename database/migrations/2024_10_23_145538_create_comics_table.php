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
        Schema::create('comics', function (Blueprint $table) {
            $table->id();

            $table->string('title', 128);
            $table->text('description');
            $table->string('thumb', 1024)->nullable();
            $table->decimal('price', 5, 2)->unsigned();
            $table->string('series', 64);
            $table->date('sale_date')->nullable();
            $table->string('type', 32);
            // non posso salvare un array nella colonna, lo trasformo in stringa 
            $table->text('artists')->nullable();
            $table->text('writers')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comics');
    }
};
