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
       Schema::create('venues', function (Blueprint $table) {
            $table->id('venue_id'); 
            $table->foreignId('type_id')->constrained('tipe_venue', 'type_id')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users','user_id')->cascadeOnDelete();
            $table->string('name');
            $table->string('address');
            $table->text('description'); 
            $table->integer('price_per_hour');
            $table->integer('capacity');
            $table->string('provinsi');
            $table->integer('phone_contact'); 
            $table->string("image_path")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venue');
    }
};
